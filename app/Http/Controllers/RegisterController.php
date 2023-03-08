<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $rules = [
            "username" => 'required|min:5',
            "email" => 'required|email|unique:users',
            "password" => 'required|min:8',
            "address" => 'required|min:10',
            "gender" => 'required',
            "date_of_birth" => 'required'
        ];

        $request->validate($rules);

        if($request->confPassword != $request->password){
            return redirect()->back()->withErrors('Password not match');
        }
        
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->role = 'user';

        $user->save();
        return redirect('/login');
    }
}
