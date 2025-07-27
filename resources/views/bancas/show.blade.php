<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da Banca') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-blue-800">Detalhes da Banca</h3>
                        <div class="flex space-x-2">
                            <a href="{{ route('bancas.edit', $banca) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                                Editar
                            </a>
                            <a href="{{ route('bancas.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition-colors">
                                Voltar
                            </a>
                        </div>
                    </div>

                    <div class="bg-gray-50 shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Banca #{{ $banca->nr_banca }}
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                Informações detalhadas da banca examinadora
                            </p>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Número da Banca
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $banca->nr_banca }}
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Orientador
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                                            {{ $banca->orientador->nome_orientador }}
                                        </span>
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Título do Trabalho
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded">
                                            {{ $banca->titulo->dsc_titulo }}
                                        </span>
                                    </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Data de Criação
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $banca->created_at->format('d/m/Y H:i') }}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Última Atualização
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $banca->updated_at->format('d/m/Y H:i') }}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Informações Adicionais -->
                    <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
                        <h4 class="text-lg font-medium text-blue-900 mb-4">Informações do Título</h4>
                        
                        @if($banca->titulo->orientadores->count() > 0)
                        <div class="mb-4">
                            <h5 class="text-sm font-medium text-blue-800 mb-2">Orientadores Principais:</h5>
                            <div class="flex flex-wrap gap-2">
                                @foreach($banca->titulo->orientadores as $orientador)
                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                                        {{ $orientador->nome_orientador }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if($banca->titulo->orientados->count() > 0)
                        <div class="mb-4">
                            <h5 class="text-sm font-medium text-blue-800 mb-2">Orientados:</h5>
                            <div class="flex flex-wrap gap-2">
                                @foreach($banca->titulo->orientados as $orientado)
                                    <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded">
                                        {{ $orientado->nome_orientado }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 