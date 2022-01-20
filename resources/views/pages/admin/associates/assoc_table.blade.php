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

<div class="siderbar_main toggled">
  <div class="page-content mt-5" style="margin: top 160px;">
 
  <div class="container mt-3 pt-5"  style="height:50%; width: 70%; margin-left: 25%;" >
      <button type="button" class="btn btn-primary mt-2 mb-2 me-3" data-toggle="modal" data-target="#addAssoc" style="float: right;"><i class="fas fa-plus-circle"></i> Add Associate</button>
      <div>
    
      <div>
        <h2>List of Associates</h2><hr>
      </div>
      <table class="table table-bordered yajra-datatable" id="assoc" style="height:50%; width: 60%; margin-left: 15%;" >
          <thead>
                <th>ID</th>
                <th>Name</th>
                <th>SSS Numbert</th>
                <th>Action</th>
          </thead>
          <tbody>

          </tbody>
        </table>
    </div>
  </div>
</div>


<!--Add Assoc Modal -->
<div class="modal fade" id="addAssoc" tabindex="-1" role="dialog" aria-labelledby="headingsModal" >
<div class="modal-dialog" >
    <div class="modal-content" style="  width: 50rem; min-height: 450px;">
      <div class="modal-header">
        <h5 class="modal-title" id="headingsModal"></h5>
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
        
        </div>
      
        <div class="modal-body">          
            @include('pages.admin.associates.add_associate')                          
        </div>  
      </div>
    </div>
  </div>
</div>
<!--End Assoc Modal -->
   
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
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},           
            {data: 'sss_no', name: 'sss_no'},

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
   