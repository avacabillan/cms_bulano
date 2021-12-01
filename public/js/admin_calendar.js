$(document).ready(function () {
   
    var SITEURL = "{{ url('/') }}";
      
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      
    var calendar = $('#calendar').fullCalendar({
                        editable: true,
                        reminders: SITEURL + "/fullcalendar",
                        displayEventTime: false,
                        editable: true,
                        eventRender: function (reminder, element, view) {
                            if (reminder.allDay === 'true') {
                                reminder.allDay = true;
                            } else {
                                reminder.allDay = false;
                            }
                        },
                        selectable: true,
                        selectHelper: true,
                        select: function (start, end, allDay) {
                            var title = prompt('Reminder Title:');
                            if (title) {
                                var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                                var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                                $.ajax({
                                    url: SITEURL + "/fullcalendarAjax",
                                    data: {
                                        title: reminder,
                                        start: start,
                                        end: end,
                                        type: 'add'
                                    },
                                    type: "POST",
                                    success: function (data) {
                                        displayMessage("Reminder Created Successfully");
      
                                        calendar.fullCalendar('renderEvent',
                                            {
                                                id: data.id,
                                                title: reminder,
                                                start: start,
                                                end: end,
                                                allDay: allDay
                                            },true);
      
                                        calendar.fullCalendar('unselect');
                                    }
                                });
                            }
                        },
                        eventDrop: function (reminder, delta) {
                            var start = $.fullCalendar.formatDate(reminder.start, "Y-MM-DD");
                            var end = $.fullCalendar.formatDate(reminder.end, "Y-MM-DD");
      
                            $.ajax({
                                url: SITEURL + '/fullcalendarAjax',
                                data: {
                                    title: reminder.title,
                                    start: start,
                                    end: end,
                                    id: reminder.id,
                                    type: 'update'
                                },
                                type: "POST",
                                success: function (response) {
                                    displayMessage("Reminder Updated Successfully");
                                }
                            });
                        },
                        eventClick: function (reminder) {
                            var deleteMsg = confirm("Do you really want to delete?");
                            if (deleteMsg) {
                                $.ajax({
                                    type: "POST",
                                    url: SITEURL + '/fullcalendarAjax',
                                    data: {
                                            id: reminder.id,
                                            type: 'delete'
                                    },
                                    success: function (response) {
                                        calendar.fullCalendar('removeReminders', reminder.id);
                                        displayMessage("Reminder Deleted Successfully");
                                    }
                                });
                            }
                        }
     
                    });
     
    });
     
    function displayMessage(message) {
        toastr.success(message, 'Reminder');
    } 
      