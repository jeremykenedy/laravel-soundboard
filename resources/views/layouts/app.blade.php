<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        @if(config('soundboard.services.googleAnalyticsID'))
            @include('partials.analytics')
        @endif
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('soundboard.name') }}</title>
        <meta name="description" content="{{ config('soundboard.description') }}">
        <meta name="author" content="{{ config('soundboard.author') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

        {{-- Fonts --}}
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        {{-- Icons --}}
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

        {{-- Styles --}}
        @yield('css')
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
        <body class="{{ $class ?? '' }}">
            <!-- <div id="app" v-cloak> -->
            @php
                $currentUser = auth()->user()
            @endphp
            @auth()
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @include('layouts.navbars.sidebar')
            @endauth
            <div class="main-content">
                @include('layouts.navbars.navbar')
                @yield('content')
            </div>
            @guest()
                @include('layouts.footers.guest')
            @endguest
        <!-- </div> -->
        <script src="{{ mix('/js/admin.js') }}" defer></script>
        @stack('js')
        @yield('js')
    </body>
</html>
