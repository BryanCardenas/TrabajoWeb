<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ubicacion',
        'arriendo_id'
    ];

    public function arriendo()
    {
        return $this->belongsTo('App\Models\Arriendo');
    }
}
