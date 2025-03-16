@extends('layouts.app')

@section('content')
<main class="login-container">
    <div class="login-form_area">
        <div class="login-title">
            Welcome 𐦍<br><span>Login to Continue !</span>
        </div>
        <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('login') }}">
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
                <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline ml-auto"
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
</main>
@endsection