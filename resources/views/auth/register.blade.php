@extends('layouts.newlayout')
@section('title', 'Register')

@section('login')

<div id="logreg-forms">
    <form method="POST" action="{{ route('register') }}" class="form-signup">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Sign Up</h1>
        
        <!-- Name -->
        <div>
            <label for="user-name" class="sr-only">{{ __('Name') }}</label>
            <input type="text" name="name" id="user-name" class="form-control" placeholder="Full name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="user-email" class="sr-only">{{ __('Email') }}</label>
            <input type="email" name="email" id="user-email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required>
            @error('email')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="user-pass" class="sr-only">{{ __('Password') }}</label>
            <input type="password" name="password" id="user-pass" class="form-control" placeholder="Password" required>
            @error('password')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="user-repeatpass" class="sr-only">{{ __('Confirm Password') }}</label>
            <input type="password" name="password_confirmation" id="user-repeatpass" class="form-control" placeholder="Repeat Password" required>
            @error('password_confirmation')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
        <a href="{{ route('login') }}" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>
    </form>
</div>

@endsection
