<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{csrf_token() }}">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
       
          selectable: true,
          initialView: 'dayGridMonth',
          eventSources:[{
              url: '/getTaxEvent',
              color: 'yellow',    // an option!
              textColor: 'black'  // an option!
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
                body: JSON.stringify({reminder, eventDate}),
                headers:{
                    'Content-Type': 'application/json',
                    'X-CSRF': csrfToken
                },
            })
            .then(e=> {
                console.log('success!');

                calendar.refetchEvents();
            })
        }


        });
        calendar.render();
      });

    </script>
  </head>
  <style>
      body{
          padding: 5rem 10rem;
      }
  </style>
  <body>
      <center>
    <div  id='calendar'></div>
    </center>
  </body>
</html>