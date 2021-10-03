<!DOCTYPE html>
<html>
<head>
    <title>Associate</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container mt-5">
    <a href="{{ route ('CreateNewAssociate')}}"><button type="button" class="btn btn-outline-primary mb-3">Add New Associate</button></a>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Associate Name</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>Department</th>
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
        ajax: "{{ route('associates_list') }}",
              columns: [
                  {data: 'id', name: 'id', orderable: false},
                  {data: 'associate_name', name: 'assoc_name', orderable: false},
                  {data: 'contact_no', name: 'contact_no', orderable: false},
                  {data: 'email', name: 'email', orderable: false},
                  {data: 'assoc_address_id', name: 'assoc_address', orderable: false},
                  {data: 'assoc_department_id', name: 'assoc_department', orderable: false},
                  {data: 
                    'actions',
                    name: 'actions', 
                    orderable: false, 
                    searchable: true
                  },
        ]
    });
    
  });
</script>
</html>