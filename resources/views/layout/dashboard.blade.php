<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/jquery.js"></script>
    <style>
        .judul {
            font-family: 'Righteous', cursive;
        }
    </style>
</head>

<body class="antialiased bg-slate-800">
    <x-sidebar></x-sidebar>
    <main class="absolute ml-60 mr-4 mt-20 mb-5 p-5 bg-slate-900 rounded-lg text-white">
        {{ $slot }}
    </main>
</body>

</html>
