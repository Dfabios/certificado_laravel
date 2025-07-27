<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orientados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-blue-800">Lista de Orientados</h3>
                        <a href="{{ route('orientados.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                            Novo Orientado
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
                                        Nome
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-blue-300 bg-blue-50 text-left text-xs leading-4 font-medium text-blue-700 uppercase tracking-wider">
                                        Data de Inclusão
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-blue-300 bg-blue-50 text-left text-xs leading-4 font-medium text-blue-700 uppercase tracking-wider">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach($orientados as $orientado)
                                    <tr class="hover:bg-blue-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-blue-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $orientado->nome_orientado }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-blue-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $orientado->dt_inc->format('d/m/Y H:i') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-blue-200 text-sm font-medium">
                                            <a href="{{ route('orientados.show', $orientado) }}" class="text-blue-600 hover:text-blue-900 mr-3 transition-colors">Ver</a>
                                            <a href="{{ route('orientados.edit', $orientado) }}" class="text-blue-600 hover:text-blue-900 mr-3 transition-colors">Editar</a>
                                            <form action="{{ route('orientados.destroy', $orientado) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 transition-colors" onclick="return confirm('Tem certeza que deseja remover este orientado?')">
                                                    Remover
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 