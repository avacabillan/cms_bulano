
@extends('layout.master')

@section('title')
    Calendar
@endsection

@section('content')


<div class="content"> 
    <div class="d-grid gap-2 d-md-block" style="margin-left: 5%;">
        <a href="{{route('assoc-display-internal-deadlines')}}" class="btn btn-info mt-3" >Deadlines</a>
       
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
            eventSources: [      
                {
                    url: "{{ route('assoc-getTaxEvents') }}",
                    type: 'GET',
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
                    url: "{{ route('assoc-getReminder') }}",
                    type: 'GET',
                 
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
          

           
        });
        
        
        calendar.render();     
       // eventSources.refetch();
      // calendar.refetchEvents();
         calendar.getEventSources();

    });


</script>
 

    


@endsection
