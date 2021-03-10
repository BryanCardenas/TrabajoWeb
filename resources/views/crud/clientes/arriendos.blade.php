@extends('layouts.master')
@section('content')
<div class="container pt-4">
    <h1>Lista de arriendos de {{ $cliente->nombre.' '. $cliente->apellido}}</h1>
    <div class="row justify-content-end">
        <a href="{{ route('arriendos.create') }}" class="btn btn-success mr-3"><i class="fas fa-plus mr-2"></i>Agregar arriendo</a>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered  table-hover">
                    <thead class="thead-light text-center">
                        <tr>
                            <th class="bg-primary text-white">N° Arriendo</th>
                            <th class="bg-primary text-white">Fecha y hora de salida</th>
                            <th class="bg-primary text-white">Fecha y hora de llegada</th>
                            <th class="bg-primary text-white">Vehículo arrendado</th>
                            <th class="bg-primary text-white">Precio</th>
                            <th class="bg-primary text-white">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arriendos as $arriendo)
                            <tr class="text-center">
                                <td>{{ $arriendo->id }}</td>
                                <td>{{ date('d-m-Y H:i:s',strtotime($arriendo->fecha_salida)) }}</td>
                                <td>
                                    @if ($arriendo->fecha_llegada === null) Este vehículo aún no se ha entregado @else {{ date('d-m-Y H:i:s',strtotime($arriendo->fecha_llegada)) }} @endif
                                </td>
                                <td>{{ $arriendo->vehiculo->marca." ". $arriendo->vehiculo->modelo}}</td>
                                <td>${{ $arriendo->vehiculo->tipo->precio }}</td>
                                <td>
                                    <div class="row">

                                        <a href="{{ route('arriendos.edit',$arriendo->id) }}" class="btn btn-info px-3 mx-3"><i class="far fa-edit"></i>  Editar</a>
                                        <form action="{{ route('arriendos.destroy', $arriendo->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn mx-2 btn-danger"><i class="fas fas fa-trash"></i> Eliminar</button>
                                        </form>
                                        <a href="{{ route('arriendos.imagenes',$arriendo->id) }}" class="btn btn-secondary px-3 mx-3"><i class="far fa-images"></i>  Ver Imagenes</a>
                                    </div>
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
