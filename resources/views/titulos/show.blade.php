<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Título') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">Detalhes do Título</h3>
                        <div>
                            <a href="{{ route('titulos.edit', $titulo) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Editar
                            </a>
                            <a href="{{ route('titulos.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Voltar
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-lg font-medium text-gray-900 mb-4">Informações Básicas</h4>
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Título</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $titulo->dsc_titulo }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Data de Inclusão</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $titulo->dt_inc->format('d/m/Y H:i') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $titulo->ativo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $titulo->ativo ? 'Ativo' : 'Inativo' }}
                                        </span>
                                    </dd>
                                </div>
                            </dl>
                        </div>

                        <div>
                            <h4 class="text-lg font-medium text-gray-900 mb-4">Orientadores Principais</h4>
                            @if($titulo->orientadores->count() > 0)
                                <ul class="space-y-2">
                                    @foreach($titulo->orientadores as $orientador)
                                        <li class="text-sm text-gray-900">{{ $orientador->nome_orientador }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-sm text-gray-500">Nenhum orientador principal encontrado.</p>
                            @endif

                            <h4 class="text-lg font-medium text-gray-900 mb-4 mt-6">Co-orientadores</h4>
                            @if($titulo->coOrientadores->count() > 0)
                                <ul class="space-y-2">
                                    @foreach($titulo->coOrientadores as $orientador)
                                        <li class="text-sm text-gray-900">{{ $orientador->nome_orientador }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-sm text-gray-500">Nenhum co-orientador encontrado.</p>
                            @endif

                            <h4 class="text-lg font-medium text-gray-900 mb-4 mt-6">Orientados</h4>
                            @if($titulo->orientados->count() > 0)
                                <ul class="space-y-2">
                                    @foreach($titulo->orientados as $orientado)
                                        <li class="text-sm text-gray-900">{{ $orientado->nome_orientado }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-sm text-gray-500">Nenhum orientado encontrado.</p>
                            @endif

                            <h4 class="text-lg font-medium text-gray-900 mb-4 mt-6">Bancas</h4>
                            @if($titulo->bancasModel->count() > 0)
                                <div class="space-y-3">
                                    @foreach($titulo->bancasModel as $banca)
                                        <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg border border-blue-200">
                                            <div>
                                                <span class="text-sm font-medium text-blue-900">{{ $banca->orientador->nome_orientador }}</span>
                                                @if($banca->nr_banca)
                                                    <span class="text-xs text-blue-600 ml-2">(Banca: {{ $banca->nr_banca }})</span>
                                                @endif
                                            </div>
                                            <a href="{{ route('bancas.edit', $banca) }}" class="text-xs text-blue-600 hover:text-blue-800">
                                                Editar
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <p class="text-sm text-gray-500 mb-3">Nenhuma banca encontrada.</p>
                                    <a href="{{ route('bancas.create') }}?titulo_id={{ $titulo->id }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Criar Banca
                                    </a>
                                </div>
                            @endif
                            
                            @if($titulo->bancasModel->count() > 0)
                                <div class="mt-4">
                                    <a href="{{ route('bancas.create') }}?titulo_id={{ $titulo->id }}" class="inline-flex items-center px-3 py-2 border border-blue-300 text-sm leading-4 font-medium rounded-md text-blue-700 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Adicionar Banca
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 