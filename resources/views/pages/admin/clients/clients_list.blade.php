<!DOCTYPE html>
<html>
<head>
    <title>Clients</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
</head>
<body>
@extends('layout.master')
@section('content')
<div class="content">
    <div class="container-fluid">

  <div class="row">
    <div class="col-12">
      <div class="card card-dark card-outline me-2 ms-2">
        <div class="card-header">
          <h3 class="card-title">List of All <b>Clients</b></h3><br>
          <hr>
          <table class="table table-bordered yajra-datatable" >
            <thead >
              <th >Name</th>
              <th>Email</th>
              <th>Associate</th>
              <th >Action</th>
            </thead> 
            <tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection  


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script defer src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('ajax_clients_list')}}",
        columns: [
            
            {data: 'company_name', name: 'company_name'},
            {data: 'email_address', name: 'email_address'},
            {data: 'associates', name: 'associates'},
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
</body>
</html>
   
