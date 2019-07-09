@extends('layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container">
        <h1>Bienvenido {{auth()->user()->name}}</h1>
        Estamos procesado tu solicitud, te notificaremos vía correo electrónico cuando tu identidad sea validada
    </div>
@endsection
