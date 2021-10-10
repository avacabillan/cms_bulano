@extends('layout.master')

@section('content')
@foreach ($clients as $client)
        <h4 class="f-w-600">Client Name</h4>
        <p id="name" value="{{$client->client_name}}">{{$client->client_name}}</p>         
      </div>
    </div>
@endforeach
@endsection