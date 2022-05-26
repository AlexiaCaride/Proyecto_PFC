@extends('layouts.master')
@section('titulo')
    Recuperar contraseña
@endsection
@section('corpo')
    <div class="container my-3">
        <div class="d-flex flex-row justify-content-center alig-items-center">
            <div class="card border-light border-2 mt-5 py-3 px-3 bg-light shadow-lg" style="width: 18rem;">
                <div class="col-12 col-lg-12">
                    <div class="d-flex flex-row justify-content-center alig-items-center">
                        <div class="row">
                            <div class="mb-4 text-primary text-center fs-5 fw-bold">
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="col-12 col-lg-12">
                        <div class="d-flex flex-row justify-content-center alig-items-center">
                            <div class="row">
                                <!-- Email Address -->
                                <div>
                                    <x-label for="email" :value="__('Email')" />

                                    <x-input id="email" class="input-group-text" type="email" name="email" :value="old('email')"
                                        required autofocus />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 mt-2">
                        <div class="d-flex flex-row justify-content-center alig-items-center">
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="btn text-white rounded-pill px-5 py-0 fs-5 bg-primary">
                                    {{ __('Email Password Reset Link') }}
                                </x-button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
