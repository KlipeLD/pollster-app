<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <link href="{{ asset('bootstrap-5.0.2/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- <script src="{{ asset('/js/other/jquery.min.js') }}"></script> --}}

    @yield('head')
</head>
<header>
    <nav class="navbar navbar-expand-lg navbarMenuMain">
        <div class="container-fluid">
            <button class="navbar-toggler  boxShadNone" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon navbarTogIcon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link menuLink" href="{{ route('survey.index') }}">{{ __('messages.nav_survey_index') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<body>
    <main class="bodyContent mt-5">
        @yield('content')
    </main>
    <script src="{{ asset('/bootstrap-5.0.2/js/bootstrap.bundle.min.js') }}" ></script>
</body>
<footer>
    @extends('layouts.footer')
</footer>
</html>
