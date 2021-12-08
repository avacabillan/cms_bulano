@extends('layout.master')

@section('title')
    Reminder List
@endsection

@section('content')
<div class="container mt-3" style="height:50%">
            @if (\Session::has('success'))
                <div class="alert alert-success" style="fade: out 0.5em;">
                <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
      <a class="btn btn-success mb-3" href="{{route('fullcalendar')}}">View Calendar</a>
      <table id="clients-list" class="table table-bordered"  style="width:50% ">
        <thead >
          <tr>
        
            <th class="Client-th text-dark text-center">Reminder</th>
            <th class="Client-th text-dark text-center">Edit</th>
            <th class="Client-th text-dark text-center">Delete</th>   
          </tr>
        </thead>
        <tbody>
          @foreach($reminders as $reminder)
            <tr>
             
              <td>{{$reminder->reminder}}</td>
              <td>
                <a  class="btn btn-success btn-sm viewbtn" href="{{route('edit-reminder',$reminder->id)}}"  title="View Profile"><i class="fas fa-edit"></a></i>
              </td>
              <td>
                <a  class="btn btn-success btn-sm viewbtn" href="{{route('delete-reminder',$reminder->id)}}"  title="View Profile"><i class="fas fa-trash"></a></i>
              </td>       
            </tr>
          @endforeach
        </tbody>
              
      </table>
     
    </div>
@endsection
@section('scripts')
 
    <!-- DATATABLE  EXTENTIONS-->
    
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.2.2/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

@endsection
