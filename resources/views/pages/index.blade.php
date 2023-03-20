<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <div class="fixed h-screen right-0 bg-slate-600 overflow-hidden flex justify-end z-50" id="menu">
            <div class="absolute w-[20vw] h-screen bg-slate-900 flex justify-end p-10">
                <div class="h-[25px] flex flex-col justify-between toggles">
                    <span class="toggle"></span>
                    <span class="toggle"></span>
                    <span class="toggle"></span>
                </div>
            </div>
        </div>
        <div id="main" class="w-screen h-screen flex flex-col justify-center items-start">
            <div class="flex flex-col justify-center items-start mt-10 ml-10" id="submain">
                @if (auth()->check())
                    <h1 class="text-slate-300 text-7xl font-bold leading-[70px] itim text-shadow">Welcome come
                        back<br>{{ auth()->user()->username }} to<br>Faeyza
                        shop</h1>
                @elseif (auth()->guard())
                    <h1 class="text-slate-300 text-7xl font-bold leading-[70px] itim text-shadow">Welcome come
                        to<br>Faeyza
                        shop</h1>
                @endif
                <a href="{{ route('product') }}"
                    class="w-[300px] h-[70px] flex justify-center items-center rounded-lg border-gray-100 border-2 text-white text-2xl font-semibold my-10 hover:bg-slate-800/30"
                    id="startShop">Start
                    Shopping</a>
            </div>
        </div>
        <div id="product" class="w-screen h-screen flex justify-center items-center">
            <div class="background w-[80vw] h-[80vh] rounded-lg overflow-hidden -translate-x-[100vw]"
                id="backgroud-iklan">
                <img src="/img/iklan.jpg" alt="backgroud-iklan" class="w-[80vw] h-[80vh]">
            </div>
        </div>
        <div class="w-screen h-screen flex justify-center" id="services">
            <div class="w-[90vw] h-[90vh] mt-24 flex items-center flex-col absolute">
                <h1 class="text-white font-semibold text-3xl -translate-y-[10vh] opacity-0" id="h1contact">Give us a
                    message
                </h1>
                <hr class="w-[25vw] my-2 translate-x-[30vw] opacity-0" id="hr" />
                <form action="/message" method="POST" class="w-[30vw]">
                    @csrf
                    <x-label class="label mt-3 mb-2 -translate-x-[20vw] opacity-0" for="nama" :value="__('Your name')" />
                    <x-input-text class="input w-full translate-x-[30vw] opacity-0" type="text" id="nama"
                        name="nama" placeholder="Enter your name" autocomplete="off" required
                        value="{{ old('nama') }}" />
                    <x-input-error :messages="$errors->get('nama')" />
                    <x-label class="label mt-3 mb-2 -translate-x-[20vw] opacity-0" for="pesan" :value="__('Message')" />
                    <textarea
                        class="p-2 mt-3 mb-5 input resize-none w-full h-[20vh] bg-gray-900 border-2 border-indigo-700 focus:border-none text-gray-300 focus:outline-indigo-600 focus:ring-indigo-600 rounded-md shadow-sm translate-x-[30vw] opacity-0"
                        name="message" id="message" placeholder="Enter your message" value="{{ old('message') }}"></textarea>
                    <x-button-submit class="mt-3 translate-y-[10vh] opacity-0" id="kirimpesan">
                        {{ __('Send Message') }}
                    </x-button-submit>
                </form>
            </div>
        </div>
</x-main>


<script>
    @if (session()->has('profile-deleted'))
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    @endif
</script>
