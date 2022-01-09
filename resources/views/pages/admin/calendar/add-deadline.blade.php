<!-- createevent.blade.php -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Add reminder</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
</head>
  
<body>
    <div class="container">
          
          <div class="modal fade" id="calendarModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add Reminder</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
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
                    
                      <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                          <strong> Color : </strong>  
                          <input class="color form-control"  type="color" id="color" name="color">   
                      </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                          <strong> Start Date : </strong>  
                          <input class="date form-control"   id="startdate" name="startdate">   
                      </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                          <strong> End Date : </strong>  
                          <input class="date form-control"   id="enddate" name="enddate">   
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
    </div>
  <script type="text/javascript">  
          $('#startdate').datepicker({ 
              autoclose: true,   
              format: 'yyyy-mm-dd'  
          });
          $('#enddate').datepicker({ 
              autoclose: true,   
              format: 'yyyy-mm-dd'
          }); 
  </script>
    
  </body>
</html>
