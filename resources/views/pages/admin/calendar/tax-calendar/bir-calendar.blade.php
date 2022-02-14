
@extends('layout.master')
@section('title')
    Calendar
@endsection
@section('content')

<div class="content"> 
    <div class="container-fluid"  >
   
        @if (\Session::has('success'))
            
            <div class="alert alert-success" style="fade: out 0.5;">
            <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif
           
        <div class="row">
            <div class="mt-2" style ="width: 80%;" >
                <div class="response"></div>
                <div id='calendar'></div>  
            </div>
        </div>
    </div>  
</div>

<!-- Add BIR REMINDER Modal -->
<div class="modal" id="addBIR" tabindex="-1" role="dialog" aria-labelledby="addBIRTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addBIRTitle">Create Tax Deadline</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="smallBody" style="margin-left: 17%;">
                    <div>
                    <form method="POST" action="{{route('post-reminder')}}" id="addBIRForm">
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
                                <input class="date form-control" type="date"  id="startdate" name="startdate">   
                            </div>
                        </div>
                        <div class="row">
                        
                            <div class="form-group col-md-4">
                                <label  for="End Date" class="col-form-label"> End Date : </label>  
                                <input class="date form-control" type="date"   id="enddate" name="enddate">   
                            </div>
                        </div>
                        <div class="row">
                        
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-success saveBtn"  value="createBIR">Save Deadline</button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {       
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            })
            
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl,{
                headerToolbar: {
                    start: 'today', 
                    center: 'title',
                    end: 'prevYear prev,next nextYear'
                },
                initialView: 'dayGridMonth',
                selectable: true, 
                select: function(info) {
                    
                    $('#saveBtn').val("createReminder");
                    $('#addBIRForm').trigger('reset');
                    $('#headingsModal').html('Add New Reminder');
                    $('#addBIR').modal('show');

                      
                },     
                events:function(info, successCallback, failureCallback){
                   
                    
                    var reminder = info.reminder;
                    var start = info.start_date;
                    var end = info.end_date;
                    // console.log(reminder,start,end);
                    
                    $.ajax({
                        url: '/TaxEvent',
                        method: "GET", 
                        contentType: 'application/json',          
                       data:{
                           'reminder': reminder,
                           'start': start,
                           'end': end ,
                       },
                        success: function (response) {
                            var events = [];
                            
                            // console.log(response);

                            $.each(response, function(index, element) {
                                events.push({
                                    title: element.reminder,
                                    start: element.start,
                                    end: element.end,
                                    

                                });
                            });
                            successCallback(events); 
                                              
                        },
                                          
                    });                
                },         
            });
            
        calendar.render();     
        
        calendar.refetchResources();
        

    });

   
</script>

@endsection
