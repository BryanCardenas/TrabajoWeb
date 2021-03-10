@extends('layouts.master')
@section('content')
<style>
    #estilo{
        width: 500px !important;
        height: 300px !;
    }
</style>
<div class="container pt-4">
    <h1>Lista de imágenes</h1>
    <div class="row">
        <div class="col-6">
            @foreach ($fotos as $foto)
            <div class="card ">
                    <div class="card-body">
                        <img src="{{ Storage::url($foto->ubicacion) }}" id="estilo">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
