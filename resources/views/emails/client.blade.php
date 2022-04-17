@component('mail::message')
# You Have A Contact Request Form a Client :-

Name: {{$data->name}}
<br>
Email: {{$data->email}}
<br>
phone: {{$data->phone}}
<br>
Description: {{$data->description}}

@component('mail::button', ['url' => 'shaajplastic.com'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
