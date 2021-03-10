@extends('layouts.master')
@section('content')
<div class="container mt-5">
    <form method="POST" action="{{route('clientes.store')}}" enctype="multipart/form-data">
        @csrf
        <h1>Agregar Cliente</h1>
        <h3 class="my-3">Datos del cliente</h3>
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
            <label for="nombre">Nombre del cliente</label>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese el nombre del cliente">
        </div>

        <div class="form-group col-6">
            <label for="apellido">Apellidos</label>
            <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Ingrese los apellido del cliente">
        </div>

        <div class="form-group col-6 text-center row justify-content-end ">
            <button type="submit" class="btn btn-primary bg-success  text-center"><i class="fas fa-check"></i>  Agregar cliente</button>
            <a href="{{ route('clientes.index')}}" class="btn btn-danger ml-3 "><i class="fas fa-times"></i>  Cancelar</a>
        </div>

    </form>

</div>
@endsection

