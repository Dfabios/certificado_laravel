<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrientadorController;
use App\Http\Controllers\TituloController;
use App\Http\Controllers\OrientadoController;
use App\Http\Controllers\BancaController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\SearchController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rotas para Orientadores
    Route::resource('orientadores', OrientadorController::class)->parameters([
        'orientadores' => 'orientador'
    ]);
    
    // Rotas para Títulos
    Route::resource('titulos', TituloController::class)->parameters([
        'titulos' => 'titulo'
    ]);
    Route::get('/titulos/{titulo}/certificado', [TituloController::class, 'certificado'])->name('titulos.certificado');
    
    // Rotas para Orientados
    Route::resource('orientados', OrientadoController::class)->parameters([
        'orientados' => 'orientado'
    ]);
    
    // Rotas para Bancas
    Route::resource('bancas', BancaController::class)->parameters([
        'bancas' => 'banca'
    ]);

// Rotas de Relatórios
Route::get('/relatorios/certificados', [RelatorioController::class, 'certificados'])->name('relatorios.certificados');
Route::get('/relatorios/estatisticas', [RelatorioController::class, 'estatisticas'])->name('relatorios.estatisticas');
Route::get('/relatorios/certificados/pdf', [RelatorioController::class, 'certificadosPdf'])->name('relatorios.certificados.pdf');
Route::get('/relatorios/estatisticas/pdf', [RelatorioController::class, 'estatisticasPdf'])->name('relatorios.estatisticas.pdf');
Route::get('/relatorios/orientadores-detalhado', [RelatorioController::class, 'orientadoresDetalhado'])->name('relatorios.orientadores-detalhado');
Route::get('/relatorios/atividade-mensal', [RelatorioController::class, 'atividadeMensal'])->name('relatorios.atividade-mensal');
Route::get('/relatorios/saude-sistema', [RelatorioController::class, 'saudeSistema'])->name('relatorios.saude-sistema');

// Rota de Busca Global
Route::get('/search', [SearchController::class, 'search'])->name('search');    

});

require __DIR__.'/auth.php';
