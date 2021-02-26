<?php

namespace App\Http\Controllers\Konsumen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;
use App\City;

class CheckoutController extends Controller
{
    public function index()
    {

        $province = Province::all();
        return view('konsumen.checkout_page', compact('province'));
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }
}
