@extends('layout.master')

@section('title')
    Reminders
@endsection

@section('content')
@include('pages.admin.sidebar')
<div class="siderbar_main toggled"> 
<div class="page-content mt-5 m-3" style="height: 50px; width:90%; ">
            @if (\Session::has('success'))
                <div class="alert alert-success" style="fade: out 0.5em;">
                <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
      <table id="clients-list" class="table table-bordered"  style="width:60% ">
        <thead >
          <tr>
        
            <th class="Client-th text-dark text-center">Reminder</th>
            <th class="Client-th text-dark text-center">Deadline</th>
            <th class="Client-th text-dark text-center">Action</th>
              
          </tr>
        </thead>
        <tbody>
          @foreach($reminders as $reminder)
            <tr>
             
              <td>{{$reminder->reminder}}</td>
              <td >{{$reminder->start}}</td>
              <td>
                <center><a  class="btn btn-success btn-sm viewbtn mr-2 " href="{{route('edit-reminder',$reminder->id)}}"  title="View Profile"><i class="fas fa-edit  text-center"></a></i>
                <a  class="btn btn-success btn-sm viewbtn " href="{{route('delete-reminder',$reminder->id)}}"  title="View Profile"><i class="fas fa-trash  text-center"></a></i>
                </center</td>       
            </tr>
          @endforeach
        </tbody>
              
      </table>
     
    </div>
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
