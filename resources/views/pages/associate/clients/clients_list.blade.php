<!DOCTYPE html>
<html>
<head>
    <title>Clients</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container mt-5">
    <a href="{{ route ('CreateNewClient')}}"><button type="button" class="btn btn-outline-primary mb-3">Add New Client</button></a>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>ID</th>
                        <th>Client Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>OCN</th>
                        <th>Mode of Filing</th>
                        <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
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
        ajax: "{{ route('clients.list') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'client_name', name: 'client_name'},
                  {data: 'contact_number', name: 'contact_number'},
                  {data: 'email', name: 'email'},
                  {data: 'ocn', name: 'ocn'},
                  {data: 'mode_of_payment_id', name: 'mode_of_payment'},
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