@extends('layouts.master')
@section('content')
    <div class="container pt-4">
        <h1>Lista de vehículos</h1>
        <div class="row justify-content-end">
            @if (Auth::user()->rol === 'Admin')

            <a href="{{ route('vehiculos.create') }}" class="btn btn-success mr-3"><i class="fas fa-plus mr-2"></i>Agregar Vehículo</a>
            @endif
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
                                <th class="bg-primary text-white">Patente Vehículo</th>
                                <th class="bg-primary text-white">Modelo</th>
                                <th class="bg-primary text-white">Marca</th>
                                <th class="bg-primary text-white">Estado</th>
                                <th class="bg-primary text-white">Tipo</th>
                                <th class="bg-primary text-white">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehiculos as $vehiculo)
                                <tr class="text-center">
                                    <td>{{ $vehiculo->patente }}</td>
                                    <td>{{ $vehiculo->modelo }}</td>
                                    <td>{{ $vehiculo->marca }}</td>
                                    <td>{{ $vehiculo->estado }}</td>
                                    <td>{{ $vehiculo->tipo->nombre }}</td>
                                    <td>

                                        <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-info px-3"><i class="far fa-edit"></i>  Editar</a>
                                        @if (Auth::user()->rol === 'Admin')
                                        <form action="{{ route('vehiculos.destroy', $vehiculo->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn px-1  btn-danger"><i class="fas fas fa-trash"></i> Eliminar</button>
                                        </form>

                                        @endif

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
