@component('mail::message')
# Welcome in Doccure

Your account info.
@component('mail::panel')
 Name:{{$user->name}}<br>
 Email:{{$user->email}}<br>
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/admin'])
Go to CMS
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
