
@extends('layout.master')

@section('title')
    Edit Deadline
@endsection

@section('content')


    <div class="container">
      <br/>
      <form method="POST" action="{{route('update-deadline',$deadline->id)}}">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Title">Title:</label>
            <input type="text" class="form-control" value="{{$deadline->title}}" name="title">
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <strong> Deadline : </strong>  
            <input class="date form-control" value="{{$deadline->deadline}}" type="date"  id="deadline" name="deadline">   
        </div>
        <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <strong> Assign Tax Form </strong>  
        <select name="taxform" class="form-control">
        
            @foreach($forms as $taxform)
              <option value="{{$taxform->id}}">{{$taxform->tax_form_no}}</option>
            @endforeach
        </select> 
    </div>
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
    <script type="text/javascript">  
        $('#startdate').datepicker({ 
            autoclose: true,   
            format: 'yyyy-mm-dd'  
         });
         $('#enddate').datepicker({ 
            autoclose: true,   
            format: 'yyyy-mm-dd'
         }); 
    </script>
@endsection