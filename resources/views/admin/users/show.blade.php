@extends('layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container">
        <h1 class="m-b-28">Listado de archivos de {{$client->business_name}}</h1>
        @include('admin.users.barTopFiles')
        <files-table
                :files="{{$files}}"
                :client="{{$client}}"
                token="{{ csrf_token() }}"
                is-file-created="{{$isFileCreated}}"
        ></files-table>
    </div>
@endsection
