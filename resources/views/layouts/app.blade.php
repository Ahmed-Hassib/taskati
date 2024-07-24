<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="taskati" />
    <meta name="author" content="" />
    <meta name="keywords" content="taskati" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Scripts --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{--  Favicon --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('dist/images/logos/taskati.png') }}" />
    {{-- Core Css --}}
    <link id="themeColors" rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/libs/jquery-raty-js/lib/jquery.raty.css') }}">
    {{-- stack of stylesheets --}}
    @livewireStyles
    @stack('stylesheets')

</head>

<body>
    <div id="app">
        {{-- preloader --}}
        <div class="preloader">
            <img src="{{ asset('dist/images/logos/taskati.png') }}" alt="loader" class="lds-ripple img-fluid" />
        </div>

        @auth
            <x-user.app-layout>
                @yield('content')
            </x-user.app-layout>
        @endauth

        {{-- main section for pages content while a guest user --}}
        @guest
            <main>
                @yield('content')
            </main>
        @endguest
    </div>

    {{-- Import Js Files --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/libs/jquery-ui/dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    {{-- core files --}}
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    <script src="{{ asset('dist/js/app.init.js') }}"></script>
    <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    {{-- custom file --}}
    <script src="{{ asset('dist/js/custom.js') }}"></script>
    {{-- stack of scripts --}}
    @livewireScripts
    @stack('scripts')
</body>

</html>
