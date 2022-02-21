
@extends('layout.master')

@section('title')
    Calendar
@endsection

@section('content')


<div class="content"> 

    <div class="container-fluid  pr-2" >
   
          
            
        @if ($alertFm = Session::has('success'))
            <script type="text/javascript">
                swal.fire({
                    title:'Its a big success.',
                    text:"{{Session::has('success')}}",
                    timer:4000,
                    type:'success'
                }).then((value) => {
                }).catch(swal.noop);
            </script>
        @endif
           
   
        <div class="row">
            <div class="calendar" style ="width:65%; margin-left:2%;" >
            
            
                <div class="response"></div>
                <div id='calendar'></div>  
  
            </div>
        </div>
        
   </div> 
</div>    

   <div class="container vertical-scrollable" > 
       
       <div class="card  list">
       <strong class="pb-3" >Legends</strong>
         <div class="cont" id="list">
         
         <span class="dot2 pb-2"></span><strong>  Internal Deadline</strong><br>
         <span class="dot1 pb-2"></span><strong>  BIR Deadline</strong><br>
         </div>
         
           
       </div> 
    </div> 

    


<!-- Add BIR REMINDER Modal -->
<div class="modal" id="addReminder" tabindex="-1" role="dialog" aria-labelledby="addReminderTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addReminderTitle">Create Reminder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="smallBody" style="margin-left: 17%;">
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



                    
                    
                </form>
                </div>
            </div>
        </div>
    </div>
@include('sweetalert::alert')
<script>
    document.addEventListener('DOMContentLoaded', function() {       
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            })
            var fcSources = {
       
        loadEwsEvents: {
            url: "/TaxEvent",
            type: "GET",
            color: "#FF6347",
            textColor: "#000000",
            cache: true,
            editable: false,
            disableDragging: true,
            className: "events",
            data:  {
                start: "start",
                end: "end",
                id: "id",
                title: "reminder"
            },
            error: function() {
                console.log("Error in loadEWSEvents: " + data);
            },
        }
    };
       
            var calendarEl = document.getElementById('calendar');
        
            var calendar = new FullCalendar.Calendar(calendarEl,{
                headerToolbar: {
                    start: 'today', 
                    center: 'title',
                    end: 'prevYear prev,next nextYear'
                },
                
                eventSources: [
            
                 fcSources.loadEwsEvents,
                ],
                timeZone: 'UTC',
                initialView: 'dayGridMonth',
                selectable: true, 
                editable: true,
                droppable: true,
                dayMaxEvents: true,
                overLap:true,
                
                select: function(info) {
                    
                    $('#saveBtn').val("createReminder");
                    $('#addReminderForm').trigger('reset');
                    $('#headingsModal').html('Add New Reminder');
                    $('#addReminder').modal('show');

                      
                },   
                events:function(info, successCallback, failureCallback){
                   
                   
                    var title = info.title;
                    var start_date = info.start_date;
                    var end_date = info.end_date;
                    // console.log(reminder,start,end);
                    
                    $.ajax(
                        {
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
        
        calendar.refetchEvents();
        

    });
   
</script>

@endsection
