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
              <th class="Client-th text-dark text-center">Phone</th>   
              <th class="Client-th text-dark text-center">Mode Filing</th>   
              <th class="Client-th text-dark text-center">Inquiry</th>     
              <th class="Client-th text-dark text-center">COR</th>
              <th class="Client-th text-dark text-center">Action</th>
            </tr>
          </thead> 
          <tbody> 
            @foreach($requestees as $requestee)
              <tr>                     
                <td>{{$requestee->name}}</td>
                <td>{{$requestee->email}}</td>
                <td>{{$requestee->phone}}</td>
               
                @if($requestee->mode_filing == 1)
                  <td>Non-efps</td>
                @elseif($requestee->mode_filing == 2)
                  <td>Efps</td>
                @else
                  <td>N|A</td>
                @endif
                 <td>{{$requestee->inquiry}}</td>
                <td>
                  <a  id="corImage" href="{{asset('public/files/'.$requestee->cor)}}" data-lightbox="$requestee->cor"> <img src="{{asset('public/files/'.$requestee->cor)}}" alt="" width="70px" height="50px"></a>
                 
                </td>
                <td class="text-dark">      
                                              
                  <a class="btn btn-primary btn-sm" href="{{route('add_client',$requestee->id)}}" >Accept</a>
                  <form method="post" action="{{ route('delete', $requestee->id) }}">
                    @csrf
                    @method('delete')    
                    <div class="d-grid gap-2 col-6 mx-auto">
                      <button type="submit" class="btn btn-danger btn-sm me-md-2" onclick="return confirm(`Are you sure  you want to reject this request? `)">Reject</button>
                    </div>
                  </form>
                  
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