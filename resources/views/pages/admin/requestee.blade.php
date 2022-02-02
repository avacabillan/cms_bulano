@extends('layout.master')

@section('title')
    Requestee
@endsection

@section('content')


    


  <div class="page-content" >
  <!-- <a type="button" class="btn btn-primary mt-2 mb-2 me-3" href="{{route('add_client')}}" style="margin-left: 20%;"><i class="fas fa-plus-circle"></i>Add New Client</a>
  <a type="button" class="btn btn-primary mt-2 mb-2 me-3" href="{{route('add_associate')}}" style="float: right;"><i class="fas fa-plus-circle"></i>Add New Associate</a>
  <a type="button" class="btn btn-primary mt-2 mb-2 me-3" data-toggle="modal" data-target="#addAssoc"><i class="fas fa-plus-circle"></i> Add New Admin</a> -->
    <div class="container ">
      <div>
        <h2>List of Requestee</h2>
        <!-- <a type="button" class="btn btn-primary mt-2 mb-2 me-3" href="{{route('add_client')}}" ><i class="fas fa-plus-circle"></i>Add New User</a> -->
      </div>

        <table  id="assoc-list" class="table table-bordered yajra-datatable mt-3"  style="width:70%; margin-left:5%; ">
          <thead>
            <tr>
          
              
              <th class="Client-th text-dark text-center">Name</th>
              <th class="Client-th text-dark text-center">Email</th>              
              <th class="Client-th text-dark text-center">COR</th>
              <th class="Client-th text-dark text-center">Action</th>

            </tr>
          </thead>
          <tbody> 
            @foreach($requestees as $requestee)

                    <tr>
                        
                       
                        <td>{{$requestee->name}}</td>
                        <td>{{$requestee->email}}</td>
                        <td>
                          <button data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="{{asset('public/files/'.$requestee->cor)}}" alt="" width="70px" height="50px"></button>
                        </td>
                        <td class="text-dark"> 
                       
                           
                          <a class="btn btn-primary btn-sm" href="{{route('add_client')}}" data-bs-toggle="tooltip" data-bs-placement="top" >Accept</a>
                          <a class="btn btn-danger btn-sm" href="{{route('delete',$requestee->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" >Reject</a>
                           
                        
                        </td>                                         
                    </tr>
            @endforeach    
          </tbody>
        </table>
        </div><!-- /.card BODY-->
          </div><!-- /.card -->
        </div><!-- /.col -->
        
      </div>
      <!-- /.row -->
<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 40rem;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <img src="{{asset('public/files/'.$requestee->cor)}}">
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
  $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
         });
         $(function(){
                
          //GET ALL COUNTRIES
          var table =  $('#yajra-datatable').DataTable({
                processing:true,
                info:true,
                ajax:"",
                columns:[
                    {data:'id', name:'id'}
                    {data:'name', name:'name', orderable:false},
                    {data:'email', name:'email', orderable:false},
                    {data:'contact_no', name:'contact_no', orderable:false},
                    {data:'actions', name:'actions', orderable:false, searchable:false},
                ]
        })
      });
</script>


@endsection