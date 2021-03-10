<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'modelo',
        'marca',
        'patente',
        'estado',
        'tipo_id'
    ];

    public function tipo(){
        return $this->belongsTo('App\Models\Tipo');
    }

    public function arriendos(){
        return $this->belongsToMany('App\Models\Cliente', 'arriendos', 'vehiculo_id', 'cliente_id')
        ->using('App\Models\Arriendo');
    }
}
