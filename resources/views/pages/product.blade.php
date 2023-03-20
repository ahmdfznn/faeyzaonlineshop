<x-product>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="w-full bg-slate-900 rounded-lg p-10 mb-10 text-white text-center grid grid-cols-3 gap-5">
        @foreach ($products as $product)
            <div class="bg-slate-800 flex flex-col justify-between w-[350px] rounded-lg overflow-hidden">
                <div>
                    <div
                        class="w-full relative h-[300px] overflow-hidden flex justify-center items-center border-2 border-slate-500">
                        <img src="@if ($product->image) {{ asset('storage/' . $product->image) }}
                        @else /icon/user.png @endif" alt=""
                            class="hover:scale-110 transition-1s product-image">
                    </div>
                    <div class="flex flex-col items-start pl-5 py-3">
                        <a href="/product/{{ $product->slug }}"
                            class="block text-3xl pt-3 itim">{{ $product->product_name }}</a>
                        <h1 class="text-md">IDR.{{ $product->price }}</h1>
                        <p class="text-left mt-5">{{ $product->description }}</p>
                    </div>
                </div>
                <a href="/product/{{ $product->slug }}">
                    <x-button-primary class="w-[90%] mb-5">{{ __('Buy') }}</x-button-primary>
                </a>
            </div>
        @endforeach
    </div>
</x-product>

<script>
    // Flash Data

    @if (session()->has('buy'))
        Swal.fire(
            'Check out was successful',
            'Thank you for buying in our shop',
            'success'
        )
    @endif
</script>
