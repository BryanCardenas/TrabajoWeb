@extends('layouts.pdf')

@section('main')



<div class="row justify-content-center">

    <div class="col text-center">
        <h3>Reporte sobre arriendos</h3>
    </div>
</div>

<div class="text-justify">
    <div class="pb-2">
        <p>Estimado/a <b>{{$usuario->nombre}} {{$usuario->apellido}}  </b> se ha realizado el reporte con arriendos, habiendo un total de  <b>{{$arriendos->count()}} arriendos</b>
        </p>
    </div>


    <p>A continuación se adjunta una tabla con los arriendos hasta la fecha:</p>

    <div class="row justify-content-center text-center">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>N° Arriendo</th>
                    <th>Fecha y hora de salida</th>
                    <th>Fecha y hora de entrega</th>
                    <th>Vehículo arrendado</th>
                    <th>Cliente que arrienda</th>
                    <th>Precio</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($arriendos as $arriendo)
                    <tr>
                        <td>{{ $arriendo->id  }}</td>
                        <td>{{ date('d-m-Y H:i:s', strtotime($arriendo->fecha_salida)) }}</td>
                        <td>{{ date('d-m-Y H:i:s', strtotime($arriendo->fecha_llegada)) }}</td>
                        <td>{{ $arriendo->vehiculo->modelo }} - {{ $arriendo->vehiculo->marca }}</td>
                        <td>{{ $arriendo->cliente->nombre }}  {{ $arriendo->cliente->apellido }}</td>
                        <td>$ {{ number_format($arriendo->vehiculo->tipo->precio,0,",",".") ?? ''}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div>
        <p>Se ha obtenido un total de $ {{ number_format($total,0,",",".") ?? ''}}</p>
    </div>
</div>


@endsection
