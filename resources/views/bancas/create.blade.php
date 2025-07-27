<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nova Banca') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-blue-800">Criar Nova Banca</h3>
                        <a href="{{ route('bancas.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition-colors">
                            Voltar
                        </a>
                    </div>

                    <form action="{{ route('bancas.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="nr_banca" class="block text-sm font-medium text-gray-700">Número da Banca</label>
                            <input type="text" name="nr_banca" id="nr_banca" value="{{ old('nr_banca') }}" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                            @error('nr_banca')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="id_orientadores" class="block text-sm font-medium text-gray-700">Orientador</label>
                            <select name="id_orientadores" id="id_orientadores" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                <option value="">Selecione um orientador</option>
                                @foreach($orientadores as $orientador)
                                    <option value="{{ $orientador->id }}" {{ old('id_orientadores') == $orientador->id ? 'selected' : '' }}>
                                        {{ $orientador->nome_orientador }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_orientadores')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="id_titulos" class="block text-sm font-medium text-gray-700">Título</label>
                            <select name="id_titulos" id="id_titulos" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                <option value="">Selecione um título</option>
                                @foreach($titulos as $titulo)
                                    <option value="{{ $titulo->id }}" {{ old('id_titulos', $tituloSelecionado ? $tituloSelecionado->id : '') == $titulo->id ? 'selected' : '' }}>
                                        {{ $titulo->dsc_titulo }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_titulos')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('bancas.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition-colors">
                                Cancelar
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                                💾 Criar Banca
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 