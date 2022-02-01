<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- ADMIN -->
    <link rel="stylesheet" href="{{asset('css/admin_login.css')}}">

    
   
</head>
<body>
<div id="container">
    <div id="left">
        <!-- Image -->
    </div>
    <div  id="right">
        <!-- Session Status -->
        <!-- @if(session()->has('message'))
            <p class="alert alert-info text-dark">
                {{ session()->get('message') }}
            </p>
        @endif -->


        <h1 class="login  text-white text-center mt-3" id="client_login"><b>LOGIN</b></h1><br>
        
         <!-- Validation Errors -->
    
        <x-auth-validation-errors class="alert alert-info text-dark text-center" :errors="$errors" /> 
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div class="email text-center pt-5">
                <x-label class="text-white me-4" for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <!-- Password -->
            <div class="mt-4 text-center">
                <x-label class="text-white" for="password" :value="__('Password')" />

                <x-input 
                    id="password" 
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4 text-center">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-light">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
               
            </div>
            <button class="btn btn-info mt-3 ml-4" type="submit" style="width:5rem;">
                    {{ __('Login') }}
                </button>
        </form>
        <a class="btn btn-info mt-3 ml-4" href="{{ route('register') }}">{{ __('Register') }}</a>
       
    </div>
</div>
<script>
    $('document').ready(function(){
        @if ($errors->any())
            $(".alert").fadeIn(500).delay(3000).fadeOut(500);
        @endif
       
    });
</script> 

</body>
</html>

