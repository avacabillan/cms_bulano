@extends('layout.master')

@section('title')
    Clients List
@endsection

@section('content')

@include('shared.sidebar')
<div class="siderbar_main toggled">
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
                         
                         <a  class="btn btn-success btn-sm viewbtn" href="{{route('clientProfile',$client->id)}}"><i class="fas fa-eye"></a></i>
                        
                        </td>
                       
                       
                        
                    </tr>
                @endforeach
                </tbody>
              
            </table>
    </div>
  </div>
</div>

<!-- VIEW CLIENT MODAL -->

<!-- END OF VIEW CLIENT MODAL -->

<!--Add Client Modal -->
<div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="headingsModal" aria-hidden="true">
<div class="modal-dialog modal-lg" >
    <div class="modal-content" style="  width: 1000px; min-height: 450px;">
      <div class="modal-header">
        <h5 class="modal-title" id="headingsModal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        
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

 

@endsection

@section('scripts')
 
    <!-- DATATABLE  EXTENTIONS-->
    
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.2.2/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

<script type="text/javascript">
  $(function () {

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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
        toggledeleteallClients();
      })

      $(document).on('change', 'input[name="client_checkbox"]', function(){

        if( $('input[name="client_checkbox"]').length == $('input[name="client_checkbox"]:checked').length ){
          $('input[name="Clientlistcheckbox"]').prop('checked', true);
        }else{
          $('input[name="Clientlistcheckbox"]').prop('checked', false);
        }
        toggledeleteallClients();
      })

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
        })
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
              $('#clients-table').DataTable().ajax.reload(null, true);
              $.alert(data.msg);
            }
          },'json');
        }

      })
       
})

</script>
@endsection


