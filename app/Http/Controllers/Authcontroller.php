<?php

namespace App\Http\Controllers;

use App\la_admins_model;
use App\la_users_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class Authcontroller extends Controller
{
    public function showLoginPage(){
        return view('LoginPage');
    }
    public function showRegisterPage(){
        return view('RegisterPage');
    }
    public function registerAction(Request $request){
        

        $checkusers = la_users_model::where('email', $request->input('email'))->first();

        if ($checkusers == false) {
            $users = new la_users_model();
            $users->email = $request->input('email');
            $users->password = Hash::make($request->input('password'));
            $users->first_name = $request->input('first-name');
            $users->last_name = $request->input('last-name');
            $users->no_telp = $request->input('no-telp');
            $users->alamat = $request->input('alamat');
            $registered = $users->save();
            if ($registered) {
                return redirect('/register')->with(['success' => 'Pendaftaran berhasil silahkan Login']);
            }else{
                return redirect('/register')->with(['error' => 'Pendaftaran Gagal silahkan coba lagi']);
            }
        }elseif ($checkusers == true){
            return redirect('/register')->with(['warning' => 'Email telah terdaftar silahkan Login']);
        } 
    }

    public function loginAction(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $users = la_users_model::where('email', $email)->first();
        
        if ($users !== \null) {
            if (Hash::check($password, $users->password)) {

                Session::put('email', $users->email);
                Session::put('usersname', $users->first_name);
                Session::put('status', 'users');

                return \redirect('/');

            }else {
                return redirect('/login')->with(['warning' => 'Password yang anda masukan salah']);
            }
        }else {
            return redirect('/login')->with(['error' => 'Email yang anda masukan tidak terdaftar']);
        }
    }

    public function adminLoginPage(){
        return view('Admin.LoginPage');
    }

    public function adminLoginAction(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $admins = la_admins_model::where('username', $username)->first();
        
        if ($admins !== \null) {
            if (Hash::check($password, $admins->password)) {

                Session::put('username', $admins->username);
                Session::put('adminname', $admins->fullname);
                Session::put('status', 'admins');

                return \redirect('/');

            }else {
                return redirect('/admin')->with(['warning' => 'Password yang anda masukan salah']);
            }
        }else {
            return redirect('/admin')->with(['error' => 'username Admin tidak terdaftar']);
        }
    }

    public function logout()
    {
            
        Session::flush();
        return redirect('/');
    }

}
