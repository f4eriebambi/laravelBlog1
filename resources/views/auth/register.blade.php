@extends('layouts.app')

@section('content')
<main class="register-container">
    <div class="register-form_area">
        <p class="register-title">{{ __('Register 𐦍') }}</p>
        <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('register') }}">
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
</main>
@endsection