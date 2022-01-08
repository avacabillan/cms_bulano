@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Bulano Firm
        @endcomponent
    @endslot
Dear {{$user->name}}


<h2>{{ $new_arrival->title }}</h2>

<p>{{ $new_arrival->body }}</p>

click on the link below to see more


@component('mail::button', ['url' => url('/')])
View Arrival
@endcomponent

Regards,<br>
Bulano Accounting & Auditing Firm

{{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <!-- footer here -->
        @endcomponent
    @endslot
@endcomponent