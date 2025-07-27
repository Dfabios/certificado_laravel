<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Título') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-blue-800">Editar Título</h3>
                        <a href="{{ route('titulos.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Voltar
                        </a>
                    </div>

                    <form action="{{ route('titulos.update', $titulo) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-6">
                            <label for="dsc_titulo" class="block text-sm font-medium text-blue-900 mb-2">Descrição do Título</label>
                            <input type="text" name="dsc_titulo" id="dsc_titulo" value="{{ old('dsc_titulo', $titulo->dsc_titulo) }}" 
                                   class="mt-1 block w-full border-blue-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm" required>
                            @error('dsc_titulo')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="orientadores" class="block text-sm font-medium text-blue-900 mb-2">Orientadores Principais</label>
                            <select name="orientadores[]" id="orientadores" multiple class="select2-multiple w-full border-blue-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                                @foreach($orientadores as $orientador)
                                    <option value="{{ $orientador->id }}" 
                                        {{ in_array($orientador->id, old('orientadores', $titulo->orientadores->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $orientador->nome_orientador }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-sm text-gray-500">Digite para buscar orientadores...</p>
                            @error('orientadores')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="co_orientadores" class="block text-sm font-medium text-blue-900 mb-2">Co-orientadores</label>
                            <select name="co_orientadores[]" id="co_orientadores" multiple class="select2-multiple w-full border-blue-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                                @foreach($orientadores as $orientador)
                                    <option value="{{ $orientador->id }}" 
                                        {{ in_array($orientador->id, old('co_orientadores', $titulo->coOrientadores->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $orientador->nome_orientador }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-sm text-gray-500">Digite para buscar co-orientadores...</p>
                            @error('co_orientadores')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="orientados" class="block text-sm font-medium text-blue-900 mb-2">Orientados</label>
                            <select name="orientados[]" id="orientados" multiple class="select2-multiple w-full border-blue-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                                @foreach($orientados as $orientado)
                                    <option value="{{ $orientado->id }}" 
                                        {{ in_array($orientado->id, old('orientados', $titulo->orientados->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $orientado->nome_orientado }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-sm text-gray-500">Digite para buscar orientados...</p>
                            @error('orientados')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('titulos.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition-colors">
                                Cancelar
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                                💾 Salvar Alterações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Inicializar Select2 para todos os combos múltiplos
            $('.select2-multiple').select2({
                theme: 'classic',
                placeholder: 'Selecione...',
                allowClear: true,
                width: '100%',
                language: 'pt-BR',
                closeOnSelect: false,
                tags: false,
                tokenSeparators: [',', ' '],
                minimumInputLength: 0,
                maximumSelectionLength: 10,
                templateResult: function(data) {
                    if (data.loading) return data.text;
                    return $('<span>').text(data.text);
                },
                templateSelection: function(data) {
                    return $('<span>').text(data.text);
                }
            });

            // Estilização personalizada para o tema azul
            $('.select2-container--classic .select2-selection--multiple').css({
                'border-color': '#93c5fd',
                'border-radius': '0.375rem'
            });

            $('.select2-container--classic .select2-selection--multiple:focus').css({
                'border-color': '#3b82f6',
                'box-shadow': '0 0 0 3px rgba(59, 130, 246, 0.1)'
            });
        });
    </script>
</x-app-layout> 