@extends('layout.guest')
@section('title')
@stop

@section('content')


<div id="container">
    <div id="left">
  
    </div>
    <div id="right">
        <h1 class="login pt-4" id="login"><b>CREATE ACCOUNT</b></h1><br>
        <form action="{{route('storeRequest')}}" method="post">
        @csrf
        @method('GET')

            <input class="client-info" type="text" name="name" placeholder="Enter Name" equired>
            <input class="client-info" type="text" name="contact_no" placeholder="Enter Contact_no" equired>

            <input class="client-info" type="text" name="email" placeholder="Enter Email" equired>
            <div class="mb-3">
              <label for="formFileSm" class="form-label">Choose File</label>
              <input class="form-control form-control-sm" name="cor_image" id="formFileSm" type="file">
            </div>

            <button class="client-info" type="submit"  id="submit" class="submitbtn">Register</button>
           

            
        </form>
    </div>
</div>
@if ($message = Session::get('success'))

<div class="alert alert-success alert-center">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ $message }}</strong>

</div>

@endif

@stop