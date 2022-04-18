
@extends('layout.master')

@section('title')
    Edit Reminder
@endsection

@section('content')


<div class="container">
  
          <form method="POST" action="{{route('update-reminder',$reminder->id)}}">
            @csrf
            @method('PUT')
            <div class="row row-cols-lg-auto g-3 align-items-center">
              <div class="col-12"></div>
              <div class="form-group">
                <label for="Title">Title:</label>
                <input type="text" class="form-control" value="{{$reminder->reminder}}" name="reminder">
              </div>
            
            
            
              <div class="col-12"></div>
              <div class="form-group">
                <strong> Start Date : </strong>  
                <input class="form-control" type="date"  value="{{$reminder->start_time}}"  id="startdate" name="start_date">   
              </div>
          
              <div class="col-12"></div>
              <div class="form-group">
                <strong> End Date : </strong>  
                <input class="form-control" type="date" value="{{$reminder->end_time}}"   id="enddate" name="end_date">   
              </div>
            
              <div class="col-12"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-success">Update Reminder</button>
              </div>
            </div>
            
          </form>
         
      
</div>
 @endsection