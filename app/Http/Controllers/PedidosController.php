<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Usuario;
use App\Models\Vendedor;
use App\Models\Jogo;
use App\Models\Console;
use App\Models\Figura;

class PedidosController extends Controller
{
        /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $pedidos = Pedido::all();
        $pedidos = Pedido::with(['usuario', 'vendedor', 'jogos', 'consoles', 'figuras'])->get();

        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $vendedores = Vendedor::all();
        $jogos = Jogo::all();
        $consoles = Console::all();
        $figuras = Figura::all();

        return view('pedidos.create_pedido', compact('usuarios', 'vendedores', 'jogos', 'consoles', 'figuras'));
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pedido = Pedido::create([
            'id_usuario' => $request->id_usuario,
            'id_vendedor' => $request->id_vendedor,
        ]);

        if ($request->jogos) {
            $jogos = [];
            foreach ($request->jogos as $id_jogo => $quantidade) {
                $jogos[$id_jogo] = ['quantidade' => $quantidade];
            }
            $pedido->jogos()->sync($jogos);
        }

        if ($request->consoles) {
            $consoles = [];
            foreach ($request->console as $id_console => $quantidade) {
                $consoles[$id_console] = ['quantidade' => $quantidade];
            }
            $pedido->consoles()->sync($consoles);
        }

        if ($request->figuras) {
            $figuras = [];
            foreach ($request->figuras as $id_figura => $quantidade) {
                $figuras[$id_figura] = ['quantidade' => $quantidade];
            }
            $pedido->figuras()->sync($figuras);
        }

        return redirect()->route('pedidos.index')->with('success', 'Pedido criado com sucesso!');
    }

    public function destroy($id)
    {
        Pedido::findOrFail($id)->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido removido com sucesso!');
    }
}
