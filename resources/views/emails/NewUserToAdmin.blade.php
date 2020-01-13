@component('mail::message')
# Nuevo usuario registrado

El usuarios {{$user->name}} se ha registrado a la plataforma de archivos de Mercado y Bolsa S.A.

@component('mail::button', ['url' => $url, 'color'=> 'success'])
Revisar solicitudes
@endcomponent
<br>
{{ config('app.name') }}
@endcomponent

