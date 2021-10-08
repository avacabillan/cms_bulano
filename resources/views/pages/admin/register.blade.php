@extends('layout.master')
@section('title')
@stop

@section('content')


<div id="container">
    <div id="left">
  
    </div>
    <div id="right">
        <h2 class="login text-white pt-5" id="login" style="text-align: center;"><b>Register</b></h2><br>

        <form action="" method="post">
        @csrf

            <input class="client-info" type="text" name="fullname" placeholder="Enter Name" equired>
            <input class="client-info" type="text" name="email" placeholder="Enter Your Current Email" equired>
            <input class="client-info" type="text" name="address" placeholder="Enter Username" equired>
            <input class="client-info" type="text" name="address" placeholder="Enter Password" equired>
            
            <div class="d-grid gap-2 d-md-flex justify-content-center">
                <button class="btn btn-primary me-md-2" type="submit">Register</button>
                <a class="btn btn-danger" href="{{route('login')}}" role="button">Cancel</a>
            </div>

            <button class="uploadbtn mt-5" type="upload"  id="upload" class="uploadbtn">Upload</button>
        </form>
    </div>
</div>

@stop
