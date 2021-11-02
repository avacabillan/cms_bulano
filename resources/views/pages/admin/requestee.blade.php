@extends('layout.master')

@section('title')
    Requestee
@endsection

@section('content')
    
<<div class="siderbar_main toggled"> 

  <div class="page-content">
  @if(session()->has('message'))
      <p class="alert alert-info">
          {{session()->get('message')}}
      </p>
  @endif
    <div class="container mt-5">

        <table  id="assoc-list" class="table table-bordered table-striped"  style="width:100% ">
          <thead>
            <tr>
          
              <th class="Client-th text-dark text-center">ID</th>
              <th class="Client-th text-dark text-center">Name</th>
              <th class="Client-th text-dark text-center">Email</th>
              <th class="Client-th text-dark text-center">Contact Number</th>
              <th class="Client-th text-dark text-center">Image</th>
              <th class="Client-th text-dark text-center">Status</th>
              <th class="Client-th text-dark text-center">Action</th>  

            </tr>
          </thead>
          <tbody> 
            @foreach($requesters as $requester)

                    <tr>
                        
                        <td>{{$requester->id}}</td>
                        <td>{{$requester->name}}</td>
                        <td>{{$requester->email}}</td>
                        <td>{{$requester->contact_no}}</td>
                        <td><img src="{{asset('public/cor_img'.$requester->cor_img)}}" alt="Image" style="max-width: 180px; margin-top:5px";></td>
                        <td>@if($requester->status ==0) Reject @else Approved @endif</td>
                        <td><a href="{{ route('status-update', $requester->id)}}">@if($requester->status ==1) Reject @else Approved @endif</a></td>
                        <td>
                          <a class="btn btn-xs btn-info" href="{{ route('request-edit', $requester->id) }}">
                            Edit
                          </a>
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



@endsection