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

        {{-- Current User Id--}}
        @auth
            <meta name="user-id" content="{{ Auth::user()->id }}">
        @endauth

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

<!-- <style type="text/css">

    * {
      padding: 0;
      margin: 0;
    }
    a {
      color: #337ab7;
    }
    p {
      margin-top: 1rem;
    }
    a:hover {
      color:#23527c;
    }
    a:visited {
      color: #8d75a3;
    }
    body {
      margin: 1rem;
      padding: 1rem;
      font-family: sans-serif;
      max-width: 28rem;
      margin: 0 auto;
      position: relative;
    }
    #controls {
      display: flex;
      margin-top: 2rem;
    }
    button {
      flex-grow: 1;
      height: 2.5rem;
      min-width: 2rem;
      border: none;
      border-radius: 0.15rem;
      background: #ed341d;
      margin-left: 2px;
      box-shadow: inset 0 -0.15rem 0 rgba(0, 0, 0, 0.2);
      cursor: pointer;
      display: flex;
      justify-content: center;
      align-items: center;
      color:#ffffff;
      font-weight: bold;
      font-size: 1rem;
    }
    button:hover, button:focus {
      outline: none;
      background: #c72d1c;
    }
    button::-moz-focus-inner {
      border: 0;
    }
    button:active {
      box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.2);
      line-height: 3rem;
    }
    button:disabled {
      pointer-events: none;
      background: lightgray;
    }
    button:first-child {
      margin-left: 0;
    }
    audio {
      display: block;
      width: 100%;
      margin-top: 0.2rem;
    }
    li {
      list-style: none;
      margin-bottom: 1rem;
    }
    #formats {
      margin-top: 0.5rem;
      font-size: 80%;
    }

</style> -->

<style type="text/css">
    #recordingsList audio {
        width: 100%;
        margin-bottom: 2em;
    }

.fa-beat {
  -webkit-animation: fa-beat 1s infinite linear;
  animation: fa-beat 1s infinite linear;
}
@-webkit-keyframes fa-beat {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  50% {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }
  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}
@keyframes fa-beat {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  50% {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }
  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

</style>

    </head>
    <body class="{{ $class ?? '' }}">
        <div id="app" @auth v-cloak @endauth>
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
        </div>
        <script src="{{ mix('/js/admin.js') }}"></script>
        @stack('js')
        @yield('js')

<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<!-- <script src="{{ asset('/js/recorder.js') }}"></script> -->

    </body>
</html>
