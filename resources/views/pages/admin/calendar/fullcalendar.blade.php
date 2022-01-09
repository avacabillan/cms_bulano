
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
            <center>
                <div id='calendar'></div>
            </center>
            </div>
        </div>
    
        <div class="container vertical-scrollable" > 
       
            <div class="row text-muted">
            <strong class="d-block h6 my-2 pb-2 border-bottom">Deadlines for this month</strong>
                @foreach ($dates as $reminder)

                <li>{{$reminder->reminder}}</li>
                @endforeach
                
            </div> 
            </div> 

    </div> 

</div>









<script>

      document.addEventListener('DOMContentLoaded', function() {

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
         
            selectable: true,
            initialView: 'dayGridMonth',
            eventSources:[{
            url: '/getTaxEvent',
            
            }],
      
            select:function(startDate){
                let eventDate = startDate.startStr
                let reminder = prompt ('Add new reminder!')
                const month = new Date(eventDate);
                console.log(month.getMonth(),month.getFullYear()); // (January gives 0)
               
                

                if(reminder == null || reminder == ''){
                    return;
                }
                fetch('/createTaxEvent',{
                    method:'post',
                    data:{
                            month: month.getMonth(),
                            year: month.getFullYear(),
                    },
                    body: JSON.stringify({reminder, eventDate}),
                    headers:{
                        'Content-Type': 'application/json',
                        'X-CSRF': csrfToken
                        
                    },
                })
               
                
                .then(e=> {
                    console.log(data);

                    calendar.refetchEvents();
                })
               
           
            },

        });
        calendar.render();
      });

    </script>
@endsection
