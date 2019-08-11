<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        @if(config('soundboard.services.googleAnalyticsID'))
            @include('partials.analytics')
        @endif
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('soundboard.name') }}</title>
        <meta name="description" content="{{ config('soundboard.description') }}">
        <meta name="author" content="{{ config('soundboard.author') }}">
        <link rel="shortcut icon" href="/favicon.ico">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{-- Fonts --}}
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet" type='text/css'>

        {{-- Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.3.1/darkly/bootstrap.min.css"> -->

        @yield('template_linked_css')

        <style type="text/css">
            @yield('template_fastload_css')
        </style>

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
        @stack('head')
    </head>
    <body>
        <div id="app" v-cloak>
            @yield('nav')
            <main class="py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            {{-- @include('partials.form-status') --}}
                        </div>
                    </div>
                </div>
                @yield('content')
            </main>
        </div>

        {{-- Scripts --}}
        <script src="{{ mix('/js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>
