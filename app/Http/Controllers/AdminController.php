<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Order;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function orders(Order $order)
    {
        return view('admin.orders', [
            'title' => 'Orders',
            'orders' => Order::all()
        ]);
    }

    public function transaction()
    {
        return view('admin.transaction', [
            'title' => 'Transaction',
            'transactions' => Transaction::all()
        ]);
    }

    public function confirm(Order $order)
    {
        $user = User::where('id', $order->id_user)->first();
        $order->confirmed = true;
        $order->update();

        Transaction::create([
            'id_customers' => $order->id_user,
            'customer_name' => $order->customers,
            'product_name' => $order->product_name,
            'total_product' => $order->qty,
            'total_pay' => $order->total_price,
            'address' => $user->address
        ]);

        $order->delete();

        return redirect('/dashboard/transaction');
    }

    public function viewMessage()
    {
        return view('admin.message', [
            'title' => 'message',
            'messages' => Message::all()
        ]);
    }

    public function message(Request $request)
    {
        Message::create(
            [
                'id_user' => auth()->user()->id,
                'profile_picture' => auth()->user()->profile_picture,
                'name' => auth()->user()->username,
                'message' => $request->message
            ]
        );

        return redirect('/');
    }

    public function destroymessage($id)
    {
        Message::destroy($id);

        return redirect('/dashboard/message');
    }

    public function paid($id)
    {
        Transaction::where('id', $id)->update([
            'payment_status' => true
        ]);

        // $paid->payment_status = true;
        // $paid->update();

        return redirect('/dashboard/transaction');
    }
}
