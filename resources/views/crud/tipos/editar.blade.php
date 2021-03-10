@extends('layouts.master')
@section('content')
<div class="container mt-5">
    <form method="POST" action="{{route('tipos.update', $tipo->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Modificar Tipo</h1>
        <h3 class="my-3">Datos del tipo</h3>
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
            <label for="nombre">Nombre del tipo</label>
            <input type="text" id="nombre" name="nombre" value="{{ $tipo->nombre }}" class="form-control" placeholder="Ingrese el nombre del tipo">
        </div>

        <div class="form-group col-6">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control" value="{{ $tipo->precio }}" placeholder="Ingrese el precio sin puntos ni comas (Ej: 50000)">
        </div>

        <div class="form-group col-6 text-center row justify-content-end ">
            <button type="submit" class="btn btn-primary bg-success  text-center"> <i class="fas fa-check"></i> Actualizar tipo</button>
            <a href="{{ route('tipos.index')}}" class="btn btn-danger ml-3 "> <i class="fas fa-times"></i> Cancelar</a>
        </div>

    </form>

</div>
@endsection
