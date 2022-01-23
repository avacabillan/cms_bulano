
@extends('layout.master')

@section('title')
    Calendar
@endsection

@section('content')

@include('pages.admin.sidebar')


<div class="siderbar_main toggled "> 
    <div class="page-content mt-5 m-3 pr-2" style="height: 40px; width:80%; ">
    <a class="btn btn-success" id="smallButton" data-target="#smallModal" href="{{ route('create-reminder') }}"  data-attr="{{ route('create-reminder') }}" ><i class="fa fa-plus" data-bs-toggle="modal" data-bs-target="#addReminder"></i><span>  Add Reminder</span></a>
     
    
    
            @if (\Session::has('success'))
            
                <div class="alert alert-success" style="fade: out 0.5;">
                <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
           
        <div class="row">
            <div class="mt-2" style ="width: 85%; margin-left:20%" >
            
            
                <div class="response"></div>
                <div id='calendar'></div>  
  
            </div>
        </div>
        
   </div> 
  
</div>
<!-- Add BIR REMINDER Modal -->
<!-- <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
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
                    </div>
                </div>
            </div>
        </div>
    </div> -->

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
        
        // calendar.refetchEvents();
        

    });

   
</script>

@endsection
