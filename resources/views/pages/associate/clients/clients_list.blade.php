

<!DOCTYPE html>
<html>
<head>
    <title>Clients</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container mt-5">
  <button class="btn btn-outline-primary" id="btn-addClient"><i class="fas fa-plus-circle"></i> Add New Client</button>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                        <th>Client ID</th>
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
  @include('pages.associate.clients.add_client')
</body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 

  <script src="{{asset('js/associate_addClient.js')}}"></script>

<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('clients.list') }}",
              columns: [
                  {data: 'id', name: 'id', orderable: false},
                  {data: 'client_name', name: 'client_name', orderable: false},
                  {data: 'contact_number', name: 'contact_number', orderable: false},
                  {data: 'email', name: 'email', orderable: false},
                  {data: 'ocn', name: 'ocn', orderable: false},
                  {data: 'mode_of_payment_id', name: 'mode_of_payment', orderable: false},
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