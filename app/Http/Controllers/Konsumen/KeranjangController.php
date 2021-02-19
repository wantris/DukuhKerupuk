<?php

namespace App\Http\Controllers\Konsumen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeranjangController extends Controller
{
    //
    public function index()
    {
        return view('konsumen.cart');
    }
}
