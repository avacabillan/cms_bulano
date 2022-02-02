
@extends('layout.master')

@section('title')
    Add Tax Reminder
@endsection

@section('content')


<form method="POST" action="{{route('store-deadline')}}" >
                    @csrf
                    @method('GET')
                    <div class="row">
                                        
                        <div class="form-group col-md-4">
                            <label for="Title" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                
                    
                    <div class="row">
                    
                        <div class="form-group col-md-4">
                            <label for="Start Date" class="col-form-label"> Start Date : </label>  
                            <input class="date form-control" type="date"  id="startdate" name="start_date">   
                        </div>
                    </div>
                    <div class="row">
                    
                        <div class="form-group col-md-4">
                            <label  for="End Date" class="col-form-label"> End Date : </label>  
                            <input class="date form-control" type="date"   id="enddate" name="end_date">   
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                        <strong> Assign Tax Form </strong>  
                        <select name="taxform" class="form-control">
                        <option value="">--Select Tax Form--</option>
                            @foreach($taxForms as $taxform)
                                <option value="{{$taxform->id}}">{{$taxform->tax_form_no}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="row">
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-success saveBtn"  value="createReminder">Add Event</button>
                    </div>
                    </div>



                    <!-- <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <strong> Select According to Reminder </strong>  
                        <select name="color" class="form-control">
                            <option style="background-color: #7f9cdb;" value="#7f9cdb">Automated Email Sending</option>
                            <option style="background-color: #25df5d;" value="#25df5d">Sending Email Manually</option>
                            <option style="background-color: #ff0000;" value="#ff0000">Internal Deadline</option>           
                        </select> 
                    </div> -->
                    
                </form>

@endsection
