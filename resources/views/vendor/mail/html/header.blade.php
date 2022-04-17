<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'ShaajPlasticsLTD')
{{-- <img src="https://i.ibb.co/tzN2g9g/logo1.png" class="logo" alt="Website Logo"> --}}
<img src="https://shaajplastic.com/frontend/images/logo1.png" class="logo" alt="Website Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
