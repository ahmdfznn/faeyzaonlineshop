<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Transaction;

class DashboardUserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function order()
    {
        return view('user.myOrder', [
            'title' => 'My Order',
            'orders' => Order::where('id_user', auth()->user()->id)->get()
        ]);
    }

    public function transaction()
    {
        return view('user.transaction', [
            'title' => 'My Transaction',
            'transactions' => Transaction::where('id_customers', auth()->user()->id)->get()
        ]);
    }
}
