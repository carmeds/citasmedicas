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
                        Ingresar
                    </a>
                    <a href="{{ route('register') }}"
                       class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                        Registrarse
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <section class="bg-gradient-to-r from-sky-100 to-sky-50 py-16">
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

        <img src="{{ asset('images/hero.webp') }}"
        alt="Home"
        {{-- class="drop-shadow-2xl transform hover:scale-105 transition duration-300" --}}
        class="rounded-3xl shadow-2xl w-full object-cover"
        >

        </div>
    </section>

    <!-- INFO -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Nuestras Especialidades
                </h2>

                <p class="text-gray-600 max-w-3xl mx-auto">
                    Contamos con médicos especializados en distintas áreas para brindarte
                    una atención integral y de calidad.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

                <a href="#"
                class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition group">

                    <div class="text-5xl mb-4">❤️</div>

                    <h3 class="text-xl font-semibold text-gray-800 group-hover:text-blue-600">
                        Cardiología
                    </h3>

                    <p class="text-gray-600 mt-2">
                        Diagnóstico y tratamiento de enfermedades cardiovasculares.
                    </p>

                </a>

                <a href="#"
                class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition group">

                    <div class="text-5xl mb-4">🩺</div>

                    <h3 class="text-xl font-semibold text-gray-800 group-hover:text-blue-600">
                        Dermatología
                    </h3>

                    <p class="text-gray-600 mt-2">
                        Atención especializada para el cuidado de la piel.
                    </p>

                </a>

                <a href="#"
                class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition group">

                    <div class="text-5xl mb-4">🦴</div>

                    <h3 class="text-xl font-semibold text-gray-800 group-hover:text-blue-600">
                        Neurologia
                    </h3>

                    <p class="text-gray-600 mt-2">
                        Tratamiento de enfermedades articulares y autoinmunes.
                    </p>

                </a>

                <a href="#"
                class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition group">

                    <div class="text-5xl mb-4">👶</div>

                    <h3 class="text-xl font-semibold text-gray-800 group-hover:text-blue-600">
                        Pediatría
                    </h3>

                    <p class="text-gray-600 mt-2">
                        Atención médica especializada para niños y adolescentes.
                    </p>

                </a>

            </div>

        </div>
    </section>

    <section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <!-- Texto -->
            <div>

                <span class="inline-block px-4 py-2 bg-blue-100 text-blue-600 rounded-full font-medium mb-4">
                    Nuestro Equipo Médico
                </span>

                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight mb-6">
                    Un equipo médico calificado
                    <span class="text-blue-600">listo para tu atención</span>
                </h2>

                <p class="text-lg text-gray-600 mb-8">
                    Contamos con profesionales altamente capacitados y con amplia experiencia
                    en diferentes especialidades médicas. Nuestro compromiso es brindarte una
                    atención humana, segura y de calidad.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">

                    <div class="bg-white p-4 rounded-xl shadow-sm">
                        <h3 class="font-bold text-2xl text-blue-600">+50</h3>
                        <p class="text-gray-600 text-sm">
                            Especialistas
                        </p>
                    </div>

                    <div class="bg-white p-4 rounded-xl shadow-sm">
                        <h3 class="font-bold text-2xl text-blue-600">+10</h3>
                        <p class="text-gray-600 text-sm">
                            Especialidades
                        </p>
                    </div>

                    <div class="bg-white p-4 rounded-xl shadow-sm">
                        <h3 class="font-bold text-2xl text-blue-600">+5000</h3>
                        <p class="text-gray-600 text-sm">
                            Pacientes atendidos
                        </p>
                    </div>

                </div>

                <a href="#"
                   class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl transition">

                    Ver Doctores y Especialistas

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 5l7 7-7 7"/>
                    </svg>

                </a>

            </div>

            <!-- Imagen -->
            <div class="relative">

                <img
                    src="{{ asset('images/doctores.webp') }}"
                    alt="Equipo Médico"
                    class="rounded-3xl shadow-2xl w-full object-cover"
                >

                <!-- Tarjeta flotante -->
                <div
                    class="hidden md:block absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl">

                    <div class="text-blue-600 font-bold text-2xl">
                        98%
                    </div>

                    <div class="text-gray-600 text-sm">
                        Satisfacción de pacientes
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>


<section class="bg-blue-600 py-16">
    <div class="max-w-4xl mx-auto text-center px-6">

        <h2 class="text-4xl font-bold text-white mb-4">
            Agenda tu cita médica hoy mismo
        </h2>

        <p class="text-blue-100 mb-8">
            Encuentra al especialista adecuado y reserva tu cita
            de manera rápida, segura y sencilla.
        </p>

        <a href="{{ route('register') }}"
           class="inline-block px-8 py-4 bg-white text-blue-600 font-semibold rounded-xl hover:bg-gray-100 transition">
            Comenzar Ahora
        </a>

    </div>
</section>

<footer class="bg-slate-900 text-gray-300">

    <div class="max-w-7xl mx-auto px-6 py-16">

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">

            <!-- Logo -->
            <div>

                <h3 class="text-2xl font-bold text-white mb-4">
                    🏥 Citas Médicas
                </h3>

                <p class="text-gray-400 leading-relaxed">
                    Plataforma para la gestión de citas médicas,
                    facilitando el acceso a especialistas y una
                    atención de calidad para nuestros pacientes.
                </p>

            </div>

            <!-- Enlaces -->
            <div>

                <h4 class="text-lg font-semibold text-white mb-4">
                    Navegación
                </h4>

                <ul class="space-y-3">

                    <li>
                        <a href="/" class="hover:text-blue-400 transition">
                            Inicio
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-blue-400 transition">
                            Especialidades
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-blue-400 transition">
                            Doctores
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           class="hover:text-blue-400 transition">
                            Iniciar Sesión
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Especialidades -->
            <div>

                <h4 class="text-lg font-semibold text-white mb-4">
                    Especialidades
                </h4>

                <ul class="space-y-3">

                    <li>Cardiología</li>
                    <li>Dermatología</li>
                    <li>Reumatología</li>
                    <li>Pediatría</li>

                </ul>

            </div>

            <!-- Contacto -->
            <div>

                <h4 class="text-lg font-semibold text-white mb-4">
                    Contacto
                </h4>

                <ul class="space-y-3">

                    <li>
                        📍 Lima, Perú
                    </li>

                    <li>
                        📞 +51 999 999 999
                    </li>

                    <li>
                        ✉ contacto@citasmedicas.com
                    </li>

                    <li>
                        🕒 Lun - Vie: 8:00 AM - 6:00 PM
                    </li>

                </ul>

            </div>

        </div>

    </div>

    <!-- Copyright -->
    <div class="border-t border-slate-800">

        <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col md:flex-row justify-between items-center gap-4">

            <p class="text-sm text-gray-500">
                © {{ date('Y') }} Citas Médicas. Todos los derechos reservados.
            </p>

            <div class="flex gap-6 text-sm">

                <a href="#" class="hover:text-blue-400 transition">
                    Política de Privacidad
                </a>

                <a href="#" class="hover:text-blue-400 transition">
                    Términos y Condiciones
                </a>

            </div>

        </div>

    </div>

</footer>

</body>
</html>
