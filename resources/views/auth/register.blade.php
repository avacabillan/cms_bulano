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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- ADMIN -->
    <link rel="stylesheet" href="{{asset('css/admin_login.css')}}">

   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
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
                </a><br><br>
                <p>
            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Read Me
            </a>
            <div class="collapse" id="collapseExample">
            <div class="card card-body">
            <div class="container" > 
                
                
                Read Instruction
                <li>Please Provide Name</li>
                <li>Exact Email Address for approval purposes</li>
                <li>Please attach image format of the Certificate of Registration (COR) for tax review purposes</li>
            
                
                
            </div> 

            </div>
            </div>
            </p>
            </div>
            
        </form>

</body>
</html>