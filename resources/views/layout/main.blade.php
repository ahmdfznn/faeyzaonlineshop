<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/font-awesome.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="/js/jquery.js"></script>
    <script src='/js/font-awesome.js' crossorigin='anonymous'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            user-select: none;
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

        body {
            overflow-x: hidden;
        }

        #main {
            background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 10%, rgba(0, 0, 0, 0.8)), url('/img/bg.jpg');
            background-size: cover;
            background-position: 50% 50%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            -webkit-backdrop-filter: blur(20px);
        }

        #menu {
            background-image: linear-gradient(rgb(0, 0, 0, 0.5), rgb(0, 0, 0, 0.8)), url('/img/bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .judul {
            font-family: 'Righteous', cursive;
            text-shadow: 0 5px 10px black;
        }

        .itim {
            font-family: 'Itim', cursive;
        }

        .toggle {
            display: block;
            width: 35px;
            height: 4px;
            background: #fff;
            border-radius: 3px;
            transition: .8s;
        }

        .arial {
            font-family: Arial, Helvetica, sans-serif;
        }

        .h1 {
            text-shadow: 0 0 3px white;
        }

        .cart {
            position: fixed;
            width: 100vw;
            height: 100vh;
            background-color: black;
            transition: 1s
        }

        .text-shadow {
            text-shadow: 7px 7px 5px black;
            animation: blur 2s infinite;
        }

        .background {
            /* box-shadow: inset 30px -30px 50px rgb(15 23 42); */
            box-shadow: 0 0 30px white;
        }

        @keyframes blur {
            0% {
                filter: blur(0px);
            }

            50% {
                filter: blur(2px);
            }

            100% {
                filter: blur(0px);
            }
        }
    </style>
</head>

<body class="antialiased bg-slate-900">
    <x-navbar></x-navbar>
    <main>
        {{ $slot }}
    </main>
    <div id="cart"></div>
    <x-footer></x-footer>
    @if (Request::is('/'))
        <div class="fixed w-[50px] h-[50px] right-0 bottom-0 m-5 cursor-pointer">
            <a href="https://api.whatsapp.com/send?phone=6281779499678">
                <img src="/icon/wa.png" alt="whatsapp" width="50px" height="50px">
            </a>
        </div>
    @endif
    <script src="/js/alert.min.js"></script>
    <script src="/js/gsap.min.js"></script>
    <script src="/js/easing.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>
