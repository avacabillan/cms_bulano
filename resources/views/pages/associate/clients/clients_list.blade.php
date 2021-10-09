@extends('layout.master')

@section('title')
    Clients
@endsection

@section('content')
@include('shared.sidebar')
<div class="siderbar_main toggled">

  <div class="page-content">
    <div class="container mt-5">
        <button type="button" class="btn btn-danger d-none mt-5 mb-2" id="deleteAllClientbtn" style="float: right;"><i class="fas fa-minus-circle"></i> Delete</button>
        <button type="button" class="btn btn-primary mt-5 mb-2 me-2" data-toggle="modal" data-target="#addClient" style="float: right;"><i class="fas fa-plus-circle"></i> Add New Client</button>
        <table class="table table-bordered yajra-datatable" >
          <thead>
            <tr>
              <th>
                <input type="checkbox" id="selectAll" name="Clientlistcheckbox"><label></label>               
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

<!--View Client Modal -->
<div class="modal fade" id="viewClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 120%;">
      <div class="modal-header">
        <h5 class="modal-title" id="headingsModal">My Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <!-- <button class="btn btn-outline-success btn-sm mt-3 mb-2" style="float: right; width:30%;"><i class="fas fa-plus-circle"></i> Add New Folder</button> -->
        <div class="modal-body">
          @include('pages.associate.clients.client_profile')
        </div>  
      </div>
    </div>
  </div>
</div>

<!--Add Client Modal -->
<div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" >
    <div class="modal-content" style="  width: 1000px; min-height: 450px;">
      <div class="modal-header">
        <h5 class="modal-title" id="headingsModal"></h5>
        
        </div>
      
        <div class="modal-body">
        @livewireStyles
           
        @include('pages.associate.clients.add_client')    
                        
        @livewireScripts
        </div>  
      </div>
    </div>
  </div>
</div>

<!--Update Client Modal -->
<div class="modal fade editModal" id="updateClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" >
    <div class="modal-content" style="  width: 1000px; min-height: 450px;">
      <div class="modal-header">
        <h5 class="modal-title" id="headingsModal"></h5>
        
        </div>
      
        <div class="modal-body">
        @livewireStyles
           
        @include('pages.associate.clients.edit_client')    
                        
        @livewireScripts
        </div>  
      </div>
    </div>
  </div>
</div>
 
@endsection

@section('scripts')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 



<script type="text/javascript">
//<-----datatable------>
    $(function () {
        $.ajaxSetup({
              headers:{
                'X-CSRF-TOKER':$('meta[name="csrf-token"]').attr('content')
              }
        });
          //<------ Datatable js---------->
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
                      searchable: true
                    },
                ]
        });
  });
</script>

<script>
  //<-----modal scrpts----->

      //<------View Client Js----->
      $('#viewClient').on('shown.bs.modal', function(event) {
            let $userId = $(event.relatedTarget).attr('data-id')
            let $route = $(event.relatedTarget).attr('data-route');

            $.ajax({
                url: $route,
                method: 'POST',
                datatype:'json,'
                data: {
                    _token: '{{csrf_token()}}',
                    user_id: $userId
                },
                success: function(result) {
                  alert ('result');
                    $('#client_id').val(result.client_id);
                    $('#headingsModal').html('Add New Client');
                    $('#viewClient').modal('show');
                },
                error: function() {
                    alert('Error!')
                }
            })
        })

      //<-------Add Client Js------->

      $('#addClient').on('shown.bs.modal', function() {
        $('#saveBtn').val("createClient");
        $('#client_id').val('');
        $('#addClientForm').trigger('reset');
        $('#headingsModal').html('Add New Client');
        $('#addClient').modal('show');
        
        
      })



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
        toggledeleteAllClientbtn();
      })

      $(document).on('change', 'input[name="client_checkbox"]', function(){

        if( $('input[name="client_checkbox"]').length == $('input[name="client_checkbox"]:checked').length ){
          $('input[name="Clientlistcheckbox"]').prop('checked', true);
        }else{
          $('input[name="Clientlistcheckbox"]').prop('checked', false);
        }
        toggledeleteAllClientbtn();
      })

      function toggledeleteAllClientbtn(){
        
        if( $('input[name="client_checkbox"]:checked').length > 0 ){
            $('buttonn#deleteAllClientbtn').text('Delete ('+$('input[name="client_checkbox"]:checked').length+')').removeClass('d-none');
        }else{
            $('buttonn#deleteAllClientbtn').addClass('d-none');
        }
      }

     


      //<------Edit Client Js---------->

      $('body').on(('shown.bs.modal','.editClient',function(){
      
          var client_id = $(this).attr('data-id');
          $.get("{{route('editForm')}}"+ "/" + client_id + "/editClient",function(data)){
                $('#headingsModal').html("Edit Client");
                $('#updateClientModal').modal('show');
                $('#updateBtn').val('updateClient');
                $('#client_id').val(data.id);
                $('#updateClientForm #ocn').val(data.ocn);
                $('#updateClientForm #tin').val(data.tin);
                $('#updateClientForm #client_name').val(data.client_name);
                $('#updateClientForm #email').val(data.email);
                $('#updateClientForm #client_contact').val(data.client_contact);
                $('#updateClientForm #reg_date').val(data.reg_date);
                $('#updateClientForm #trade_name').val(data.trade_name);
                $('#updateClientForm #mode').val(data.mode);
                $('#updateClientForm #corporate').val(data.corporate);
                $('#updateClientForm #unit_house_no').val(data.unit_house_no);
                $('#updateClientForm #street').val(data.street);
                $('#updateClientForm #client_city').val(data.client_city);
                $('#updateClientForm #client_province').val(data.client_province);
                $('#updateClientForm #client_postal').val(data.client_postal);
          }
      })
      $('#updateBtn').click(function (e){
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#updateClientForm').serialize(),
          url: "{{ route('updateClient') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#updateClientForm').trigger("reset");
              $('#updateClientModal').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#updateBtn').html('Save Changes');
          }
        })

      })

</script>
@endsection


