
@extends('layout.master')

@section('title')
    Calendar
@endsection

@section('content')


<div class="content"> 
    <div class="d-grid gap-2 d-md-block" style="margin-left: 5%;">
        <a href="{{route('display-internal-deadlines')}}" class="btn btn-info mt-3" >Deadlines</a>
        <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add BIR Deadline
          </button>
    </div>
    <div class="container-fluid  pr-2" >
   
        <div class="row">
            
            <div class="calendar" style ="width:65%; margin-left:2%;" >
            
            
                <div class="response"></div>
                <div id='calendar'></div>  
                
  
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

<!-- Add BIR Deadline Modal -->
<div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Create BIR Deadline</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('post-reminder')}}" id="addReminderForm">
                @csrf
                @method('GET')
                <div class="row row-cols-lg-auto g-3 align-items-center">
                  <div class="col-12"></div>
                  <div class="form-group">
                    <label for="Title">Title:</label>
                    <input type="text" class="form-control" name="reminder">
                  </div>
                
              
                  <div class="col-12"></div>
                  <div class="form-group">
                    <strong> Start Date : </strong>  
                    <input class="date form-control" type="date"  id="startdate" name="startdate">   
                    </div>
               
                  <div class="col-12"></div>
                  <div class="form-group">
                    <strong> End Date : </strong>  
                    <input class="date form-control" type="date"   id="enddate" name="enddate">   
                 </div>
                </div>
            
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="Submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  
<!-- Add Internal Deadline Modal -->
<div class="modal" id="addReminder" tabindex="-1" role="dialog" aria-labelledby="addReminderTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 30rem;">
                <div class="modal-header">
                <h5 class="modal-title" id="addReminderTitle">Create Reminder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="smallBody" >
                
                <form method="POST" action="{{route('store-deadline')}}" >
                    @csrf
                    @method('GET')
                    
                                        
                        <div class="form-group ">
                            <label for="Title" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" name="title"><br>
                            <label for="Start Date" class="col-form-label"> Start Date : </label>  
                            <input class="date form-control" type="date"  id="startdate" name="start_date">  
                            <label  for="End Date" class="col-form-label"> End Date : </label>  
                            <input class="date form-control" type="date"   id="enddate" name="end_date">   
                        
                      
                   
                   
                        <div class="form-group ">
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
@include('sweetalert::alert')
<script>
    document.addEventListener('DOMContentLoaded', function() {       
        $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
        });
        
   

        
    
        var calendarEl = document.getElementById('calendar');
    
        var calendar = new FullCalendar.Calendar(calendarEl,{
            headerToolbar: {
                start: 'today', 
                center: 'title',
                end: 'prevYear prev next nextYear',
            },
            timeZone: 'UTC',
            initialView: 'dayGridMonth',   
            selectable:true,
            eventSources: [      
                {
                    url: "{{ route('getTaxEvents') }}",
                    success: function(response) { 
                        // Instead of returning the raw response, return only the data 
                        // element Fullcalendar wants
                        var events = [];
                
                            $.each(response, function(index, element) {
                                events.push({
                                    title: element.reminder,
                                    start: element.start_time,
                                    end: element.end_time,
                                    

                                });
                            });
                        return events; 
                },
                error: function () {
                alert('there was an error while fetching events!');
                },
                color: '#E5664B',   // a non-ajax option
                textColor: 'white' // a non-ajax option
                },
                {
                    url: "{{ route('getReminder') }}",
                    type: 'GET',
                    /*data: {
                        custom_param1: 'something',
                        custom_param2: 'somethingelse'
                    },*/
                    success: function(res) { 
                            // Instead of returning the raw response, return only the data 
                            // element Fullcalendar wants
                            var event = [];
                    
                                        $.each(res, function(index, element) {
                                            event.push({
                                                title: element.title,
                                                start: element.start_date,
                                                end: element.end_date,
                                                

                                            });
                                        });
                            return event; 
                    },
                    error: function () {
                        alert('there was an error while fetching events!');
                    },
                    color: '#4B98E5',   // a non-ajax option
                    textColor: 'white' // a non-ajax option
                }
            
               
            ],
          
            select: function(info) {
                
                $('#saveBtn').val("createReminder");
                $('#addReminderForm').trigger('reset');
                $('#headingsModal').html('Add New Reminder');
                $('#addReminder').modal('show');

                    
            },  
           
           
        });
        
        
        calendar.render();     
       // eventSources.refetch();
      // calendar.refetchEvents();
         calendar.getEventSources();

    });


</script>
 

    


@endsection
