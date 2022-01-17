
@extends('layout.master')

@section('title')
    Add Tax Reminder
@endsection

@section('content')


<form method="POST" action="{{route('post-reminder')}}" id="addReminderForm">
    @csrf
    @method('GET')
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="Title">Title:</label>
        <input type="text" class="form-control" name="title">
      </div>
    </div>
  
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <strong> Start Date : </strong>  
        <input class="date form-control" type="date"  id="startdate" name="startdate">   
    </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <strong> End Date : </strong>  
        <input class="date form-control" type="date"   id="enddate" name="enddate">   
    </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <button type="submit" class="btn btn-success saveBtn"  value="createReminder">Add Event</button>
      </div>
    </div>
</form>

@endsection
