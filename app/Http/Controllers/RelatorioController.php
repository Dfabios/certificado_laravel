<?php

namespace App\Http\Controllers;

use App\Models\Titulo;
use App\Models\Orientador;
use App\Models\Orientado;
use App\Models\Banca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    /**
     * Display the certificates report page
     */
    public function certificados()
    {
        $titulos = Titulo::where('ativo', true)
            ->with(['orientadores', 'coOrientadores', 'orientados', 'bancas'])
            ->orderBy('dsc_titulo')
            ->get();

        return view('relatorios.certificados', compact('titulos'));
    }

    /**
     * Display the statistics report page
     */
    public function estatisticas()
    {
        // Estatísticas gerais
        $totalOrientadores = Orientador::where('orientadores.ativo', true)->count();
        $totalTitulos = Titulo::where('titulos.ativo', true)->count();
        $totalOrientados = Orientado::where('orientados.ativo', true)->count();
        $totalBancas = Banca::where('bancas.ativo', true)->count();

        // Orientadores com mais títulos
        $orientadoresMaisAtivos = Orientador::where('orientadores.ativo', true)
            ->withCount(['titulos' => function($query) {
                $query->where('titulos.ativo', true);
            }])
            ->orderBy('titulos_count', 'desc')
            ->limit(5)
            ->get();

        // Títulos por mês (últimos 12 meses)
        $titulosPorMes = Titulo::where('titulos.ativo', true)
            ->where('dt_inc', '>=', now()->subMonths(12))
            ->selectRaw('MONTH(dt_inc) as mes, YEAR(dt_inc) as ano, COUNT(*) as total')
            ->groupBy('mes', 'ano')
            ->orderBy('ano', 'desc')
            ->orderBy('mes', 'desc')
            ->get();

        // Orientados com mais títulos
        $orientadosMaisAtivos = Orientado::where('orientados.ativo', true)
            ->withCount(['titulos' => function($query) {
                $query->where('titulos.ativo', true);
            }])
            ->orderBy('titulos_count', 'desc')
            ->limit(5)
            ->get();

        // Bancas por mês (últimos 12 meses)
        $bancasPorMes = Banca::where('bancas.ativo', true)
            ->where('created_at', '>=', now()->subMonths(12))
            ->selectRaw('MONTH(created_at) as mes, YEAR(created_at) as ano, COUNT(*) as total')
            ->groupBy('mes', 'ano')
            ->orderBy('ano', 'desc')
            ->orderBy('mes', 'desc')
            ->get();

        // Títulos sem bancas
        $titulosSemBancas = Titulo::where('titulos.ativo', true)
            ->whereDoesntHave('bancas')
            ->count();

        // Títulos sem orientadores
        $titulosSemOrientadores = Titulo::where('titulos.ativo', true)
            ->whereDoesntHave('orientadores')
            ->count();

        return view('relatorios.estatisticas', compact(
            'totalOrientadores',
            'totalTitulos', 
            'totalOrientados',
            'totalBancas',
            'orientadoresMaisAtivos',
            'titulosPorMes',
            'orientadosMaisAtivos',
            'bancasPorMes',
            'titulosSemBancas',
            'titulosSemOrientadores'
        ));
    }

    /**
     * Generate PDF report for certificates
     */
    public function certificadosPdf()
    {
        $titulos = Titulo::where('ativo', true)
            ->with(['orientadores', 'coOrientadores', 'orientados', 'bancas'])
            ->orderBy('dsc_titulo')
            ->get();

        // Aqui você pode implementar a geração de PDF
        // Por enquanto, retornamos a view
        return view('relatorios.certificados-pdf', compact('titulos'));
    }

    /**
     * Generate PDF report for statistics
     */
    public function estatisticasPdf()
    {
        // Mesmas estatísticas da view
        $totalOrientadores = Orientador::where('orientadores.ativo', true)->count();
        $totalTitulos = Titulo::where('titulos.ativo', true)->count();
        $totalOrientados = Orientado::where('orientados.ativo', true)->count();
        $totalBancas = Banca::where('bancas.ativo', true)->count();

        $orientadoresMaisAtivos = Orientador::where('orientadores.ativo', true)
            ->withCount(['titulos' => function($query) {
                $query->where('titulos.ativo', true);
            }])
            ->orderBy('titulos_count', 'desc')
            ->limit(5)
            ->get();

        $titulosPorMes = Titulo::where('titulos.ativo', true)
            ->where('dt_inc', '>=', now()->subMonths(12))
            ->selectRaw('MONTH(dt_inc) as mes, YEAR(dt_inc) as ano, COUNT(*) as total')
            ->groupBy('mes', 'ano')
            ->orderBy('ano', 'desc')
            ->orderBy('mes', 'desc')
            ->get();

        return view('relatorios.estatisticas-pdf', compact(
            'totalOrientadores',
            'totalTitulos', 
            'totalOrientados',
            'totalBancas',
            'orientadoresMaisAtivos',
            'titulosPorMes'
        ));
    }

    /**
     * Display detailed orientador report
     */
    public function orientadoresDetalhado()
    {
        $orientadores = Orientador::where('orientadores.ativo', true)
            ->withCount(['titulos' => function($query) {
                $query->where('titulos.ativo', true);
            }])
            ->withCount(['titulosCoOrientador' => function($query) {
                $query->where('titulos.ativo', true);
            }])
            ->withCount(['bancas' => function($query) {
                $query->where('bancas.ativo', true);
            }])
            ->orderBy('nome_orientador')
            ->get();

        $estatisticas = [
            'total' => $orientadores->count(),
            'comTitulos' => $orientadores->where('titulos_count', '>', 0)->count(),
            'semTitulos' => $orientadores->where('titulos_count', 0)->count(),
            'mediaTitulos' => $orientadores->avg('titulos_count'),
            'maxTitulos' => $orientadores->max('titulos_count'),
        ];

        return view('relatorios.orientadores-detalhado', compact('orientadores', 'estatisticas'));
    }

    /**
     * Display monthly activity report
     */
    public function atividadeMensal()
    {
        $ano = request('ano', now()->year);
        $mes = request('mes', now()->month);

        $titulosPorMes = Titulo::where('titulos.ativo', true)
            ->whereYear('dt_inc', $ano)
            ->selectRaw('MONTH(dt_inc) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        $bancasPorMes = Banca::where('bancas.ativo', true)
            ->whereYear('created_at', $ano)
            ->selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        $orientadoresPorMes = Orientador::where('orientadores.ativo', true)
            ->whereYear('dt_inc', $ano)
            ->selectRaw('MONTH(dt_inc) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        $meses = [
            1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
            5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
            9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
        ];

        return view('relatorios.atividade-mensal', compact(
            'titulosPorMes', 
            'bancasPorMes', 
            'orientadoresPorMes', 
            'meses', 
            'ano'
        ));
    }

    /**
     * Display system health report
     */
    public function saudeSistema()
    {
        $saude = [
            'titulos' => [
                'total' => Titulo::where('ativo', true)->count(),
                'semOrientadores' => Titulo::where('ativo', true)->whereDoesntHave('orientadores')->count(),
                'semBancas' => Titulo::where('ativo', true)->whereDoesntHave('bancasModel')->count(),
                'semOrientados' => Titulo::where('ativo', true)->whereDoesntHave('orientados')->count(),
            ],
            'orientadores' => [
                'total' => Orientador::where('ativo', true)->count(),
                'inativos' => Orientador::where('ativo', false)->count(),
                'semTitulos' => Orientador::where('ativo', true)->whereDoesntHave('titulos')->count(),
            ],
            'bancas' => [
                'total' => Banca::where('ativo', true)->count(),
                'recentes' => Banca::where('ativo', true)->where('created_at', '>=', now()->subDays(30))->count(),
            ],
            'orientados' => [
                'total' => Orientado::where('ativo', true)->count(),
                'semTitulos' => Orientado::where('ativo', true)->whereDoesntHave('titulos')->count(),
            ]
        ];

        // Calcular score de saúde do sistema (0-100)
        $score = 100;
        
        if ($saude['titulos']['semOrientadores'] > 0) $score -= 20;
        if ($saude['titulos']['semBancas'] > 0) $score -= 15;
        if ($saude['orientadores']['inativos'] > 0) $score -= 10;
        if ($saude['orientadores']['semTitulos'] > 0) $score -= 5;
        
        $score = max(0, $score);

        return view('relatorios.saude-sistema', compact('saude', 'score'));
    }
} 