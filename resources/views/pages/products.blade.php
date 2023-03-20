<x-product>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="w-full bg-green rounded-lg p-5 mb-10 text-black text-center flex flex-col items-baseline">
        <div class="flex border-b border-blue-600 pb-10 pt-8">
            <div class="flex justify-between w-full">
                <form action="{{ route('order') }}" method="post" class="w-[90vw] mt-20 flex justify-between">
                    @csrf
                    <div class="flex flex-col items-start">
                        <x-input-product type="text" name="name" id="name" value="{{ $product->product_name }}"
                            readonly class="text-5xl absolute top-28" />
                        <div class="w-[500px] h-[500px] flex justify-center items-center overflow-hidden">
                            <img src="@if ($product->image) {{ asset('storage/' . $product->image) }}
                            @else /icon/user.png @endif"
                                alt="" class="w-[500px] mr-5 rounded-xl">
                        </div>
                        <div class="text-left text-white">
                            <h1 class="text-2xl my-3">Description</h1>
                            <p class="text-lg">{{ $product->description }}</p>
                        </div>
                    </div>
                    <x-input-product type="hidden" name="id" id="id" value="{{ $product->id }}"
                        readonly />
                    <div class="flex flex-col h-5/6 w-full justify-evenly ml-10">
                        <div class="flex justify-between items-center w-full">
                            <h1 class="text-2xl text-white" for="harga">Price</h1>
                            <x-input-product class="text-2xl" type="text" name="harga" id="harga"
                                value="" readonly />
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <h1 class="text-2xl text-white" for="harga">Variant</h1>
                            <select
                                class="bg-slate-900 text-white focus:outline-none focus:border-none shadow-sm cursor-pointer select-none text-left w-[45%] text-xl rounded-lg"
                                name="variant">
                                @foreach ($variants as $variant)
                                    <option value="{{ $variant->variant }}">{{ $variant->variant }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <h1 class="text-2xl text-white">Qty</h1>
                            <input type="number" name="qty" id="qty" min="1"
                                max="{{ $product->stock }}" value="0" required
                                class="bg-transparent text-gray-300 text-2xl focus:outline-none focus:border-none shadow-sm cursor-pointer select-none text-left w-[250px]"
                                autofocus />
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <h1 class="text-2xl text-white">Discount</h1>
                            <x-input-product class="text-2xl" type="text" id="diskon" name="diskon"
                                value="" readonly />
                        </div>
                        @if ($product->discount > 0 && $product->min_purchase > 0)
                            <p class="text-white ml-80">Minimum purchase {{ $product->min_purchase }} pcs</p>
                        @endif
                        <div class="flex justify-between items-center w-full">
                            <h1 class="text-2xl text-white">{{ __('Total Price') }}</h1>
                            <x-input-product class="text-2xl" type="text" name="total" id="total"
                                value="IDR.0" readonly />
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <h1 class="text-2xl text-white" for="harga">Payment Method</h1>
                            <select
                                class="bg-slate-900 text-white focus:outline-none focus:border-none shadow-sm cursor-pointer select-none text-left w-[45%] text-xl rounded-lg"
                                name="payment" required>
                                @foreach ($payments as $payment)
                                    <option value="{{ $payment->payment_method }}">{{ $payment->payment_method }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @if (!empty(auth()->user()->address))
                            <div class="flex flex-col justify-between items-start w-full">
                                <h1 class="text-2xl text-white" for="address">Address</h1>
                                <textarea
                                    class="resize-none
                    w-full h-[20vh] bg-gray-900 border-2 border-indigo-700 focus:border-none text-gray-300 focus:outline-indigo-600 focus:ring-indigo-600 rounded-md shadow-sm p-3 my-3"
                                    name="address" id="address" required>{{ auth()->user()->address }}</textarea>
                            </div>
                        @endif
                        <x-button-submit class="w-1/2 m-auto">{{ __('Check Out') }}</x-button-submit>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full text-left mt-10 pl-10">
            <form action="/sendcomment/{{ $product->id }}" method="post">
                @csrf
                <x-label class="text-3xl" value="{{ __('Comment') }}" />
                <textarea
                    class="resize-none
                    w-full h-[20vh] bg-gray-900 border-2 border-indigo-700 focus:border-none text-gray-300 focus:outline-indigo-600 focus:ring-indigo-600 rounded-md shadow-sm p-3 my-3"
                    name="comment" id="comment" placeholder="please fill in your best comment" required></textarea>
                <x-button-submit class="w-32">{{ _('Send') }}</x-button-submit>
            </form>
            <h1 class="text-white text-2xl mb-5">{{ $comments->count() }} Comment</h1>
            @foreach ($comments as $comment)
                <div class="flex justify-between text-white border-b border-blue-600 my-5">
                    <div class="flex">
                        <div class="w-10 h-10 rounded-full overflow-hidden mr-3">
                            <img src="@if ($comment->profile_picture) {{ asset('storage/' . $comment->profile_picture) }}
                            @else '/icon/user.png' @endif"
                                alt="">
                        </div>
                        <div class="ml-2">
                            <h1 class="text-left">{{ $comment->name }}</h1>
                            <p class="mb-3">{{ $comment->created_at->diffForHumans() }}</p>
                            <form action="/comment/{{ $product->id }}/edit" method="post">
                                @method('put')
                                @csrf
                                <textarea
                                    class="text-xl resize-none w-full h-[10vh] bg-slate-900 text-gray-300 border-indigo-600 ring-indigo-600 rounded-md shadow-sm p-2"
                                    name="comments" id="comments" disabled autofocus="off">{{ $comment->comment }}</textarea>
                                <x-button-submit class="hidden" id="button-edit">{{ _('Save Changes') }}
                                </x-button-submit>
                            </form>
                        </div>
                    </div>
                    <div class="flex justify-between w-20">
                        @if (auth()->user()->id == $comment->id_user)
                            <label for="comments">
                                <img src="/icon/edit.png" alt="edit comment" class="w-8 h-8" id="edit">
                            </label>
                            <form action="/deletecomment/{{ $comment->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit"><img src="/icon/delete.png" alt="edit comment"
                                        class="w-8 h-8"></button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        $(window).on('keyup', function(e) {
            var date = new Date()
            if (e.keyCode == 13) {
                alert(date.getMonth())
            }
        })

        $('#edit').on('click', function() {
            $('#comments').attr('disabled', false);
            $('#button-edit').css('display', 'block')
        })


        var price = {{ $product->price }}
        var discount = {{ $product->discount }}
        $('#harga').val('IDR.{{ $product->price }}')
        $('#diskon').val('{{ $product->discount }}' * 100 + '%')

        $('#qty').on('keyup', function() {
            if ($('#qty').val() <= {{ $product->min_purchase }}) {
                $total = 'IDR.' + price * $('#qty').val()
                $('#total').val($total)
            }
            if ($('#qty').val() >= {{ $product->min_purchase }}) {
                $total = 'IDR.' + price * $('#qty').val() * (1 - discount)
                $('#total').val($total)
            }
        })
        $('#qty').on('change', function() {
            if ($('#qty').val() <= {{ $product->min_purchase }}) {
                $total = 'IDR.' + price * $('#qty').val()
                $('#total').val($total)
            }
            if ($('#qty').val() >= {{ $product->min_purchase }}) {
                $total = 'IDR.' + price * $('#qty').val() * (1 - discount)
                $('#total').val($total)
            }
        })
    </script>
</x-product>
