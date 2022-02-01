@extends('layout.master')
@section('title')
@stop
@section('content')

@include('shared.navbar')
@include('pages.admin.sidebar')

<div class="siderbar_main toggled">

  <div class="d-flex p-4" style="margin-left: 30%; margin-top: 5%;">
  <div><a href="{{url()->previous()}}" class="btn btn-info" style="margin-left: 20%;">Back</a></div>
        <div class="col-sm-8">
            <div class="card-block bg-light"> 
            

                @foreach($clientitrs->clientTaxes as $itr)
                <div class="row">
                        <div class="col-sm-6">
                        <p class="m-b-10 f-w-600"><a href="{{route('client-showVat', $itr->tax_form_id)}}" class="text-dark"><i class="fa fa-folder me-2" aria-hidden="true"></i>{{$itr ->tax_form_id}}</a></p>
                        <h6 class="text-muted f-w-400"></h6>
                        </div>                                              
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection