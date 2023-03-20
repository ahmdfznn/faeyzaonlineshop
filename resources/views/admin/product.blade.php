<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot>
        <a href="/manageProduct/create">
            <x-button-primary>Add Product</x-button-primary>
        </a>
        <table cellpadding="10" class="rounded-lg">
            <thead>
                <tr>
                    <td class="border-2 border-slate-500">No.</td>
                    <td class="border-2 border-slate-500">Image</td>
                    <td class="border-2 border-slate-500">Product Name</td>
                    <td class="border-2 border-slate-500">Variant</td>
                    <td class="border-2 border-slate-500">Price</td>
                    <td class="border-2 border-slate-500">Stock</td>
                    <td class="border-2 border-slate-500">Discount</td>
                    <td class="border-2 border-slate-500">Minimum Purchase</td>
                    <td class="border-2 border-slate-500">Description</td>
                    <td class="border-2 border-slate-500">Updated at</td>
                    <td class="border-2 border-slate-500">Action</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($products as $product)
                    <tr>
                        <td class="border border-slate-500">{{ $i++ }}</td>
                        <td class="border border-slate-500">
                            <div class="w-[50px] h-[50px] overflow-hidden"><img
                                    src="@if ($product->image) {{ asset('storage/' . $product->image) }}
                            @else /icon/user.png @endif"
                                    alt="">
                            </div>
                        </td>
                        <td class="border border-slate-500">{{ $product->product_name }}</td>
                        <td class="border border-slate-500">

                        </td>
                        <td class="border border-slate-500">Rp.{{ $product->price }}</td>
                        <td class="border border-slate-500">{{ $product->stock }}</td>
                        <td class="border border-slate-500">{{ $product->discount * 100 . '%' }}</td>
                        <td class="border border-slate-500">{{ $product->min_purchase }}</td>
                        <td class="border border-slate-500">{{ $product->description }}</td>
                        <td class="border border-slate-500">{{ $product->updated_at->diffForHumans() }}</td>
                        <td class="border border-slate-500">
                            <a href="/manageProduct/{{ $product->slug }}/edit">
                                <x-button-action>{{ __('Edit') }}</x-button-action>
                            </a>
                            <form action="/manageProduct/{{ $product->id }}" method="post">
                                @method('delete')
                                @csrf
                                <x-button-action class="bg-red-700"
                                    onclick="return confirm('Are you sure to delete this product?')">
                                    {{ __('Delete') }}
                                </x-button-action>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</x-dashboard>
