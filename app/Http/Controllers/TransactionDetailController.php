<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transactions;
use App\Models\transactionDetails;
use App\Models\categories;

class TransactionDetailController extends Controller
{
    public function showHistoryDetail($id)
    {
        $categories = Categories::all();
        $transactionDet = transactionDetails::where('transaction_id', $id)->get();
        $transactionsDate = transactions::where('id', $id)->first();
        return view('Transaction.transactionHistoryDetail', compact('categories', 'transactionDet', 'transactionsDate'));
    }
}
