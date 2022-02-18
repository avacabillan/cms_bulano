@extends('layout.master')
@section('title')
    Requestee
@endsection
@section('content')


    


  <div class="page-content" >
 
    <div class="container ">
      <div>
        <h2>List of Requestee</h2>
      
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
                       
                           
                          <a class="btn btn-primary btn-sm" href="{{route('add_client',$requestee->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" >Accept</a>
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
      <img src="{{asset('public/files/'.$requestees)}}">
      </div>
    </div>
  </div>
</div>


@endsection