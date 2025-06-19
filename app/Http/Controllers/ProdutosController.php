<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogo;
use App\Models\Console;
use App\Models\Figura;

class ProdutosController extends Controller
{
    public function index()
    {
        $jogos = Jogo::all();
        $consoles = Console::all();
        $figuras = Figura::all();

        return view('produtos.index', [
            'jogos' => $jogos,
            'consoles' => $consoles,
            'figuras' => $figuras,
        ]);
    }

    public function createJogo()
    {
        return view('produtos.create_jogo');
    }

    public function storeJogo(Request $request)
    {
        $request->validate([
        'nome' => 'required|string|max:255',
            'desenvolvedor' => 'required|string|max:255',
            'publicadora' => 'required|string|max:255',
            'ano_lancamento' => 'required|integer',
            'genero' => 'required|string|max:255',
            'preco' => 'required|numeric',
        ]);

         Jogo::create($request->all());

        return redirect('/produtos')->with('success', 'Jogo adicionado com sucesso!');
    }

    public function createFigura()
    {
        return view('produtos.create_figura');
    }

    public function storeFigura(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'emporesa' => 'required|string|max:255',
           'personagem' => 'required|string|max:255',
           'edicao' => 'required|integer',
           'genero' => 'required|string|max:255',
           'preco' => 'required|numeric',
       ]);

        Figura::create($request->all());
       return redirect('/produtos')->with('success', 'Figura adicionada com sucesso!');
    }
}