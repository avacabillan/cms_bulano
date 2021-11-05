
@extends('layout.master')
<div id="container">
    <div id="left">
        <!-- Image -->
    </div>
    <div class="" id="right">
        
        <h1 class="login text-white text-center mt-3"><b>REGISTER</b></h1><br>
    
        <!-- Validation Errors -->
        <x-auth-validation-errors class="alert alert-primary text-dark"  role="alert" :errors="$errors" />
        <form method="POST" action="{{ route('register') }}">
            @csrf
            

            <!-- Name -->
            <div class="form-group">
                
                <x-input style="width:20rem;" class="form-control form-control-sm" id="name"  type="text" name="name" placeholder="Name" :value="old('name')" required autofocus />
            </div>
            
            <div class="form-group">
                
                <input style="width:20rem;" class="form-control form-control-sm"  id="contact_no" type="text" placeholder="Contact Number" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" required autocomplete="contact_no">
            </div>

            <!-- Email Address -->
            <div class="form-group">
              
                <x-input style="width:20rem;" class="form-control form-control-sm" id="email"  type="email" placeholder="Email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
           
                
            <div class="form-group">
              
              <x-input style="width:20rem;" class="form-control form-control-sm" id="password"  type="password" placeholder="Password" name="password"  required />
          </div>
            

            <!-- Confirm Password -->
            <div class="form-group">
                
                <x-input style="width:20rem;" class="form-control form-control-sm" id="password_confirmation" placeholder="Confirm Password" type="password" name="password_confirmation" required />
            </div>

            <!-- Select Option Rol type -->
            <!-- <div class="mt-2">
                <x-label class="text-white" for="role_id" value="{{ __('Register as:') }}" />
                <select name="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="client">Client</option>
                    <option value="admin">Admin</option>
                    <option value="associate">Associate</option>     
                </select>
            </div> -->

            <div class="mb-3">
                <label for="formFileSm" class="form-label text-light">Add File</label>
                <input class="form-control form-control-sm" name="cor_img" id="formFileSm" type="file" style="width:20rem;">
            </div>
             <x-button class="btn btn-success  mt-1 mb-2 ml-4">
                    {{ __('Register') }}
                </x-button>+
            <div class="footer_btn">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered? ') }}
                </a>

               
            </div>
            
        </form>
        
</div>      

