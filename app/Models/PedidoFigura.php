<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PedidoFigura extends Pivot
{
    protected $table = 'pedido_figura';

    protected $fillable = [
        'pedido_id',
        'figura_id',
        'quantidade',
    ];
}
