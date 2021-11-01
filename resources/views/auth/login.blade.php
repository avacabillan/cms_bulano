@extends('layout.master')

@section('title')
Login
@stop

@section('content')

<div id="container">
    <div id="left">
        <!-- Image -->
    </div>
    <div id="right">
        <h1 class="login" id="client_login"><b>LOGIN</b></h1><br>
        
        <form action="{{ route('login') }}" method="post">
        @csrf
            <!-- Email -->
            <!-- <input class="client-info" type="text" name="username" placeholder="Enter Email" equired> -->
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="username" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <!-- Password -->
            <!-- <input class="client-info" type="password" name="password" placeholder="Enter Password"equired> -->
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mt-3" name="password" required autocomplete="current-password" placeholder="Enter Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <button class="client-info" type="submit"  id="submit" class="submitbtn"><a href="#">Login</a></button>

            <div class="alert alert-danger" style="display:none" role="alert">
                {{$errors ->first()}}
            </div>
           
        </form>
        <button class="client-info" type="submit"  id="register_submit" class="submitbtn"><a href="{{route('register')}}">Register</a></button>
                
    </div>
</div>

@stop
@section('scripts')
 <script>
    $('document').ready(function(){
        @if ($errors->any())
            $(".alert").fadeIn(500).delay(3000).fadeOut(500);
        @endif
       
    });
</script>

@stop

