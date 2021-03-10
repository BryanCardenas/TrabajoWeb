@extends('layouts.master')
@section('content')
<div class="container mt-5">
    <form method="POST" action="{{route('usuarios.update', $usuario->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Modificar Usuario</h1>
        <h3 class="my-3">Datos del usuario</h3>
        @if ($errors->any())
            <div class="alert alert-danger col-6 align-items-center justify-content-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group col-6">
            <label for="nombre">Nombres del usuario</label>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese los nombres del usuario" value="{{ $usuario->nombre ?? '' }}">
        </div>

        <div class="form-group col-6">
            <label for="apellido">Apellidos del usuario</label>
            <input type="text" id="apellido" name="apellido" class="form-control"  placeholder="Ingrese los apellidos del usuario" value="{{ $usuario->apellido ?? '' }}">
        </div>

        <div class="form-group col-6">
            <label for="rol">Rol del usuario</label>
            <select name="rol" class="form-control" id="rol">
                <option value="Admin" {{ ($usuario->rol == 'Admin' ) ? 'selected' : '' }}>Admin</option>
                <option value="Ejecutivo" {{ ($usuario->rol == 'Ejecutivo' ) ? 'selected' : '' }}>Ejecutivo</option>
            </select>
        </div>

        <div class="form-group col-6">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" value="{{ $usuario->email ?? ''}}" class="form-control" placeholder="Ingrese el correo electrónico del usuario">
        </div>

        <div class="form-group col-6">
            <label for="password">Contraseña del usuario</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese la contraseña del usuario. (Mínimo 6 carácteres)">
        </div>

        <div class="form-group col-6">
            <label for="password_confirmation">Confirmar contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Repita la contraseña del usuario. (Mínimo 6 carácteres)">
        </div>

        <div class="form-group col-6 text-center row justify-content-end ">
            <button type="submit" class="btn btn-primary bg-success  text-center"> <i class="fas fa-check"></i> Actualizar usuario</button>
            <a href="{{ route('usuarios.index')}}" class="btn btn-danger ml-3 "> <i class="fas fa-times"></i> Cancelar</a>
        </div>

    </form>

</div>
@endsection
