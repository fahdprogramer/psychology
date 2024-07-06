<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? "Student's Haven" }}</title>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Island+Moments&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mirza:wght@600;800;800;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Marhey:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />




    <!-- Template Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/fontawesome.min.css') }}">
    <script src="{{ asset('jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="/images/icon/logo.png">
</head>

<body class="relative" style="font-family: 'Marhey', sans-serif;
font-optical-sizing: auto;
font-weight: 300;
font-style: normal;">

    <livewire:teacher.navbar-component />
    
    <div class="bg-[#394246c0] bg-opacity-30">
        {{ $slot }}
    </div>
    
    <div class="relative w-full ">
        <livewire:welcomepage.footer-page>
        </div>





            <script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>

            @livewireScripts

            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <x-livewire-alert::scripts />
</body>

</html>
