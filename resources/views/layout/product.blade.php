<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="/js/jquery.js"></script>
    <style>
        * {
            user-select: none;
            font-family: 'Itim', cursive;
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

        .judul {
            font-family: 'Righteous', cursive;
        }

        .itim {
            font-family: 'Itim', cursive;
        }
    </style>
</head>

<body class="antialiased bg-slate-800">
    <x-topbar></x-topbar>
    <main class="w-screen flex justify-center items-center pt-20 px-10 rounded-lg">
        {{ $slot }}
    </main>
    <x-footer></x-footer>
    <script src="/js/gsap.min.js"></script>
    <script src="/js/alert.min.js"></script>
    <script>
        gsap.set('#detail-image', {
            x: -300
        })
    </script>
</body>

</html>
