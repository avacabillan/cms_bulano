
@extends('layout.master')
@section('title')
    Calendar
@endsection
@section('content')
@include('shared.navbar')
@include('pages.admin.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content">
    
    <a class="btn btn-success mt-3" id="smallButton" data-target="#smallModal" href="{{ route('create-reminder') }}"  data-attr="{{ route('create-reminder') }}" ><i class="fa fa-plus" data-bs-toggle="modal" data-bs-target="#addReminder"></i><span>  Add Reminder</span></a>
    <a class="btn btn-info mt-3"  href="{{route('daterange.index')}}">
        <i class="fa fa-sticky-note" ></i><span> List of BIR Deadlines </span><span class="badge pull-right bg-danger me-3 mt-2"></span>
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
            <strong  >Deadlines for this month</strong>
              <div class="cont" id="list">
                 <div class="deads" id="try"></div>
              </div>
              
                
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
                
               
            eventSources: {

              
                
                    url: '/getTaxEvent', // use the `url` property
                    color: 'yellow',    // an option!
                    textColor: 'black'  // an option!
                

                // any other sources...

            },
                
                initialView: 'dayGridMonth',
                selectable: true,     
                events:function(startDate){
                   
                    var eventDate = startDate.end;
                    // console.log(eventDate);
                    const date = new Date(eventDate);

                    var month =(date.getMonth());
                    // var day =(date.getDate());
                    var year = (date.getFullYear()); // (January gives 0)
                    // console.log(year);  
                    // console.log(month);                      
                    $.ajax({
                        url: '/fullcalendar/ajax',
                        method: "GET", 
                        dataType: 'JSON',          
                        data: {
                            // 'day': day,
                            'month' : month,
                            'year': year,
                            
                        },
                        success: function (response) { 
                            var events = [];
                            if ($.trim(response) == '' ) {
                                //$('#try').append(('<li>')+ 'No deadlines for this month');
                                    document.getElementById("try").innerHTML = (('<li>')+ 'No deadlines for this month');
                                //  var newElement = document.createElement("ul");
                                //         newElement.innerHTML = (('<li>')  + element.reminder + " " + element.start );
                                //     var myCurrentElement= document.getElementById("try");
                                //         insertAfter(newElement, myCurrentElement);
                            } 
                            else  {                             
                                $.each(response, function(index, element) {                            
                                    events.push({
                                        title: element.reminder,
                                        start: element.start, 
                                    });
                                    
                                    $('#try').append(('<strong>') + element.start  +('<span>')+('<li>')  + element.reminder   );                                                                                                                 
                                    // const content = list.innerHTML;
                                    // element.innerHTML = content ;                 
                                        //document.getElementById("try").innerHTML =  (('<li>')  + element.reminder + " " + element.start );
                                    // console.log(events);
                                                                          
                                });                            
                            }                          
                        },                    
                    });                
                },         
            });
            
        calendar.render();     
        
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
