
@extends('layout.master')

@section('title')
    Edit Reminder
@endsection

@section('content')


<div class="container">

  <form method="POST" action="{{route('update-reminder',$reminder->id)}}">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="Title">Title:</label>
        <input type="text" class="form-control" value="{{$reminder->reminder}}" name="reminder">
      </div>
    </div>
    
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <strong> Start Date : </strong>  
        <input class="form-control" type="date"  value="{{$reminder->start}}"  id="startdate" name="start_date">   
    </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <strong> End Date : </strong>  
        <input class="form-control" type="date" value="{{$reminder->end}}"   id="enddate" name="end_date">   
    </div>
    </div>
    
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <button type="submit" class="btn btn-success">Update Reminder</button>
      </div>
    </div>
  </form>
</div>
 @endsection