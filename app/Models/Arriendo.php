<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arriendo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'fecha_salida',
        'fecha_llegada',
        'vehiculo_id',
        'cliente_id'
    ];
    public function fotos()
    {
        return $this->hasMany('App\Models\Foto');
    }

    public function vehiculo()
    {
        return $this->belongsTo('App\Models\Vehiculo');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }


    public function getFechaSalidaAttribute($value){
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    public function getFechaLlegadaAttribute($value){
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }
}
