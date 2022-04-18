@extends('layout.master')
@section('title')
    Deadline
@endsection
@section('content')


<div class="container-fluid">
    <a href="{{route('display-calendar')}}" class="btn btn-primary mt-3"> <i class="far fa-calendar-alt"></i></a><br>
<div class="row">
  <h3 class="text-center"><b>Internal Deadline</b></h3>
  <div class="col-12">
    <div class="card card-dark card-outline me-2 ms-2">
      <div class="card-header">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Select Deadlines
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="{{route('display-bir-deadlines')}}">BIR Deadline</a></li>
              
            </ul>
          </div>
        
        <hr>
        <table id="assoc-list" orderable="false" class="table table-bordered mt-3" >
          <thead >
              
            <tr>
              <th class="Client-th text-dark text-center">Event</th>
              <th class="Client-th text-dark text-center">Deadline</th>              
              <th class="Client-th text-dark text-center">Action</th>

            </tr>
          </thead> 
          <tbody> 
            @foreach($internals as $internal)
            

              <tr>                     
                <td>{{$internal->title}}</td>
                <td>{{ \Carbon\Carbon::parse($internal->start_date)->format('F d, Y')}} -  {{ \Carbon\Carbon::parse($internal->end_date)->format('F d, Y')}}</td>
                
               
                <td class="text-dark text-center"> 
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end"> 
                                                  
                    <a class="btn btn-primary btn-sm" href="{{route('edit-deadline', $internal->id)}}"   data-bs-toggle="tooltip" data-bs-placement="top" >Edit</a>
                    <form method="post" action="{{ route('delete-deadline', $internal->id) }}">
                      @csrf
                      @method('delete')    
                      <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-danger btn-sm me-md-2" onclick="return confirm(`Are you sure  you want to delete this data? `)">Delete</button>
                      </div>
                    </form>
                  </div>
                
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
<div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
@include('sweetalert::alert')
@include('sweetalert::alert')
@endsection