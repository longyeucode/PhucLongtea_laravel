<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function logon(){
        return view('admin.logon');
    }
    public function login_logon(Request $req){
        // dd($request->all());
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password] )) {
             return redirect()->route('admin.index');
        }
        else{
            return redirect()->back()->with('error','Sai tài khoản hoặc mật khẩu ');
        }
    }
    public function logout_logon(){
        Auth::logout();
        return redirect()->back();
    }
}
