<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }


    public function authenticate(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            $request->session()->put('name', Auth::user()->name);
            return redirect('user')->with(['success' => "logged in successfully !"]);
        }
        else{

            return back()->withErrors(['failed'=>"Invalid Username or Password !"]);
        }

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
