@extends('layouts.newlayout')
@section('title', 'login')

@section('login')

<div id="logreg-forms">
    <form method="POST" action="{{ route('login') }}" class="form-signin">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
        
        <!-- Email Address -->
        <div>
            <label for="inputEmail" class="sr-only">{{ __('Email') }}</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="inputPassword" class="sr-only">{{ __('Password') }}</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required autocomplete="current-password">
            @error('password')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" id="forgot_pswd">{{ __('Forgot password?') }}</a>
        @endif

        <hr>
        <!-- <p>Don't have an account!</p>  -->
        <a href="{{ route('register') }}"><button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Sign up New Account</button></a>
    </form>

    <form method="POST" action="{{ route('password.email') }}" class="form-reset">
        @csrf
        <input type="email" id="resetEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
        <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>
    </form>
</div>

@endsection
