<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Meie+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-red py-10">
            <div class="container mx-auto px-6">
                <div class="header-title">
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-black no-underline meie-script-regular">
                        offduty ⋆｡☆ fairy
                    </a>
                </div>
                <div class="header-container">
                    <nav class="header-nav space-x-4 text-gray-300 text-sm sm:text-base">
                        <a class="no-underline hover:underline" href="/">home</a>
                        <a class="no-underline hover:underline" href="/blog">blog</a>
                        <a class="no-underline hover:underline" href="/about">about</a>
                        @guest
                            <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('login') }}</a>
                            @if (Route::has('register'))
                                <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('register') }}</a>
                            @endif
                        @else
                            <span>{{ Auth::user()->name }}</span>

                            <a href="{{ route('logout') }}"
                               class="no-underline hover:underline"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </nav>
                </div>
            </div>
        </header>

        <div>
            @yield('content')
        </div>

        <div>
            @include('layouts.footer')
        </div>
    </div>
</body>
</html>