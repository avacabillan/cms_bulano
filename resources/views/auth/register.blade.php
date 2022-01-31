
@extends('layout.master')
<div id="container">
    <div id="left">
        <!-- Image -->
    </div>
    <div class="" id="right">
        
        <h1 class="login text-white text-center mt-3"><b>REGISTER</b></h1><br>
    
        <!-- Validation Errors -->
        <x-auth-validation-errors class="alert alert-info text-dark" :errors="$errors" /> 
        <form method="POST" action="{{ route('store-requestee') }}" enctype="multipart/form-data">
            @csrf
            

            <!-- Name -->
            <div class="form-group">
                
                <x-input style="width:20rem;" class="form-control form-control-sm" id="name"  type="text" name="name" placeholder="Name" :value="old('name')" required autofocus />
            </div>
            
           
            <!-- Email Address -->
            <div class="form-group">
              
                <x-input style="width:20rem;" class="form-control form-control-sm" id="email"  type="email" placeholder="Email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->

            <div class="mb-3">
                <label for="formFileSm" class="form-label text-light">Add File</label>
                 <input class="form-control form-control-sm" name="cor" type="file" style="width:20rem;">
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

