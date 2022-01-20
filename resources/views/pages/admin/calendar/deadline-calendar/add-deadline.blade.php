
@extends('layout.master')

@section('title')
    Add Tax Reminder
@endsection

@section('content')


<form method="POST" action="{{route('store-deadline')}}" >
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
        <strong> Deadline : </strong>  
        <input class="date form-control" type="date"  id="deadline" name="deadline">   
    </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <strong> Assign Tax Form </strong>  
        <select name="taxform" class="form-control">
        <option value="">--Select Tax Form--</option>
            @foreach($taxforms as $taxform)
              <option value="{{$taxform->id}}">{{$taxform->tax_form_no}}</option>
            @endforeach
        </select> 
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
