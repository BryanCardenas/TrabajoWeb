@extends('layouts.master')
@section('content')
    <div class="container pt-4">
        <h1>Lista de tipos</h1>
        <div class="row justify-content-end">
            <a href="{{ route('tipos.create') }}" class="btn btn-success mr-3"><i class="fas fa-plus mr-2"></i>Agregar Tipo</a>
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
                                <th class="bg-primary text-white">N° Tipo</th>
                                <th class="bg-primary text-white">Nombre</th>
                                <th class="bg-primary text-white">Precio</th>
                                <th class="bg-primary text-white">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipos as $tipo)
                                <tr class="text-center">
                                    <td>{{ $tipo->id }}</td>
                                    <td>{{ $tipo->nombre }}</td>
                                    <td>{{ $tipo->precio }}</td>
                                    <td>
                                        <a href="{{ route('tipos.edit', $tipo->id) }}" class="btn btn-info px-3 mx-3"><i class="far fa-edit"></i>  Editar</a>
                                        <form action="{{ route('tipos.destroy', $tipo->id)}}" method="POST">
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
            </div>
        </div>
    </div>
@endsection
