@component('mail.components.html.message')

# {{ __('mail.greeting') }}
{{ __('mail.verify.line') }}

@component('mail::button', ['url' => $url])
{{ __('mail.verify.action') }}
@endcomponent

{{ __('mail.salutation') }},<br>
{{ config('app.name') }}

@component('mail.components.html.subcopy')
<div style="width: 100%">
<p>{{ __('mail.verify.button-alt') }}</p>

<a href="{{ $url }}" style="display: inline-block; max-width: 70svw; text-align: center; word-wrap: break-word; white-space: pre-wrap; overflow-wrap: break-word">{{ $url }}</a>

</div>
@endcomponent

@component('mail.components.html.footer')
Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, dignissimos? Aperiam eum qui quisquam,
perferendis velit nemo architecto est consequatur aliquid aspernatur odit dignissimos a nam
distinctio optio eligendi natus?
@endcomponent

@endcomponent