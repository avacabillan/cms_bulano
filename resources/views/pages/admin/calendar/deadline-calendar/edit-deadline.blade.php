
@extends('layout.master')

@section('title')
    Edit Deadline
@endsection

@section('content')


    <div class="container">
      
      <form method="POST" action="{{route('update-deadline',$deadline->id)}}">
        @csrf
        @method('PUT')
        <div class="row row-cols-lg-auto g-3 align-items-center">
          <div class="col-12"></div>
          <div class="form-group">
            <label for="Title">Title:</label>
            <input type="text" class="form-control" value="{{$deadline->title}}" name="title">
          </div>
          

          <div class="col-12"></div>
          <div class="form-group">
              <strong> Deadline </strong>  
              <input class="date form-control" value="{{$deadline->start_date}}" type="date"  id="deadline" name="start_date">   
          
          </div>
          <div class="col-12"></div>
          <div class="form-group">
              <strong> Deadline </strong>  
              <input class="date form-control" value="{{$deadline->end_date}}" type="date"  id="deadline" name="end_date">   
          
          </div>
          
          <div class="col-12"></div>
          <div class="form-group">
              <strong> Assign Tax Form </strong>  
              <select name="taxform" class="form-control">
              
                  @foreach($forms as $taxform)
                  <option value="{{$taxform['id']}}"  {{ $deadline->taxform_id == $taxform['id'] ? 'selected="selected"' : '' }}>{{$taxform->tax_form_no}}</option>
                    
                  @endforeach
              </select> 
          </div>
          
                
          <div class="col-12"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-success">Update Reminder</button>
          </div>
        </div>
      </form>
  </div>

@endsection