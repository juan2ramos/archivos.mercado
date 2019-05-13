<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="TopSellers">
    <meta name="author" content="juan2ramos">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') Mercado y Bolsa </title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body data-site="{{env('APP_URL')}}" id="body">
<div class="row">
    <div class="Nav" id="Nav">
        @include('admin.general.nav')
    </div>
    <main class="Main {{Route::current()->uri }} col" id="app">
        @include('admin.general.header')
        @yield('content')
    </main>

</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
