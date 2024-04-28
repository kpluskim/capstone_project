<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function Transaction_get(){

        $transactions = Transaction::with('user')->get();
        return $transactions->toJson(JSON_PRETTY_PRINT);
    }
}
