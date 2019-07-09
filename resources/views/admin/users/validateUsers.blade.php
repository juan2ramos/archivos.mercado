@extends('layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container">
        <div class="table-container m-t-36">
            <validate-users token="{{ csrf_token() }}" :users="{{$users}}"></validate-users>
        </div>
    </div>
@endsection
