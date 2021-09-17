@extends('layout.master')
@section('title')
@stop

@section('content')


<div id="container">
    <div id="left">
  
    </div>
    <div id="right">
        <h1 class="login pt-4" id="login"><b>CREATE ACCOUNT</b></h1><br>
        <form action="" method="post">
        @csrf

            <input class="client-info" type="text" name="fullname" placeholder="Enter Name" equired>
            <input class="client-info" type="text" name="contact" placeholder="Enter Contact_no" equired>
            <input class="client-info" type="text" name="address" placeholder="Enter Address" equired>
            <input class="client-info" type="text" name="email" placeholder="Enter Email" equired>

            <button class="client-info" type="submit"  id="submit" class="submitbtn">Register</button>
           

            <button class="uploadbtn mt-5" type="upload"  id="upload" class="uploadbtn">Upload</button>
        </form>
    </div>
</div>

@stop