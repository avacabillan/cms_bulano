@component('mail::message')
# Good Day! 
{{$myuser->name}}, your registration from Bulano Accounting & Auditing Firm has been accepted!


You can now Login from our website using these credentials:
Email: {{$myuser->email}}

Note: Your default password will be the same as your email.

 You can login here!
@component('mail::button', ['url' => $url])
Login Here
@endcomponent


Thanks,<br>
@endcomponent
