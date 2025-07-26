<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function create()
    {
        $products = Product::all();
        return view('transaction.form', compact('products'));
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $trx = Transaction::create([
            'user_id'    => Auth::id(),
            'product_id' => $product->id,
            'game_id'    => $request->game_id,
            'nickname'   => $request->nickname,
            'total_price'=> $product->price,
        ]);

        return redirect()->route('invoice.show', ['id' => $trx->id]);
    }


}

