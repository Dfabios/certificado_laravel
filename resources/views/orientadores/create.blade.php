<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Orientador') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-2xl mx-auto sm:px-4 lg:px-6">
            <!-- Breadcrumb -->
            <nav class="flex mb-6" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('orientadores.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Orientadores
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Novo Orientador</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Criar Novo Orientador</h3>
                            <p class="text-sm text-gray-600 mt-1">Adicione um novo orientador ao sistema</p>
                        </div>
                        <a href="{{ route('orientadores.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Voltar
                        </a>
                    </div>

                    @if($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">
                                        Erro ao criar orientador
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul class="list-disc pl-5 space-y-1">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('orientadores.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h4 class="text-lg font-medium text-gray-900 mb-4">Informações do Orientador</h4>
                            
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="nome_orientador" class="block text-sm font-medium text-gray-700 mb-2">
                                        Nome Completo <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           name="nome_orientador" 
                                           id="nome_orientador" 
                                           value="{{ old('nome_orientador') }}" 
                                           class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('nome_orientador') border-red-300 @enderror"
                                           placeholder="Digite o nome completo do orientador"
                                           required>
                                    @error('nome_orientador')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-sm text-gray-500">Nome completo do orientador conforme documentos oficiais.</p>
                                </div>

                                <div>
                                    <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">
                                        Foto do Orientador
                                    </label>
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center border-2 border-blue-300">
                                                <img id="foto-preview" src="{{ asset('images/default-avatar.svg') }}" alt="Preview" class="w-16 h-16 rounded-full object-cover hidden">
                                                <span id="iniciais-preview" class="text-blue-600 font-bold text-lg">--</span>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <input type="file" 
                                                   name="foto" 
                                                   id="foto" 
                                                   accept="image/*"
                                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('foto') border-red-300 @enderror">
                                            @error('foto')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                            <p class="mt-1 text-sm text-gray-500">Formatos aceitos: JPG, PNG, GIF, SVG. Máximo 2MB.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                            <div class="text-sm text-gray-500">
                                <span class="text-red-500">*</span> Campos obrigatórios
                            </div>
                            <div class="flex space-x-3">
                                <a href="{{ route('orientadores.index') }}" 
                                   class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                    Cancelar
                                </a>
                                <button type="submit" 
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Criar Orientador
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fotoInput = document.getElementById('foto');
            const fotoPreview = document.getElementById('foto-preview');
            const iniciaisPreview = document.getElementById('iniciais-preview');
            const nomeInput = document.getElementById('nome_orientador');

            // Preview da foto
            fotoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        fotoPreview.src = e.target.result;
                        fotoPreview.classList.remove('hidden');
                        iniciaisPreview.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    fotoPreview.classList.add('hidden');
                    iniciaisPreview.classList.remove('hidden');
                    updateIniciais();
                }
            });

            // Preview das iniciais baseado no nome
            nomeInput.addEventListener('input', function() {
                if (!fotoInput.files[0]) {
                    updateIniciais();
                }
            });

            function updateIniciais() {
                const nome = nomeInput.value.trim();
                if (nome) {
                    const nomes = nome.split(' ');
                    let iniciais = '';
                    if (nomes.length >= 2) {
                        iniciais = (nomes[0].charAt(0) + nomes[nomes.length - 1].charAt(0)).toUpperCase();
                    } else {
                        iniciais = nome.substring(0, 2).toUpperCase();
                    }
                    iniciaisPreview.textContent = iniciais;
                } else {
                    iniciaisPreview.textContent = '--';
                }
            }

            // Inicializar iniciais
            updateIniciais();
        });
    </script>
</x-app-layout> 