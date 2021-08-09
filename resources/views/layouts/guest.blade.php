<!doctype html>
<html class="antialiased" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{asset('assets/css/form.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/tailwind.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('assets/js/vendor/slick.css')}}" rel="stylesheet">
    <script src="{{asset('js/app.js')}}"></script>
    <title>Продажа автомобилей - @yield('title')</title>
    <link href="{{asset('assets/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head')
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
<div class="wrapper flex flex-1 flex-col">
    @include('components.panels.header')
    {{ $slot }}
    @include('components.panels.footer')
</div>
</body>
</html>
