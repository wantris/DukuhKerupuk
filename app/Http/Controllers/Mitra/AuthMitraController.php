<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthMitraController extends Controller
{
    public function registerMitra()
    {
        return view('mitra.auth.register');
    }
    public function loginMitra()
    {
        return view('mitra.auth.login');
    }
    public function verificationView()
    {
        return view('mitra.auth.verification');
    }
}
