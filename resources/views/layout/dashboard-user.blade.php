<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="/js/jquery.js"></script>
    <style>
        * {
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 17px;
        }

        ::-webkit-scrollbar-track {
            background: rgb(80, 80, 80);
        }

        ::-webkit-scrollbar-thumb {
            background: rgb(120, 120, 120);
            border-radius: 20px;
            border: 3px solid blue;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgb(100, 100, 100);
        }

        .judul {
            font-family: 'Righteous', cursive;
        }

        .itim {
            font-family: 'Itim', cursive;
        }
    </style>
</head>

<body class="antialiased bg-slate-800">
    <nav class="w-screen h-[50px] fixed flex items-center bg-purple-900 z-10 pl-60">
        <h1 class="text-white itim text-xl">Welcome Back @if (!auth()->user()->name)
                {{ auth()->user()->username }}
            @elseif(auth()->user()->name)
                {{ auth()->user()->name }}
            @endif
        </h1>
    </nav>
    <div class='w-[16vw] h-screen fixed bg-slate-900 left-0 flex flex-col items-center z-10' id='sidebar'>
        <h1 class="text-white text-2xl my-3 font-semibold">Dashboard</h1>
        <div class="w-full flex items-center justify-evenly mt-5">
            <div
                class="w-16 h-16 flex justify-center items-center overflow-hidden rounded-full border border-indigo-600">
                <img src="@if (auth()->user()->profile_picture) {{ asset('storage/' . auth()->user()->profile_picture) }}
            @else /icon/user.png @endif"
                    alt="" class="w-16">
            </div>
            <div class="flex flex-col justify-center items-center">
                <h1 class="text-white text-lg">{{ auth()->user()->username }}</h1>
                <span class="text-green-600">online</span>
            </div>
        </div>
        <ul class="mt-10 text-white list-none text-center">
            <a href="/" class="block py-5 px-20 hover:bg-slate-800">
                <li>Home</li>
            </a>
            <a href="/dashboardUser/profile"
                class="block py-5 px-20 hover:bg-slate-800 {{ Request::is('dashboardUser/profile') ? 'bg-slate-800' : '' }}">
                <li>Profile</li>
            </a>
            <a href="/myorder"
                class="block py-5 px-20 hover:bg-slate-800 {{ Request::is('myorder') ? 'bg-slate-800' : '' }}">
                <li>My Orders</li>
            </a>
            <a href="/mytransaction"
                class="block py-5 px-20 hover:bg-slate-800 {{ Request::is('mytransaction') ? 'bg-slate-800' : '' }}">
                <li>Transaction</li>
            </a>
        </ul>
    </div>

    <main class="absolute ml-60 mr-10 mt-20 mb-3 p-3 bg-slate-900 rounded-lg text-white">
        {{ $slot }}
    </main>
    <script src="/js/alert.min.js"></script>
</body>

</html>
