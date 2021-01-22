<?php

namespace App\Http\Controllers\Konsumen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthKonsumenController extends Controller
{
    public function registerMitra()
    {
        return view('konsumen.auth.register');
    }

    public function loginKonsumen()
    {
        return view('konsumen.auth.login');
    }
}
