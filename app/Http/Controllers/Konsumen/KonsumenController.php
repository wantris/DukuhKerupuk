<?php

namespace App\Http\Controllers\Konsumen;

use Illuminate\Http\Request;
use App\Province;
use App\City;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
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

                $user->nama_user = $request->name;
                $user->email = $request->email;
                $user->gender = $request->gender;
                $user->birth_day = $request->year . '-' . $request->month . '-' . $request->day;
                $user->save();

                return redirect()->back()->with('success', 'Data akun berhasil di update');
            } catch (Throwable $e) {
                return redirect()->back()->with('failed', 'Data akun gagal di update');
            }
        }
    }

    public function address()
    {
        $province = Province::all();
        return view('konsumen.profile.address', compact('province'));
    }

    public function changePassword()
    {
        return view('konsumen.profile.password');
    }

    public function purchase($type)
    {
        if ($type === "1") {
            return view('konsumen.purchase.index');
        } elseif ($type === "2") {
            return view('konsumen.purchase.unpaid');
        } elseif ($type === "3") {
            return view('konsumen.purchase.packed');
        } elseif ($type === "4") {
            return view('konsumen.purchase.sent');
        } elseif ($type === "5") {
            return view('konsumen.purchase.finish');
        } elseif ($type === "6") {
            return view('konsumen.purchase.canceled');
        }
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }
}
