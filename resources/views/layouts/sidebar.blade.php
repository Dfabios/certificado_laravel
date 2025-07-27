<div x-data="{ sidebarOpen: false }" class="relative">
    <!-- Mobile sidebar overlay -->
    <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 lg:hidden" style="display: none;">
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75" @click="sidebarOpen = false"></div>
    </div>

    <!-- Mobile sidebar -->
    <div x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-blue-50 to-white shadow-xl lg:hidden" style="display: none;">
        <div class="flex flex-col h-full">
            <!-- Sidebar header -->
            <div class="flex items-center justify-between h-16 px-4 bg-gradient-to-r from-blue-600 to-blue-700">
                <div class="flex items-center">
                    <x-application-logo class="block h-8 w-auto fill-current text-white" />
                    <span class="ml-2 text-white font-semibold">Sistema Mestrado</span>
                </div>
                <button @click="sidebarOpen = false" class="text-white hover:text-blue-200">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Mobile sidebar menu -->
            <div class="flex-1 overflow-y-auto">
                @include('layouts.sidebar-menu')
            </div>
        </div>
    </div>

    <!-- Desktop sidebar -->
    <div class="hidden lg:flex lg:flex-shrink-0 lg:fixed lg:inset-y-0 lg:left-0 lg:z-50">
        <div class="flex flex-col w-64">
            <div class="flex flex-col flex-grow pt-5 bg-gradient-to-b from-blue-50 to-white overflow-y-auto border-r border-blue-200">
                <!-- Desktop sidebar header -->
                <div class="flex items-center h-16 px-4 bg-gradient-to-r from-blue-600 to-blue-700">
                    <x-application-logo class="block h-8 w-auto fill-current text-white" />
                    <span class="ml-2 text-white font-semibold">Sistema Mestrado</span>
                </div>
                
                @include('layouts.sidebar-menu')
            </div>
        </div>
    </div>
</div> 