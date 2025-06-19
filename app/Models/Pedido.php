<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Vendedor;
use App\Models\PedidoJogo;
use App\Models\PedidoFigura;
use App\Models\PedidoConsole;
class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'id_usuario',
        'id_vendedor',
        'id_jogo',
        'id_figura',
        'id_console',
    ];

    public function usuario()
    {   
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'id_vendedor');
    }

    public function jogos()
    {
        return $this->belongsToMany(Jogo::class, 'pedido_jogo')
                    ->withPivot('quantidade')
                    ->using(PedidoJogo::class);
    }

    public function consoles()
    {
        return $this->belongsToMany(Console::class, 'pedido_console')
                    ->withPivot('quantidade')
                    ->using(PedidoConsole::class);
    }

    public function figuras()
    {
        return $this->belongsToMany(Figura::class, 'pedido_figura')
                    ->withPivot('quantidade')
                    ->using(PedidoFigura::class);
    }

}
