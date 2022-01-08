
@extends('layout.master')

@section('title')
    Calendar
@endsection

@section('content')

@include('pages.admin.sidebar')

@section('scripts')
<div class="siderbar_main toggled "> 
    <div class="page-content mt-5 m-3 pr-2" style="height: 40px; width:80%; ">
    <a class="btn btn-success" href="{{route('create-reminder')}}">Add reminder</a>
        
        
    
            @if (\Session::has('success'))
                <div class="alert alert-success" style="fade: out 0.5;">
                <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
        <div class="row">

        
            <div class="col-md-11 col-md-offset-2 pt-3" >
                <div class="panel panel-default">
                    <div class="panel-heading text-center" style="background: #2e6da4; color:white;" >
                        <h3>Calendar</h3>
                    </div>

                    <div class="panel-body" id="calendar">
                        {!! $calendar->calendar() !!}
                        {!! $calendar->script() !!}
                        
                            
                    </div>
                </div>
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


@endsection
<!-- <script>
    document.addEventListener('DOMContentLoaded',function(){
       
        $('#calendar').fullCalendar().on('dateClick',function(){ 
            console.log('1')
            
        })
       
    


        // dateClick: function(info) {
        // alert('Clicked on: ' + info.dateStr);
        // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
        // alert('Current view: ' + info.view.type);
        // // change the day's background color just for fun
        // info.dayEl.style.backgroundColor = 'red';
    

        $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        })


        $.ajax({
        method: "POST",
        url: "{{route('fullcalendar.ajax')}}",
        data: { month: "01",
                year:"2022"
            }
        }).done(function() {
        $( this ).addClass( "done" );
        });
    })
   
</script> -->
@endsection
