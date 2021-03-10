@extends('layouts.master')
@section('content')
<div class="container mt-5">
    <form method="POST" action="{{route('vehiculos.store')}}" enctype="multipart/form-data">
        @csrf
        <h1>Agregar Vehículo</h1>
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
            <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Ingrese el modelo del vehículo">
        </div>

        <div class="form-group col-6">
            <label for="marca">Marca</label>
            <input type="text" id="marca" name="marca" class="form-control" placeholder="Ingrese la marca del vehículo">
        </div>

        <div class="form-group col-6">
            <label for="patente">Patente</label>
            <input type="text" id="patente" name="patente" class="form-control" placeholder="Ingrese la patente del vehículo. Ejemplo: bbbb44 o HB1234">
        </div>


        <div class="form-group col-6">
            <label for="tipo_id">Tipo</label>
            <select name="tipo_id" class="form-control" id="tipo_id">
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-6">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control" id="estado">
                <option  value="Disponible">Disponible</option>
                <option  value="Arrendado">Arrendado</option>
                <option  value="En mantenimiento">En mantenimiento</option>
                <option  value="De baja">De baja</option>
            </select>
        </div>

        <div class="form-group col-6 text-center row justify-content-end ">
            <button type="submit" class="btn btn-primary bg-success  text-center"> <i class="fas fa-check"></i> Agregar vehiculo</button>
            <a href="{{ route('vehiculos.index')}}" class="btn btn-danger ml-3 "> <i class="fas fa-times"></i> Cancelar</a>
        </div>

    </form>

</div>
@endsection
