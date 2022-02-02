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

            <!-- File -->

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
</body>
</html>