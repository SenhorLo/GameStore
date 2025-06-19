<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PedidoJogo extends Pivot
{
    protected $table = 'pedido_jogo';

    protected $fillable = [
        'pedido_id',
        'jogo_id',
        'quantidade',
    ];
}
