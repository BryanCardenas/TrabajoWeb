@extends('layouts.master')
@section('content')
    <div class="container pt-4">
        <h1>Lista de clientes</h1>
        <div class="row justify-content-end">
            <a href="{{ route('clientes.create') }}" class="btn btn-success mr-3"><i class="fas fa-plus mr-2"></i>Agregar Cliente</a>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row mt-5">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered  table-hover">
                        <thead class="thead-light text-center">
                            <tr>
                                <th class="bg-primary text-white">N° Cliente</th>
                                <th class="bg-primary text-white">Nombre</th>
                                <th class="bg-primary text-white">Apellido</th>
                                <th class="bg-primary text-white">Vehículos arrendados</th>
                                <th class="bg-primary text-white">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr class="text-center">
                                    <td>{{ $cliente->id }}</td>
                                    <td>{{ $cliente->nombre }}</td>
                                    <td>{{ $cliente->apellido }}</td>
                                    <td>{{ $cliente->vehiculos->count() }}</td>
                                    <td>
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-info px-3 mx-3"><i class="far fa-edit"></i>  Editar</a>
                                        <form action="{{ route('clientes.destroy', $cliente->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn px-3 mx-3 btn-danger"><i class="fas fas fa-trash"></i> Eliminar</button>
                                        </form>
                                        <a href="{{ route('clientes.arriendos', $cliente->id) }}" class="btn btn-secondary px-3 mx-3"><i class="fas fa-key"></i>  Ver Arriendos</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
