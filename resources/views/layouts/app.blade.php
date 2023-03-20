<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- CDN jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <!-- wireUI -->
        <wireui:scripts />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-notifications /> 

        <div x-data="{ sidebarOpen: false }" class="min-h-screen bg-gray-100">
            <div class="flex flex-row min-h-screen bg-gray-100">
                
                {{-- Sidebar principal --}}
                <x-sidebar-principal></x-sidebar-principal>

                <main class="main flex flex-col flex-grow  md:ml-0 transition-all duration-150 ease-in">
                    
                    {{-- Headers principal --}}
                    <x-header-ppal></x-header-ppal>
                    
                    <div class="main-content bg-white flex flex-col flex-grow p-4">
                        <h1 class="font-bold text-2xl text-gray-700">Dashboard</h1>
                        <div class="flex flex-col flex-grow rounded mt-4">
                            {{ $slot }}
                        </div>
                    </div>

                    {{-- Footer principal --}}
                    <x-footer-ppal></x-footer-ppal>

                </main>
            </div>
        </div>


        @stack('modals')

        @livewireScripts

    </body>
</html>
