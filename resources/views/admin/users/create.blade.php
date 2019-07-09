@extends('layouts.app')
@section('title','Dashboard')
@section('content')

    @if (session('success'))
        <div class="alert-success">
            <span>{{session('success')}}</span>
        </div>
    @endif

    <div class="container">
        @if($errors->any())
            <div class="row alert-error p-b-20">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-between">
            <h2 class="m-b-28">DATOS NUEVO USUARIO</h2>
            <div><a href="{{route('users.create.admin')}}" class="button" style="padding: 6px 16px !important;">Crear usuario administrador</a></div>
        </div>
        <form action="{{route('users.store')}}" method="post" class="row Form">
            @csrf
            <div class="col-m-8 col-16  p-r-12">
                <h3>DATOS PERSONALES</h3>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="name">Nombre</label>
                    <div class="col-10">
                        <input autocomplete="off" type="text" value="{{old('name')}}"
                               name="name" id="name" placeholder="Nombre completo">
                    </div>
                </div>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="email">Correo electronico</label>
                    <div class="col-10">
                        <input type="email" name="email" value="{{old('email')}}"
                               id="email" placeholder="Escribir correo">
                    </div>
                </div>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="password">Contraseña</label>
                    <div class="col-10">
                        <input autocomplete="off" type="password" name="password" id="password"
                               placeholder="Generar contraseña">
                    </div>
                </div>
            </div>
            <div class="col-m-8 col-16  p-l-12">
                <h3>DATOS DE LA EMPRESA</h3>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="business_name">Razón social</label>
                    <div class="col-10">
                        <input autocomplete="off" type="text" value="{{old('business_name')}}"
                               name="business_name" id="business_name"
                               placeholder="Nombre de la empresa">
                    </div>
                </div>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="nit">NIT</label>
                    <div class="col-10 row middle-items">
                        <input autocomplete="off" type="text" name="nit" id="nit" value="{{old('nit')}}"
                               placeholder="Número de NIT" class="col-10">
                    </div>
                </div>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="address">Dirección</label>
                    <div class="col-10">
                        <input autocomplete="off" type="text" value="{{old('address')}}"
                               name="address" id="address" placeholder="Dirección de la empresa">
                    </div>
                </div>

            </div>
            <div class="row justify-center m-t-36 is-text-center is-full-width">
                <button type="submit">Crear usuario</button>
            </div>
        </form>
    </div>
@endsection
