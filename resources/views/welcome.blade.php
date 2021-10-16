taxt form #
@foreach ($test as $try)
<li>{{$try->client_name}} - {{$try->mode_name}}</li>

@endforeach