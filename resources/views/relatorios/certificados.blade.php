<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Relatório de Certificados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-blue-800">Relatório de Certificados</h3>
                        <div class="flex space-x-3">
                            <a href="{{ route('relatorios.certificados.pdf') }}" target="_blank" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition-colors">
                                <svg class="inline-block w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Exportar PDF
                            </a>
                            <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition-colors">
                                Voltar
                            </a>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                                <div class="text-2xl font-bold text-blue-600">{{ $titulos->count() }}</div>
                                <div class="text-sm text-blue-800">Total de Títulos</div>
                            </div>
                            <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                                <div class="text-2xl font-bold text-green-600">{{ $titulos->where('orientadores')->count() }}</div>
                                <div class="text-sm text-green-800">Com Orientadores</div>
                            </div>
                            <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-200">
                                <div class="text-2xl font-bold text-yellow-600">{{ $titulos->where('bancas')->count() }}</div>
                                <div class="text-sm text-yellow-800">Com Bancas</div>
                            </div>
                            <div class="bg-purple-50 p-4 rounded-lg border border-purple-200">
                                <div class="text-2xl font-bold text-purple-600">{{ $titulos->where('orientados')->count() }}</div>
                                <div class="text-sm text-purple-800">Com Orientados</div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-blue-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-blue-300 bg-blue-50 text-left text-xs leading-4 font-medium text-blue-700 uppercase tracking-wider">
                                        Título
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-blue-300 bg-blue-50 text-left text-xs leading-4 font-medium text-blue-700 uppercase tracking-wider">
                                        Orientadores
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-blue-300 bg-blue-50 text-left text-xs leading-4 font-medium text-blue-700 uppercase tracking-wider">
                                        Orientados
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-blue-300 bg-blue-50 text-left text-xs leading-4 font-medium text-blue-700 uppercase tracking-wider">
                                        Bancas
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-blue-300 bg-blue-50 text-left text-xs leading-4 font-medium text-blue-700 uppercase tracking-wider">
                                        Data
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-blue-300 bg-blue-50 text-left text-xs leading-4 font-medium text-blue-700 uppercase tracking-wider">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @forelse($titulos as $titulo)
                                    <tr class="hover:bg-blue-50 transition-colors">
                                        <td class="px-6 py-4 border-b border-blue-200">
                                            <div class="text-sm leading-5 text-gray-900 font-medium">{{ $titulo->dsc_titulo }}</div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-blue-200">
                                            <div class="text-sm leading-5 text-gray-900">
                                                @if($titulo->orientadores->count() > 0)
                                                    @foreach($titulo->orientadores as $orientador)
                                                        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mr-1 mb-1">{{ $orientador->nome_orientador }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="text-gray-500">Nenhum orientador</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-blue-200">
                                            <div class="text-sm leading-5 text-gray-900">
                                                @if($titulo->orientados->count() > 0)
                                                    @foreach($titulo->orientados as $orientado)
                                                        <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded mr-1 mb-1">{{ $orientado->nome_orientado }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="text-gray-500">Nenhum orientado</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-blue-200">
                                            <div class="text-sm leading-5 text-gray-900">
                                                @if($titulo->bancasModel->count() > 0)
                                                    <span class="inline-block bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">
                                                        {{ $titulo->bancasModel->count() }} banca(s)
                                                    </span>
                                                @else
                                                    <span class="text-gray-500">Nenhuma banca</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-blue-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $titulo->dt_inc->format('d/m/Y') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-blue-200 text-sm font-medium">
                                            <a href="{{ route('titulos.certificado', $titulo) }}" target="_blank" class="text-green-600 hover:text-green-900 mr-3 transition-colors">
                                                <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                Certificado
                                            </a>
                                            <a href="{{ route('titulos.show', $titulo) }}" class="text-blue-600 hover:text-blue-900 transition-colors">
                                                <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Ver
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                            Nenhum título encontrado.
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