<!DOCTYPE html>
<html>
<head>
    <title>Associates</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
@extends('layout.master')
@section('content')

  <div class="row">
    <div class="col-12">
      <div class="card card-dark card-outline me-2 ms-2">
        <div class="card-header">
        <a type="button" class="btn btn-primary mb-5" href="{{route('add_associate')}}" style="float: right;"><i class="fas fa-plus-circle"></i>Add New Associate</a>

          <h3 class="card-title">List of All <b>Associates</b></h3><br>

          <hr>
          <table class="table table-bordered yajra-datatable" id="yajra-datatable" >
            <thead >
              <th >Name</th>
              <th>SSS Number</th>
              <th>Department</th>
              <th >Action</th>
            </thead> 
            <tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@include('sweetalert::alert')
 @endsection  

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('associates_list') }}",
        columns: [   
            {data: 'name', name: 'name'},           
            {data: 'sss_no', name: 'sss_no'},
            {data: 'departments', name: 'departments.department_name'},
            

            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: true
            },
        ]
    });
   
    
  });

</script>

</html>
   