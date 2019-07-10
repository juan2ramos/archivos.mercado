@component('mail::message')# Usuario verificado

Hemos verificado tu usuario, puedes ingresar a la plataforma y revisar tus documentos.

@component('mail::button', ['url' => config('app.url')])
    Ingresar
@endcomponent

Gracias por confiar en nosotros,<br>
{{ config('app.name') }}
@endcomponent
