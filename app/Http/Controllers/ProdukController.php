<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function listProduk()
    {
        $pr = Product::all();
        return view('landing.product_list', compact('pr'));
    }

    public function detailProduk($slug)
    {
        $pr = Product::where('slug', $slug)->first();
        return view('landing.product_detail', compact('pr'));
    }
}
