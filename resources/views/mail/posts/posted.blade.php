@component('mail::message')
# Someone Posted

**{{$user->username}}** has posted on your timeline

The body of your message.

@component('mail::button', ['url' => route('dashboard.index')])
Go see what they wrote
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
