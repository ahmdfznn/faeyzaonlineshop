<nav class="w-screen h-[50px] fixed flex items-center bg-purple-900 z-10 pl-52">
    <div class="flex">
        <a href="/">
            <img src="/icon/back.png" alt="back" class="w-8 ml-">
        </a>
    </div>
</nav>
<div class='w-[15vw] h-screen fixed bg-slate-900 left-0 flex flex-col items-center z-10' id='sidebar'>
    <h1 class="text-white text-2xl my-3 font-semibold">Dashboard</h1>
    <div class="w-full flex items-center justify-evenly mt-5">
        <div class="flex justify-center items-center w-16 h-16 rounded-full overflow-hidden border border-indigo-600">
            <img src="@if (auth()->user()->profile_picture) {{ asset('storage/' . auth()->user()->profile_picture) }}
        @else /icon/user.png @endif"
                alt="" class="w-full">
        </div>
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-white text-lg">Admin</h1>
            <span class="text-green-600">online</span>
        </div>
    </div>
    <ul class="mt-10 text-white list-none text-center">
        <a href="/" class="block py-5 px-16 hover:bg-slate-800">
            <li>Home</li>
        </a>
        <a href="/manageProduct"
            class="block py-5 px-16 hover:bg-slate-800 {{ Request::is('manageProduct*') ? 'bg-slate-800' : '' }}">
            <li>Products</li>
        </a>
        <a href="/dashboard/orders"
            class="block py-5 px-16 hover:bg-slate-800 {{ Request::is('dashboard/orders') ? 'bg-slate-800' : '' }}">
            <li>Orders</li>
        </a>
        <a href="/dashboard/transaction"
            class="block py-5 px-16 hover:bg-slate-800 {{ Request::is('dashboard/transaction') ? 'bg-slate-800' : '' }}">
            <li>Transaction</li>
        </a>
        <a href="/dashboard/message"
            class="block py-5 px-16 hover:bg-slate-800 {{ Request::is('dashboard/message') ? 'bg-slate-800' : '' }}">
            <li>Message</li>
        </a>
    </ul>
</div>
