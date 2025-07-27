<?php

namespace App\Http\Controllers;

use App\Models\Orientado;
use Illuminate\Http\Request;

class OrientadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orientados = Orientado::where('orientados.ativo', true)->orderBy('orientados.nome_orientado')->get();
        return view('orientados.index', compact('orientados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orientados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_orientado' => 'required|string|max:255',
        ]);

        Orientado::create([
            'nome_orientado' => $request->nome_orientado,
            'ativo' => true,
        ]);

        return redirect()->route('orientados.index')
            ->with('success', 'Orientado criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orientado $orientado)
    {
        $orientado->load('titulos');
        return view('orientados.show', compact('orientado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orientado $orientado)
    {
        return view('orientados.edit', compact('orientado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orientado $orientado)
    {
        $request->validate([
            'nome_orientado' => 'required|string|max:255',
        ]);

        $orientado->update([
            'nome_orientado' => $request->nome_orientado,
        ]);

        return redirect()->route('orientados.index')
            ->with('success', 'Orientado atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orientado $orientado)
    {
        $orientado->update(['ativo' => false]);
        
        return redirect()->route('orientados.index')
            ->with('success', 'Orientado removido com sucesso!');
    }
}
