<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - Daterange Filter in Datatables with Server-side Processing</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  <script defer src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- used font awesome -->

</head>
<body>

  <div class="container" style="width: 60%; margin-left:20%; margin-top: 2%;">   
            @if (\Session::has('success'))
                <div class="alert alert-success" style="fade: out 0.5em;">
                <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
            <br />
            <div class="row input-daterange">
                <div class="col-md-4">
                    <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Deadline From " readonly />
                </div>
                <div class="col-md-4">
                    <input type="text" name="to_date" id="to_date" class="form-control" placeholder="Deadline To" readonly />
                </div>
                <div class="col-md-4">
                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                </div>
            </div>
            <br />
   <div class="table-responsive" style="widht: 60%;">
    <table class="table table-bordered table-striped" id="internal_table" >
           <thead>
            <tr>
                <th>Reminder</th>
                <th>Internal Deadline</th>
                <th>Action</th>
                
            </tr>
           </thead>
       </table>
   </div>
  </div>

</body>
</html>
 
<script>
$(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format:'yyyy-mm-dd',
  autoclose:true
 });
 
 load_data();
 
 function load_data(from_date = '', to_date = '')
 {
  $('#internal_table').DataTable({
   processing: true,
   serverSide: true,
   ajax: {
    url:'{{ route("list-deadline") }}',
    data:{from_date:from_date, to_date:to_date}
    
   },
   columns: [
    {
     data:'title',
     name:'title',
     orderable: false 
    },
    {
     data:'deadline',
     name:'deadline',
     orderable: false

    },
    {
     data:'action',
     name:'action',
     orderable: false
    }
    
    
   ]
  });
 }
 
 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  if(from_date != '' &&  to_date != '')
  {
   $('#internal_table').DataTable().destroy();
   load_data(from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });
 
 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  $('#internal_table').DataTable().destroy();
  load_data();
 });
 
});
</script>


