
@extends('layout.master')

@section('title')
    Calendar
@endsection

@section('content')

@include('pages.admin.sidebar')


<div class="siderbar_main toggled "> 
    <div class="page-content mt-5 m-3 pr-2" style="height: 40px; width:80%; ">
    <a class="btn btn-success" id="smallButton" data-target="#smallModal" href="{{ route('create-deadline') }}"  data-attr="{{ route('create-reminder') }}" ><i class="fa fa-plus" data-bs-toggle="modal" data-bs-target="#addReminder"></i><span>  Add Deadline</span></a>
    <a class="btn btn-info"  href="{{route('list-deadline')}}">
        <i class="fa fa-sticky-note" ></i><span> List of Internal Deadlines </span><span class="badge pull-right bg-danger me-3 mt-2"></span>
    </a>  
    
    
            @if (\Session::has('success'))
            
                <div class="alert alert-success" style="fade: out 0.5;">
                <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
        <div class="row">
            <div class="mt-5" style ="width: 58%" >
            
            
                <div class="response"></div>
                <div id='calendar'></div>  
            
 
                 
            </div>
        </div>
        <div class="container vertical-scrollable" > 
       
            <div class="card text-muted list">
            <strong  >Internal Deadlines</strong>
              <div class="cont" id="list">
                 <div class="deads" id="try"></div>
              </div>
              
                
            </div> 
        </div> 

    </div> 

</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {  
      var SITEURL = "{{url('/display-deadline')}}";     
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            })
            
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl,{
                
                
                events: SITEURL + "display-deadline",
                eventRender: function (event, element, view) {
                  if (event.allDay === 'true') {
                  event.allDay = true;
                  } else {
                  event.allDay = false;
                  }
                },
                displayEventTime: true,
                eventDisplay: true,
                initialView: 'dayGridMonth',
                selectable: true,     
                events:function(startDate){

                    var eventDate = startDate.end;
                    console.log(eventDate);
                    const date = new Date(eventDate);
                    var month =(date.getMonth())
                    var year = (date.getFullYear()); // (January gives 0)
                    // console.log(year);  
                    // console.log(month);                      
                    $.ajax({
                        url: '/ajax-deadline',
                        method: "GET", 
                        dataType: 'JSON',          
                        data: {
                            'month' : month,
                            'year': year,
                        },
                        success: function (response) { 
                            var events = [];
                            if ($.trim(response) == '' ) {
                                //$('#try').append(('<li>')+ 'No deadlines for this month');
                                    document.getElementById("try").innerHTML = (('<li>')+ 'No deadlines for this month');                           
                            } 
                            else  {                             
                                $.each(response, function(index, element) {                            
                                    events.push({
                                        title: element.title,
                                        start: element.deadline, 
                                    });                                    
                                        $('#try').append(('<strong>') + element.deadline  +('<span>')+('<li>')  + element.title   );                                                                             
                                });                            
                            }                          
                        },                    
                    });                
                },         
            });
            
        calendar.render();     
        calendar.addEventSource( '/getTaxEvent' )
        // calendar.refetchEvents();
        

    });
    // $('#exampleModal').on('show.bs.modal', function (event) {
    //     var button = $(event.relatedTarget);
    //     event.preventDefault();
    //     let href = $(this).attr('data-attr');
    //     $.ajax({
    //         url: href,
    //         beforeSend: function() {
    //             $('#loader').show();
    //         },
    //         // return the result
    //         success: function(result) {
    //             $('#smallModal').modal("show");
    //             $('#addReminderForm').html(result).show();
    //         },
    //         complete: function() {
    //             $('#loader').hide();
    //         },
    //         error: function(jqXHR, testStatus, error) {
    //             console.log(error);
    //             alert("Page " + href + " cannot open. Error:" + error);
    //             $('#loader').hide();
    //         },
    //         timeout: 8000
    //     })
    // });


   
</script>
@endsection
