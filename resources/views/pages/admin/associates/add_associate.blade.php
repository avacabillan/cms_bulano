@extends('layout.master')
@section('title')
  Add Associate
@stop
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
     
      </div>
    </div>

    <div class="card card-dark card-outline card-default">
      <div class="card-header">
        <h3 class="card-title">ADD Associate</h3>
    </div>

    <div class="card-body">
      <div class="row">

        <form action="{{route('saveassociate')}}" class="row"  id="addClientForm" name="addClientForm">

          <h4 class="text-center mb-3"><b>Personal Information</b></h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control"  value=""  name="assoc_name" style="width: 100%;">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" value="" name="assoc_email" style="width: 100%;">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>SSS Number/ Goverment ID No.</label>
                <input type="text" class="form-control" value="" name="assoc_sss" style="width: 100%;">
              </div>
              <div class="form-group">
                <label>Contact No.</label>
                <input type="text" class="form-control" value="" name="assoc_contact" style="width: 100%;">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Birthday</label>
                <input type="date" class="form-control"  value=""  name="assoc_birthdate" style="width: 100%;">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Complete Address</label>
                <input type="text" class="form-control" value="" name="assoc_address" style="width: 100%;">
              </div>
            </div>

          </div>


          <h4 class="text-center mb-3"><b>JOB Information</b></h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Department</label>
                <select name="department" class="form-control" style="width: 100%;">
                  <option value="">--Select Department--</option>
                      @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->department_name}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" value="" name="username" style="width: 100%;">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Position</label>
                <select name="position" class="form-control" style="width: 100%;">
                  <option value="">--Select Position--</option>
                      @foreach($positions as $position)
                        <option  value="{{$position->id}}">{{$position->position_name}}</option>
                      @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" value="" name="password" style="width: 100%;">
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