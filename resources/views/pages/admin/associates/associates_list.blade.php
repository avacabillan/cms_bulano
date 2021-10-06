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
    
<<div class="siderbar_main toggled">

  <div class="page-content">
    <div class="container mt-5">

        <button type="button" class="btn btn-primary mt-2 mb-2 me-2" data-toggle="modal" data-target="#addAssoc" style="float: right;"><i class="fas fa-plus-circle"></i> Add New Associate</button>
        <table class="table table-bordered yajra-datatable">
          <thead>
            <tr>
  
              <th class="Assoc-th text-dark text-center">Asscociate ID</th>
              <th class="Assoc-th text-dark text-center">Associate Name</th>
              <th class="Assoc-thh text-dark text-center">Contact Number</th>
              <th class="Assoc-th text-dark text-center">Email</th>
              <th class="Assoc-th text-dark text-center">Department</th>
              <th class="Assoc-th text-dark text-center">Position</th>
              <th class="Assoc-th text-dark text-center">Action</th>  

            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    </div>
  </div>
</div>
<!--Add Assoc Modal -->
<div class="modal fade" id="addAssoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 120%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Associate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          @include('pages.admin.associates.add_associates')
        </div>  
      </div> 
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

    $('#addAssoc').on('shown.bs.modal', function(event) {
            let $userId = $(event.relatedTarget).attr('data-id')
            let $route = $(event.relatedTarget).attr('data-route');

            $.ajax({
                url: $route,
                method: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    user_id: $userId
                    
                },
                beforeSend: function() {

                },
                success: function(result) {
                    console.log(result)
                    $('[name="assoc_id"]').val(result.associate_id)
                    $('[name="department_data"]').val(result.department_data)
                    $('[name="position_data"]').val(result.position_data)
                },
                error: function() {
                    alert('Error!')
                }
            })
    })
    
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