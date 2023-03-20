<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot>
    <form action="/manageProduct" method="post" enctype="multipart/form-data">
        @csrf
        <x-label for="image">Image</x-label>
        <div class="w-96 overflow-hidden flex justify-center items-center">
            <img src="" alt="" class="img-preview w-96">
        </div>
        <x-input-text type="file" name="image" id="image" multiple autofocus accept=".jpg, .jpeg, .png" /><br>
        @error('image')
            <p>{{ $message }}</p><br>
        @enderror
        <x-label for="name">Product Name</x-label>
        <x-input-text type="text" name="name" id="name" /><br>
        @error('name')
            <p>{{ $message }}</p><br>
        @enderror
        <x-label for="harga">Price</x-label>
        <x-input-text type="text" name="harga" id="harga" /><br>
        @error('harga')
            <p>{{ $message }}</p><br>
        @enderror
        <x-label for="stock">Stock</x-label>
        <x-input-text type="text" name="stock" id="stock" /><br>
        @error('stock')
            <p>{{ $message }}</p><br>
        @enderror
        <x-label for="diskon">Discount</x-label>
        <x-input-text type="text" name="diskon" id="diskon" /><br>
        @error('diskon')
            <p>{{ $message }}</p><br>
        @enderror
        <x-label for="min">Minimum purchase</x-label>
        <x-input-text type="text" name="min" id="min" /><br>
        @error('min')
            <p>{{ $message }}</p><br>
        @enderror
        <x-label for="deskripsi">Description</x-label>
        <textarea
            class="input resize-none w-full h-[20vh] bg-gray-900 text-gray-300 focus:border-indigo-600 focus:ring-indigo-600 rounded-md shadow-sm "
            name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}"></textarea><br>
        @error('deskripsi')
            <p>{{ $message }}</p><br>
        @enderror
        <x-button-submit>{{ __('Send') }}</x-button-submit>
    </form>

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
