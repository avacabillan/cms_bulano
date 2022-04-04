@extends('layout.master')
@section('title')
    Deadline
@endsection
@section('content')


<div class="container-fluid">
    <a href="{{route('display-calendar')}}" class="btn btn-primary mt-3"><i class="far fa-calendar-alt"></i></a><br>
<div class="row">
    <h3 class="text-center"><b>BIR Deadline</b></h3>
  <div class="col-12">
    <div class="card card-dark card-outline me-2 ms-2">
      <div class="card-header">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                List of Deadlines
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="{{route('display-internal-deadlines')}}">Internal Deadline</a></li>
              
            </ul>
          </div>
        
        <hr>
        <table id="assoc-list" class="table table-bordered yajra-datatable mt-3" >
          <thead >
              
            <tr>
              <th class="Client-th text-dark text-center">Reminder</th>
              <th class="Client-th text-dark text-center">Deadline</th>              
              
              <th class="Client-th text-dark text-center">Action</th>
            </tr>
          </thead> 
          <tbody> 
            @foreach($birs as $bir)
            

              <tr>                     
                <td>{{$bir->reminder}}</td>
                <td>{{$bir->start}}</td>
                
               
                <td class="text-dark">                                    
                  <a class="btn btn-primary btn-sm" href="{{route('edit-reminder', $bir->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" >Edit</a>
                  <a class="btn btn-danger btn-sm" href="" data-bs-toggle="tooltip" data-bs-placement="top" >Delete</a>                 
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