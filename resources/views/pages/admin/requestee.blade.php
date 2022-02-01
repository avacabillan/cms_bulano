@extends('layout.master')

@section('title')
    Requestee
@endsection

@section('content')
@include('shared.navbar')
@include('pages.admin.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-12">
          <div class="card card-dark card-outline">
            <div class="card-header">
              <h3 class="card-title">List of Requestee</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table  id="assoc-list" class="table table-bordered yajra-datatable " >
          <thead>
            <tr>
          
              <th class="Client-th text-dark text-center">ID</th>
              <th class="Client-th text-dark text-center">Name</th>
              <th class="Client-th text-dark text-center">Email</th>
              <th class="Client-th text-dark text-center">Contact Number</th>
              <th class="Client-th text-dark text-center">Image</th>
              <th class="Client-th text-dark text-center">Status</th>

            </tr>
          </thead>
          <tbody> 
            @foreach($requesters as $requester)

                    <tr>
                        
                        <td>{{$requester->id}}</td>
                        <td>{{$requester->name}}</td>
                        <td>{{$requester->email}}</td>
                        <td>{{$requester->contact_no}}</td>
                        <td><a href=""><img src="images/COR.png" alt="Image" style="max-width: 40px; margin-top:5px;"></td></a>
                        <td class="text-dark"> 
                       
                           @if($requester->approved===0)
                            <a class="btn btn-success btn-sm" href="{{route('update-request', $requester ->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to Accept Request">Approved</a>
                           @elseif($requester->approved===1)
                           <a class="btn btn-danger btn-sm" href="{{route('update-request', $requester ->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to Delete Request" >Pending</a>
                            @endif
                           
                        
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
</div>
<!-- ./wrapper -->



<div class="siderbar_main toggled" style="width: 90%;"> 

  <div class="page-content" >

    <div class="container pt-5">
      <div>
        <h2>List of Requestee</h2><hr>
      </div>

        <table  id="assoc-list" class="table table-bordered yajra-datatable"  style="width: 60% ">
          <thead>
            <tr>
          
              <th class="Client-th text-dark text-center">ID</th>
              <th class="Client-th text-dark text-center">Name</th>
              <th class="Client-th text-dark text-center">Email</th>
              <th class="Client-th text-dark text-center">Contact Number</th>
              <th class="Client-th text-dark text-center">Image</th>
              <th class="Client-th text-dark text-center">Status</th>

            </tr>
          </thead>
          <tbody> 
            @foreach($requesters as $requester)

                    <tr>
                        
                        <td>{{$requester->id}}</td>
                        <td>{{$requester->name}}</td>
                        <td>{{$requester->email}}</td>
                        <td>{{$requester->contact_no}}</td>
                        <td><a href=""><img src="images/COR.png" alt="Image" style="max-width: 40px; margin-top:5px;"></td></a>
                        <td class="text-dark"> 
                       
                           @if($requester->approved===0)
                            <a class="btn btn-danger btn-sm" href="{{route('update-request', $requester ->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to Accept Request">Active</a>
                           @elseif($requester->approved===1)
                           <a class="btn btn-success btn-sm" href="{{route('update-request', $requester ->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to Delete Request" >Inactive</a>
                            @endif
                           
                        
                        </td>                                         
                    </tr>
            @endforeach    
          </tbody>
        </table>
    </div>
  </div>
</div>

   
</body>

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