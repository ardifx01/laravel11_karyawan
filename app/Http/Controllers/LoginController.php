<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('v_login.login', [
            'title' => 'Login Page',
        ]);
    }
    public function auth(Request $request){
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credential)){
            if(Auth::user()->status == 0){
                Auth::logout();
                return back()->with('error', 'Login Terlebih Dahulu');
            }
            $request->session()->regenerate();
            return redirect()->intended(Route('dashboard'));
        }
        return back()->with('error', 'Login gagal!');
    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(Route('login'));
    }
}
