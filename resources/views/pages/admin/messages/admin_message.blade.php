@extends('layout.master')
@section('title')
    Admin Message
@endsection 
@section('content')
@include('shared.navbar')
@include('pages.admin.sidebar')

<div class="siderbar_main toggled">
  <div class="page-content"><br><br><br>

    <div class="row bg-light">
      <div class="col-md-4 pt-2">
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#compose_msg" style="height:35%;width:100%">Create New Message</button>
      </div>
      <div class="col-md-8">
        <div class="alert alert-success text-mb-2 mt-3 me-3" role="alert">Message sent Successfully !</div>
          <h4 class="">Inbox</h4>
          @foreach($users as $user)
            @if($user->first()->id == Auth::id())

            @else
            <div class="form-group">
              <a class="user" name='{{$user->first()->id}}'>{{$user->first()->name}}</a>
            </div>
            @endif
          @endforeach
      </div>
    </div>

  </div>
</div>

@include('pages.admin.messages.admin_composemsg')
@stop


