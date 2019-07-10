@component('mail::message')

# Documento descargado.

El usuario {{$user->name}} de la empresa {{$user->client->business_name}} ha visto el
documento {{$file->name}}

<br>
{{ config('app.name') }}

@endcomponent
