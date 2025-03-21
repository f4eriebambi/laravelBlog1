<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title', 'offduty ⋆｡☆ faerie')</title>
    <!-- Replace existing favicon link with these two lines -->
<link rel="icon" type="image/png" href="{{ asset('images/cherry_icon.png') }}?v=2">
<link rel="shortcut icon" href="{{ asset('images/cherry_icon.png') }}?v=2">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Meie+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wdth,wght@0,62.5..100,100..900;1,62.5..100,100..900&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    {{-- <div class="bg-red-500 p-4">
        Test Tailwind CSS
      </div> --}}
     <div id="app">
        <div class="spotify-player">
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/7rVvBkg9ltTrEdUiFAvYIh?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            <div id="play-message" class="text-center text-sm text-gray-600 py-2">
                Click the play button to start the music!
            </div>
            <!-- Transparent Overlay -->
            <div id="player-overlay" class="absolute inset-0"></div>
        </div>
        <header class="bg-red py-10 header-background mt-20">
            <div class="container mx-auto px-6">
                <div class="header-title">
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-black no-underline meie-script-regular">
                        offduty ⋆｡☆ faerie
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
                            <div class="adminDropdown">
                                <span class="cursor-pointer">{{ Auth::user()->name }}</span>
                                @if (Auth::id() === 1)
                                    <div class="adminDropdown-content">
                                        <a href="/blog/create">Create Post</a>
                                    </div>
                                @endif
                            </div>

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
        {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const iframe = document.querySelector('.spotify-player iframe');
            if (iframe) {
                iframe.contentWindow.postMessage('{"command":"play"}', '*');
            }
        });
    </script> --}}
        <script>
    document.addEventListener('DOMContentLoaded', function() {
        const playMessage = document.getElementById('play-message');

        if (playMessage) {
            // Hide the message after 5 seconds (assuming user will interact with player)
            setTimeout(function() {
                playMessage.style.display = 'none';
            }, 5000); 
        }
    });
</script>
    </div>
</body>
</html>