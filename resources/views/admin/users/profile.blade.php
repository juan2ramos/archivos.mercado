@extends('layouts.app')
@section('title','Dashboard')
@section('content')

    @if (session('success'))
        <div class="alert-success">
            <span>{{session('success')}}</span>
        </div>
    @endif
    <div class="container">
        @if ($errors->any())
            <div class="alert-error m-b-32">
                <span>¡Tienes error en el formulario! </span>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 class="m-b-28">TUS DATOS</h2>
        <form action="{{route('profile.update')}}" method="post" class="row Form" autocomplete="off">
            @csrf
            <div class="col-m-8 col-16 p-r-12">
                <h3>DATOS PERSONALES</h3>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="name">Nombre</label>
                    <div class="col-10">
                        <input autocomplete="off" type="text" value="{{old('name',$user->name)}}"
                               name="name" id="name" placeholder="Nombre completo">
                    </div>
                </div>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="email">Correo electronico</label>
                    <div class="col-10">
                        <input type="email" name="email" value="{{old('email',$user->email)}}"
                               id="email" placeholder="Escribir correo" autocomplete="false">
                    </div>
                </div>
                <div class="row middle-items m-t-12">
                    <label class="col-6 is-text-center" for="password">Contraseña</label>
                    <div class="col-10">
                        <input autocomplete="false" type="password" name="password" id="password"
                               placeholder="Generar contraseña">
                    </div>
                </div>
            </div>
            @if (!auth()->user()->isAdmin())
                <div class="col-m-8 col-16  p-l-12">
                    <h3>DATOS DE LA EMPRESA</h3>
                    <div class="row middle-items m-t-12">
                        <label class="col-6 is-text-center" for="business_name">Razón social</label>
                        <div class="col-10">
                            <input autocomplete="off" type="text"
                                   value="{{old('business_name',$user->client->business_name)}}"
                                   name="business_name" id="business_name"
                                   placeholder="Nombre de la empresa">
                        </div>
                    </div>
                    <div class="row middle-items m-t-12">
                        <label class="col-6 is-text-center" for="nit">NIT</label>
                        <div class="col-10 row middle-items">
                            <input autocomplete="off" type="text" name="nit" id="nit"
                                   value="{{old('nit',$user->client->nit)}}"
                                   placeholder="Número de NIT" class="col-10">
                            <span class="col">-</span>
                            <input type="text" class="col-5" name="verification_code"
                                   style="padding: 0" placeholder="CV"
                                   value="{{old('verification_code',$user->client->verification_code)}}">
                        </div>
                    </div>
                    <div class="row middle-items m-t-12">
                        <label class="col-6 is-text-center" for="address">Dirección</label>
                        <div class="col-10">
                            <input autocomplete="off" type="text" value="{{old('address',$user->client->address)}}"
                                   name="address" id="address" placeholder="Dirección de la empresa">
                        </div>
                    </div>

                </div>
            @endif
            <div class="row justify-center m-t-36 is-text-center is-full-width">
                <button type="submit">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
