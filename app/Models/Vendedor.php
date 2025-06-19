<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendedor extends Authenticatable
{
    protected $table = 'vendedores';

    protected $fillable = [
        'nome',
        'email',
        'senha',
    ];
}
