<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function Transaction_get(){

        $transactions = Transaction::with('user')->get();
        return $transactions->toJson(JSON_PRETTY_PRINT);
    }
    public function transaction_create(Request $request){

        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json([
                'message'=> 'User is not found.',
                'code' => 404
            ]);
        }

        $transaction = new Transaction();
        $transaction->status = $request->status;
        $transaction->fee = $request->fee;
        $transaction->payment_method = $request->payment_method;
        $transaction->user_id = $request->user_id;
        $transaction->save();

        return response()->json(['success' => $request->id]);
        
    }
    public function transaction_update(Request $request){
        $transaction = Transaction::find($request->id);  //upon updating if id not found cannot update
        if (!$transaction) {
            return response()->json([
                'message'=> 'Transaction not found',
                'code' => 404               //htttp status codes
            ]);
        }

        $transaction->status = $request->status;
        $transaction->fee = $request->fee;
        $transaction->payment_method = $request->payment_method;
        $transaction->user_id = $request->user_id;
        $transaction->save();

        return response()->json(['success' => $request->id]);
    }
}
