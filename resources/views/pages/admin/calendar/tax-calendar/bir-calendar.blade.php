<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
    <script defer src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script defer src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script defer src= "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>

    document.addEventListener('DOMContentLoaded', function() {       
        
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
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
                textColor: 'black' // a non-ajax option
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
        });
        calendar.render();
    });

    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>