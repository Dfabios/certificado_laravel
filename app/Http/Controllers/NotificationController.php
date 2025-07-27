<?php

namespace App\Http\Controllers;

use App\Models\Titulo;
use App\Models\Orientador;
use App\Models\Banca;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = $this->getSystemNotifications();
        
        return view('notifications.index', compact('notifications'));
    }

    public function getSystemNotifications()
    {
        $notifications = [];

        // Títulos sem orientadores
        $titulosSemOrientadores = Titulo::where('titulos.ativo', true)
            ->whereDoesntHave('orientadores')
            ->count();
        
        if ($titulosSemOrientadores > 0) {
            $notifications[] = [
                'type' => 'warning',
                'title' => 'Títulos sem Orientadores',
                'message' => "Existem {$titulosSemOrientadores} título(s) sem orientadores atribuídos.",
                'count' => $titulosSemOrientadores,
                'action' => route('titulos.index'),
                'action_text' => 'Ver Títulos'
            ];
        }

        // Títulos sem bancas
        $titulosSemBancas = Titulo::where('titulos.ativo', true)
            ->whereDoesntHave('bancasModel')
            ->count();
        
        if ($titulosSemBancas > 0) {
            $notifications[] = [
                'type' => 'info',
                'title' => 'Títulos sem Bancas',
                'message' => "Existem {$titulosSemBancas} título(s) sem bancas examinadoras.",
                'count' => $titulosSemBancas,
                'action' => route('bancas.create'),
                'action_text' => 'Criar Bancas'
            ];
        }

        // Orientadores inativos
        $orientadoresInativos = Orientador::where('orientadores.ativo', false)->count();
        
        if ($orientadoresInativos > 0) {
            $notifications[] = [
                'type' => 'warning',
                'title' => 'Orientadores Inativos',
                'message' => "Existem {$orientadoresInativos} orientador(es) inativo(s) no sistema.",
                'count' => $orientadoresInativos,
                'action' => route('orientadores.index'),
                'action_text' => 'Ver Orientadores'
            ];
        }

        // Bancas recentes (últimos 7 dias)
        $bancasRecentes = Banca::where('bancas.ativo', true)
            ->where('bancas.created_at', '>=', now()->subDays(7))
            ->count();
        
        if ($bancasRecentes > 0) {
            $notifications[] = [
                'type' => 'success',
                'title' => 'Bancas Recentes',
                'message' => "Foram criadas {$bancasRecentes} banca(s) nos últimos 7 dias.",
                'count' => $bancasRecentes,
                'action' => route('bancas.index'),
                'action_text' => 'Ver Bancas'
            ];
        }

        // Títulos recentes (últimos 7 dias)
        $titulosRecentes = Titulo::where('titulos.ativo', true)
            ->where('titulos.dt_inc', '>=', now()->subDays(7))
            ->count();
        
        if ($titulosRecentes > 0) {
            $notifications[] = [
                'type' => 'success',
                'title' => 'Títulos Recentes',
                'message' => "Foram criados {$titulosRecentes} título(s) nos últimos 7 dias.",
                'count' => $titulosRecentes,
                'action' => route('titulos.index'),
                'action_text' => 'Ver Títulos'
            ];
        }

        return $notifications;
    }

    public function getNotificationCount()
    {
        $notifications = $this->getSystemNotifications();
        return response()->json(['count' => count($notifications)]);
    }
} 