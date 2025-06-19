<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PedidoConsole extends Pivot
{
    protected $table = 'pedido_console';

    protected $fillable = [
        'pedido_id',
        'console_id',
        'quantidade',
    ];
}
