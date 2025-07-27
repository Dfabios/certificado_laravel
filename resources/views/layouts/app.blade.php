<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Select2 CSS e JS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        
        <style>
            /* Forçar tema azul */
            .bg-blue-50 { background-color: #eff6ff !important; }
            .bg-blue-100 { background-color: #dbeafe !important; }
            .bg-blue-200 { background-color: #bfdbfe !important; }
            .bg-blue-300 { background-color: #93c5fd !important; }
            .bg-blue-400 { background-color: #60a5fa !important; }
            .bg-blue-500 { background-color: #3b82f6 !important; }
            .bg-blue-600 { background-color: #2563eb !important; }
            .bg-blue-700 { background-color: #1d4ed8 !important; }
            .bg-blue-800 { background-color: #1e40af !important; }
            .bg-blue-900 { background-color: #1e3a8a !important; }
            
            .text-blue-50 { color: #eff6ff !important; }
            .text-blue-100 { color: #dbeafe !important; }
            .text-blue-200 { color: #bfdbfe !important; }
            .text-blue-300 { color: #93c5fd !important; }
            .text-blue-400 { color: #60a5fa !important; }
            .text-blue-500 { color: #3b82f6 !important; }
            .text-blue-600 { color: #2563eb !important; }
            .text-blue-700 { color: #1d40af !important; }
            .text-blue-800 { color: #1e40af !important; }
            .text-blue-900 { color: #1e3a8a !important; }
            
            .border-blue-50 { border-color: #eff6ff !important; }
            .border-blue-100 { border-color: #dbeafe !important; }
            .border-blue-200 { border-color: #bfdbfe !important; }
            .border-blue-300 { border-color: #93c5fd !important; }
            .border-blue-400 { border-color: #60a5fa !important; }
            .border-blue-500 { border-color: #3b82f6 !important; }
            .border-blue-600 { border-color: #2563eb !important; }
            .border-blue-700 { border-color: #1d4ed8 !important; }
            .border-blue-800 { border-color: #1e40af !important; }
            .border-blue-900 { border-color: #1e3a8a !important; }
            
            /* Gradientes */
            .from-blue-50 { --tw-gradient-from: #eff6ff !important; }
            .from-blue-100 { --tw-gradient-from: #dbeafe !important; }
            .from-blue-600 { --tw-gradient-from: #2563eb !important; }
            .from-blue-700 { --tw-gradient-from: #1d4ed8 !important; }
            
            .to-blue-100 { --tw-gradient-to: #dbeafe !important; }
            .to-blue-700 { --tw-gradient-to: #1d4ed8 !important; }
            .to-white { --tw-gradient-to: #ffffff !important; }
            
            /* Hover states */
            .hover\:bg-blue-50:hover { background-color: #eff6ff !important; }
            .hover\:bg-blue-100:hover { background-color: #dbeafe !important; }
            .hover\:bg-blue-700:hover { background-color: #1d4ed8 !important; }
            .hover\:text-blue-100:hover { color: #dbeafe !important; }
            .hover\:text-blue-900:hover { color: #1e3a8a !important; }
            
            /* Focus states */
            .focus\:border-blue-500:focus { border-color: #3b82f6 !important; }
            .focus\:ring-blue-500:focus { --tw-ring-color: #3b82f6 !important; }
            .focus\:ring-blue-300:focus { --tw-ring-color: #93c5fd !important; }
            
            /* Shadow */
            .shadow-lg { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important; }
            .shadow-xl { box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important; }
            
            /* Select2 Custom Styles */
            .select2-container--classic .select2-selection--multiple {
                border-color: #93c5fd !important;
                border-radius: 0.375rem !important;
                min-height: 38px !important;
            }
            
            .select2-container--classic .select2-selection--multiple:focus {
                border-color: #3b82f6 !important;
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
            }
            
            .select2-container--classic .select2-selection--multiple .select2-selection__choice {
                background-color: #3b82f6 !important;
                color: white !important;
                border: none !important;
                border-radius: 0.25rem !important;
                padding: 2px 8px !important;
                margin: 2px !important;
            }
            
            .select2-container--classic .select2-selection--multiple .select2-selection__choice__remove {
                color: white !important;
                margin-right: 5px !important;
            }
            
            .select2-container--classic .select2-selection--multiple .select2-selection__choice__remove:hover {
                color: #dbeafe !important;
            }
            
            .select2-dropdown {
                border-color: #93c5fd !important;
                border-radius: 0.375rem !important;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
            }
            
            .select2-container--classic .select2-results__option--highlighted[aria-selected] {
                background-color: #3b82f6 !important;
                color: white !important;
            }
            
            .select2-search__field {
                border: none !important;
                outline: none !important;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Desktop Sidebar - SEMPRE VISÍVEL -->
            <div class="hidden lg:block lg:fixed lg:inset-y-0 lg:left-0 lg:z-50 lg:w-80">
                <div class="flex flex-col h-full bg-blue-50 border-r-2 border-blue-300">
                    <!-- Sidebar header -->
                    <div class="flex items-center justify-center h-24 px-6 bg-blue-600 border-b border-blue-700">
                        <div class="flex flex-col items-center">
                            <!-- Logomarca da Santa Casa -->
                            <div class="w-16 h-16 mb-3">
                                <img src="{{ asset('images/logo-santacasa.png') }}" alt="Santa Casa de Misericórdia do Pará" class="w-full h-full">
                            </div>
                            <!-- Nome da instituição -->
                            <div class="text-center">
                                <h1 class="text-sm font-bold text-white leading-tight">SANTA CASA DE</h1>
                                <h2 class="text-sm font-bold text-white leading-tight">MISERICÓRDIA</h2>
                                <h3 class="text-sm font-bold text-white leading-tight">DO PARÁ</h3>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sidebar menu -->
                    <div class="flex-1 px-4 py-6 space-y-2">
                        <!-- Dashboard -->
                        <a href="{{ route('dashboard') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="mr-4 h-6 w-6 {{ request()->routeIs('dashboard') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                            Dashboard
                        </a>

                        <!-- Orientadores -->
                        <a href="{{ route('orientadores.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('orientadores.*') ? 'bg-blue-100 text-blue-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="mr-4 h-6 w-6 {{ request()->routeIs('orientadores.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                            Orientadores
                        </a>

                        <!-- Títulos -->
                        <a href="{{ route('titulos.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('titulos.*') ? 'bg-blue-100 text-blue-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="mr-4 h-6 w-6 {{ request()->routeIs('titulos.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Títulos
                        </a>

                        <!-- Orientados -->
                        <a href="{{ route('orientados.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('orientados.*') ? 'bg-blue-100 text-blue-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="mr-4 h-6 w-6 {{ request()->routeIs('orientados.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Orientados
                        </a>

                        <!-- Bancas -->
                        <a href="{{ route('bancas.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('bancas.*') ? 'bg-blue-100 text-blue-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="mr-4 h-6 w-6 {{ request()->routeIs('bancas.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            Bancas
                        </a>

                        <!-- Separador -->
                        <div class="border-t border-gray-200 my-4"></div>

                        <!-- Relatórios -->
                        <div class="px-2 py-1">
                            <h3 class="text-xs font-semibold text-blue-600 uppercase tracking-wider">Relatórios</h3>
                        </div>

                        <!-- Certificados -->
                        <a href="{{ route('relatorios.certificados') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('relatorios.certificados*') ? 'bg-blue-100 text-blue-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="mr-4 h-6 w-6 {{ request()->routeIs('relatorios.certificados*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Certificados
                        </a>

                        <!-- Estatísticas -->
                        <a href="{{ route('relatorios.estatisticas') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('relatorios.estatisticas*') ? 'bg-blue-100 text-blue-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="mr-4 h-6 w-6 {{ request()->routeIs('relatorios.estatisticas*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Estatísticas
                        </a>

                        <!-- Busca Global -->
                        <a href="{{ route('search') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('search*') ? 'bg-blue-100 text-blue-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="mr-4 h-6 w-6 {{ request()->routeIs('search*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Busca Global
                        </a>

                        <!-- User section -->
                        <div class="absolute bottom-0 left-0 right-0 p-4 bg-blue-600">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center">
                                    <span class="text-white font-medium text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-blue-100">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="lg:pl-80">
                <!-- Top navigation -->
                <nav class="bg-blue-600 shadow-lg border-b border-blue-800">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <!-- Left side -->
                            <div class="flex items-center">
                                <!-- Page title -->
                                <div>
                                    <h1 class="text-lg font-semibold text-white">
                                        @if(request()->routeIs('dashboard'))
                                            Dashboard
                                        @elseif(request()->routeIs('orientadores.*'))
                                            Orientadores
                                        @elseif(request()->routeIs('titulos.*'))
                                            Títulos
                                        @elseif(request()->routeIs('orientados.*'))
                                            Orientados
                                        @elseif(request()->routeIs('bancas.*'))
                                            Bancas
                                        @elseif(request()->routeIs('relatorios.certificados*'))
                                            Relatório de Certificados
                                        @elseif(request()->routeIs('relatorios.estatisticas*'))
                                            Relatório de Estatísticas
                                        @else
                                            Sistema de Mestrado
                                        @endif
                                    </h1>
                                </div>
                            </div>

                                                   <!-- Right side -->
                       <div class="flex items-center space-x-4">
                           <!-- Notifications -->
                           <div class="relative">
                               <a href="{{ route('search') }}" class="text-white hover:text-blue-100 px-3 py-2 rounded-md text-sm font-medium">
                                   <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                   </svg>
                               </a>
                           </div>
                           
                           <!-- Logout -->
                           <form method="POST" action="{{ route('logout') }}" class="inline">
                               @csrf
                               <button type="submit" class="text-white hover:text-blue-100 px-3 py-2 rounded-md text-sm font-medium">
                                   <svg class="h-5 w-5 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                   </svg>
                                   Sair
                               </button>
                           </form>
                       </div>
                        </div>
                    </div>
                </nav>

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-1 p-4">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
