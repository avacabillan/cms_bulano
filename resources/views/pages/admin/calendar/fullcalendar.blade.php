
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <!-- <script src="{{asset('js/admin_calendar.js')}}"></script> -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="container">
    <div class="jumbotron">
   
        <a class="btn btn-success" href="{{route('create-reminder')}}"  data-toggle="modal" data-target="#add-event">Add Reminder</a>
        <a class="btn btn-info" href="{{route('view-reminders')}}">View Reminders</a><br><br>
            @if (\Session::has('success'))
                <div class="alert alert-success" style="fade: out 0.5em;">
                <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: #2e6da4; color:white;">
                        Full Calendar
                    </div>

                    <div class="panel-body" id="calendar">
                        {!! $calendar->calendar() !!}
                        {!! $calendar->script() !!}
                        
                            
                    </div>
                </div>
            </div>
        </div>


    </div> 
</div>
</body>
</html>
