<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;

class Usuario extends Authenticable
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'rol',
        'email',
        'password',
        'login'
    ];

    public function marcarLogin()
    {
        $this->login = new DateTime('NOW');
        $this->save();
    }
}
