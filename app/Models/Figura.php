<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Figura extends Model
{
    protected $table = 'figura';

    protected $fillable = [
        'nome',
        'preco',
    ];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_figura')->withPivot('quantidade');
    }

}
