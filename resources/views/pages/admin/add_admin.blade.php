@extends('layout.master')
@section('title')
    Create Admin
@stop 
@section('content')
<div class="row pl-5 pr-5 pt-5">
    <form action="{{route('admin_store')}}" method="POST" class="input-group mb-3">
      @csrf
      @method('GET')
    
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form6Example1">Full name</label>
            <input type="text" name="name" id="form6Example1" class="form-control" required>
            
          </div>
        </div>
      
    
      <!-- Text input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form6Example3">Complete Address</label>
        <input type="text" name="address" id="form6Example3" class="form-control" required>
       
      </div>
    
      <!-- Text input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">Birth Date</label>
        <input type="date" name="birth_date" id="form6Example4" class="form-control" required>
       
      </div>
    
      <!-- Email input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form6Example5">Hired Date</label>
        <input type="date" name="hired_date" id="form6Example5" class="form-control" required>
       
      </div>
      <label class="form-label" for="form6Example5">Select Department</label>
      <select name="department" class="form-select form-select mb-3" aria-label=".form-select example" required>
        <option selected>Select Department</option>
        @foreach($departments as $department)
        <option value="{{$department->id}}">{{$department->department_name}}</option>
        @endforeach
      </select>
        
      <!-- Number input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form6Example6">Contact Number</label>
        <input name="contact" type="text" id="form6Example6" class="form-control" required>
       
      </div>
      <div class="row">
        <div class="col">
          <label class="form-label" for="form6Example6">Email Address</label>
          <input type="text" name="email" class="form-control" placeholder="Email Address" required>
          
        </div>
        <div class="col">
          <label class="form-label" for="form6Example6">Password</label>
          <input type="disabled" name="password" class="form-control" placeholder="Password" required>

        </div>
      </div>
     
       
        <button type="submit" class="btn btn-primary">Create</button>
      
    </form>
</div>
@endsection