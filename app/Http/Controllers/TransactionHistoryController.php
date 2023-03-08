<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transactions;
use App\Models\categories;

class TransactionHistoryController extends Controller
{
    public function showHistory($id)
    {
        $category = Categories::all();
        $transactions = transactions::where('user_id', $id)->get();
        return view('Transaction.transactionHistory', ['transaction' => $transactions], ['categories' => $category]);
    }
}
