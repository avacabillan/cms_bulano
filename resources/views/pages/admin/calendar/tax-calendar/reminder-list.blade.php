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
            <!-- <div class="panel panel-default">
              <div class="panel-heading">
              <div class="row">
              <div class="col-md-5">Sample Data - Total Records - <b><span id="total_records"></span></b></div>
              <div class="col-md-5">
              <div class="input-group input-daterange">
                  <input type="text" name="from_date" id="from_date"  class="form-control" />
                  <strong class="input-group-addon mt-2" style="margin-left:10px; margin-right:10px;">To</strong>
                  <input type="text"  name="to_date" id="to_date"  class="form-control" />
              </div>
              </div>
              <div class="col-md-2">
              <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
              <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
              </div>
            </div> -->
            <div class="panel-body">
            <div class="table">
            <table id="clients-list" class="table table-striped table-bordered"  style="width:60%; ">
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
              {{ csrf_field() }}
            </div>
            </div>
           
     
  </div>
</div>

@endsection

 
 
  
