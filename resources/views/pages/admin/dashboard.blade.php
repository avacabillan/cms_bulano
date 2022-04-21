@extends('layout.master')
@section('title')
    Admin Dashboard
@stop 
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for Admin') }}
        </h2>
      </x-slot>
      
      <div class="form-group col-md-12">
        <div class="alert alert-success ms-3 me-3" id="admin_dash_heading" role="alert" >
          <h4 class="alert-heading" id="heading_text">Welcome to Dashboard, {{Auth::user()->name}}</h4>
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content-header -->
<div class="card" style="width: 30rem; margin-left:20px;">
  <div class="card-header">
    <h6 class="text-danger">Clients with Upcoming Deadlines</h6>
  </div>
  <ul class="list-group list-group-flush">
    
    @foreach($clientDeadlines as $client)
 
    <li class="list-group-item">{{$client->company_name}} - <b> Form {{$client->tax_form_no}}</b><br> {{\Carbon\Carbon::parse($client->start_date)->format('F d, Y')}}</li>
   
 @endforeach
  </ul>
</div>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
  
          <div class="col-lg-6 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h4 class="pt-3">User Registrations</h4>
                <span class="info-box-number"></span>
                <div class="inner">
                <h3>{{$reqs}}</h3>
                </div>
                <h5>Requests</h5>
              </div>
              <div class="icon pb-2">
                 <i class="fa fa-user"></i>
              </div>
                 <a href="{{route('requestee')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h4 class="pt-3">Reminder Calendar</h4>
                <span class="info-box-number"></span>
                <div class="inner">
                <h3>{{$ddlines}}</h3>
                </div>
                <h5>Reminders</h5>
              </div>
              <div class="icon pb-2">
                 <i class="far fa-calendar-alt"></i>
              </div>
                 <a href="{{route('display-calendar')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            
        </div>
      </div>
    </div>

    <h2 class="header_text ms-4">Associates</h2>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          @foreach ($associates as $associate )
          <div class="col-lg-3 col-6" onclick="showclient({{$associate->id}})">
            <div class="small-box bg-info"><!-- small box -->
            
              <div class="inner">
                <?php
                    $countClient = DB::table('clients')
                    ->join('associates', 'clients.assoc_id', '=' , 'associates.id')
                    ->where('clients.assoc_id', $associate->id)
                    ->count();
                    echo "<h3 >$countClient</h3>";
                ?>
                <p>Clients</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <p class="small-box-footer" ><strong>{{$associate->name}}</strong></p>
            </div>
          </div><!-- ./col -->
          @endforeach        
        </div>
      </div>
    </section>
    <a href="#" onclick="showclient()"></a>

  <!-- Modal -->
<div class="modal" id="transfer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-secondary ">
        <h5 class="modal-title" id="staticBackdropLabel">Transfering Clients</h5>
        <button type="button" class="btn-close" onclick="$(this).click($('#transfer').fadeOut())"></button>
      </div>
      <div class="modal-body bg-light">
        <form action="{{route('admin.transfer')}}">
          @csrf
          <table class="table">
              <thead>
                  <tr>
                      <th><input type="checkbox" class="selectall"> Select all</th>
                      <th>Client</th>
                      <th>Email Address</th>
                  </tr>
              </thead>
              <tbody class="clnt_name mt-3" id="data">
                
              </tbody>
              <tfoot>
                <tr>
                  <td><select name="assoc" id="">
                  @foreach ($associates as $associate )
                    <option value="{{$associate->id}}">{{$associate->name}}</option>
                  @endforeach 
                  </select></td><br>
                  <td><button class="btn btn-success" style="float: right;" type="submit">Transfer</button></td>
                </tr>
              </tfoot>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- Add admin modal --}}
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('create.admin')}}" method="POST" class="row g-3">
          @csrf
          @method('GET')
          <div class="col-md-6">
            <label class="form-label">Name</label>
            <input name="name" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="inputEmail4">
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="inputPassword4">
          </div>
         
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
      
      </div>
    </div>
  </div>
</div>
@include('sweetalert::alert')
@include('sweetalert::alert')
@section('scripts')

<script>
  function showclient(id){
    $("#data").html('');
    $("#transfer").fadeIn();
    $.ajax({    
                type: 'get',
                url: "{{route('admin.getclients')}}",
                data:{ id: id},
            })
            .done(function(clients){
              for(i=0;i<clients.length;i++){
                    $("#data").append(
                        "<tr>",
                        "<td><input type='checkbox' value='"+clients[i].id+"' name='checkbox[]' class='checkbox'></input></td>",
                        "<td>"+clients[i].company_name+"</td>",
                        "<td>"+clients[i].email_address+"</td>",
                        "</tr>"
                    );
                }
            });
  }

  $(document).on('click','.selectall',function(){
        if(this.checked){
            $(".checkbox").each(function(){
                this.checked=true;
            });
        }else{
            $('.checkbox').each(function(){
                this.checked=false;
            });
        }
    })
</script>
<script type="text/javascript">
        setTimeout(function () {
  
            // Closing the alert
            $('#admin_dash_heading').alert('close');
        }, 5000 );
</script>
@if(auth()->user())
<script>
document.addEventListener('DOMContentLoaded', function() {       
    $.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
    });
  function sendMarkRequest(id = null) {
      return $.ajax("{{ route('admin.markNotification') }}", {
          method: 'GET',
          data: {
            "_token": "{{ csrf_token() }}",
            "id": id,
          }
      });
  }
  $(function() {
      $('.mark-as-read').click(function() {
          let request = sendMarkRequest($(this).data('id'));
          request.done(() => {
              $(this).parents('div.alert').remove();
          });
      });
      $('#mark-all').click(function() {
          let request = sendMarkRequest();
          request.done(() => {
              $('div.alert').remove();
          })
      });
  });
});
</script>
@endif
@stop
@stop

