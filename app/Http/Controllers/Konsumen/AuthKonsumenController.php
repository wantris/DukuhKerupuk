<?php

namespace App\Http\Controllers\Konsumen;

use Illuminate\Http\Request;
use App\Province;
use App\City;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;

class AuthKonsumenController extends Controller
{
    protected $phone_number = "";

    public function registerMitra()
    {
        $province = Province::all();
        return view('konsumen.auth.register', compact('province'));
    }

    public function saveKonsumen(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'numeric'],
            'username' => ['required', 'min:5'],
            'password' => ['required', 'min:8'],
            'password_confirm' => ['required', 'min:8'],
            'province' => ['required'],
            'city' => ['required'],
            'kode_pos' => ['required'],
        ]);
        if ($request->agree === null) {
            return redirect()->back()->with('agreeFailed', 'Centang persetujuan persyaratan');
        }

        $this->hp($request->phone_number);

        if ($request->password === $request->password_confirm) {
            $token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_sid = getenv("TWILIO_SID");
            $twilio_verify_sid = "VA3e69381a722d5ad6134bdb48afe45d8b";
            $twilio = new Client($twilio_sid, $token);
            $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create($this->phone_number, "sms", ["from" => "Dukuhkerupuk"]);
            try {
                $mitra = new User();
                $mitra->nama_user = $request->name;
                $mitra->username = $request->username;
                $mitra->password = Hash::make($request->password);
                $mitra->no_tlp = $this->phone_number;
                $mitra->province = $request->province;
                $mitra->city = $request->city;
                $mitra->kode_pos = $request->kode_pos;
                $mitra->role = "Konsumen";

                $mitra->save();

                return redirect()->route('verification.konsumen')->with(['phone_number' => $this->phone_number]);
            } catch (Throwable $e) {
                // echo $e;
                return redirect()->back()->with('registerFailed', 'Pendaftaran akun gagal');
            }
        } else {
            return redirect()->back()->with('registerFailed', 'Konfirmasi password tidak sama');
        }
    }

    public function getCity($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }

    public function loginKonsumen()
    {
        return view('konsumen.auth.login');
    }

    public function verificationView()
    {
        return view('konsumen.auth.verification');
    }

    protected function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = "VA3e69381a722d5ad6134bdb48afe45d8b";
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($request->verification_code, array('to' => $request->phone_number));
        if ($verification->valid) {
            $user = tap(User::where('no_tlp', $request->phone_number))->update(['isVerified' => true]);
            /* Authenticate user */
            return redirect()->route('login.konsumen')->with(['verifySuccess' => 'Nomor telepon berhasil diverifikasi']);
        }
        return back()->with(['phone_number' => $request->phone_number, 'error' => 'Kode OTP tidak valid!']);
    }

    public function hp($nohp)
    {
        // kadang ada penulisan no hp 0811 239 345
        $nohp = str_replace(" ", "", $nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace("(", "", $nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace(")", "", $nohp);
        // kadang ada penulisan no hp 0811.239.345
        $nohp = str_replace(".", "", $nohp);

        // cek apakah no hp mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($nohp), 0, 3) == '+62') {
                $hp = trim($nohp);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr(trim($nohp), 0, 1) == '0') {
                $hp = '+62' . substr(trim($nohp), 1);
            }
        }

        $this->phone_number = $hp;
    }
}
