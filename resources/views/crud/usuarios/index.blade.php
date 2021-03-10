@extends('layouts.master')
@section('content')
<div class="container pt-4">
    <h1>Lista de usuarios</h1>
    <div class="row justify-content-end">
        <a href="{{ route('usuarios.create') }}" class="btn btn-success mr-3"><i class="fas fa-plus mr-2"></i>Agregar usuario</a>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered  table-hover">
                    <thead class="thead-light text-center">
                        <tr>
                            <th class="bg-primary text-white">Nombre</th>
                            <th class="bg-primary text-white">Apellido</th>
                            <th class="bg-primary text-white">Email</th>
                            <th class="bg-primary text-white">Última conexión</th>
                            <th class="bg-primary text-white">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr class="text-center">
                                <td>{{ $usuario->nombre }}</td>
                                <td>{{ $usuario->apellido }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    @if ($usuario->login == null)
                                        Usuario no conectado
                                    @else
                                        {{ date( 'd-m-Y H:i:s', strtotime($usuario->login)) }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-info px-3 mx-3"><i class="far fa-edit"></i>  Editar</a>
                                    <form action="{{ route('usuarios.destroy', $usuario->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn px-3 mx-3 btn-danger"><i class="fas fas fa-trash"></i> Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
    </div>
</div>
@endsection
