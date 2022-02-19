@extends('layout.master')
@section('title')
    Client Message
@stop
@section('content')

  <!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 pt-5 mt-2">
        <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#compose_msg" style="width:100%">Create New Message</button>
      </div><!-- /.col -->
      <div class="col-md-9">
        <div class="card card-dark card-outline">
          <div class="card-header">
            <h3 class="card-title">Inbox</h3>
            <div class="card-tools">
              <div class="input-group input-group-lg">
                <button type="button" class="btn btn-default bg-primary checkbox-toggle me-1"><i class="far fa-square"></i></button>
                <button type="button" class="btn btn-default bg-danger btn-sm"><i class="far fa-trash-alt"></i></button>
              </div>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive mailbox-messages">
              <table class="table inbox_table">
              @foreach($recipients as $recipient)
                <tbody>
                    @if($recipient->id == Auth::id())
                    @else                     
                      <tr style="float: left;">
                        <td class="recipient-name" name='{{$recipient->id}}' style="cursor: pointer;">{{$recipient->name}}</td>
                        <td>
                          <input type="hidden" id="recipient_id" value='{{$recipient->id}}'>
                        </td>
                      </tr>
                    @endif
                </tbody>   
                @endforeach
              </table><!-- /.table -->
            </div><!-- /.mail-box-messages -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- /.content -->
@include('sweetalert::alert')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('.user').click(function(){  
      $('#recipient').fadeIn();  
    });
    
    $('.btn-close').click(function(){  
      $('#recipient').fadeOut();  
    });

    $('.recipient-name').click(function(){
      var id = $(this).attr('name');
      $("#receiver").val(id);
      $('#recipient').fadeIn();
    });
  });
</script>

@include('pages.client.client_composemsg')
@include('pages.client.client_reply')

@stop


