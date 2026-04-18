<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas Médicas</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-blue-600">🏥 Citas Médicas</h1>

            <div class="space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-500">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                        Registrarse
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <section class="bg-gradient-to-r from-blue-600 to-blue-400 py-16">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">

            <div>
                <h2 class="text-4xl font-bold mb-4">
                    Gestiona tus citas médicas fácilmente
                </h2>

                <p class="text-gray-600 mb-6">
                    Agenda y administra citas de forma rápida y eficiente.
                </p>

                @guest
                    <a href="{{ route('register') }}"
                       class="px-6 py-3 bg-slate-600 text-white rounded-lg">
                        Empezar ahora
                    </a>
                @endguest
            </div>

        <img src="{{ asset('images/home.png') }}"
        alt="Home"
        class="drop-shadow-2xl transform hover:scale-105 transition duration-300">

        </div>
    </section>

    <!-- INFO -->
    <section class="py-16 bg-slate-300">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded-xl shadow">
                📅 Gestión de citas
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                👨‍⚕️ Doctores
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                📊 Control total
            </div>

        </div>
    </section>

</body>
</html>
