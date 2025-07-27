<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Relatório de Estatísticas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Cards de Estatísticas Gerais -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-blue-50 p-6 rounded-lg border border-blue-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <div class="text-2xl font-bold text-blue-600">{{ $totalOrientadores }}</div>
                            <div class="text-sm text-blue-800">Orientadores</div>
                        </div>
                    </div>
                </div>

                <div class="bg-green-50 p-6 rounded-lg border border-green-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <div class="text-2xl font-bold text-green-600">{{ $totalTitulos }}</div>
                            <div class="text-sm text-green-800">Títulos</div>
                        </div>
                    </div>
                </div>

                <div class="bg-purple-50 p-6 rounded-lg border border-purple-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <div class="text-2xl font-bold text-purple-600">{{ $totalOrientados }}</div>
                            <div class="text-sm text-purple-800">Orientados</div>
                        </div>
                    </div>
                </div>

                <div class="bg-yellow-50 p-6 rounded-lg border border-yellow-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <div class="text-2xl font-bold text-yellow-600">{{ $totalBancas }}</div>
                            <div class="text-sm text-yellow-800">Bancas</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alertas e Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Status do Sistema</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg border border-red-200">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                    </svg>
                                    <span class="text-sm font-medium text-red-800">Títulos sem Orientadores</span>
                                </div>
                                <span class="text-lg font-bold text-red-600">{{ $titulosSemOrientadores }}</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                    </svg>
                                    <span class="text-sm font-medium text-yellow-800">Títulos sem Bancas</span>
                                </div>
                                <span class="text-lg font-bold text-yellow-600">{{ $titulosSemBancas }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Ações Rápidas</h3>
                        <div class="space-y-3">
                            <a href="{{ route('titulos.create') }}" class="flex items-center p-3 bg-blue-50 rounded-lg border border-blue-200 hover:bg-blue-100 transition-colors">
                                <svg class="h-5 w-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="text-sm font-medium text-blue-800">Criar Novo Título</span>
                            </a>
                            <a href="{{ route('bancas.create') }}" class="flex items-center p-3 bg-green-50 rounded-lg border border-green-200 hover:bg-green-100 transition-colors">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="text-sm font-medium text-green-800">Criar Nova Banca</span>
                            </a>
                            <a href="{{ route('relatorios.certificados.pdf') }}" target="_blank" class="flex items-center p-3 bg-red-50 rounded-lg border border-red-200 hover:bg-red-100 transition-colors">
                                <svg class="h-5 w-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="text-sm font-medium text-red-800">Exportar Relatório PDF</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráficos e Tabelas -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Orientadores Mais Ativos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Orientadores Mais Ativos</h3>
                        <div class="space-y-3">
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

                <!-- Orientados Mais Ativos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Orientados Mais Ativos</h3>
                        <div class="space-y-3">
                            @forelse($orientadosMaisAtivos as $orientado)
                                <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg border border-green-200">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                                            <span class="text-white text-sm font-bold">{{ substr($orientado->nome_orientado, 0, 1) }}</span>
                                        </div>
                                        <span class="ml-3 text-sm font-medium text-gray-900">{{ $orientado->nome_orientado }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-lg font-bold text-green-600">{{ $orientado->titulos_count }}</span>
                                        <span class="ml-1 text-sm text-gray-500">títulos</span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center py-4">Nenhum orientado encontrado.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabela de Títulos por Mês -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Títulos por Mês (Últimos 12 meses)</h3>
                        <a href="{{ route('relatorios.estatisticas.pdf') }}" target="_blank" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition-colors">
                            <svg class="inline-block w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Exportar PDF
                        </a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                        Mês/Ano
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                        Quantidade
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                        Barra
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @forelse($titulosPorMes as $item)
                                    @php
                                        $meses = [
                                            1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
                                            5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
                                            9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
                                        ];
                                        $mesNome = $meses[$item->mes] ?? 'Desconhecido';
                                        $maxTitulos = $titulosPorMes->max('total');
                                        $percentual = $maxTitulos > 0 ? ($item->total / $maxTitulos) * 100 : 0;
                                    @endphp
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900 font-medium">{{ $mesNome }}/{{ $item->ano }}</div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $item->total }}</div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-200">
                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $percentual }}%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                            Nenhum dado encontrado.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 