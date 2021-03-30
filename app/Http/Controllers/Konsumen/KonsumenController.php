<?php

namespace App\Http\Controllers\Konsumen;

use App\Alamat;
use Illuminate\Http\Request;
use App\Province;
use App\City;
use App\DetailTransaksi;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Transaksi;
use Throwable;

class KonsumenController extends Controller
{
    //
    public function profile()
    {
        $user = User::find(Auth::guard('users')->id());
        return view('konsumen.profile.profile', compact('user'));
    }

    public function profileSave(Request $request)
    {

        $user = User::find(Auth::guard('users')->id());
        if (!is_null($user)) {
            try {
                if ($file = $request->file('avatar_image')) {
                    $destinationPath = public_path('/konsumen/avatar/'); // upload path
                    $avatar_image = $file->getClientOriginalName();
                    $file->move($destinationPath, $avatar_image);

                    $user->nama_user = $request->name;
                    $user->email = $request->email;
                    $user->gender = $request->gender;
                    $user->birth_day = $request->year . '-' . $request->month . '-' . $request->day;
                    $user->gambar_profil = $avatar_image;
                } else {
                    $user->nama_user = $request->name;
                    $user->email = $request->email;
                    $user->gender = $request->gender;
                    $user->birth_day = $request->year . '-' . $request->month . '-' . $request->day;
                }

                $user->save();

                return redirect()->back()->with('success', 'Data akun berhasil di update');
            } catch (Throwable $e) {
                return redirect()->back()->with('failed', 'Data akun gagal di update');
            }
        }
    }

    public function address()
    {
        $user = User::find(Auth::guard('users')->id());
        $province = Province::all();
        $add = Alamat::with('provinceRef', 'cityRef')->where('user_id', Auth::guard('users')->id())->get();
        return view('konsumen.profile.address', compact('province', 'add', 'user'));
    }

    public function addressSave(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'phone' => 'required',
            'province' => 'required',
            'city_destination' => 'required',
            'pos_code' => 'required',
            'street_address' => 'required'
        ]);

        try {

            $add = new Alamat();
            $add->nama_lengkap = $request->name;
            $add->user_id = Auth::guard('users')->id();
            $add->nomor_telp = $request->phone;
            $add->nama_lengkap = $request->name;
            $add->province_id = $request->province;
            $add->city_id = $request->city_destination;
            $add->kode_pos = $request->pos_code;
            $add->latitude = $request->latitude;
            $add->longitude = $request->longitude;
            $add->alamat_detail = $request->street_address;
            $add->is_featured = 0;
            $add->save();

            return redirect()->back()->with('success', 'Berhasil menambahkan alamat');
        } catch (Throwable $e) {
            return $e;
            // return redirect()->route('address.konsumen')->with('failed', 'Gagal menambahkan alamat');
        }
    }

    public function addressUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'phone' => 'required',
            'province' => 'required',
            'city_destination' => 'required',
            'pos_code' => 'required',
            'street_address' => 'required'
        ]);

        try {

            $add = Alamat::find($request->id);
            $add->nama_lengkap = $request->name;
            $add->user_id = Auth::guard('users')->id();
            $add->nomor_telp = $request->phone;
            $add->nama_lengkap = $request->name;
            $add->province_id = $request->province;
            $add->city_id = $request->city_destination;
            $add->kode_pos = $request->pos_code;
            $add->latitude = $request->latitude;
            $add->longitude = $request->longitude;
            $add->alamat_detail = $request->street_address;
            $add->is_featured = 0;
            $add->save();

            return redirect()->route('address.konsumen')->with('success', 'Berhasil update alamat');
        } catch (Throwable $e) {
            return $e;
            return redirect()->route('address.konsumen')->with('failed', 'Gagal update alamat');
        }
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $status = $request->status;

        $add = Alamat::where('user_id', Auth::guard('users')->id())->get();
        if ($add->count() > 0) {
            foreach ($add as $item) {
                if ($item->id === (int)$id) {
                    Alamat::where('id', $id)->update([
                        'is_featured' => (int)$status
                    ]);
                } else {
                    Alamat::where('id', $item->id)->update([
                        'is_featured' => 0
                    ]);
                }
            }
            $success['status'] = '1';
            // $success['html'] = $html;
            $success['message'] = 'Change status success';
            return response()->json($success, 200);
        } else {
            $success['status'] = 'error';
            $success['message'] = 'data not found';
            return response()->json($success, 500);
        }
    }

    public function delete($id)
    {
        // echo "hiyaa";
        try {
            Alamat::where('id', $id)->delete();

            $success['status'] = '1';
            $success['message'] = 'Config save success';
            return response()->json($success, 200);
        } catch (Throwable $e) {
            $success['status'] = 'error';
            $success['message'] = $e;
            return response()->json($success, 500);
        }
    }

    public function changePassword()
    {
        $user = User::find(Auth::guard('users')->id());
        return view('konsumen.profile.password', compact('user'));
    }

    public function purchase($type)
    {
        if ($type === "1") {
            $ts = Transaksi::where('user_id', Auth::guard('users')->id())->get();
            return view('konsumen.purchase.index', compact('ts'));
        } elseif ($type === "2") {
            $ts = Transaksi::where('user_id', Auth::guard('users')->id())->where('status', 'pending')->get();
            return view('konsumen.purchase.pending', compact('ts'));
        } elseif ($type === "3") {
            $ts = Transaksi::where('user_id', Auth::guard('users')->id())->where('status', 'cek')->get();
            return view('konsumen.purchase.cek', compact('ts'));
        } elseif ($type === "4") {
            $ts = Transaksi::where('user_id', Auth::guard('users')->id())->where('status', 'dikemas')->get();
            return view('konsumen.purchase.dikemas', compact('ts'));
        } elseif ($type === "5") {
            $ts = Transaksi::where('user_id', Auth::guard('users')->id())->where('status', 'dikirim')->get();
            return view('konsumen.purchase.dikirim', compact('ts'));
        } elseif ($type === "6") {
            $ts = Transaksi::where('user_id', Auth::guard('users')->id())->where('status', 'selesai')->get();
            return view('konsumen.purchase.selesai', compact('ts'));
        } elseif ($type === "7") {
            $ts = Transaksi::where('user_id', Auth::guard('users')->id())->where('pengiriman', 'cod')->get();
            return view('konsumen.purchase.cod', compact('ts'));
        }
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }

    public function finishTrans(Request $request, $kd)
    {
        $status = $request->status;

        try {
            Transaksi::where('kd_transaksi', $kd)->update([
                'status' => $status
            ]);

            $success['status'] = '1';
            $success['message'] = $kd;
            return response()->json($success, 200);
        } catch (Throwable $e) {
            $success['status'] = 'error';
            $success['message'] = $e;
            return response()->json($success, 500);
        }
    }

    public function detailpesanan($kd)
    {
        $detail = DetailTransaksi::where('transaksi_kd', $kd)->get();
        $ts = Transaksi::where('kd_transaksi', $kd)->first();
        return view('konsumen.purchase.detail_pesanan', compact('ts', 'detail'));
    }
}
