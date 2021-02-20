<?php

namespace App\Http\Controllers\Konsumen;

use Illuminate\Http\Request;
use App\Province;
use App\City;
use App\Http\Controllers\Controller;

class KonsumenController extends Controller
{
    //
    public function profile()
    {
        return view('konsumen.profile.profile');
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
        if ($type === 1) {
            return view('konsumen.purchase.index');
        } elseif ($type === 2) {
            return view('konsumen.purchase.unpaid');
        } elseif ($type === 3) {
            return view('konsumen.purchase.packed');
        } elseif ($type === 4) {
            return view('konsumen.purchase.sent');
        } elseif ($type === 5) {
            return view('konsumen.purchase.finish');
        } elseif ($type === 6) {
            return view('konsumen.purchase.canceled');
        }
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }
}
