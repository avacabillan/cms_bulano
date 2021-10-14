@extends('layout.master')

@section('title')
    Clients List
@endsection

@section('content')

@include('shared.sidebar')
<div class="siderbar_main toggled">
<<<<<<< HEAD

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
=======
<button class="btn btn-danger d-none mt-5 pt-5 mb-2" id="deleteallClients" style="float: right;">Delete All</button>
        <button type="button" class="btn btn-primary mt-5 mb-5 me-2" data-toggle="modal" data-target="#addClient" style="float: right;"><i class="fas fa-plus-circle"></i> Add New Client</button>
  <div class="page-content "style="margin: top 160px;">
    <div class="container mt-5" style="height:50%">
        
    
        <table id="clients-list" class="table table-bordered"  style="width:100% ">
                <thead >
                    <tr>
                    <th>
                      <input type="checkbox" id="selectAll" value="id" name="Clientlistcheckbox"><label></label>               
                    </th>
                    <th class="Client-th text-dark text-center">Client ID</th>
                    <th class="Client-th text-dark text-center">Client Name</th>
                    <th class="Client-th text-dark text-center">Contact Number</th>
                    <th class="Client-th text-dark text-center">Email</th>
                    <th class="Client-th text-dark text-center">OCN</th>
                    <th class="Client-th text-dark text-center">Action</th>   
                    </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>
                          <input type="checkbox" id="selectAll" value="id" name="Clientlistcheckbox"><label></label>               
                        </td>
                        <td>{{$client->id}}</td>
                        <td>{{$client->client_name}}</td>
                        <td>{{$client->contact_number}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->ocn}}</td>
                        
                        
                        
                        <td>
                         <a class="btn btn-success btn-sm editbtn" data-toggle="modal" data-target="#updateClientModal" href="{{route('editClient',$client->id)}}"><i class="fas fa-edit"></a></i>
                         <a  class="btn btn-success btn-sm viewbtn" data-toggle="modal" data-target="#viewClient" href="{{route('clientProfile',$client->id)}}"><i class="fas fa-eye"></a></i>
                        
                        </td>
                       
                       
                        
                    </tr>
                @endforeach
                </tbody>
              
            </table>
>>>>>>> trial-v2
    </div>
  </div>
</div>

<!-- VIEW CLIENT MODAL -->
<div class="modal fade viewClient" id="viewClient" tabindex="-1" role="dialog" aria-labelledby="headingsModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 120%;">
      <div class="modal-header" id="headingsModal" name="headingsModal">
        <h5 class="modal-title" ></h5>
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

<!--Add Client Modal -->
<div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="headingsModal" aria-hidden="true">
<div class="modal-dialog modal-lg" >
    <div class="modal-content" style="  width: 1000px; min-height: 450px;">
      <div class="modal-header">
        <h5 class="modal-title" id="headingsModal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        
<<<<<<< HEAD
=======
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
        
        
>>>>>>> trial-v2
        </div>
      
        <div class="modal-body">
        @livewireStyles
           
<<<<<<< HEAD
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        
        </div>
      
        <div class="modal-body">
        @livewireStyles
           
=======
>>>>>>> trial-v2
        @include('pages.associate.clients.edit_client')    
                        
        @livewireScripts
        </div>  
      </div>
    </div>
  </div>
</div>
 

@endsection

@section('scripts')
<<<<<<< HEAD
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 


=======
 
    <!-- DATATABLE  EXTENTIONS-->
    
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.2.2/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
>>>>>>> trial-v2

<script type="text/javascript">
  $(function () {

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
<<<<<<< HEAD
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
  })
})
</script>
<script>
    /*------ VIEW  CLIENT ------*/
    jQuery(document).ready(function($) {
      //jQuery Functionality
      var table =$('.yajra-datatable').DataTable(data-id);
      $('body').on('shown.bs.modal', '#viewClient tbody tr .viewbtn', function() {       
        $("#clients_table tbody tr").html("");
        $("#clients_table tbody tr").html($(this).closest("tr").html());
        $("#viewClient").modal("show");
      });
    } );

      
            
      }
  })
    /*------ END OF VIEW  CLIENTS ------*/


    //<-------Add Client Js------->

    $('#addClient').on('shown.bs.modal', function() {
        $('#saveBtn').val("createClient");
        $('#client_id').val('');
        $('#addClientForm').trigger('reset');
        $('#headingsModal').html('Add New Client');
        $('#addClient').modal('show');
        
        
      })

 //<-------Edit Client Js------->
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


=======
>>>>>>> trial-v2

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
<<<<<<< HEAD
        });

        $(document).on('change', 'input[name="client_checkbox"]', function(){
=======
      })

      $(document).on('change', 'input[name="client_checkbox"]', function(){
>>>>>>> trial-v2

        if( $('input[name="client_checkbox"]').length == $('input[name="client_checkbox"]:checked').length ){
          $('input[name="Clientlistcheckbox"]').prop('checked', true);
        }else{
          $('input[name="Clientlistcheckbox"]').prop('checked', false);
        }
        toggledeleteallClients();
<<<<<<< HEAD
        });

        function toggledeleteallClients(){
=======
      })

      function toggledeleteallClients(){
>>>>>>> trial-v2

        if( $('input[name="client_checkbox"]:checked').length > 0 ){
            $('button#deleteallClients').text('Delete ('+$('input[name="client_checkbox"]:checked').length+')').removeClass
            ('d-none');
        }else{
            $('button#deleteallClients').addClass('d-none');
        }
<<<<<<< HEAD
        }

        $(document).on('click','button#deleteallClients', function(){
=======
      }

      $(document).on('click','button#deleteallClients', function(){
>>>>>>> trial-v2

        var checkedAssoc_Client = [];
        $('input[name="client_checkbox"]:checked').each(function(){
          checkedAssoc_Client.push($(this).data('id'));
<<<<<<< HEAD
        });
          

=======
        })
>>>>>>> trial-v2
        // var url = '{{ route("delete.selected.clients") }}';
        // $.post(url,{clients_ids:checkedAssoc_Client},function(data){
        //   if(data.code == 1){
        //     $('#clients_table').DataTable().ajax.reload(null, true);
        //     toastr.success(data.msg);
        //   }
        // },'json');
<<<<<<< HEAD


=======
>>>>>>> trial-v2
        if (confirm('ARE YOU SURE? YOU WANT TO DELETE THIS CLIENT?')) {
          var url = '{{ route("delete.selected.clients") }}';

          $.post(url,{clients_ids:checkedAssoc_Client},function(data){
            if(data.code == 1){
<<<<<<< HEAD
              $('#clients_table').DataTable().ajax.reload(null, true);
=======
              $('#clients-table').DataTable().ajax.reload(null, true);
>>>>>>> trial-v2
              $.alert(data.msg);
            }
          },'json');
        }

<<<<<<< HEAD
        });

          
          });
=======
      })
       
})

>>>>>>> trial-v2
</script>
@endsection


