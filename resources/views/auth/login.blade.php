<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - offduty ⋆｡☆ faerie</title>
    
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
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wdth,wght@0,62.5..100,100..900;1,62.5..100,100..900&display=swap"
        rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <main class="login-container">
        <!-- Blog Title Overlay -->
        <div class="login-title-overlay">
            offduty ⋆｡☆ faerie
        </div>
        
        <!-- Left Side - Image -->
        <div class="login-image-side">
            <!-- Background image applied via CSS -->
        </div>
        
        <!-- Right Side - Form -->
        <div class="login-form-side">
            <div class="login-form_area">
                <div class="login-title">
                    Welcome Back 𐦍<br><span>Enter Your Enchanted World !</span>
                </div>
                <form class="w-full space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="login-form_group">
                        <label for="email" class="login-sub_title">
                            {{ __('E-Mail Address') }}:
                        </label>
                        <input id="email" type="email" class="login-input @error('email') border-red-500 @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="login-form_group">
                        <label for="password" class="login-sub_title">
                            {{ __('Password') }}:
                        </label>
                        <input id="password" type="password" class="login-input @error('password') border-red-500 @enderror"
                            name="password" required placeholder="Enter your password">
                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="login-remember_group">
                        <label class="inline-flex items-center text-sm text-gray-700" for="remember">
                            <input type="checkbox" name="remember" id="remember" class="form-checkbox"
                                {{ old('remember') ? 'checked' : '' }}>
                            <span class="ml-2">{{ __('Remember Me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                        <a class="text-sm hover:underline"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="login-button-confirm">
                            {{ __('Login') }} 𓂃 ࣪˖ ִֶָ𐀔
                        </button>

                        @if (Route::has('register'))
                        <p class="login-link_text">
                            {{ __("Step into a world of beauty—") }}
                            <a class="login-link" href="{{ route('register') }}">
                                {{ __('Register !') }}
                            </a>
                        </p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>