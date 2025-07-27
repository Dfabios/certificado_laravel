<?php

namespace App\Http\Controllers;

use App\Models\Titulo;
use App\Models\Orientador;
use App\Models\Orientado;
use Illuminate\Http\Request;

class TituloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulos = Titulo::where('titulos.ativo', true)
            ->with(['orientadores', 'coOrientadores', 'orientados', 'bancas'])
            ->orderBy('dsc_titulo')
            ->get();
        return view('titulos.index', compact('titulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orientadores = Orientador::where('orientadores.ativo', true)->orderBy('orientadores.nome_orientador')->get();
        $orientados = Orientado::where('orientados.ativo', true)->orderBy('orientados.nome_orientado')->get();
        return view('titulos.create', compact('orientadores', 'orientados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dsc_titulo' => 'required|string|max:255',
            'orientadores' => 'array',
            'orientadores.*' => 'exists:orientadores,id',
            'co_orientadores' => 'array',
            'co_orientadores.*' => 'exists:orientadores,id',
            'orientados' => 'array',
            'orientados.*' => 'exists:orientados,id',
        ]);

        $titulo = Titulo::create([
            'dsc_titulo' => $request->dsc_titulo,
            'ativo' => true,
        ]);

        if ($request->orientadores) {
            $titulo->orientadores()->attach($request->orientadores, ['ativo' => true]);
        }

        if ($request->co_orientadores) {
            $titulo->coOrientadores()->attach($request->co_orientadores, ['ativo' => true]);
        }

        if ($request->orientados) {
            $titulo->orientados()->attach($request->orientados, ['ativo' => true]);
        }

        return redirect()->route('titulos.index')
            ->with('success', 'Título criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Titulo $titulo)
    {
        $titulo->load(['orientadores', 'coOrientadores', 'orientados', 'bancas']);
        return view('titulos.show', compact('titulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Titulo $titulo)
    {
        $orientadores = Orientador::where('orientadores.ativo', true)->orderBy('orientadores.nome_orientador')->get();
        $orientados = Orientado::where('orientados.ativo', true)->orderBy('orientados.nome_orientado')->get();
        
        $titulo->load(['orientadores', 'coOrientadores', 'orientados']);
        
        return view('titulos.edit', compact('titulo', 'orientadores', 'orientados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Titulo $titulo)
    {
        $request->validate([
            'dsc_titulo' => 'required|string|max:255',
            'orientadores' => 'array',
            'orientadores.*' => 'exists:orientadores,id',
            'co_orientadores' => 'array',
            'co_orientadores.*' => 'exists:orientadores,id',
            'orientados' => 'array',
            'orientados.*' => 'exists:orientados,id',
        ]);

        $titulo->update([
            'dsc_titulo' => $request->dsc_titulo,
        ]);

        // Atualizar relacionamentos
        $titulo->orientadores()->sync($request->orientadores ?? []);
        $titulo->coOrientadores()->sync($request->co_orientadores ?? []);
        $titulo->orientados()->sync($request->orientados ?? []);

        return redirect()->route('titulos.index')
            ->with('success', 'Título atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Titulo $titulo)
    {
        $titulo->update(['ativo' => false]);
        
        return redirect()->route('titulos.index')
            ->with('success', 'Título removido com sucesso!');
    }

    /**
     * Display the certificate for the specified title.
     */
    public function certificado(Titulo $titulo)
    {
        $titulo->load(['orientadores', 'coOrientadores', 'orientados', 'bancas']);
        return view('titulos.certificado', compact('titulo'));
    }
}
