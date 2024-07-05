<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? "Student's Haven" }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="/images/icon/logo.png">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lateef:wght@600&family=Marhey&family=Scheherazade+New:wght@500&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>

<body class=" text-gray-900 antialiased" style="font-family: 'Marhey', sans-serif;">




    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-6 h-[100vh] justify-center items-center">
        <div class="w-full  h-full col-span-1 md:col-span-2  lg:col-span-2  justify-center items-center bg-[#0f141d]"
            style="background-image: url('/images/background/9.jpg');background-position: center;
                background-repeat: repeat;
                background-size: cover ;
                position: relative;">
            <div class=" flex w-full  h-full justify-center items-center bg-black bg-opacity-30  sm:pt-0">
                <div class="w-full px-10 ">
                    <a href="/" class="flex justify-center sm:hidden items-center mb-10  ">
                        <div class="logo">
                            <h1 class="text-4xl text-white min-w-max text-center mb-2 sm:mb-0"
                                style="font-family: 'Great Vibes', cursive;
            font-weight: 400;
            font-style: normal;">
                                Student's Haven</h1>
                        </div>
                    </a>

                    {{ $slot }}
                </div>
            </div>

        </div>
        <div class="hidden sm:block col-span-1 md:col-span-3 border-r-2  border-cyan-400 lg:col-span-4 w-full h-full"
            style="background-image: url('/images/background/1.jpg');
                background-position: center;
                background-repeat: repeat;
                background-size: cover ;
                position: relative;">
            <a href="/" class=" flex justify-end items-center m-8">
                <button
                    class=" text-xl p-4 border-r-2 border-r-lime-300 border-t-2 border-b-2 hover:shadow-lime-600 hover:shadow-lg hover:border-t-lime-300 hover:border-b-2 hover:border-b-lime-300 border-b-fuchsia-300 border-t-fuchsia-300 hover:border-r-2 hover:border-r-fuchsia-500 bg-black rounded-r-xl  bg-opacity-30  text-white">الصفحة
                    الرئيسية</button>

            </a>
        </div>

    </div>


  

</body>

</html>
