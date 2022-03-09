@extends('layout.master')
@section('title')
    Requestee
@endsection
@section('content')


<div class="container-fluid">
<div class="row">
  <div class="col-12">
    <div class="card card-dark card-outline me-2 ms-2">
      <div class="card-header">

        <h3 class="card-title">List of All <b>Requestee</b></h3><br>
        <hr>
        <table id="assoc-list" class="table table-bordered yajra-datatable mt-3" >
          <thead >
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
                  <a  id="corImage" href="{{asset('public/files/'.$requestee->cor)}}" data-lightbox="$requestee->cor"> <img src="{{asset('public/files/'.$requestee->cor)}}" alt="" width="70px" height="50px"></a>
                  <!-- <button data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="{{asset('public/files/'.$requestee->cor)}}" alt="" width="70px" height="50px"></button> -->
                </td>
                <td class="text-dark">                                    
                  <a class="btn btn-primary btn-sm" href="{{route('add_client',$requestee->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" >Accept</a>
                  <a class="btn btn-danger btn-sm" href="{{route('delete',$requestee->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" >Reject</a>                 
                </td>                                         
              </tr>
            @endforeach 
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
</div>
@include('sweetalert::alert')
@endsection