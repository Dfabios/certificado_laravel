<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Orientado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">Detalhes do Orientado</h3>
                        <div>
                            <a href="{{ route('orientados.edit', $orientado) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Editar
                            </a>
                            <a href="{{ route('orientados.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Voltar
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-lg font-medium text-gray-900 mb-4">Informações Básicas</h4>
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Nome</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $orientado->nome_orientado }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Data de Inclusão</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $orientado->dt_inc->format('d/m/Y H:i') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $orientado->ativo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $orientado->ativo ? 'Ativo' : 'Inativo' }}
                                        </span>
                                    </dd>
                                </div>
                            </dl>
                        </div>

                        <div>
                            <h4 class="text-lg font-medium text-gray-900 mb-4">Títulos</h4>
                            @if($orientado->titulos->count() > 0)
                                <ul class="space-y-2">
                                    @foreach($orientado->titulos as $titulo)
                                        <li class="text-sm text-gray-900">{{ $titulo->dsc_titulo }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-sm text-gray-500">Nenhum título encontrado.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 