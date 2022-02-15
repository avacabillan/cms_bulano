@component('mail::message')
# Hi 
{{$name->company_name}}


You have 
{{ $reminder}} to follow up.


Thanks,<br>

@endcomponent