<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Twilio\Rest\Client;
use App\Mitra;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthMitraController extends Controller
{
    protected $phone_number = "";

    use AuthenticatesUsers;

    protected $redirectTo = '/mitra/portal';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('mitra');
    }

    public function username()
    {
        return 'username';
    }

    public function registerMitra()
    {
        return view('mitra.auth.register_mitra');
    }

    public function saveMitra(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'numeric'],
            'username' => ['required', 'min:5'],
            'password' => ['required', 'min:8'],
            'password_confirm' => ['required', 'min:8'],
        ]);
        if ($request->agree === null) {
            return redirect()->back()->with('agreeFailed', 'Centang persetujuan persyaratan');
        }

        $this->hp($request->phone_number);

        if ($request->password === $request->password_confirm) {
            $token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_sid = getenv("TWILIO_SID");
            $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            $twilio = new Client($twilio_sid, $token);
            $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create($this->phone_number, "sms", ["from" => "Dukuhkerupuk"]);
            try {
                $mitra = new Mitra();
                $mitra->nama_mitra = $request->name;
                $mitra->username = $request->username;
                $mitra->password = Hash::make($request->password);
                $mitra->no_tlp = $this->phone_number;
                $mitra->save();

                return redirect()->route('verification.mitra')->with(['phone_number' => $this->phone_number]);
            } catch (Throwable $e) {
                echo $e;
                return redirect()->back()->with('registerFailed', 'Pendaftaran akun gagal');
            }
        }
    }

    public function loginMitra()
    {
        return view('mitra.auth.login_mitra');
    }

    // public function postLogin(Request $request)
    // {
    //     $this->validate($request, [
    //         'username'   => 'required',
    //         'password' => 'required|min:3'
    //     ]);
    //     if (Auth::guard('mitra')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
    //         return redirect('/');
    //     }
    //     return back()->withInput($request->only('username', 'remember'));
    // }

    public function verificationView()
    {
        return view('mitra.auth.verification_mitra');
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
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($request->verification_code, array('to' => $request->phone_number));
        if ($verification->valid) {
            $mitra = tap(Mitra::where('no_tlp', $request->phone_number))->update(['isVerified' => true]);
            /* Authenticate user */
            return redirect()->route('login.mitra')->with(['verifySuccess' => 'Nomor telepon berhasil diverifikasi']);
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
