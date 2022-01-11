@extends('layout.master')
@section('title')
    
@endsection 
@section('content')
@include('shared.navbar')
@include('pages.admin.sidebar')


<div class="siderbar_main toggled">
    <div class="page-content"><br><br><br>

    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="box">
       <form action="mailto:email@email.com" method="post" enctype="text/plain">

    <label for="subject" class="subject">Recipient:</label>
      <select class="form-select form-select-sm mb-3" >
        <option >Select Recipient</option>
        <option value="Associate">Client name</option>
        <option value="Admin">Associate name</option>              
      </select> 

    <label for="email" class="email">Email</label>
      <input type="email" name="email" placeholder="example@email.com"><br>

    <label for="message" class="message">Message</label><br>
       <textarea name="message" cols="50" rows="7" required maxlength="500"></textarea>

    <p class="button-container">
      <input class="button" type="submit" value="Send">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </p>

  </form>
        
      </div>
    </div>
    



    </div>
</div>
@stop


