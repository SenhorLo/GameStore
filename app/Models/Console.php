<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    protected $console = 'consoles';

    protected $fillable = [
        'nome',
        'preco',
    ];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_console')->withPivot('quantidade');
    }

}
