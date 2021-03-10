@extends('layouts.master')
@section('content')
<div class="container mt-5">
        <form action="{{ route('usuarios.password') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="password-antigua" class="form-label">Contraseña actual</label>
                <input type="password" class="form-control" id="password-antigua" name="password-antigua">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Nueva contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger pb-1">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
@endsection
