<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Busca Global') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
            <!-- Barra de Busca -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form method="GET" action="{{ route('search') }}" class="flex gap-4">
                        <div class="flex-1">
                            <input type="text" 
                                   name="q" 
                                   value="{{ $query }}" 
                                   placeholder="Buscar por títulos, orientadores, orientados ou bancas..."
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-lg">
                        </div>
                        <button type="submit" 
                                class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Buscar
                        </button>
                    </form>
                </div>
            </div>

            @if($query)
                <!-- Resultados da Busca -->
                <div class="space-y-6">
                    <!-- Títulos -->
                    @if($titulos->count() > 0)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Títulos ({{ $titulos->count() }})
                                </h3>
                                <div class="space-y-3">
                                    @foreach($titulos as $titulo)
                                        <div class="p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                            <div class="flex justify-between items-start">
                                                <div class="flex-1">
                                                    <h4 class="text-lg font-medium text-gray-900 mb-2">
                                                        <a href="{{ route('titulos.show', $titulo) }}" class="hover:text-blue-600">
                                                            {{ $titulo->dsc_titulo }}
                                                        </a>
                                                    </h4>
                                                    <div class="flex flex-wrap gap-2 mb-2">
                                                        @if($titulo->orientadores->count() > 0)
                                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                                {{ $titulo->orientadores->count() }} orientador(es)
                                                            </span>
                                                        @endif
                                                        @if($titulo->orientados->count() > 0)
                                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                                {{ $titulo->orientados->count() }} orientado(s)
                                                            </span>
                                                        @endif
                                                        @if($titulo->bancasModel->count() > 0)
                                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                                {{ $titulo->bancasModel->count() }} banca(s)
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <p class="text-sm text-gray-500">
                                                        Criado em {{ $titulo->dt_inc->format('d/m/Y') }}
                                                    </p>
                                                </div>
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('titulos.show', $titulo) }}" 
                                                       class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                                        Ver detalhes
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Orientadores -->
                    @if($orientadores->count() > 0)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Orientadores ({{ $orientadores->count() }})
                                </h3>
                                <div class="space-y-3">
                                    @foreach($orientadores as $orientador)
                                        <div class="p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                            <div class="flex justify-between items-start">
                                                <div class="flex-1">
                                                    <h4 class="text-lg font-medium text-gray-900 mb-2">
                                                        <a href="{{ route('orientadores.show', $orientador) }}" class="hover:text-green-600">
                                                            {{ $orientador->nome_orientador }}
                                                        </a>
                                                    </h4>
                                                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                                                        <span>{{ $orientador->titulos_count }} título(s) orientado(s)</span>
                                                        <span>ID: {{ $orientador->id }}</span>
                                                    </div>
                                                </div>
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('orientadores.show', $orientador) }}" 
                                                       class="text-green-600 hover:text-green-800 text-sm font-medium">
                                                        Ver detalhes
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Orientados -->
                    @if($orientados->count() > 0)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                    Orientados ({{ $orientados->count() }})
                                </h3>
                                <div class="space-y-3">
                                    @foreach($orientados as $orientado)
                                        <div class="p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                            <div class="flex justify-between items-start">
                                                <div class="flex-1">
                                                    <h4 class="text-lg font-medium text-gray-900 mb-2">
                                                        <a href="{{ route('orientados.show', $orientado) }}" class="hover:text-purple-600">
                                                            {{ $orientado->nome_orientado }}
                                                        </a>
                                                    </h4>
                                                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                                                        <span>{{ $orientado->titulos_count }} título(s)</span>
                                                        <span>ID: {{ $orientado->id }}</span>
                                                    </div>
                                                </div>
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('orientados.show', $orientado) }}" 
                                                       class="text-purple-600 hover:text-purple-800 text-sm font-medium">
                                                        Ver detalhes
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Bancas -->
                    @if($bancas->count() > 0)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Bancas ({{ $bancas->count() }})
                                </h3>
                                <div class="space-y-3">
                                    @foreach($bancas as $banca)
                                        <div class="p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                            <div class="flex justify-between items-start">
                                                <div class="flex-1">
                                                    <h4 class="text-lg font-medium text-gray-900 mb-2">
                                                        <a href="{{ route('bancas.show', $banca) }}" class="hover:text-yellow-600">
                                                            Banca #{{ $banca->id }}
                                                        </a>
                                                    </h4>
                                                    <div class="text-sm text-gray-600 mb-2">
                                                        <strong>Orientador:</strong> {{ $banca->orientador->nome_orientador }}
                                                    </div>
                                                    <div class="text-sm text-gray-600 mb-2">
                                                        <strong>Título:</strong> {{ $banca->titulo->dsc_titulo }}
                                                    </div>
                                                    @if($banca->nr_banca)
                                                        <div class="text-sm text-gray-500">
                                                            Número da Banca: {{ $banca->nr_banca }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('bancas.show', $banca) }}" 
                                                       class="text-yellow-600 hover:text-yellow-800 text-sm font-medium">
                                                        Ver detalhes
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Nenhum resultado -->
                    @if($titulos->count() == 0 && $orientadores->count() == 0 && $orientados->count() == 0 && $bancas->count() == 0)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-8 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhum resultado encontrado</h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    Tente buscar com termos diferentes ou mais específicos.
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            @else
                <!-- Página inicial da busca -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-8 text-center">
                        <svg class="mx-auto h-16 w-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Busca Global</h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Digite um termo de busca para encontrar títulos, orientadores, orientados ou bancas no sistema.
                        </p>
                        <div class="mt-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 text-sm text-gray-600">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Títulos de trabalhos
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Nomes de orientadores
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                    Nomes de orientados
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Informações de bancas
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout> 