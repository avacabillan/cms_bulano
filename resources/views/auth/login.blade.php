@extends('layout.master')

@section('title')
Login
@stop

@section('content')

<div id="container">
    <div id="left">
        <!-- Image -->
    </div>
    <div id="right">
        <h1 class="login" id="client_login"><b>LOGIN</b></h1><br>
        @if(session()->has('message'))
            <p class="alert alert-info">
                {{ session()->get('message') }}
            </p>
        @endif
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" name="email" class="form-control" required autofocus placeholder="Enter Email" value="{{ old('email', null) }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" name="password" class="form-control" required placeholder="Enter Password">
                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label><input type="checkbox" name="remember">Remember me</label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                       Login
                    </button>
                </div>
            </div>
        </form>
        <button class="client-info" type="submit"  id="register_submit" class="submitbtn"><a href="{{route('register')}}">Register</a></button>
                
    </div>
</div>

@stop
@section('scripts')
<script>
    $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
@endsection

