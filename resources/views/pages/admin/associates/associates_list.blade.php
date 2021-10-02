<<<<<<< Updated upstream
@extends('layout.master')
@section('title')
  LIST OF ASSOCIATES
@stop

@section('content')
@include('shared.navbar')
@include('shared.sidebar')

<div class="siderbar_main toggled">

  <div class="page-content">

    <div class="assoc_list">
      <div class="d-grid gap-2 d-md-block me-5 mt-5 pt-5 mb-3" style="float: right;">
        <button class="btn btn-outline-primary" id="btn-newAssoc"><i class="fas fa-plus-circle"></i> Add New Associate</button>
        <button class="btn btn-danger" id="assoclist-deletebtn" type="button"><i class="fas fa-minus-circle"></i> Delete</button>
      </div>
      <table class="admin_associates_table">
        <thead>
          <tr>
            <th>
            <span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
            </th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Action</th>
              
          </tr>                                                                                                                        
        </thead>
        <tbody>
          <tr>
            <td>
              <span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
            </td>
            <td><div class="assocname_listed" id="assocname"><b>Bianca Cortez<b></div></td>
            <td>biancacortz123@gmail.com</td>
            <td>0932732648643</td> 
            <td>
              <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                <i class="fas fa-edit me-2" data-toggle="tooltip" title="Edit" style="color:yellow;"></i>
              </a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                <i class="fas fa-trash" data-toggle="tooltip" title="Delete" style="color:red;"></i></i>
              </a>
            </td> 
          </tr>
          <tr>
            <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>
            </td>
            <td><div class="assocname_listed">Jean Jati</div></td>
            <td>biancacortz123@gmail.com</td>
            <td>0932732648643</td>
            <td>
              <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                <i class="fas fa-edit me-2" data-toggle="tooltip" title="Edit" style="color:yellow;"></i>
              </a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                <i class="fas fa-trash" data-toggle="tooltip" title="Delete" style="color:red;"></i></i>
              </a>
            </td>
          </tr>
          <tr> 
            <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>
            </td>
            <td><div class="assocname_listed">Mitz Castillo</div></td>
            <td>biancacortz123@gmail.com</td>
            <td>0932732648643</td>
            <td>
              <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                <i class="fas fa-edit me-2" data-toggle="tooltip" title="Edit" style="color:yellow;"></i>
              </a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                <i class="fas fa-trash" data-toggle="tooltip" title="Delete" style="color:red;"></i></i>
              </a>
            </td>
          </tr>
          <tr>
            <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>

            </td>
            <td><div class="assocname_listed">Ava Gab</div></td>
            <td>biancacortz123@gmail.com</td>
            <td>0932732648643</td>
            <td>
              <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                <i class="fas fa-edit me-2" data-toggle="tooltip" title="Edit" style="color:yellow;"></i>
              </a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                <i class="fas fa-trash" data-toggle="tooltip" title="Delete" style="color:red;"></i></i>
              </a>
            </td>
          </tr>
          
        </tbody> 
        
      </table>
    </div>
    
  </div>
  
=======
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
    <a href="{{ route ('CreateNewClient')}}"><button type="button" class="btn btn-outline-primary mb-3">Add New Associate</button></a>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>ID</th>
                        <th>Associate Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
>>>>>>> Stashed changes
</div>
   
</body>

<<<<<<< Updated upstream
@include('pages.admin.associates.add_associates')
@include('pages.admin.associates.assoc_profile')

@stop 

=======
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
        ajax: "#",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'assoc_name', name: 'assoc_name'},
                  {data: 'contact_number', name: 'contact_number'},
                  {data: 'email', name: 'email'},
                  {data: 'department_id', name: 'department_id'},
                  {data: 'position_id', name: '_id'},
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
>>>>>>> Stashed changes
