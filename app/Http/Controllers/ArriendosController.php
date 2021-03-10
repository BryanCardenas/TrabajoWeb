<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArriendoRequest;
use App\Models\Arriendo;
use App\Models\Cliente;
use App\Models\Foto;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArriendosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arriendos = Arriendo::all();
        return view('crud.arrriendos.index', compact('arriendos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculos = Vehiculo::all();
        $clientes = Cliente::all();
        return view('crud.arrriendos.crear', compact('vehiculos','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArriendoRequest $request)
    {
        Arriendo::create($request->all());
        $vehiculo = Vehiculo::find($request->vehiculo_id);
        $vehiculo->estado = 'Arrendado';
        $vehiculo->update();
        // dd($request->all());
        return redirect()->route('arriendos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arriendo  $arriendo
     * @return \Illuminate\Http\Response
     */
    public function show(Arriendo $arriendo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arriendo  $arriendo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculos = Vehiculo::all();
        $clientes = Cliente::all();
        $arriendo = Arriendo::find($id);
        return view('crud.arrriendos.editar', compact('arriendo','vehiculos','clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arriendo  $arriendo
     * @return \Illuminate\Http\Response
     */
    public function update(ArriendoRequest $request, $id)
    {
        $arriendo = Arriendo::find($id);
        $arriendo->fotos()->create(['ubicacion' => $request['fotos']->store('public/imagenes')]);
        $arriendo->update($request->all());
        return redirect()->route('arriendos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arriendo  $arriendo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arriendo = Arriendo::find($id);
        $vehiculo = Vehiculo::find($arriendo->id);
        $vehiculo['estado'] = 'Sin arrendar';
        $arriendo->fotos()->delete();
        $arriendo->delete();
        $vehiculo->update();
        return redirect()->route('arriendos.index');
    }

    public function generarPdf(){
        $usuario = Auth::user();
        $arriendos = Arriendo::all();
        $total = 0;

        foreach ($arriendos as $arriendo) {
            $total = $total + $arriendo->vehiculo->tipo->precio;
        }
        $pdf = PDF::loadView('pdf.reporte', compact('arriendos','total','usuario'));
        return $pdf->download();
    }

    public function imagenes($id)
    {
        $fotos = Foto::where('arriendo_id',$id)->get();
        return view('crud.arrriendos.imagenes', compact('fotos'));
    }
}
