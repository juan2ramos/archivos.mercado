@extends('layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container">
        @include('admin.users.barTop')
        <div class="table-container m-t-36">
            <clients-table token="{{ csrf_token() }}" :clients="{{$clients}}"></clients-table>
        </div>
    </div>
@endsection
