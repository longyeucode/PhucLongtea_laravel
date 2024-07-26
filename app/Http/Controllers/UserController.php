<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Mail;
use Session;


class UserController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }

    public function Post_login(Request $req ){
      
        // dd($req->all());
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
           return redirect('/');
        }
            return redirect()->back()->with('error','Sai tài khoản hoặc mật khẩu ');

}   
    public function Post_register(Request $req ){
        // dd($req->all());
       
            $req->merge(['password'=>Hash::make($req->password)]); //max hoas password
      
      User::create($req->all()); //thêm mới tài khoản 
        // dd($req->all());
          return redirect('login');
       
       
}   

    public function logout(){
        Auth::logout();
       return redirect()->route('login');
    }

    public function forgotpass_email(){
        return view('forgotpass_email');
    }
    public function sendVerificationCode(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();
        $code = rand(100000, 999999);
        $user->verification_code = $code;
        $user->save();

        Mail::send('code', ['code' => $code], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Mã xác nhận đặt lại mật khẩu');
        });

        return redirect()->route('forgotpass_code')->with('email', $request->email);
    }

    //nhập code
    public function forgotpass_code(){
        return view('forgotpass_code');
    }
    public function verifyCode(Request $request)
    {
     
        $user = User::where('email', $request->email)
                     ->where('verification_code', $request->verification_code)
                     ->first();
 
        if (!$user) {
            return back()->with('error','Mã xác nhận không hợp lệ.');
        }

        Session::put('email', $request->email);
        Session::put('verification_code', $request->verification_code);

        return redirect()->route('forgotpass_pass');
    }
    public function forgotpass_pass()
    {
        if (!Session::has('email') || !Session::has('verification_code')) {
            return redirect()->route('forgotpass_pass');
        }

        return view('forgotpass_pass');
    }

    public function resetPassword(Request $request)
    {
        $user = User::where('email', $request->email)
                     ->where('verification_code', $request->verification_code)
                     ->first();

        

        $user->password = Hash::make($request->password);   
        $user->save();

        Session::forget('email');
        Session::forget('verification_code');

        return redirect()->route('login')->with('success', 'Mật khẩu của bạn đã được đặt lại thành công!');
    }
    public function update_user(Request $request)
    {
       
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'phone' => ['required', 'regex:/^(0[3|5|7|8|9])+([0-9]{8})$/'],
        //     'address' => 'required|string|max:255',
        // ]);
    
    $user = Auth::user();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phonenumber = $request->input('phonenumber');
    $user->address = $request->input('address');
    $user->save();
    return redirect()->back()->with('success', 'Thông tin cá nhân Đã được cập nhật');
    }
    

}





    
