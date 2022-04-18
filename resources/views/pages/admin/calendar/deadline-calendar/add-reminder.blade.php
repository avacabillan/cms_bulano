
@extends('layout.master')

@section('title')
    Add Tax Reminder
@endsection

@section('content')


<!-- Add Bir Deadline Modal -->
<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
      <div class="modal-content">
          
          <div class="modal-header">
              <h4 class="modal-title" id="userCrudModal"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>

          <div class="modal-body">
              <form id="companydata">
          
              <form method="POST" action="{{route('post-reminder')}}" id="addReminderForm">
                  @csrf
                  @method('GET')
                  <div class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                      <label for="Title">Title:</label>
                      <input type="text" class="form-control" id="title">
                    </div>
                  
                
                  </div>
                  <div class="row ">
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
                     <input type="submit" value="Submit" id="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">

                    </div>
                  </div>
              </form>
          
          </div>
      </div>
  </div>
</div>
  

@endsection
