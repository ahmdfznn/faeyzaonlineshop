<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index($slug)
    {
        $products = Product::where('slug', $slug)->first();
        $comment = Comment::where('id_product', $products->id)->get();

        return view('pages.products', [
            'title' => $products->slug,
            'product' => $products,
            'variants' => Variant::where('id_product', $products->id)->get(),
            'comments' => $comment,
            'payments' => Payment::all()
        ]);
    }

    public function store(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $order = Order::where('id_product', $request->id)->first();
        $product = Product::where('id', $request->id)->first();

        if ($product->stock > 0) {
            if ($user->address) {
                if (empty($order)) {
                    Order::create([
                        'id_user' => auth()->user()->id,
                        'customers' => $user->username,
                        'id_product' => $request->id,
                        'product_name' => $request->name,
                        'variant' => $request->variant,
                        'price' => $request->harga,
                        'qty' => $request->qty,
                        'total_price' => $request->total,
                        'payment_method' => $request->payment
                    ]);
                } else {
                    $order->qty = $order->qty + $request->qty;
                    $order->total_price = 'Rp.' . ((int)Str::after($order->total_price, 'Rp.') + (int)Str::after($request->total, 'Rp.'));
                    $order->update();
                }

                $product->stock = $product->stock - $request->qty;
                $product->update();

                return redirect('/myorder')->with('buy', 'Berhasil');
            }

            return redirect('/dashboardUser/profile');
        }
    }

    public function cancel($id)
    {
        Order::destroy($id);

        return redirect('/myorder')->with('cancel', 'order successfully cancelled');
    }
}
