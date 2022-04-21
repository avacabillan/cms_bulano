
@extends('layout.master')
@section('title')
    Deadline
@endsection
@section('content')


<div class="container-fluid">
    <a href="{{route('assoc-display-calendar')}}" class="btn btn-primary mt-3"> <i class="far fa-calendar-alt"></i></a><br>
<div class="row">
  <h3 class="text-center"><b>BIR Deadline</b></h3>
  <div class="col-10">
    <div class="card card-dark card-outline me-2 ms-2">
      <div class="card-header">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Select Type of Deadline
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="{{route('assoc-display-internal-deadlines')}}">Internal Deadline</a></li>
              
            </ul>
          </div>
        
        <hr>
        <table id="assoc-list" orderable="false" class="table table-bordered mt-3" >
          <thead >
              
            <tr>
              <th class="Client-th text-dark text-center">Reminder</th>
              <th class="Client-th text-dark text-center">Deadline</th>              
    
            </tr>
          </thead> 
          <tbody> 
            @foreach($birs as $bir)
            

              <tr>                     
                <td>{{$bir->reminder}}</td>
                <td>  {{ \Carbon\Carbon::parse($bir->start_time)->format('F d, Y')}} -  {{ \Carbon\Carbon::parse($bir->end_time)->format('F d, Y')}}</td>
                                       
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
@include('sweetalert::alert')
@include('sweetalert::alert')
@endsection