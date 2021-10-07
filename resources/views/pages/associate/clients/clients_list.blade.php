@extends('layout.master')

@section('title')
    Clients List
@endsection

@section('content')
@include('shared.sidebar')
<div class="siderbar_main toggled">

  <div class="page-content">
    <div class="container mt-5">
 
    <button class="btn btn-danger d-none mt-5 mb-2" id="deleteallClients" style="float: right;">Delete All</button>
        <button type="button" class="btn btn-primary mt-5 mb-2 me-2" data-toggle="modal" data-target="#addClient" style="float: right;"><i class="fas fa-plus-circle"></i> Add New Client</button>
        <table class="table table-bordered yajra-datatable" id="clients_table">
          <thead>
            <tr>
              <th>
                <input type="checkbox" id="selectAll" value="id" name="Clientlistcheckbox"><label></label>               
              </th>
              <th class="Client-th text-dark text-center">Client ID</th>
              <th class="Client-th text-dark text-center">Client Name</th>
              <th class="Client-th text-dark text-center">Contact Number</th>
              <th class="Client-th text-dark text-center">Email</th>
              <th class="Client-th text-dark text-center">OCN</th>
              <th class="Client-th text-dark text-center">Mode of Filing</th>
              <th class="Client-th text-dark text-center">Action</th>         
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    </div>
  </div>
</div>

<!-- VIEW CLIENT MODAL -->
<div class="modal fade" id="viewClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 120%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">My Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          @include('pages.associate.clients.client_profile')
        </div>  
      </div>
    </div>
  </div>
</div>
<!-- END OF VIEW CLIENT MODAL -->

<!-- ADD CLIENT MODAL -->
<div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 120%;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          @include('pages.associate.clients.add_client')
        </div>  
      </div>
    </div>
  </div>
</div>
<!-- END OF ADD CLIENT MODAL -->
@endsection

@section('scripts')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 



<script type="text/javascript">
  $(function () {

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*------ VIEW ALL CLIENTS ------*/
    $('#viewClient').on('shown.bs.modal', function(event) {
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
                    $('[name="client_id"]').val(result.client_id)
                    $('[name="trade_name"]').val(result.trade_name)
                    $('[name="registration_data"]').val(result.registration_date)
                },
                error: function() {
                    alert('Error!')
                }
            })
    })
    /*------ END OF VIEW ALL CLIENTS ------*/
    /*------ ADD CLIENTS ------*/
    $('#addClient').on('shown.bs.modal', function(event) {
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
                    $('[name="client_id"]').val(result.client_id)
                    $('[name="trade_name"]').val(result.trade_name)
                    $('[name="registration_data"]').val(result.registration_date)
                },
                error: function() {
                    alert('Error!')
                }
            })
    })
    /*------ END OF ADD CLIENTS ------*/
    /*------ CHECKBOX DELETE ALL ------*/
    $(document).on('click', 'input[name="Clientlistcheckbox"]', function(){

      if(this.checked){
        $('input[name="client_checkbox"]').each(function(){
          this.checked = true;
        });
      }else{
        $('input[name="client_checkbox"]').each(function(){
         this.checked = false;
        });
      }
      toggledeleteallClients();
    });

    $(document).on('change', 'input[name="client_checkbox"]', function(){

      if( $('input[name="client_checkbox"]').length == $('input[name="client_checkbox"]:checked').length ){
        $('input[name="Clientlistcheckbox"]').prop('checked', true);
      }else{
        $('input[name="Clientlistcheckbox"]').prop('checked', false);
      }
      toggledeleteallClients();
    });

    function toggledeleteallClients(){
      
      if( $('input[name="client_checkbox"]:checked').length > 0 ){
          $('button#deleteallClients').text('Delete ('+$('input[name="client_checkbox"]:checked').length+')').removeClass
          ('d-none');
      }else{
          $('button#deleteallClients').addClass('d-none');
      }
    }

    $(document).on('click','button#deleteallClients', function(){
      
      var checkedAssoc_Client = [];
      $('input[name="client_checkbox"]:checked').each(function(){
        checkedAssoc_Client.push($(this).data('id'));
      });
         
      
      // var url = '{{ route("delete.selected.clients") }}';
      // $.post(url,{clients_ids:checkedAssoc_Client},function(data){
      //   if(data.code == 1){
      //     $('#clients_table').DataTable().ajax.reload(null, true);
      //     toastr.success(data.msg);
      //   }
      // },'json');
      

      if (confirm('ARE YOU SURE? YOU WANT TO DELETE THIS CLIENT?')) {
        var url = '{{ route("delete.selected.clients") }}';

        $.post(url,{clients_ids:checkedAssoc_Client},function(data){
          if(data.code == 1){
            $('#clients_table').DataTable().ajax.reload(null, true);
            $.alert(data.msg);
          }
        },'json');
      }
  
    });
    /*------ END OF CHECKBOX DELETE ALL ------*/


    /*------ GET ALL CLIENTS ------*/
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('clients.list') }}",
              columns: [
 
                  {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
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
                    searchable: false
                  },
        ]
    });
    /*------ GET ALL CLIENTS ------*/
  });
</script>
@endsection


