
@extends('layout.master')

@section('title')
    Calendar
@endsection

@section('content')

@include('pages.admin.sidebar')


<div class="siderbar_main toggled "> 
    <div class="page-content mt-5 m-3 pr-2" style="height: 40px; width:80%; ">
    <a class="btn btn-success" id="smallButton" data-target="#smallModal" href="{{ route('create-deadline') }}"  data-attr="{{ route('create-reminder') }}" ><i class="fa fa-plus" data-bs-toggle="modal" data-bs-target="#addReminder"></i><span>  Add Reminder</span></a>
     
    
    
            @if (\Session::has('success'))
            
                <div class="alert alert-success" style="fade: out 0.5;">
                <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
           
   
        <div class="row">
            <div class="mt-2" style ="width: 75%; margin-left:10%" >
            
            
                <div class="response"></div>
                <div id='calendar'></div>  
  
            </div>
        </div>
        
   </div> 
      
   <div class="container vertical-scrollable" > 
       
       <div class="card  list">
       <strong class="pb-3" >Legends</strong>
         <div class="cont" id="list">
         
         <span class="dot2 pb-2"></span><strong>  Automated Email for Reminding</strong><br>
         <span class="dot3 pb-2"></span><strong>  Sending Email to Client</strong><br>
         <span class="dot1 pb-2"></span><strong>  Internal Deadline</strong><br>
         </div>
         
           
       </div> 
    </div> 
    <div class="container2 vertical-scrollable" > 
       
       <div class="card2  list">
       <strong class="pb-3" >Legends</strong>
         <div class="cont" id="list">
         
         <div id='external-events'>
        <p>
        <strong>Recent Reminders</strong>
        </p>
        @foreach ($deadlines as $deadline)
        <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
            <div class='fc-event-main'>{{$deadline->title}}</div>
        </div>
        @endforeach

        <p>
            <input type='checkbox' id='drop-remove' />
            <label for='drop-remove'>remove after drop</label>
        </p>
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
                   
                    var containerEl = document.getElementById('external-events');
                    var title = info.title;
                    var start_date = info.start_date;
                    var end_date = info.end_date;
                    // console.log(reminder,start,end);
                    
                    $.ajax({
                        url: '/getDeadlines',
                        method: "GET", 
                        contentType: 'application/json',          
                       data:{
                           'reminder': title,
                           'start': start_date,
                           'end': end_date ,
                       },
                        success: function (response) {
                            var events = [];
                            
                            // console.log(response);

                            $.each(response, function(index, element) {
                                events.push({
                                    title: element.title,
                                    start: element.start_date,
                                    end: element.end_date,
                                    

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
