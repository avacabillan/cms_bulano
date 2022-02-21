@component('mail::message')
# Hi 
{{$myuser->name}} your registration from Bulano Accounting & Auditing Firm has been accepted!
You can now Login from our website using these credentials: 
<br>
Email: {{$myuser->email}}<br>
The Password will be the same as your email password.
<br>
 You can login here!
@component('mail::button', ['url' => $url])
Login Here
@endcomponent
Thanks,<br>

@endcomponent