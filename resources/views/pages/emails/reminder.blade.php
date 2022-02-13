@component('mail::message')
# Hi {{  $client->company_name }}

You have {{ $reminders }} to follow up.


Thanks,<br>

@endcomponent