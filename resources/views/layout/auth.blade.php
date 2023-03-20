<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/jquery.js"></script>
    <style>
        * {
            user-select: none;
            overflow-x: hidden;
        }

        /* ::-webkit-scrollbar {
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
        } */

        .judul {
            font-family: 'Righteous', cursive;
            text-shadow: 0 0 2px white;
        }
    </style>
</head>

<body class="w-screen h-screen flex justify-center items-center bg-slate-900">
    <div class="bg-slate-800 p-8 rounded-lg flex justify-center items-center">
        {{ $slot }}
    </div>
    <script src="/js/gsap.min.js"></script>
    <script src="/js/auth.js"></script>
</body>

</html>
