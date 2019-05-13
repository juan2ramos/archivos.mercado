@extends('layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container">
        <h3>Archivos</h3>
        @csrf
        <div class="dropzone row justify-center "></div>
    </div>
@endsection
