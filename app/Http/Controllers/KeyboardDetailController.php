<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keyboards;
use App\Models\categories;
use App\Models\carts;
use Illuminate\Support\Facades\Auth;
use App\Models\cartDetails;


class KeyboardDetailController extends Controller
{
    public function viewKeyboardDetail($id)
    {
        $category = Categories::all();
        $keyboard = Keyboards::where('id', $id)->first();
        return view('Keyboard.keyboardDetail', ['keyboard' => $keyboard], ['categories' => $category]);
    }

    public function addToCart(Request $request, $id)
    {
        $rules = [
            "quantity" => 'required|numeric'
        ];

        if(Auth::check()){
            $request->validate($rules);
            $user_id = Auth::user()->id;
            $cart = Carts::all()->where('user_id', $user_id)->first();

            if($cart == null){
                $cart = new Carts;
                $cart->user_id = $user_id;
                $cart->save();
            }

            $cartsDet = new CartDetails;
            $cartsDet->cart_id = $cart->id;
            $cartsDet->keyboard_id = $id;
            $cartsDet->quantity = $request->quantity;

            $cartsDet->save();

            return redirect('/');
        }

        return redirect('/login');
    }
}
