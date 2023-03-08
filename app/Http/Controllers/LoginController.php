<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if($request->remember){
            Cookie::queue('email', $credential['email'], 7);
        }

        if(Auth::attempt($credential, true)){
            Session::put('email', $credential['email']);
            return redirect('/');
        }

        return redirect()->back()->withErrors('Wrong Email or Password');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
