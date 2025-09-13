<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register - offduty ⋆｡☆ faerie</title>
    
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
    <main class="register-container">
        <!-- Blog Title Overlay -->
        <div class="register-title-overlay">
            offduty ⋆｡☆ faerie
        </div>
        
        <!-- Left Side - Image -->
        <div class="register-image-side">
            <!-- Background image applied via CSS -->
        </div>
        
        <!-- Right Side - Form -->
        <div class="register-form-side">
            <div class="register-form_area">
                <div class="register-title">
                    Register 𐦍<br><span>Begin Your Beautiful Story !</span>
                </div>
                <form class="w-full space-y-6" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="register-form_group">
                        <label for="name" class="register-sub_title">
                            {{ __('Name') }}:
                        </label>
                        <input id="name" type="text" class="register-form_style @error('name') border-red-500 @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your full name">
                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="register-form_group">
                        <label for="email" class="register-sub_title">
                            {{ __('E-Mail Address') }}:
                        </label>
                        <input id="email" type="email" class="register-form_style @error('email') border-red-500 @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="register-form_group">
                        <label for="password" class="register-sub_title">
                            {{ __('Password') }}:
                        </label>
                        <input id="password" type="password" class="register-form_style @error('password') border-red-500 @enderror"
                            name="password" required autocomplete="new-password" placeholder="Enter your password">
                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="register-form_group">
                        <label for="password-confirm" class="register-sub_title">
                            {{ __('Confirm Password') }}:
                        </label>
                        <input id="password-confirm" type="password" class="register-form_style"
                            name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                    </div>

                    <div>
                        <button type="submit" class="register-btn">
                            {{ __('Register') }} ݁₊ ⊹ . ݁˖
                        </button>
                        <p class="register-link_text">
                            {{ __('Back for more? Your journey awaits—') }}
                            <a class="register-link" href="{{ route('login') }}">
                                {{ __('Login Here !') }}
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>