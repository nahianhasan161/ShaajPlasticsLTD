@component('mail::message')
# You Have a Price Request From Client

Please Provide him the price

@component('mail::button', ['url' => 'google.com'])
Go to website
@endcomponent

Thanks,<br>
{{-- {{ config('app.name') }} --}}
Shaaj Plastics LTD
@endcomponent
