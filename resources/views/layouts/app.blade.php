<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased">

<div class="min-h-screen bg-gray-100">

    <!-- NAV SUPERIOR -->
    @include('layouts.navigation')

    <!-- CONTENEDOR FLEX -->
    <div class="flex">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-white shadow-md min-h-screen">
            <div class="p-6 text-xl font-bold border-b">
                🏥 Citas Médicas
            </div>

            <nav class="p-4 space-y-2">
                <a href="{{ route('dashboard') }}"
                   class="block px-4 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'hover:bg-gray-200' }}">
                    Dashboard
                </a>

                <a href="{{ route('citas.index') }}"
                   class="block px-4 py-2 rounded-lg {{ request()->routeIs('citas.*') ? 'bg-blue-500 text-white' : 'hover:bg-gray-200' }}">
                    Citas
                </a>

                <a href="{{ route('pacientes.index') }}"
                class="block px-4 py-2 rounded-lg {{ request()->routeIs('pacientes.*') ? 'bg-blue-500 text-white' : 'hover:bg-gray-200' }}">
                    Pacientes
                </a>

               <a href="{{ route('doctores.index') }}"
                class="block px-4 py-2 rounded-lg {{ request()->routeIs('doctores.*') ? 'bg-blue-500 text-white' : 'hover:bg-gray-200' }}">
                    Doctores
                </a>

            </nav>
        </aside>

        <!-- CONTENIDO -->
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>

    </div>

</div>

@livewireScripts
</body>
</html>
