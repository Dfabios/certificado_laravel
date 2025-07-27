<?php

namespace App\Http\Controllers;

use App\Models\Orientador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrientadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orientadores = Orientador::where('orientadores.ativo', true)->orderBy('orientadores.nome_orientador')->get();
        return view('orientadores.index', compact('orientadores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orientadores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_orientador' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'nome_orientador' => $request->nome_orientador,
            'ativo' => true,
        ];

        // Upload da foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nomeArquivo = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/orientadores', $nomeArquivo);
            $data['foto'] = $nomeArquivo;
        }

        Orientador::create($data);

        return redirect()->route('orientadores.index')
            ->with('success', 'Orientador criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orientador $orientador)
    {
        $orientador->load(['titulos', 'titulosCoOrientador', 'bancas']);
        return view('orientadores.show', compact('orientador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orientador $orientador)
    {
        return view('orientadores.edit', compact('orientador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orientador $orientador)
    {
        $request->validate([
            'nome_orientador' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'nome_orientador' => $request->nome_orientador,
        ];

        // Upload da nova foto
        if ($request->hasFile('foto')) {
            // Remover foto antiga se existir
            if ($orientador->foto && Storage::exists('public/orientadores/' . $orientador->foto)) {
                Storage::delete('public/orientadores/' . $orientador->foto);
            }

            $foto = $request->file('foto');
            $nomeArquivo = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/orientadores', $nomeArquivo);
            $data['foto'] = $nomeArquivo;
        }

        $orientador->update($data);

        return redirect()->route('orientadores.index')
            ->with('success', 'Orientador atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orientador $orientador)
    {
        // Remover foto se existir
        if ($orientador->foto && Storage::exists('public/orientadores/' . $orientador->foto)) {
            Storage::delete('public/orientadores/' . $orientador->foto);
        }

        $orientador->update(['ativo' => false]);
        
        return redirect()->route('orientadores.index')
            ->with('success', 'Orientador removido com sucesso!');
    }
}
