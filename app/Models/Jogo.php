<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    protected $table = 'jogos';

    protected $fillable = [
        'titulo',
        'preco',
    ];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_jogo')->withPivot('quantidade');
    }

}
