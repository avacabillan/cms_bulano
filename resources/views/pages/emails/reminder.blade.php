@component('mail::message')
# Good day!  
{{$name}}


You have
@foreach($reminds as $rem) 
<ul>{{$rem}}</ul>

@endforeach to follow up.
You can check your Bulano Account to see the deadlines.

@component('mail::button', ['url' => $url])
Follow up now!
@endcomponent
Best Regards,<br>
Bulano Accounting & Auditing Firm

@endcomponent