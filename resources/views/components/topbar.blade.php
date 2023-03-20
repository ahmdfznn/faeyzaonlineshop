<nav class="w-screen h-[50px] bg-slate-900/70 backdrop-blur-lg fixed flex items-center justify-between px-10 z-50">
    <div class="flex justify-between w-[30vw]">
        <a @if (Request::is('product')) href="/" @else (Request::is('/product/*')) href="/product" @endif>
            <img src="/icon/back.png" alt="back" class="w-8">
        </a>
        @if (Request::is('product'))
            <h1 class="text-white text-2xl font-bold">Product</h1>
        @endif
    </div>
</nav>
