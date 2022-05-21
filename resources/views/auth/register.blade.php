@extends('layouts.master')
@section('titulo')
    Registrarse
@endsection
@section('corpo')
    <div style="height: 15%">
    </div>
    <div class="d-flex flex-row justify-content-center alig-items-center">
        <button type="button"
            class="mt-3 btn btn-sm btn-primary rounded-pill text-white fs-4 fw-bold border-light border-3 shadow-lg">1</button>
    </div>
    <div class="d-flex flex-row justify-content-center alig-items-center">
        <div class="card border-light border-2 mt-3 py-3 px-3 bg-light shadow-lg" style="width: 18rem;">
            <h1 class="text-primary text-center fs-4 fw-bold">{{ __('Register') }}</h1>
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row justify-content-center alig-items-center">
                    <div class="row">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                    required autofocus />
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row justify-content-center alig-items-center">
                    <div class="row">
                        <!-- Email Address -->
                        <div class="mt-2">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="d-flex ">
                    <div class="row">
                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row justify-content-center alig-items-center">
                    <div class="row">
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="d-flex flex-row justify-content-center alig-items-center">
                    <div class="row">
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12">
                    <div class="d-flex flex-row justify-content-center alig-items-center">
                        <div class="row">
                            <x-button class="btn btn-primary mt-2">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div style="height: 5%">
    </div>
@endsection
