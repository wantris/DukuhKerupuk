<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function listProduk()
    {
        return view('landing.list_produk');
    }

    public function detailProduk()
    {
        return view('landing.detail_produk');
    }
}
