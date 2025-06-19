<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Console;

class ConsoleController extends Controller
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
        return view('produtos.create_console');
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

        \App\Models\Console::create($request->all());
        return redirect()->route('produtos.index')->with('success', 'Console adicionado com sucesso!');
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
        $console = \App\Models\Console::findOrFail($id);
        return view('produtos.edit_console', compact('console'));
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

        $console = \App\Models\Console::findOrFail($id);
        $console->update($request->all());

        return redirect()->route('produtos.index')->with('success', 'Console atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Console::findOrFail($id)->delete();
        return redirect()->route('produtos.index')->with('success', 'Console removido com sucesso!');
    }
}
