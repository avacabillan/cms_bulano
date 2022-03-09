
  
@extends('layout.master')
@section('title')
    Edit Associate
@endsection
@section('content')

<div class="content-header">
  <div class="container-fluid">

    <div class="card card-dark card-outline card-default">
      <div class="card-header">
        <h3 class="card-title">Edit Associates</h3>
    </div>

    <div class="card-body">
      <div class="row">

      <form action="{{route('update', $associate->id)}}" id="editAssocForm" name="editAssocForm" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$associate->id}}" >

        <div class="col-md-6">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" value="{{$associate->name}}" name="assoc_name" >
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" value="{{$associate->email}}" name="assoc_email" >
          </div>
        </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control"  value="{{$associate->name}}"  name="assoc_name" style="width: 100%;">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" value="{{$associate->email}}" name="assoc_email" style="width: 100%;">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>SSS Number/ Goverment ID No.</label>
                <input type="text" class="form-control" value="{{$associate->sss_no}}" name="assoc_sss" style="width: 100%;">
              </div>
              <div class="form-group">
                <label>Contact No.</label>
                <input type="text" class="form-control" value="{{$associate->contact_number}}" name="assoc_contact" style="width: 100%;">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Birthday</label>
                <input type="date" class="form-control"  value="{{$associate->birth_date}}"  name="assoc_birthdate" style="width: 100%;">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Complete Address</label>
                <input type="text" class="form-control" value="{{$associate->address}}" name="assoc_address" style="width: 100%;">
              </div>
            </div>
          </div>
           
        <div class="form-group">
          <label class="form-label"><b>Department</b></label>
          <select name="department" class="form-control" style="width: 100%;">
           
          <option value="">--Select Department--</option>
          
              @foreach($departments as $department)
              <option value="{{$department['id']}}"  {{ $associate->departments->id == $department['id'] ? 'selected="selected"' : '' }}>{{$department->department_name}}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label class="form-label"><b>Position</b></label>
          <select name="position" class="form-control" style="width: 100%;">
          <option value="">--Select Position--</option>
              @foreach($positions as $position)
              <option value="{{$position['id']}}"  {{ $associate->positions->id == $position['id'] ? 'selected="selected"' : '' }}>{{$position->position_name}}</option>
              @endforeach
          </select>
      </div>   

             <div class="edit_associate" >
              <input type="submit" value="Update" class=" mt-2 btn btn-success">
            </div>
          
        </form>
      </div>
    </div>

  </div>
</div>
@stop