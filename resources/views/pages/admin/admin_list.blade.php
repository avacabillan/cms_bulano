@extends('layout.master')
@section('title')
    Admin List
@endsection
@section('content')


<div class="container-fluid">
    
<div class="row">
  
  <div class="col-10">
    <div class="card card-dark card-outline me-2 ms-2" style="width: 120%;">
      <div class="card-header">
      
        
        <hr>
        <table id="admin-list" orderable="false" class="table table-bordered mt-3" >
          <thead >
              
            <tr>
              <th class="Client-th text-dark text-center">Name</th>
              <th class="Client-th text-dark text-center">Email</th>  
              <th class="Client-th text-dark text-center">Complete Address</th>          
              <th class="Client-th text-dark text-center">Hired Date</th>
              <th class="Client-th text-dark text-center">Action</th>                                          
    
            </tr>
          </thead> 
          <tbody> 
            @foreach($admins as $admin)
            

              <tr>   
                       
              <td>{{$admin->name}}</td>
              <td>{{$admin->email_address}}</td>
              <td>{{$admin->complete_address}}</td>
              <td>{{ \Carbon\Carbon::parse($admin->hired_date)->format('F d, Y')}}</td>
              <td><a href="{{route('admin_edit', $admin->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    <a href="{{route('admin_profile', $admin->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
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