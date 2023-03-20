<x-user>
    <x-slot:title>{{ $title }}</x-slot>
        <div class="w-[80vw] bg-slate-900 flex flex-col p-5">
            @if ($orders->count())
                <h1 class="text-white text-2xl mb-5 font-semibold">My Order</h1>
                <a href="/product">
                    <x-button-primary>{{ __('Buy Again') }}</x-button-primary>
                </a>
                <h1 class="text-white text-2xl">{{ $orders->count() }} Order</h1>
                <table cellpadding="10" class="rounded-lg">
                    <thead>
                        <tr>
                            <td class="border-2 border-slate-300 text-center">No.</td>
                            <td class="border-2 border-slate-300 text-center">Id Product</td>
                            <td class="border-2 border-slate-300 text-center">Product Name</td>
                            <td class="border-2 border-slate-300 text-center">Variant</td>
                            <td class="border-2 border-slate-300 text-center">Price</td>
                            <td class="border-2 border-slate-300 text-center">Qty</td>
                            <td class="border-2 border-slate-300 text-center">Total Price</td>
                            <td class="border-2 border-slate-300 text-center">Confirmed</td>
                            <td class="border-2 border-slate-300 text-center">Date Order</td>
                            <td class="border-2 border-slate-300 text-center">Payment Method</td>
                            <td class="border-2 border-slate-300 text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($orders as $order)
                            <tr>
                                <td class="border border-slate-300 text-center">{{ $i++ }}</td>
                                <td class="border border-slate-300 text-center">{{ $order->id_product }}</td>
                                <td class="border border-slate-300 text-center">{{ $order->product_name }}</td>
                                @if (!empty($order->variant))
                                    <td class="border border-slate-300 text-center">{{ $order->variant }}</td>
                                @else
                                    <td class="border border-slate-300 text-center">No Choice</td>
                                @endif
                                <td class="border border-slate-300 text-center">{{ $order->price }}</td>
                                <td class="border border-slate-300 text-center">{{ $order->qty }}</td>
                                <td class="border border-slate-300 text-center">{{ $order->total_price }}</td>
                                <td class="border border-slate-300 text-center">
                                    @if ($order->confirmed == true)
                                        order confirmed
                                    @else
                                        order not confirmed
                                    @endif
                                </td>
                                <td class="border  border-slate-300 text-center">{{ $order->payment_method }}</td>
                                <td class="border  border-slate-300 text-center">{{ $order->order_date }}</td>
                                <td class="border border-slate-300 text-center flex justify-between">
                                    <form action="/order/cancel/{{ $order->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <x-button-action class="bg-red-500" onclick="return confirm('Are you sure?')">
                                            {{ __('Cancel') }}</x-button-action>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="flex flex-col items-center">
                    <h1 class="text-white text-2xl text-center">
                        You have not ordered any products<br>Please order our product before it runs out of stock</h1>
                    <a href="/product">
                        <x-button-primary>{{ __('Order Products') }}</x-button-primary>
                    </a>
                </div>
            @endif
        </div>
</x-user>
