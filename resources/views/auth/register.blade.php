@extends('layout.master')
@section('title')
@stop

@section('content')


<div id="container">
    <div id="left">
  
    </div>
    <div id="right">
        <h1 class="login pt-4" id="login"><b>CREATE ACCOUNT</b></h1><br>
        <form action="{{route('storeRequest')}}" method="post">
        @csrf
        @method('GET')

            <input class="client-info" type="text" name="name" placeholder="Enter Name" equired>
            <input class="client-info" type="text" name="contact_no" placeholder="Enter Contact_no" equired>

            <input class="client-info" type="text" name="email" placeholder="Enter Email" equired>
            <div class="mb-3">
              <label for="formFileSm" class="form-label">Choose File</label>
              <input class="form-control form-control-sm" name="cor_image" id="formFileSm" type="file">
            </div>

            <button class="client-info" type="submit"  id="submit" class="submitbtn">Register</button>
           

            
        </form>
    </div>
</div>
@if ($message = Session::get('success'))

<div class="alert alert-success alert-center">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ $message }}</strong>

</div>

@endif

@stop










@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
