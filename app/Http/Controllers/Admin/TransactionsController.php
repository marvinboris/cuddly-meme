<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;

class TransactionsController extends Controller
{
    public function transactions()
    {
        $transactions = Transaction::all();
        return view('admin.transactions.index', compact('transactions'));
    }
}
