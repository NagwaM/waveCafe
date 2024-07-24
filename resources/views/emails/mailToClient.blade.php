<x-mail::message>
# We Have Received Your Message

Hello {{$data['name'] }}, 

Thank you for contacting us. We have received your message:

@component('mail::panel')
{{ $data['message'] }}
@endcomponent

We will get back to you shortly.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>