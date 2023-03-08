<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.register',[
            'active' => 'login',
        ]);
    }
    public function newRegister(Request $request){
        $registerdata=$request->validate([
            'name'      => 'required|min:3',
            'email'     => 'required|email:dns|unique:users',
            'password'  => 'required|min:5',
        ]);
        $registerdata['password'] = Hash::make($registerdata['password']);//enkripsi password
        User::create($registerdata);
        // $request->session()->flash('success', 'Registrasion successfull! Please login!');
        return redirect('/login')->with('success', 'Registrasion successfull! Please login!');
    }
}
