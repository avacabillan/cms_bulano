@extends('layout.master')
@section('title')
  Add Associate
@stop
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
        @endif
      </div>
    </div>

    <div class="card card-dark card-outline card-default">
      <div class="card-header">
        <h3 class="card-title">ADD Associate</h3>
    </div>

    <div class="card-body">
      <div class="row">

        <form action="{{route('saveassociate')}}" class="row needs-validation" id="addClientForm" name="addClientForm" novalidate>

          <h4 class="text-center mb-3"><b>Personal Information</b></h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="validationCustom01" class="form-label">Full name</label>
                <input type="text" class="form-control"  value="{{old('assoc_name')}}"  name="assoc_name" style="width: 100%;" required>
                
              </div>
              <div class="form-group">
                <label for="validationCustom02" class="form-label">Email</label>
                <input type="text" class="form-control" value="{{old('assoc_email')}}" name="assoc_email" style="width: 100%;"  required>
              
              </div>
              
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="validationCustom03" class="form-label">SSS Number/ Goverment ID No.</label>
                <input type="text" class="form-control" value="{{old('assoc_sss')}}" name="assoc_sss" style="width: 100%;" required>
                
              </div>
             
              <div class="form-group">
                <label for="validationCustom04" class="form-label">Contact No.</label>
                <input type="text" class="form-control" value="{{old('assoc_contact')}}" name="assoc_contact" style="width: 100%;" required>
               
              </div>
              
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="validationCustom05" class="form-label">Birthday</label>
                <input type="date" class="form-control"  value="{{old('assoc_birthdate')}}"  name="assoc_birthdate" style="width: 100%;" required>
                
              </div>
             
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="validationCustom06" class="form-label">Complete Address</label>
                <input type="text" class="form-control" value="{{old('assoc_address')}}" name="assoc_address" style="width: 100%;" required> 
                
              </div>
             
            </div>

          </div>


          <h4 class="text-center mb-3"><b>JOB Information</b></h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="validationCustom07" class="form-label">Department</label>
                <select name="department" class="form-control" style="width: 100%;" required>
                  <option selected disabled value="">--Select Department--</option>
                      @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->department_name}}</option>
                      @endforeach
                      
                  </select>
                  
              </div>
              <div class="form-group">
                <label for="validationCustom08" class="form-label">Date Hired</label>
                <input type="date" class="form-control" value="{{old('hired_date')}}" name="hired_date" style="width: 100%;" required>
              </div>
            </div>
             

            <div class="col-md-6">
              <div class="form-group">
                <label for="validationCustom10" class="form-label">Position</label>
                <select name="position" class="form-control" style="width: 100%;" required>
                  <option value="">--Select Position--</option>
                      @foreach($positions as $position)
                        <option  value="{{$position->id}}">{{$position->position_name}}</option>
                      @endforeach
                </select>
               
              </div>
              <div class="form-group">
                <label for="validationCustom08" class="form-label">Username</label>
                <input type="text" class="form-control" value="{{old('username')}}" name="username" style="width: 100%;" placeholder="email@bulano.com" required>
              </div>
            </div>
              
              <div class="form-group">
                <fieldset disabled>
                <label for="disabledTextInput" class="form-label">Password</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Default Password is same with username">
               
              </fieldset>
              </div>
            </div>
          </div>
       
          <div class="AddClient_btn" sytle="float: left;">
            <button class="btn btn-primary" type="submit" name="saveBtn" id="saveBtn" value="createClient">Submit</button>
          </div>
        
        </form>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')
@stop