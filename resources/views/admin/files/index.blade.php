@extends('layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container">

        <div class="table-container m-t-36">
            <files-all token="{{ csrf_token() }}" :categories="{{$categories}}"></files-all>
        </div>
    </div>
@endsection
