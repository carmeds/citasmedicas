<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas Médicas</title>

    <script>
        try {
            document.documentElement.classList.toggle('dark', localStorage.getItem('theme') === 'dark');
        } catch (error) {}
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

    <!-- NAVBAR -->
    <nav class="sticky top-0 z-50 bg-gradient-to-b from-white/95 via-white/80 to-white/55 dark:from-gray-900/95 dark:via-gray-900/80 dark:to-gray-900/55 backdrop-blur-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <h1 class="text-xl font-bold text-blue-600">🏥 Citas Médicas</h1>

            <div class="flex items-center gap-3">
                <button type="button" data-theme-toggle class="inline-flex items-center justify-center rounded-md p-2 text-gray-600 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" aria-label="Cambiar tema" title="Cambiar tema">
                    <svg data-theme-icon="light" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path stroke-linecap="round" d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"/></svg>
                    <svg data-theme-icon="dark" xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M20.9 13A9 9 0 0 1 11 3.1 9 9 0 1 0 20.9 13Z"/></svg>
                </button>

                <div class="hidden items-center gap-4 md:flex">
                    @auth
                        <a href="{{ route('dashboard') }}" class="rounded-lg bg-blue-500 px-4 py-2 text-white">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-200 hover:text-blue-500">Ingresar</a>
                        <a href="{{ route('register') }}" class="rounded-lg bg-blue-500 px-4 py-2 text-white">Registrarse</a>
                    @endauth
                </div>

                <button type="button" data-mobile-menu-toggle aria-expanded="false" aria-controls="mobile-menu" aria-label="Abrir menú" class="inline-flex items-center justify-center rounded-md p-2 text-gray-700 hover:bg-white/60 dark:text-gray-200 dark:hover:bg-gray-800/60 focus:outline-none focus:ring-2 focus:ring-blue-500 md:hidden">
                    <svg data-menu-icon="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg data-menu-icon="close" xmlns="http://www.w3.org/2000/svg" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m6 6 12 12M18 6 6 18"/></svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden border-t border-gray-200/50 bg-white/90 px-6 py-4 dark:border-gray-700/50 dark:bg-gray-900/90 md:hidden">
            <div class="mx-auto flex max-w-7xl flex-col gap-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800">Ingresar</a>
                    <a href="{{ route('register') }}" class="rounded-lg bg-blue-600 px-3 py-2 text-center font-semibold text-white hover:bg-blue-700">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>

    <section
        data-theme-background-light="{{ asset('images/citas-medicas-hero-light.webp') }}"
        data-theme-background-dark="{{ asset('images/citas-medicas-hero-dark.webp') }}"
        style="background-image: url('{{ asset('images/citas-medicas-hero-light.webp') }}')"
        class="relative isolate flex min-h-[680px] items-center bg-cover bg-center bg-no-repeat md:min-h-[calc(100vh-80px)]"
    >
        <div class="absolute inset-0 -z-10 bg-gradient-to-r from-white/95 via-white/80 to-white/25 dark:from-gray-950/95 dark:via-gray-950/75 dark:to-gray-950/20"></div>
        <div class="mx-auto w-full max-w-7xl px-6 py-20">
            <div class="max-w-2xl">
                <h2 class="mb-6 text-4xl font-bold leading-tight text-gray-900 dark:text-white md:text-6xl">
                    Gestiona tus citas médicas fácilmente
                </h2>

                <p class="mb-8 max-w-xl text-lg text-gray-700 dark:text-gray-200 md:text-xl">
                    Agenda y administra citas de forma rápida y eficiente.
                </p>

                @guest
                    <a href="{{ route('register') }}"
                       class="inline-flex rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white shadow-lg transition hover:bg-blue-700">
                        Empezar ahora
                    </a>
                @endguest
            </div>
        </div>
    </section>

    <!-- INFO -->
    <section class="py-20 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-4">
                    Nuestras Especialidades
                </h2>

                <p class="text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Contamos con médicos especializados en distintas áreas para brindarte
                    una atención integral y de calidad.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

                <a href="#"
                class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md hover:shadow-xl transition group">

                    <div class="text-5xl mb-4">❤️</div>

                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 group-hover:text-blue-600">
                        Cardiología
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300 mt-2">
                        Diagnóstico y tratamiento de enfermedades cardiovasculares.
                    </p>

                </a>

                <a href="#"
                class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md hover:shadow-xl transition group">

                    <div class="text-5xl mb-4">🩺</div>

                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 group-hover:text-blue-600">
                        Dermatología
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300 mt-2">
                        Atención especializada para el cuidado de la piel.
                    </p>

                </a>

                <a href="#"
                class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md hover:shadow-xl transition group">

                    <div class="text-5xl mb-4">🦴</div>

                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 group-hover:text-blue-600">
                        Neurologia
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300 mt-2">
                        Tratamiento de enfermedades articulares y autoinmunes.
                    </p>

                </a>

                <a href="#"
                class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md hover:shadow-xl transition group">

                    <div class="text-5xl mb-4">👶</div>

                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 group-hover:text-blue-600">
                        Pediatría
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300 mt-2">
                        Atención médica especializada para niños y adolescentes.
                    </p>

                </a>

            </div>

        </div>
    </section>

    <section class="py-20 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <!-- Texto -->
            <div>

                <span class="inline-block px-4 py-2 bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-300 rounded-full font-medium mb-4">
                    Nuestro Equipo Médico
                </span>

                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 dark:text-gray-100 leading-tight mb-6">
                    Un equipo médico calificado
                    <span class="text-blue-600">listo para tu atención</span>
                </h2>

                <p class="text-lg text-gray-600 dark:text-gray-300 mb-8">
                    Contamos con profesionales altamente capacitados y con amplia experiencia
                    en diferentes especialidades médicas. Nuestro compromiso es brindarte una
                    atención humana, segura y de calidad.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">

                    <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm">
                        <h3 class="font-bold text-2xl text-blue-600">+50</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Especialistas
                        </p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm">
                        <h3 class="font-bold text-2xl text-blue-600">+10</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            Especialidades
                        </p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm">
                        <h3 class="font-bold text-2xl text-blue-600">+5000</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
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
                    class="hidden md:block absolute -bottom-6 -left-6 bg-white dark:bg-gray-800 p-4 rounded-2xl shadow-xl">

                    <div class="text-blue-600 font-bold text-2xl">
                        98%
                    </div>

                    <div class="text-gray-600 dark:text-gray-300 text-sm">
                        Satisfacción de pacientes
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>


<section class="bg-blue-600 dark:bg-blue-800 py-16">
    <div class="max-w-4xl mx-auto text-center px-6">

        <h2 class="text-4xl font-bold text-white mb-4">
            Agenda tu cita médica hoy mismo
        </h2>

        <p class="text-blue-100 mb-8">
            Encuentra al especialista adecuado y reserva tu cita
            de manera rápida, segura y sencilla.
        </p>

        <a href="{{ route('register') }}"
           class="inline-block px-8 py-4 bg-white dark:bg-gray-100 text-blue-600 font-semibold rounded-xl hover:bg-gray-100 transition">
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

            <p class="text-sm text-gray-400">
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
