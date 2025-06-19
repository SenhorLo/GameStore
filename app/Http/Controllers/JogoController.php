<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogo;
use App\Models\Pedido;

class JogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function view()
    {
        return view('produtos.create_jogo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'preco' => 'required|numeric',
        ]);

        Jogo::create($request->all());

        // Pedido::create([
        //     'id_usuario' => 1,
        //     'id_vendedor' => 1,
        //     'id_jogo' => 1,
        //     'id_livro' => 1,
        //     'id_filme' => null,
        // ]);

        return redirect('/produtos')->with('success', 'Jogo adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jogo = Jogo::findOrFail($id);
        return view('produtos.edit_jogo', compact('jogo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jogo = Jogo::findOrFail($id);
        $jogo->update($request->all());
        return redirect()->route('produtos.index')->with('success', 'Jogo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Jogo::findOrFail($id)->delete();
        return redirect()->route('produtos.index')->with('success', 'Jogo removido com sucesso!');
    }
}
