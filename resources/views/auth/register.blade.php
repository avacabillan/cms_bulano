
@extends('layout.master')
<div id="container">
    <div id="left">
        <!-- Image -->
    </div>
    <div id="right">
        
        <h1 class="login text-white text-center mt-3"><b>REGISTER</b></h1><br>
    
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <x-label class="text-white" for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <div class="form-group">
                <label for="name" class="text-white">{{ __('Contact Number') }}</label>
                <input  id="contact_no" type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" required autocomplete="contact_no">
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <x-label class="text-white" for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-label class="text-white" for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <x-label class="text-white" for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation" required />
            </div>

            <!-- Select Option Rol type -->
            <div class="mt-2">
                <x-label class="text-white" for="role_id" value="{{ __('Register as:') }}" />
                <select name="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="client">Client</option>
                    <option value="admin">Admin</option>
                    <option value="associate">Associate</option>     
                </select>
            </div>

            <div class="mb-3">
                <label for="formFileSm" class="form-label">Choose File</label>
                <input class="form-control form-control-sm" name="cor_img" id="formFileSm" type="file">
            </div>

            <div class="footer_btn">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="btn btn-primary  text-white ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
            <a class="justify-content-start" href="{{ route('login') }}">Back</a>
        </form>
        
</div>      

