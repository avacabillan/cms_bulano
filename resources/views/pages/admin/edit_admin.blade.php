@extends('layout.master')
@section('title')
    Edit Admin
@stop 
@section('content')

<section class="content-header">
  <div class="container-fluid">
      <div class="row mb-0">
          <div class="col-sm-6">
              <h5><a href="{{route('admin_list')}}"><b>Admin List</b></a></h5>               
          </div>
      </div>
  </div>
</section> 
<div class="row pl-5 pr-5 pt-5">
    <form action="{{route('admin_update',$admin->id)}}" method="POST" class="input-group mb-3">
      @csrf
      @method('PUT')
    
      <input type="hidden" name="user_id" value="{{$admin->user_id}}">
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form6Example1">Full name</label>
            <input type="text" name="name" value="{{$admin->myuser->name}}" id="form6Example1" class="form-control" required>
            
          </div>
        </div>
      
    
      <!-- Text input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form6Example3">Complete Address</label>
        <input type="text" name="address" value="{{$admin->complete_address}}" id="form6Example3" class="form-control" required>
       
      </div>
    
      <!-- Text input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form6Example4">Birth Date</label>
        <input type="date" name="birth_date" value="{{$admin->birth_date}}" id="form6Example4" class="form-control" required>
       
      </div>
    
      <!-- Email input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form6Example5">Hired Date</label>
        <input type="date" name="hired_date" value="{{$admin->hired_date}}" id="form6Example5" class="form-control" required>
       
      </div>
      <div class="form-outline mb-4">
      <label class="form-label" for="form6Example5">Select Department</label>
      <select name="department" class="form-control" style="width: 100%;">
        <option value="">--Select Department--</option>
          @foreach($departments as $department)
            <option value="{{$department['id']}}"  {{ $admin->department->id == $department['id'] ? 'selected="selected"' : '' }}>{{$department->department_name}}</option>
          @endforeach
      </select>
    </div>
      <!-- Number input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form6Example6">Contact Number</label>
        <input name="contact" type="text" value="{{$admin->phone_no}}" id="form6Example6" class="form-control" required>
       
      </div>
      {{-- <div class="row">
        <div class="col">
          <label class="form-label" for="form6Example6">Email Address</label>
          <input type="text" name="email" value="{{$admin->email_address}}" class="form-control" placeholder="Email Address" required>
          
        </div>
        <div class="col">
          <label class="form-label" for="form6Example6">Password</label>
          <input type="disabled" name="password" class="form-control" placeholder="Password" required>

        </div>
      </div> --}}
     
       
        <button type="submit" class="btn btn-primary">Create</button>
      
    </form>
</div>
@endsection