<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function mitra()
    {
        return view('landing.mitra');
    }

    public function agen()
    {
        return view('landing.agen');
    }

    public function detailMitra()
    {
        return view('landing.detail_mitra');
    }

    public function produkMitra()
    {
        return view('landing.produk_mitra');
    }

    public function produkMitraFav()
    {
        return view('landing.produk_mitra_fav');
    }
}
