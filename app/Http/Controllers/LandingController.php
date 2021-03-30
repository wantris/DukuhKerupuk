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
        return view('landing.mitra_page');
    }

    public function konsumen()
    {
        return view('landing.konsumen_page');
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

    public function contact()
    {
        return view('landing.contact');
    }
}
