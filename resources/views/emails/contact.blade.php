@component('mail::message')
    {{ get_phrase('A Contact Request Sent From ') }}{{ $name }}
    {{ get_phrase('Subject:') }} {{ $subject }}
    <br>
    {{ $details }}
@endcomponent