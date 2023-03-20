<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot>
        <form action="/manageProduct/{{ $product->slug }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <x-label for="image">Image</x-label>
            <div class="w-96 h-96 overflow-hidden flex justify-center items-center">
                <img src="@if ($product->image) {{ asset('storage/' . $product->image) }} @endif"
                    alt="" class="w-96 img-preview">
            </div>
            <x-input-text type="file" name="image" id="image" autofocus /><br>
            @error('image')
                <p>{{ $message }}</p><br>
            @enderror
            <x-label for="name">Product Name</x-label>
            <x-input-text type="text" name="name" id="name" value="{{ $product->product_name }}" /><br>
            <x-input-text type="hidden" name="slug" id="slug" value="{{ $product->slug }}" />
            @error('name')
                <p>{{ $message }}</p><br>
            @enderror
            <x-label for="harga">Price</x-label>
            <x-input-text type="text" name="harga" id="harga" value="{{ $product->price }}" /><br>
            @error('harga')
                <p>{{ $message }}</p><br>
            @enderror
            <x-label for="stock">Stock</x-label>
            <x-input-text type="text" name="stock" id="stock" value="{{ $product->stock }}" /><br>
            @error('stock')
                <p>{{ $message }}</p><br>
            @enderror
            <x-label for="diskon">Discount</x-label>
            <x-input-text type="text" name="diskon" id="diskon" value="{{ $product->discount }}" /><br>
            @error('diskon')
                <p>{{ $message }}</p><br>
            @enderror
            <x-label for="min">Minimum purchase</x-label>
            <x-input-text type="text" name="min" id="min" value="{{ $product->min_purchase }}" /><br>
            @error('min')
                <p>{{ $message }}</p><br>
            @enderror
            <x-label for="deskripsi">Description</x-label>
            <textarea
                class="p-2 mt-3 mb-5 resize-none w-full h-[20vh] bg-gray-900 border-2 border-indigo-700 focus:border-none text-gray-300 focus:outline-indigo-600 focus:ring-indigo-600 rounded-md shadow-sm"
                name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}">{{ $product->description }}</textarea><br>
            @error('deskripsi')
                <p>{{ $message }}</p><br>
            @enderror
            <x-button-submit>{{ __('Update') }}</x-button-submit>

            <script>
                const img = document.querySelector('#image')
                $('#image').change(function(e) {

                    const reader = new FileReader()
                    reader.readAsDataURL(img.files[0])

                    $(reader).on('load', function(e) {
                        $('.img-preview').attr('src', e.target.result)
                    })
                })
            </script>
</x-dashboard>
