@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font">
            {{ __('Invalid Credentials') }}
        </div>

        <ul class="list-disc list-inside text-sm text-red-200">
            @foreach ($errors->all() as $error)
                <!-- <li>{{ $error }}</li> -->
            @endforeach
        </ul>
    </div>
@endif
