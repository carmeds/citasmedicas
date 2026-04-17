<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-6 text-xl font-bold border-b">
                🏥 Citas Médicas
            </div>

            <nav class="p-4 space-y-2">
                <a href="#" class="block px-4 py-2 rounded-lg bg-blue-500 text-white">
                    Dashboard
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-gray-200">
                    Citas
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-gray-200">
                    Pacientes
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-gray-200">
                    Doctores
                </a>
            </nav>
        </aside>

        <!-- CONTENIDO -->
        <main class="flex-1 p-6">

            <!-- HEADER -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold">Dashboard</h1>
                <p class="text-gray-600">Gestión de citas médicas</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div class="col-span-1">
                    <livewire:appointment-create />
                </div>

                <div class="col-span-2">
                    <livewire:appointments-list />
                </div>
            </div>

        </main>
    </div>
</x-app-layout>

