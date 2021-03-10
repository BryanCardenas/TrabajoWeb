@extends('layouts.master')

@section('content')

<div class="container pt-4 ">

    <div class="card col-5 offset-4">
        <div class="card-header">
            <h1>Inicio de sesión</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('usuarios.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Dirección de email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger pb-0">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection
