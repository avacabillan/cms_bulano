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
            <button class="btn btn-info" onClick="window.location.reload();"><i class="fa fa-sync-alt"></i> Refresh Page</button>
          <form action="{{route('fetch_date')}}" method="post">
              @csrf      
              @method('get')        
              <div class="col-md-9 offset-md-2">
                <div class="input-group mb-3" style="width:60%; margin-left: 60%;">
                  <input type="date" class="form-control" id="value1" name="value1">
                  <span class="input-group-text">to</span>
                  <input type="date" class="form-control" id="toDate" name="toDate">
                  <button class="btn btn-success" type="submit" name="search" Title="Search"><i class="fas fa-search"></i></button>
                </div> 

              </div>
              
           </form>
        
          
            <div class="panel-body">
            <div class="table">
            <table id="clients-list" class="table table-striped table-bordered pt-5"  style="width:60%;  ">
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
<script type="text/javascript">
  
  function reload() {
    reload = location.reload();
}
    
  
</script>
@endsection

 
 
  
