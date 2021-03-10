@extends('layouts.master')
@section('content')
<div class="container mt-5">

    <form method="POST" action="{{route('arriendos.update', $arriendo->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Modificar Arriendo</h1>
        <h3 class="my-3">Datos del Arriendo</h3>
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
            <label for="fecha_salida">Fecha de salida</label>
            <input type="datetime-local" id="fecha_salida" name="fecha_salida" value="{{ $arriendo->fecha_salida ?? '' }}" class="form-control" placeholder="Seleccione la fecha de inicio del arriendo">
        </div>

        <input type="hidden" name="vehiculo_id" value="{{ $arriendo->vehiculo_id }}">
        <div class="form-group col-6">
            <label for="fecha_llegada">Fecha de entrega</label>
            <input type="datetime-local" id="fecha_llegada" name="fecha_llegada" value="{{ $arriendo->fecha_llegada ?? '' }}" class="form-control" placeholder="Ingrese la marca del vehículo">
        </div>

        <div class="form-group col-6">
            <label for="cliente_id">Clientes</label>
            <select name="cliente_id" class="form-control" id="cliente_id">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}  {{ $cliente->apellido }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-6">
            <label for="fotos" class="form-label">Imagenes de la devolución</label>
            <input class="form-control" type="file" id="fotos" name="fotos">
        </div>

        <div class="form-group col-6 text-center row justify-content-end ">
            <button type="submit" class="btn btn-primary bg-success\  text-center"> <i class="fas fa-check"></i> Actualizar arriendo</button>
            <a href="{{ route('arriendos.index')}}" class="btn btn-danger ml-3 "> <i class="fas fa-times"></i> Cancelar</a>
        </div>

    </form>
</div>
@endsection
