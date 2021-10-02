@extends('layout.master')
@section('title')
  LIST OF CLIENTS
@stop

@section('content')


<div class="siderbar_main toggled">

  <div class="page-content">

    <div class="container mt-5">
        <button class="btn btn-outline-primary mt-5 mb-3" id="btn-addClient" style="float: right;"><i class="fas fa-plus-circle"></i> Add New Client</button>
        <table class="table table-bordered yajra-datatable">
          <thead>
            <tr>
              <th>
                <span class="custom-checkbox">
                  <input type="checkbox" id="selectAll">
                  <label for="selectAll"></label>
                </span>   
              </th>
              <th class="text-dark">Client ID</th>
              <th class="text-dark">Client Name</th>
              <th class="text-dark">Contact Number</th>
              <th class="text-dark">Email</th>
              <th class="text-dark">OCN</th>
              <th class="text-dark">Mode of Filing</th>
              <th class="text-dark">Action</th>         
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>  
    </div>
  </div>
</div>
  @include('pages.associate.clients.add_client')
@stop


@section('script')
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
@stop
