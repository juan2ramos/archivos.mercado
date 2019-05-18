@extends('layouts.app')
@section('title','Categorias')
@section('content')
    <div class="container">
        <h1 class="m-b-28">Categorias</h1>
        <categories-table :categories="{{$categories}}" token="{{ csrf_token() }}" ></categories-table>
    </div>
@endsection
