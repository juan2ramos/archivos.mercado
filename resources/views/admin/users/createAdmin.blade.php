@extends('layouts.app')
@section('title','Dashboard')
@section('content')

    @if (session('success'))
        <div class="alert-success">
            <span>¡El usuario administrador ha sido creado!</span>
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
            <h2 class="m-b-28">DATOS USUARIO ADMIN</h2>
            <div><a href="{{route('users.create')}}" class="button" style="padding: 6px 16px !important;">Crear usuario
                    cliente</a></div>
        </div>
        <form action="{{route('users.store.admin')}}" method="post" class="row Form">
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
            <div class="row justify-center m-t-36 is-text-center is-full-width">
                <button type="submit">Crear usuario</button>
            </div>
        </form>

        <h3>LISTADO DE ADMINISTRADORES</h3>
        <list-admin :admins="{{$admins}}" token="{{csrf_token()}}"></list-admin>
    </div>
@endsection
