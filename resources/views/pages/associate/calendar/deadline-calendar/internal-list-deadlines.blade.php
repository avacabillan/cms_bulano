@extends('layout.master')
@section('title')
    Deadline
@endsection
@section('content')


<div class="container-fluid">
    <a href="{{route('assoc-display-calendar')}}" class="btn btn-primary mt-3"> <i class="far fa-calendar-alt"></i></a><br>
<div class="row">
  <h3 class="text-center"><b>Internal Deadline</b></h3>
  <div class="col-8">
    <div class="card card-dark card-outline me-2 ms-2">
      <div class="card-header">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Select Type of Deadline
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="{{route('assoc-display-bir-deadlines')}}">BIR Deadline</a></li>
              
            </ul>
          </div>
        
        <hr>
        <table id="assoc-list" orderable="false" class="table table-bordered mt-3" >
          <thead >
              
            <tr>
              <th class="Client-th text-dark text-center">Event</th>
              <th class="Client-th text-dark text-center">Deadline</th>              
             

            </tr>
          </thead> 
          <tbody> 
            @foreach($internals as $internal)
            

              <tr>                     
                <td>{{$internal->title}}</td>
                <td>{{ \Carbon\Carbon::parse($internal->start_date)->format('F d, Y')}} -  {{ \Carbon\Carbon::parse($internal->end_date)->format('F d, Y')}}</td>
            
                                                       
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