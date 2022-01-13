
@extends('layout.master')

@section('title')
    Calendar
@endsection

@section('content')

@include('pages.admin.sidebar')


<div class="siderbar_main toggled "> 
    <div class="page-content mt-5 m-3 pr-2" style="height: 40px; width:80%; ">
    <a class="btn btn-success" id="addReminder" href="{{route('create-reminder')}}" ><i class="fa fa-plus" ></i><span>  Add Deadline</span></a>
    <a class="btn btn-info"  href="{{route('view-reminders')}}">
        <i class="fa fa-sticky-note" ></i><span> List of BIR Deadlines </span><span class="badge pull-right bg-danger me-3 mt-2"></span>
    </a>  
    
    
            @if (\Session::has('success'))
                <div class="alert alert-success" style="fade: out 0.5;">
                <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
        <div class="row">
            <div class="mt-5" style ="width: 58%" >
                <div  id='calendar'></div>      
            </div>
        </div>
        <div class="container vertical-scrollable" > 
       
            <div class="card text-muted">
            <strong  >Deadlines for this month</strong>
              
               <div class="list" id="try"></div>
                
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
                eventSources: {
                    url:'/getTaxEvent',
                    color: 'blue'
                },
                lazyFetching:true,
                selectable: true,
                select:function(startDate){
                    // console.log(startDate);
                    var eventDate = startDate.startStr;
                    const date = new Date(eventDate);
                    var month =(date.getMonth())
                    var year = (date.getFullYear()); // (January gives 0)
                   // console.log(year);  
                    // console.log(month);                      
                    $.ajax({
                        url: '/fullcalendar/ajax',
                        method: "GET", 
                        dataType: 'JSON',          
                        data: {
                            'month' : month,
                            'year': year,
                            

                        },
                        success: function (response) { 
                            var events = [];
                            if ($.trim(response) == '' ) {
                                $('#try').append(('<li>')+ 'No deadlines for this month');
                            } 
                            else { 
                                
                                $.each(response, function(index, element) {                            
                                    events.push({
                                        title: element.reminder,
                                        start: element.start, 
                                    });
                                    $('#try').append(('<li>')  + element.reminder + " " +element.start );
                                    console.log(events);                            
                                });
                            } 
                           
                            
                        }
                    });
                    
                }              
            });
        calendar.render();
        calendar.refetchEvents();
        
 
});
</script>
@endsection
