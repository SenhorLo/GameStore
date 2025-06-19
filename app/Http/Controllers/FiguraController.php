<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Figura;

class FiguraController extends Controller
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
        return view('produtos.create_figura');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
        ]);

        Figura::create($request->all());
        return redirect('/produtos')->with('success', 'Figura adicionada com sucesso!');
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
        $figura = \App\Models\Figura::findOrFail($id);
        return view('produtos.edit_figura', compact('figura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
        ]);

        $figura = \App\Models\Figura::findOrFail($id);
        $figura->update($request->all());

        return redirect()->route('produtos.index')->with('success', 'Figura atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Figura::findOrFail($id)->delete();
        return redirect()->route('produtos.index')->with('success', 'Figura removida com sucesso!');
    }
}
