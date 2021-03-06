@extends('layout.master')
@section('title')
@stop

@section('content')

<div id="container">
    <div id="left">
        <!-- Image -->
    </div>
    <div id="right">
        <h1 class="login" id="client_login"><b>LOGIN</b></h1><br>
        <h5 class="client_login_info">CLIENT</h5><br>
        <form action="{{route('login')}}" method="post">
        @csrf

            <input class="client-info" type="text" name="username" placeholder="Enter Email" equired>
            <input class="client-info" type="password" name="password" placeholder="Enter Password"equired>

            <button class="client-info" type="submit"  id="submit" class="submitbtn">login</button>

            <div class="alert alert-danger" style="display:none" role="alert">
                {{$errors ->first()}}
            </div>
            <button class="client-info" type="submit"  id="register_submit" class="submitbtn"><a href="{{route('register')}}">Register</a></button>
                
        </form>
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