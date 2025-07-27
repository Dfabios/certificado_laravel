<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Gestão de Certificados de Mestrado') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
            <!-- Cards de Estatísticas Principais -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 rounded-lg shadow-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-white">Orientadores</h4>
                                                                <p class="text-3xl font-bold text-white">{{ \App\Models\Orientador::where('orientadores.ativo', true)->count() }}</p>
                            <p class="text-blue-100 text-sm">Ativos no sistema</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-green-500 to-green-600 p-4 rounded-lg shadow-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-white">Títulos</h4>
                                                                <p class="text-3xl font-bold text-white">{{ \App\Models\Titulo::where('titulos.ativo', true)->count() }}</p>
                            <p class="text-green-100 text-sm">Trabalhos registrados</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-4 rounded-lg shadow-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-white">Orientados</h4>
                            <p class="text-3xl font-bold text-white">{{ \App\Models\Orientado::where('orientados.ativo', true)->count() }}</p>
                            <p class="text-purple-100 text-sm">Estudantes ativos</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 p-4 rounded-lg shadow-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-white">Bancas</h4>
                            <p class="text-3xl font-bold text-white">{{ \App\Models\Banca::where('bancas.ativo', true)->count() }}</p>
                            <p class="text-yellow-100 text-sm">Examinadoras ativas</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alertas e Status do Sistema -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <!-- Status do Sistema -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Status do Sistema
                        </h3>
                        <div class="space-y-3">
                            @php
                                $titulosSemOrientadores = \App\Models\Titulo::where('titulos.ativo', true)->whereDoesntHave('orientadores')->count();
                                $titulosSemBancas = \App\Models\Titulo::where('titulos.ativo', true)->whereDoesntHave('bancasModel')->count();
                                $orientadoresInativos = \App\Models\Orientador::where('orientadores.ativo', false)->count();
                            @endphp
                            
                            @if($titulosSemOrientadores > 0)
                                <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg border border-red-200">
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-red-800">Títulos sem Orientadores</span>
                                    </div>
                                    <span class="text-lg font-bold text-red-600">{{ $titulosSemOrientadores }}</span>
                                </div>
                            @endif
                            
                            @if($titulosSemBancas > 0)
                                <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-yellow-800">Títulos sem Bancas</span>
                                    </div>
                                    <span class="text-lg font-bold text-yellow-600">{{ $titulosSemBancas }}</span>
                                </div>
                            @endif
                            
                            @if($orientadoresInativos > 0)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-200">
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-gray-800">Orientadores Inativos</span>
                                    </div>
                                    <span class="text-lg font-bold text-gray-600">{{ $orientadoresInativos }}</span>
                                </div>
                            @endif
                            
                            @if($titulosSemOrientadores == 0 && $titulosSemBancas == 0 && $orientadoresInativos == 0)
                                <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg border border-green-200">
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-green-800">Sistema em Conformidade</span>
                                    </div>
                                    <span class="text-lg font-bold text-green-600">✅</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Ações Rápidas -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Ações Rápidas
                        </h3>
                        <div class="space-y-3">
                            <a href="{{ route('titulos.create') }}" class="flex items-center p-3 bg-blue-50 rounded-lg border border-blue-200 hover:bg-blue-100 transition-colors">
                                <svg class="h-5 w-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="text-sm font-medium text-blue-800">Criar Novo Título</span>
                            </a>
                            <a href="{{ route('orientadores.create') }}" class="flex items-center p-3 bg-green-50 rounded-lg border border-green-200 hover:bg-green-100 transition-colors">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="text-sm font-medium text-green-800">Adicionar Orientador</span>
                            </a>
                            <a href="{{ route('bancas.create') }}" class="flex items-center p-3 bg-yellow-50 rounded-lg border border-yellow-200 hover:bg-yellow-100 transition-colors">
                                <svg class="h-5 w-5 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="text-sm font-medium text-yellow-800">Criar Nova Banca</span>
                            </a>
                            <a href="{{ route('relatorios.estatisticas') }}" class="flex items-center p-3 bg-purple-50 rounded-lg border border-purple-200 hover:bg-purple-100 transition-colors">
                                <svg class="h-5 w-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                <span class="text-sm font-medium text-purple-800">Ver Estatísticas</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Atividade Recente -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Atividade Recente
                        </h3>
                        <div class="space-y-3">
                            @php
                                $recentTitulos = \App\Models\Titulo::where('titulos.ativo', true)->orderBy('titulos.dt_inc', 'desc')->limit(3)->get();
                            @endphp
                            
                            @forelse($recentTitulos as $titulo)
                                <div class="flex items-center p-2 bg-gray-50 rounded-lg">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900 truncate">{{ $titulo->dsc_titulo }}</p>
                                        <p class="text-xs text-gray-500">{{ $titulo->dt_inc->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-sm text-gray-500 text-center py-2">Nenhuma atividade recente</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráficos e Métricas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Orientadores Mais Ativos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Orientadores Mais Ativos</h3>
                        <div class="space-y-3">
                            @php
                                $orientadoresMaisAtivos = \App\Models\Orientador::where('orientadores.ativo', true)
                                    ->withCount(['titulos' => function($query) {
                                        $query->where('titulos.ativo', true);
                                    }])
                                    ->orderBy('titulos_count', 'desc')
                                    ->limit(5)
                                    ->get();
                            @endphp
                            
                            @forelse($orientadoresMaisAtivos as $orientador)
                                <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg border border-blue-200">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                            <span class="text-white text-sm font-bold">{{ substr($orientador->nome_orientador, 0, 1) }}</span>
                                        </div>
                                        <span class="ml-3 text-sm font-medium text-gray-900">{{ $orientador->nome_orientador }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-lg font-bold text-blue-600">{{ $orientador->titulos_count }}</span>
                                        <span class="ml-1 text-sm text-gray-500">títulos</span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center py-4">Nenhum orientador encontrado.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Títulos por Mês -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Títulos por Mês (Últimos 6 meses)</h3>
                        <div class="space-y-3">
                            @php
                                $titulosPorMes = \App\Models\Titulo::where('titulos.ativo', true)
                                    ->where('titulos.dt_inc', '>=', now()->subMonths(6))
                                    ->selectRaw('MONTH(titulos.dt_inc) as mes, YEAR(titulos.dt_inc) as ano, COUNT(*) as total')
                                    ->groupBy('mes', 'ano')
                                    ->orderBy('ano', 'desc')
                                    ->orderBy('mes', 'desc')
                                    ->get();
                                
                                $meses = [
                                    1 => 'Jan', 2 => 'Fev', 3 => 'Mar', 4 => 'Abr',
                                    5 => 'Mai', 6 => 'Jun', 7 => 'Jul', 8 => 'Ago',
                                    9 => 'Set', 10 => 'Out', 11 => 'Nov', 12 => 'Dez'
                                ];
                            @endphp
                            
                            @forelse($titulosPorMes as $item)
                                @php
                                    $mesNome = $meses[$item->mes] ?? 'Desconhecido';
                                    $maxTitulos = $titulosPorMes->max('total');
                                    $percentual = $maxTitulos > 0 ? ($item->total / $maxTitulos) * 100 : 0;
                                @endphp
                                <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg border border-green-200">
                                    <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-900">{{ $mesNome }}/{{ $item->ano }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-lg font-bold text-green-600 mr-3">{{ $item->total }}</span>
                                        <div class="w-20 bg-gray-200 rounded-full h-2">
                                            <div class="bg-green-600 h-2 rounded-full" style="width: {{ $percentual }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center py-4">Nenhum dado disponível.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resumo do Sistema -->
            <div class="mt-6 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg border border-blue-200">
                <h4 class="text-lg font-medium text-blue-900 mb-2 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Resumo do Sistema
                </h4>
                <p class="text-blue-700 text-sm">
                    Este sistema permite gerenciar certificados de mestrado da Santa Casa de Misericórdia do Pará, 
                    incluindo orientadores, títulos de trabalhos, estudantes orientados e bancas examinadoras. 
                    Você pode criar, editar e visualizar todas as informações relacionadas aos trabalhos de mestrado.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
