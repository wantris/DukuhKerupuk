<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function mitra()
    {
        return view('landing.mitra');
    }

    public function agen()
    {
        return view('landing.agen');
    }
}
