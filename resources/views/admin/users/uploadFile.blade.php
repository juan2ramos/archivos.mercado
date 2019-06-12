@extends('layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert-success">
                <span>¡El archivo ha sido cargado!</span>
            </div>
        @endif
        @if(!empty($errors->first()))
            <div class="row alert-error p-b-20">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <span><a style="color: #788e70;" href="{{route('users.show',$client->nit)}}">
                <- Volver archivos
            </a></span>
        <h1 class="m-b-28">Subir archivo de {{$client->business_name}}</h1>
        @csrf
        <upload-file
                :categories="{{$categories}}"
                :directories="{{$directories}}"
                :client="{{$client}}"
                token="{{ csrf_token() }}"
        >
        </upload-file>
    </div>
@endsection
