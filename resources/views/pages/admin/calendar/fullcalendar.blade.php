
@extends('layout.master')

@section('title')
    Calendar
@endsection

@section('content')

@include('pages.admin.sidebar')


<div class="siderbar_main toggled "> 
    <div class="page-content mt-5 m-3 pr-2" style="height: 40px; width:80%; ">
    <a class="btn btn-success" id="addReminder" href="{{route('create-reminder')}}" >Add reminder</a>
        
    
    
            @if (\Session::has('success'))
                <div class="alert alert-success" style="fade: out 0.5;">
                <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
        <div class="row">

        
            <div class="col-md-11 col-md-offset-2 pt-3" style ="width: 58%" >
            
           
                <div id='calendar'></div>
            
            </div>
        </div>
    
        <div class="container vertical-scrollable" > 
       
            <div class="row text-muted">
            <strong class="d-block h6 my-2 pb-2 border-bottom">Deadlines for this month</strong>
              
               <li id="try"></li>
                
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
            var calendar = new FullCalendar.Calendar(calendarEl, {
                
                
                lazyFetching:true,
                selectable: true,
                eventSources: [

                    // your event source
                    {
                    url: '/fullcalendar/ajax', // use the `url` property
                    color: 'yellow',    // an option!
                    textColor: 'black'  // an option!
                    }

                    // any other sources...

                ],
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
                        method: "get", 
                        dataType: 'JSON',          
                        data: {
                            'month' : month,
                            'year': year,        
                        },
                        success: function (data) {//once the request successfully process to the server side it will return result here
                        var stringified = JSON.stringify(data);
                        var parsedObj = JSON.parse(stringified);

                        console.log(data);
                        $("#try").html("Reminder:" + (Object.values(parsedObj)));
                        
                       

                       
                      
                                    
                    }
                       

                    });
                                       // calendar.refetchEvents();
                }
    
               
            });
        calendar.render();
         
    
});
</script>
@endsection
