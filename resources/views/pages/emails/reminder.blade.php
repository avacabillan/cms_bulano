@component('mail::message')
# Hi 
{{$name}}


You have
@foreach($reminds as $rem) 
{{$rem}}

@endforeach to follow up.


Thanks,<br>

@endcomponent