<?php

namespace App\Http\Controllers;

use App\Models\Titulo;
use App\Models\Orientador;
use App\Models\Orientado;
use App\Models\Banca;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return view('search.index', [
                'titulos' => collect(),
                'orientadores' => collect(),
                'orientados' => collect(),
                'bancas' => collect(),
                'query' => ''
            ]);
        }

        // Busca em títulos
        $titulos = Titulo::where('titulos.ativo', true)
            ->where('titulos.dsc_titulo', 'LIKE', "%{$query}%")
            ->with(['orientadores', 'coOrientadores', 'orientados', 'bancasModel'])
            ->limit(10)
            ->get();

        // Busca em orientadores
        $orientadores = Orientador::where('orientadores.ativo', true)
            ->where('orientadores.nome_orientador', 'LIKE', "%{$query}%")
            ->withCount(['titulos' => function($q) {
                $q->where('titulos.ativo', true);
            }])
            ->limit(10)
            ->get();

        // Busca em orientados
        $orientados = Orientado::where('orientados.ativo', true)
            ->where('orientados.nome_orientado', 'LIKE', "%{$query}%")
            ->withCount(['titulos' => function($q) {
                $q->where('titulos.ativo', true);
            }])
            ->limit(10)
            ->get();

        // Busca em bancas
        $bancas = Banca::where('bancas.ativo', true)
            ->whereHas('orientador', function($q) use ($query) {
                $q->where('orientadores.nome_orientador', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('titulo', function($q) use ($query) {
                $q->where('titulos.dsc_titulo', 'LIKE', "%{$query}%");
            })
            ->with(['orientador', 'titulo'])
            ->limit(10)
            ->get();

        return view('search.index', compact('titulos', 'orientadores', 'orientados', 'bancas', 'query'));
    }
} 