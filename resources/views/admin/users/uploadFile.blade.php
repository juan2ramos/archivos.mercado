@extends('layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container">
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
