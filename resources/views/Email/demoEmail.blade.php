@component('mail::message')
{{ $mailData['title'] }}

Congratulations! Your recieved demo email.

@component('mail::button', ['url' =&gt; $mailData['url']])
Cheers!
@endcomponent

Thanks,&lt;br&gt;
{{ config('app.name') }}
@endcomponent