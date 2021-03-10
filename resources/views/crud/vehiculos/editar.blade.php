@extends('layouts.master')
@section('content')
<div class="container mt-5">
    <form method="POST" action="{{route('vehiculos.update', $vehiculo->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Modificar Vehículo</h1>
        <h3 class="my-3">Datos del vehículo</h3>
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
            <label for="modelo">Modelo del vehículo</label>
            <input type="text" id="modelo" value="{{ $vehiculo->modelo }}" name="modelo" class="form-control" placeholder="Ingrese el modelo del vehículo">
        </div>

        <div class="form-group col-6">
            <label for="marca">Marca</label>
            <input type="text" id="marca" name="marca" value="{{ $vehiculo->marca }}" class="form-control" placeholder="Ingrese la marca del vehículo">
        </div>

        <div class="form-group col-6">
            <label for="patente">Patente</label>
            <input type="text" id="patente" value="{{ $vehiculo->patente }}" name="patente" class="form-control" placeholder="Ingrese la patente del vehículo. Ejemplo: bbbb44 o HB1234">
        </div>

        <div class="form-group col-6">
            <label for="tipo_id">Tipo</label>
            <select name="tipo_id" class="form-control" id="tipo_id">
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}" {{ ($tipo->id == $vehiculo->tipo->id) ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-6">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control" id="estado">
                <option {{ ($vehiculo->estado == 'Disponible') ? 'selected' : '' }} value="Disponible">Disponible</option>
                <option {{ ($vehiculo->estado == 'Arrendado') ? 'selected' : '' }} value="Arrendado">Arrendado</option>
                <option {{ ($vehiculo->estado == 'En mantenimiento') ? 'selected' : '' }} value="En mantenimiento">En mantenimiento</option>
                <option {{ ($vehiculo->estado == 'De baja') ? 'selected' : '' }} value="De baja">De baja</option>
            </select>
        </div>

        <div class="form-group col-6 text-center row justify-content-end ">
            <button type="submit" class="btn btn-primary bg-success  text-center"> <i class="fas fa-check"></i> Actualizar vehiculo</button>
            <a href="{{ route('vehiculos.index')}}" class="btn btn-danger ml-3 "> <i class="fas fa-times"></i> Cancelar</a>
        </div>

    </form>
</div>
@endsection
