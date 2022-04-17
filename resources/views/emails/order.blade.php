@component('mail::message')
# You Have a Price Request From Client
Name: {{$data->name}}
<br>
Email: {{$data->email}}
<br>
Phone: {{$data->phone}}
<br>
Description:{{$data->description }}

Please Provide him the price of Product:

Name : {{$product->name}}
<br>
Code : {{$product->code}}
<br>
weight : {{$product->weight}}
<br>
Color : {{$product->color}}
<br>
thickness : {{$product->thickness}}
<br>
Quantity : {{$product->quantity}}
@if(env('APP_ENV') == 'production')

    <img src="{{$product->image}}" alt="" srcset="">
@else

<img src="https://shaajplastic.com/frontend/images/logo1.png" alt="" srcset="">
@endif



@component('mail::button', ['url' => 'www.shaajplastics.com'])
Go to website
@endcomponent

Thanks,<br>
{{-- {{ config('app.name') }} --}}
Shaaj Plastics LTD
@endcomponent
