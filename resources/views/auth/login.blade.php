@extends('layouts.master')
@section('titulo')
Login
@endsection
@section('corpo')
<div class="d-flex flex-row justify-content-center alig-items-center">
<div class="card border-light border-2 mt-5 py-3 px-3 bg-light  shadow-lg" style="width: 18rem;">
    <h1 class="text-primary text-uppercase text-center mb-4 fs-3 fw-bold">{{__('Login')}}</h1>
        <div class="col-12 col-lg-12">
            <div class="d-flex flex-row justify-content-center alig-items-center">
                <div class="row">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="input-group-text" type="email" name="email" :value="old('email')"
                                required autofocus />
                        </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <div class="d-flex flex-row justify-content-center alig-items-center">
                <div class="row">
                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="input-group-text" type="password" name="password" required
                            autocomplete="current-password" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <div class="d-flex ">
                <div class="row">
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <div class="d-flex flex-row justify-content-center alig-items-center">
                <div class="row">
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 mt-2">
                <div class="d-flex flex-row justify-content-center alig-items-center">
                    <x-button class="btn text-white rounded-pill px-5 py-0 fs-5 bg-primary">
                        {{ __('Log in') }}
                    </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-lg-12 mt-2 mb-5">
    <div class="d-flex flex-row justify-content-center alig-items-center">
        <a class="underline text-secondary fw-bold text-gray-600 hover:text-gray-900"
                href="/register">
                {{ __('No account yet?') }}
            </a>
    </div>
</div>
@endsection