<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategories;
use App\Product;

class LandingController extends Controller
{
    public function index()
    {
        $ct = ProductCategories::all();
        $pr = Product::limit(8)->get();
        return view('home', compact('ct', 'pr'));
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
