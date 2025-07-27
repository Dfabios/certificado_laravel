<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bancas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-blue-800">Lista de Bancas</h3>
                        <a href="{{ route('bancas.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                            Nova Banca
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-blue-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-blue-300 bg-blue-50 text-left text-xs leading-4 font-medium text-blue-700 uppercase tracking-wider">
                                        Número da Banca
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-blue-300 bg-blue-50 text-left text-xs leading-4 font-medium text-blue-700 uppercase tracking-wider">
                                        Orientador
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-blue-300 bg-blue-50 text-left text-xs leading-4 font-medium text-blue-700 uppercase tracking-wider">
                                        Título
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-blue-300 bg-blue-50 text-left text-xs leading-4 font-medium text-blue-700 uppercase tracking-wider">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach($bancas as $banca)
                                    <tr class="hover:bg-blue-50 transition-colors">
                                        <td class="px-6 py-4 border-b border-blue-200">
                                            <div class="text-sm leading-5 text-gray-900 font-medium">{{ $banca->nr_banca }}</div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-blue-200">
                                            <div class="text-sm leading-5 text-gray-900">
                                                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $banca->orientador->nome_orientador }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-blue-200">
                                            <div class="text-sm leading-5 text-gray-900">
                                                <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded">{{ $banca->titulo->dsc_titulo }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-blue-200 text-sm font-medium">
                                            <a href="{{ route('bancas.show', $banca) }}" class="text-blue-600 hover:text-blue-900 mr-3 transition-colors">Ver</a>
                                            <a href="{{ route('bancas.edit', $banca) }}" class="text-blue-600 hover:text-blue-900 mr-3 transition-colors">Editar</a>
                                            <form action="{{ route('bancas.destroy', $banca) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 transition-colors" onclick="return confirm('Tem certeza que deseja remover esta banca?')">
                                                    Remover
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($bancas->isEmpty())
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhuma banca encontrada</h3>
                            <p class="mt-1 text-sm text-gray-500">Comece criando uma nova banca.</p>
                            <div class="mt-6">
                                <a href="{{ route('bancas.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                    Nova Banca
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 