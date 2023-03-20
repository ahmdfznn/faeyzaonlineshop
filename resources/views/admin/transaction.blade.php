<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot>
    @if ($transactions->count())
        <table cellpadding="10" class="rounded-lg">
            <thead>
                <tr>
                    <td class="border-2 border-slate-300 text-center">No.</td>
                    <td class="border-2 border-slate-300 text-center">Id Transaction</td>
                    <td class="border-2 border-slate-300 text-center">Product Name</td>
                    <td class="border-2 border-slate-300 text-center">Total Product</td>
                    <td class="border-2 border-slate-300 text-center">Total Pay</td>
                    <td class="border-2 border-slate-300 text-center">Payment Status</td>
                    <td class="border-2 border-slate-300 text-center">Address</td>
                    <td class="border-2 border-slate-300 text-center">Date Transaction</td>
                    <td class="border-2 border-slate-300 text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($transactions as $transaction)
                    <tr>
                        <td class="border border-slate-300 text-center">{{ $i++ }}</td>
                        <td class="border border-slate-300 text-center">{{ $transaction->id }}</td>
                        <td class="border border-slate-300 text-center">{{ $transaction->product_name }}</td>
                        <td class="border border-slate-300 text-center">{{ $transaction->total_product }}</td>
                        <td class="border border-slate-300 text-center">{{ $transaction->total_pay }}</td>
                        <td class="border border-slate-300 text-center">
                            @if ($transaction->payment_status)
                                Already paid
                            @else
                                Not yet paid
                            @endif
                        </td>
                        <td class="border  border-slate-300 text-center">{{ $transaction->address }}</td>
                        <td class="border  border-slate-300 text-center">{{ $transaction->date }}</td>
                        <td class="border border-slate-300 text-center flex justify-between">
                            @if ($transaction->payment_status == false)
                                <form action="/transaction/paid/{{ $transaction->id }}" method="post">
                                    @csrf
                                    <x-button-action>
                                        {{ __('Already paid') }}</x-button-action>
                                </form>
                            @endif
                            <form action="/transaction/delete/{{ $transaction->id }}" method="post">
                                @method('delete')
                                @csrf
                                <x-button-action class="bg-red-500" onclick="return confirm('Are you sure?')">
                                    {{ __('Delete') }}</x-button-action>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-white text-3xl text-center">There is no recent transaction data at this time</h1>
    @endif
</x-dashboard>
