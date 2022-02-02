
@extends('layout.master')

@section('title')
    Calendar
@endsection

@section('content')



<div class="siderbar_main toggled "> 
    <div class="page-content mt-5 m-3 pr-2" style="height: 40px; width:80%; ">
   
          
            
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
         <div>
         <p>
            <input type='checkbox' id='drop-remove' />
            <label for='drop-remove'>remove after drop</label>
        </p>
         </div>           
       
        </div>
         
           
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
            
            
            var Draggable = FullCalendar.Draggable;
            var containerEl = document.getElementById('external-events');
            var calendarEl = document.getElementById('calendar');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');
            new Draggable(containerEl, {
                itemSelector: '.fc-event',
                eventData: function(eventEl) {
                return {
                    title: eventEl.innerText
                };
                }
            });
            var calendar = new FullCalendar.Calendar(calendarEl,{
                headerToolbar: {
                    start: 'today', 
                    center: 'title',
                    end: 'prevYear prev,next nextYear'
                },
                
                timeZone: 'UTC',
                initialView: 'dayGridMonth',
                selectable: true, 
                editable: true,
                droppable: true,
                dayMaxEvents: true,
                overLap:true,
                drop: function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                }, 
                select: function(info) {
                    
                    $('#saveBtn').val("createReminder");
                    $('#addReminderForm').trigger('reset');
                    $('#headingsModal').html('Add New Reminder');
                    $('#addReminder').modal('show');

                      
                },   
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
        
        calendar.refetchEvents();
        

    });
   
</script>

@endsection
