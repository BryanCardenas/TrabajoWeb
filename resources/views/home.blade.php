@extends('layouts.master')

@section('content')
<div class="container-fluid pt-4">

    <div class="row justify-content-center pb-5">
        <h1>¿Qué desea hacer?</h1>
    </div>

    <div class="row justify-content-between px-5">
        @if (Auth::user()->rol === 'Admin')
        <div class="card  col-2 text-center">
            <div class="card-header bg-primary  ">
                <h4>Ver usuarios </h4>
                <i class="fas fa-address-card fa-2x"></i>
            </div>

            <div class="card-body align-items-center">
                <p>
                    Visualice la lista de usuarios y gestionelos mediante las acciones correspondientes
                </p>

                <a href="{{ route('usuarios.index') }}" class="btn btn-info">Ir a lista de usuarios</a>
            </div>
        </div>


        <div class="card  col-2 text-center">
            <div class="card-header bg-primary  ">
                <h4>Ver Tipos</h4>
                <i class="fas fa-car-side fa-2x"></i>
            </div>

            <div class="card-body align-items-center">
                <p>
                    Visualice la lista de Tipos y gestionelos mediante las acciones correspondientes
                </p>
                <a href="{{ route('tipos.index') }}" class="btn btn-info">Ir a lista de tipos</a>
            </div>
        </div>
        @endif


        <div class="card  col-2 text-center">
            <div class="card-header bg-primary  ">
                <h4>Ver Vehículos</h4>
                <i class="fas fa-car fa-2x"></i>
            </div>

            <div class="card-body align-items-center">
                <p>
                    Visualice la lista de vehiculos y gestionelos mediante las acciones correspondientes
                </p>
                <a href="{{ route('vehiculos.index') }}" class="btn btn-info">Ir a lista de vehiculos</a>
            </div>
        </div>



        <div class="card  col-2 text-center">
            <div class="card-header bg-primary  ">
                <h4>Ver Arriendos</h4>
                <i class="fas fa-key fa-2x"></i>
            </div>

            <div class="card-body align-items-center">
                <p>
                    Visualice la lista de arriendos y gestionelos mediante las acciones correspondientes
                </p>
                <a href="{{ route('arriendos.index') }}" class="btn btn-info">Ir a lista de arriendos</a>
            </div>
        </div>

        <div class="card  col-2 text-center">
            <div class="card-header bg-primary  ">
                <h4>Ver Clientes</h4>
                <i class="fas fa-user-tie fa-2x"></i>
            </div>
            <div class="card-body align-items-center">
                <p>
                    Visualice la lista de arriendos y gestionelos mediante las acciones correspondientes
                </p>
                <a href="{{ route('clientes.index') }}" class="btn btn-info">Ir a lista de clientes</a>
            </div>

    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger pb-0">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection
