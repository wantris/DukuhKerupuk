<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Auth;  


class AdminController extends Controller
{
    //
    public function index(){
    	
        $dtAdmin =Admin::all();
    	return view('admin/admin', compact('dtAdmin'));
    }
    
    //Admin
    public function data_admin()
    {
        $dtAdmin =Admin::all();
        return view('admin.data_admin.data_admin', compact('dtAdmin'));
    }
    public function create_admin() {
        // $users = User::all();
        // return view('admin.data_admin.create_admin', ['users' => $users]);
        return view('admin.data_admin.create_admin');
    }
    public function store(Request $request)
    {
        
        Admin::create([
            'nama_admin' => $request->nama_admin,
            'username' => $request->username,
            'password' => $request->password,
            'alamat_admin' => $request->alamat_admin,
        ]);

        return redirect(route('data_admin'));
    }
    public function edit_admin($id_admin)
    {
        $peg =Admin::findorfail($id_admin);
        return view('admin.data_admin.edit_admin', compact('peg'));
    }
    public function update_admin(Request $request, $id_admin)
    {
        $peg =Admin::findorfail($id_admin);
        $peg->update($request->all());
        return redirect(route('data_admin'));
    }
    public function delete_admin($id_admin)
    {
        $peg =Admin::findorfail($id_admin);
        $peg->delete();
        return back();
    }
} 
