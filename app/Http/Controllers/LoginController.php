<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.login',[
            'active' => 'login',////untuk mengkatifkan warna saat diklik dettingan di navbar app defaul
        ]);
    }
    //
    public function authenticate(Request $request){
        $credentials=$request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'login failed!');
    }
    //
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
