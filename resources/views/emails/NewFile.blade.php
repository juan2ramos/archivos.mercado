@component('mail::message')
# Se ha generado un archivo

Se ha subido un nuevo archivo.
para poder visualizarlo haz clic aquí {{$user->name}}

@component('mail::button', ['url' => $url, 'color'=> 'success'])
    Revisar archivos
@endcomponent
<br>
{{ config('app.name') }}
@endcomponent

