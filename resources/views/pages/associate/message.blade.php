@extends('layout.master')
@section('title')
    
@endsection 
@section('content')

<div class="container card message-container ">
  <h1 class="message-title">Send A Message</h1>
  <form action="mailto:email@email.com" method="post" enctype="text/plain">

    <label for="subject" class="subject">Recipient:</label>
      <select class="form-select form-select-sm mb-3" >
        <option >Select Recipient</option>
        <option value="Associate">Client name</option>
        <option value="Admin">Admin name</option>              
      </select> 

    <label for="email" class="email">Email</label>
      <input type="email" name="email" placeholder="example@email.com">

    <label for="message" class="message">Message</label>
    <textarea name="message" cols="30" rows="7" required maxlength="500"></textarea>

    <p class="button-container">
      <input class="button" type="submit" value="Send">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </p>

  </form>
</div>

@stop


