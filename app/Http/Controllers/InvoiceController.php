<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class InvoiceController extends Controller
{
    public function show($id)
    {
        $trx = Transaction::with('product', 'user')->findOrFail($id);
        return view('invoice', compact('trx'));
    }
}

