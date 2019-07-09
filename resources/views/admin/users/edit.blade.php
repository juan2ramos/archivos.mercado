@extends('layouts.app')
@section('title','Dashboard')
@section('content')
    @if ($errors->any())
        <div class="alert-error m-b-32">
            <span>¡Tienes error en el formulario! revisa los campos</span>
        </div>
    @endif
    @if (session('success'))
        <div class="alert-success">
            <span>{{session('success')}}</span>
        </div>
    @endif
    <div class="container">
        <h2 class="m-b-28 is-text-uppercase">USUARIO {{$client->user->name}}</h2>
        <form action="{{route('users.update', $client->nit)}}" method="post" class="row Form">
            @csrf
            @method('put')
            <div class="col-8 p-r-12">
                <h3>DATOS PERSONALES</h3>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="name">Nombre</label>
                    <div class="col-10">
                        <input autocomplete="off" type="text"  value="{{old('name', $client->user->name)}}"
                               name="name" id="name" placeholder="Nombre completo">
                    </div>
                </div>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="email">Correo electronico</label>
                    <div class="col-10">
                        <input type="email" name="email"  value="{{old('email',$client->user->email)}}"
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
            <div class="col-8 p-l-12">
                <h3>DATOS DE LA EMPRESA</h3>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="business_name">Razón social</label>
                    <div class="col-10">
                        <input autocomplete="off" type="text"  value="{{old('business_name', $client->business_name)}}"
                               name="business_name" id="business_name"
                               placeholder="Nombre de la empresa">
                    </div>
                </div>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="nit">NIT</label>
                    <div class="col-10 row middle-items" >
                        <input autocomplete="off" type="text" name="nit" id="nit"  value="{{old('nit', $client->nit)}}"
                               placeholder="Número de NIT" class="col-10">
                        <span class="col">-</span>

                    </div>
                </div>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="address">Dirección</label>
                    <div class="col-10">
                        <input autocomplete="off" type="text"  value="{{old('address', $client->address)}}"
                               name="address" id="address" placeholder="Dirección de la empresa">
                    </div>
                </div>

            </div>
            <div class="row justify-center m-t-36 is-text-center is-full-width">
                <button type="submit">Actualizar usuario</button>
            </div>
        </form>
    </div>
@endsection
