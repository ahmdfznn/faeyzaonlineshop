<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot>
    @if ($orders->count())
        <h1 class="text-2xl mb-5">{{ $orders->count() }} Orders</h1>
        <table cellpadding="10" class="rounded-lg">
            <thead>
                <tr>
                    <td class="border-2 border-slate-300 text-center">No.</td>
                    <td class="border-2 border-slate-300 text-center">Id User</td>
                    <td class="border-2 border-slate-300 text-center">Customers</td>
                    <td class="border-2 border-slate-300 text-center">Id Product</td>
                    <td class="border-2 border-slate-300 text-center">Product Name</td>
                    <td class="border-2 border-slate-300 text-center">Price</td>
                    <td class="border-2 border-slate-300 text-center">Qty</td>
                    <td class="border-2 border-slate-300 text-center">Total Price</td>
                    <td class="border-2 border-slate-300 text-center">Confirmed</td>
                    <td class="border-2 border-slate-300 text-center">Payment Method</td>
                    <td class="border-2 border-slate-300 text-center">Date Order</td>
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
                        <td class="border border-slate-300 text-center">{{ $order->id_user }}</td>
                        <td class="border border-slate-300 text-center">{{ $order->customers }}</td>
                        <td class="border border-slate-300 text-center">{{ $order->id_product }}</td>
                        <td class="border border-slate-300 text-center">{{ $order->product_name }}</td>
                        <td class="border border-slate-300 text-center">{{ $order->price }}</td>
                        <td class="border border-slate-300 text-center">{{ $order->qty }}</td>
                        <td class="border border-slate-300 text-center">{{ $order->total_price }}</td>
                        <td class="border border-slate-300 text-center">{{ $order->confirmed }}</td>
                        <td class="border  border-slate-300 text-center">{{ $order->payment_method }}</td>
                        <td class="border border-slate-300 text-center">{{ $order->order_date }}</td>
                        <td class="border border-slate-300 text-center flex justify-between">
                            @if ($order->confirmed == false)
                                <form action="/dashboard/orders/confirm/{{ $order->id }}" method="POST">
                                    @csrf
                                    <x-button-action>{{ __('Confirm') }}</x-button-action>
                                </form>
                            @endif
                            <x-button-action class="bg-red-500">{{ __('Delete') }}</x-button-action>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-white text-3xl text-center">There are no orders at this time</h1>
    @endif
</x-dashboard>
