<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Admin;
use App\User;

class UserController extends Controller
{
    public function index(){
    	
        $dtUser =User::all();
    	return view('admin/admin', compact('dtUser'));
    }
    public function data_user()
    {
        $dtUser =User::all();
        return view('admin.user.data_user', compact('dtUser'));
    }
    public function create_user() {
        return view('admin.user.create_user');
    }
    public function store(Request $request)
    {
        
        User::create([
            'nama_user' => $request->nama_user,
            'username' => $request->username,
            'password' => $request->password,
            'alamat_user' => $request->alamat_user,
            'no_tlp' => $request->no_tlp,
            'role' => $request->role,
        ]);

        return redirect(route('data_user'));
    }
    public function edit_user($id_user)
    {
        $peg =User::findorfail($id_user);
        return view('admin.user.edit_user', compact('peg'));
    }
    public function update_user(Request $request, $id_user)
    {
        $peg =User::findorfail($id_user);
        $peg->update($request->all());
        return redirect(route('data_user'));
    }
    public function delete_user($id_user)
    {
        $peg =User::findorfail($id_user);
        $peg->delete();
        return back();
    }
}
