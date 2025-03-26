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
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Meie+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wdth,wght@0,62.5..100,100..900;1,62.5..100,100..900&display=swap"
        rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <!-- Spotify Player -->
        <div class="spotify-player">
            <iframe style="border-radius:12px"
                src="https://open.spotify.com/embed/playlist/7rVvBkg9ltTrEdUiFAvYIh?utm_source=generator" width="100%"
                height="352" frameBorder="0" allowfullscreen=""
                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                loading="lazy"></iframe>
            <div id="play-message" class="text-center text-sm text-gray-600 py-2">
                Click the play button to start the music! For full playback (premium accounts only),</br>
                <a id="spotify-login" href="https://accounts.spotify.com/login" target="_blank"
                    class="text-blue-600 hover:underline">Log in to Spotify ⊹ ࣪ ˖</a>
            </div>
            <!-- Transparent Overlay -->
            <div id="player-overlay" class="absolute inset-0"></div>
        </div>

        <!-- Sidenav -->
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">Page 1 (WIP)</a>
            <a href="#">Page 2 (WIP)</a>
            <a href="/contact">A Message for Me?</a>
            <a href="/perfume-mixer">Craft Your Signature Scent ✦ Blend. Breathe. Become. </a>
        </div>

        <!-- Sidenav Toggle Button -->
<div class="sidenav-toggle" onclick="openNav()">
    <span class="hamburger-icon">&#9776;</span>
</div>

        <!-- Header -->
        <header class="header-background mt-20">
            <div class="container mx-auto px-6">
                <div class="header-title">
                    <a href="{{ url('/') }}"
                        class="text-lg font-semibold text-black no-underline meie-script-regular">
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
                                <a class="no-underline hover:underline"
                                    href="{{ route('register') }}">{{ __('register') }}</a>
                            @endif
                        @else
                            <div class="adminDropdown">
    <span class="cursor-pointer">{{ Auth::user()->name }}</span>
    <div class="adminDropdown-content">
        @if (Auth::id() === 1)
            <a href="/blog/create">Create Post</a>
        @endif
        <a href="/fragrance-wardrobe">My Fragrance Wardrobe</a>
    </div>
</div>

                            <a href="{{ route('logout') }}" class="no-underline hover:underline"
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

    <!-- Sidenav Script -->
    <script>
        function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
    document.querySelector(".sidenav-toggle").style.display = "none"; // Hide the icon
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.querySelector(".sidenav-toggle").style.display = "flex"; // Show the icon
}
    </script>

    <!-- Spotify Player Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const playMessage = document.getElementById('play-message');
            const loginLink = document.getElementById('spotify-login');

            // Check if the user has already closed the Spotify login window during this session
            if (sessionStorage.getItem('spotifyLoginClosed')) {
                // Hide the play message if the flag exists
                if (playMessage) {
                    playMessage.style.display = 'none';
                }
            } else {
                // Hide the play message after 5 seconds (if the login window hasn't been closed yet)
                if (playMessage) {
                    setTimeout(function() {
                        playMessage.style.display = 'none';
                    }, 5000); // 5 seconds
                }
            }

            if (loginLink) {
                loginLink.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default link behavior
                    const loginWindow = window.open(loginLink.href, 'Spotify Login',
                        'width=500,height=600');

                    // Check if the login window is closed
                    const checkWindowClosed = setInterval(function() {
                        if (loginWindow.closed) {
                            clearInterval(checkWindowClosed); // Stop checking
                            // Set a flag in sessionStorage to indicate the window was closed
                            sessionStorage.setItem('spotifyLoginClosed', 'true');
                            // Refresh the page
                            window.location.reload();
                        }
                    }, 500); // Check every 500ms
                });
            }
        });
    </script>
</body>

</html>