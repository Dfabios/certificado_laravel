<?php

namespace App\Http\Controllers;

use App\Models\Banca;
use App\Models\Orientador;
use App\Models\Titulo;
use Illuminate\Http\Request;

class BancaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bancas = Banca::where('bancas.ativo', true)
            ->with(['orientador', 'titulo'])
            ->orderBy('nr_banca')
            ->get();
        return view('bancas.index', compact('bancas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $orientadores = Orientador::where('ativo', true)->orderBy('nome_orientador')->get();
        $titulos = Titulo::where('ativo', true)->orderBy('dsc_titulo')->get();
        $tituloSelecionado = null;
        
        if ($request->has('titulo_id')) {
            $tituloSelecionado = Titulo::find($request->titulo_id);
        }
        
        return view('bancas.create', compact('orientadores', 'titulos', 'tituloSelecionado'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_orientadores' => 'required|exists:orientadores,id',
            'id_titulos' => 'required|exists:titulos,id',
            'nr_banca' => 'required|string|max:255',
        ]);

        Banca::create([
            'id_orientadores' => $request->id_orientadores,
            'id_titulos' => $request->id_titulos,
            'nr_banca' => $request->nr_banca,
            'ativo' => true,
        ]);

        return redirect()->route('bancas.index')
            ->with('success', 'Banca criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banca $banca)
    {
        $banca->load(['orientador', 'titulo']);
        return view('bancas.show', compact('banca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banca $banca)
    {
        $orientadores = Orientador::where('ativo', true)->orderBy('nome_orientador')->get();
        $titulos = Titulo::where('ativo', true)->orderBy('dsc_titulo')->get();
        return view('bancas.edit', compact('banca', 'orientadores', 'titulos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banca $banca)
    {
        $request->validate([
            'id_orientadores' => 'required|exists:orientadores,id',
            'id_titulos' => 'required|exists:titulos,id',
            'nr_banca' => 'required|string|max:255',
        ]);

        $banca->update([
            'id_orientadores' => $request->id_orientadores,
            'id_titulos' => $request->id_titulos,
            'nr_banca' => $request->nr_banca,
        ]);

        return redirect()->route('bancas.index')
            ->with('success', 'Banca atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banca $banca)
    {
        $banca->update(['ativo' => false]);
        
        return redirect()->route('bancas.index')
            ->with('success', 'Banca removida com sucesso!');
    }
} 