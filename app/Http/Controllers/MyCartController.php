<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transactions;
use App\Models\transactionDetails;
use App\Models\carts;
use App\Models\categories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\cartDetails;
use App\Models\keyboards;
use Carbon\Carbon;

class MyCartController extends Controller
{
    public function showCart($id)
    {
        $category = Categories::all();
        $carts = Carts::all()->where('user_id', $id)->first();

        if($carts == null){
            return redirect('/');
        }

        $cartDetails = CartDetails::where('cart_id', $carts->id)->get();
        return view('myCart', ['cartDetails' => $cartDetails], ['categories' => $category]);
    }

    public function updateCart(Request $request, $id){
        $cartDet = CartDetails::where('id', $id)->first();

        if($request->quantity == 0){
            $cartDet->delete();
            return redirect()->back();
        }

        $cartDet->cart_id = $cartDet->cart_id;
        $cartDet->keyboard_id = $cartDet->keyboard_id;
        $cartDet->quantity = $request->quantity != null ? $request->quantity: $cartDet->quantity;

        $cartDet->update();
        return redirect()->back();
    }

    public function addTransaction($cartId)
    {
        $user_id = Auth::user()->id;

        $cart = Carts::where('id', $cartId)->first();
        $cartDet = CartDetails::where('cart_id', $cartId)->get();

        if($cartDet != null){
            $transactions = new Transactions;
            $transactions->user_id = $user_id;
            $transactions->date = Carbon::now()->timezone('Asia/Jakarta');

            $transactions->save();

            foreach($cartDet as $cartDets){
                $transactionDetails = new TransactionDetails;
                $transactionDetails->transaction_id = $transactions->id;
                $transactionDetails->keyboard_id = $cartDets->keyboard_id;
                $transactionDetails->quantity = $cartDets->quantity;

                $transactionDetails->save();

            }

            $cart->delete();
            $cartDet->each->delete();
            
            return redirect('/');
        }

        return redirect('/');
    }
}
