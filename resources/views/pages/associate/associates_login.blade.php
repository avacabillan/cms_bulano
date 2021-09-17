@extends('layout.master')
@section('title')
@stop

@section('content')

<div id="container">
    <div id="left">
        <!-- Image -->
    </div>
    <div id="right">
        <h1 class="login" id="assoc_login"><b>LOGIN</b></h1><br>
        <h5 class="associate_login_info">ASSOCIATE</h5><br>
        <form action="{{route('login')}}" method="post">
        @csrf

            <input class="client-info" type="text" name="username" placeholder="Enter Email" equired>
            <input class="client-info" type="password" name="password" placeholder="Enter Password"equired>

            <button class="client-info" type="submit"  id="submit" class="submitbtn">login</button>

            <div class="alert alert-danger" style="display:none" role="alert">
                {{$errors ->first()}}
            </div>
            
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