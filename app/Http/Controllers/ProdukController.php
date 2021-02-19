<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function listProduk()
    {
        return view('landing.product_list');
    }

    public function detailProduk()
    {
        return view('landing.product_detail');
    }
}
