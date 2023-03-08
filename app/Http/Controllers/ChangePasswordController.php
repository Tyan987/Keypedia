<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        $category = Categories::all();
        return view('changePassword', ['categories' => $category]);
    }
    
    public function changePassword(Request $request)
    {
        $rules = [
            "password" => 'required',
            "newPassword" => 'required|min:8',
            "confirmPass" => 'required'
        ];

        $request->validate($rules);

        $id = Auth::user()->id;
        $users = User::find($id);

        if(Hash::check($request->password, $users->password)){
            if($request->newPassword == $request->confirmPass){
                $users->password = Hash::make($request->newPassword);
                $users->save();
                Auth::logout();
                return redirect('/login');
            }
            return redirect()->back()->withErrors('New Password Not Match');
        }

        return redirect()->back()->withErrors('Wrong Old Password');
    }
}
