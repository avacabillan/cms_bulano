<!DOCTYPE html>
<html>
<head>
    <title>VAT</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>

<div class="siderbar_main toggled">
  <div class="page-content mt-5" style="margin: top 160px;">
 
  <div class="container mt-3 pt-5"  style="height:50%; width: 70%; margin-left: 25%;" >
      
      <div>
    
      <div>
        <h2>VAT</h2><hr>
      </div>
      <table class="table table-bordered yajra-datatable" id="assoc" style="height:50%; width: 60%; margin-left: 15%;" >
          <thead>
                <th>File Name</th>
                <th>Description</th>
                <th>File Type</th>
                <th>Action</th>
          </thead>
          <tbody>

          </tbody>
        </table>
    </div>
  </div>
</div>
   
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('vatTax') }}",
        columns: [
            {data: 'file_name', name: 'file_name'},
            {data: 'description', name: 'description'},           
            {data: 'file_type', name: 'file_type'},

            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>
</html>
   