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
@extends('layout.master')
@section('content')
<div class="siderbar_main toggled" style="height:50%; width: 70%; margin-left: 25%;" >
  <div class="page-content mt-5" style="margin: top 160px;">

@include('pages.associate.sidebar')

      <div>
        <h2>List of All Clients</h2><hr>
      </div>
      <a type="button" class="btn btn-primary mt-2 mb-2 me-3" href="{{route('createClient')}}" style="float: right;"><i class="fas fa-plus-circle"></i>Add Client</a>
      <table class="table table-bordered yajra-datatable" style="height:50%; width: 80%; margin-left: 15%;">
          <thead >
                <th >ID</th>
                <th >Name</th>
                <th>Email</th>
                <th>Action</th>
          </thead>
          <tbody>

          </tbody>
        </table>
    </div>
  </div>
</div>
@endsection  
</body>
</html>
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
        ajax: "{{ route('ajax-clients') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'company_name', name: 'company_name'},
            {data: 'email_address', name: 'email_address'},
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

   