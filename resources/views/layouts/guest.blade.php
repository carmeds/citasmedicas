<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Citas Médicas') }}</title>

        <script>
            try {
                document.documentElement.classList.toggle('dark', localStorage.getItem('theme') === 'dark');
            } catch (error) {}
        </script>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased dark:text-gray-100">
        <button type="button" data-theme-toggle class="fixed right-5 top-5 z-20 inline-flex items-center justify-center rounded-xl border border-gray-200 bg-white/90 p-3 text-gray-600 shadow-sm backdrop-blur transition hover:bg-white dark:border-gray-700 dark:bg-gray-800/90 dark:text-gray-200 dark:hover:bg-gray-700" aria-label="Cambiar tema" title="Cambiar tema">
            <svg data-theme-icon="light" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path stroke-linecap="round" d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"/></svg>
            <svg data-theme-icon="dark" xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M20.9 13A9 9 0 0 1 11 3.1 9 9 0 1 0 20.9 13Z"/></svg>
        </button>

        <main class="min-h-screen bg-gray-50 px-4 py-10 dark:bg-gray-950 sm:px-6 lg:px-8">
            <div class="mx-auto grid min-h-[calc(100vh-5rem)] max-w-6xl items-center gap-12 lg:grid-cols-2">
                <section class="relative hidden min-h-[620px] flex-col justify-between overflow-hidden rounded-[2rem] bg-gradient-to-br from-blue-700 via-blue-600 to-cyan-500 p-12 text-white shadow-2xl shadow-blue-900/15 lg:flex">
                    <div class="absolute -right-24 -top-24 h-80 w-80 rounded-full border-[48px] border-white/10"></div>
                    <div class="absolute -bottom-36 -left-20 h-96 w-96 rounded-full border-[60px] border-white/10"></div>

                    <a href="{{ url('/') }}" class="relative z-10 inline-flex items-center gap-3 text-lg font-bold">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/15 ring-1 ring-white/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/></svg>
                        </span>
                        Citas Médicas
                    </a>

                    <div class="relative z-10 max-w-lg">
                        <p class="mb-4 text-sm font-semibold uppercase tracking-[0.2em] text-blue-100">Tu salud, más cerca</p>
                        <h1 class="text-4xl font-bold leading-tight xl:text-5xl">Organiza tu atención médica desde un solo lugar.</h1>
                        <p class="mt-6 max-w-md text-lg leading-8 text-blue-50">Accede a tus citas y encuentra una forma más sencilla de coordinar tu atención.</p>
                    </div>

                    <div class="relative z-10 flex items-center gap-3 text-sm text-blue-50">
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-white/15">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m9 12 2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                        </span>
                        Una experiencia clara y segura para gestionar tus citas
                    </div>
                </section>

                <section class="mx-auto w-full max-w-md py-8 lg:py-0">
                    <a href="{{ url('/') }}" class="mb-8 inline-flex items-center gap-2 font-bold text-blue-700 dark:text-blue-300 lg:hidden">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/></svg>
                        </span>
                        Citas Médicas
                    </a>

                    <div class="rounded-3xl border border-gray-100 bg-white p-7 shadow-xl shadow-gray-900/5 dark:border-gray-800 dark:bg-gray-900 sm:p-10">
                        {{ $slot }}
                    </div>

                    <p class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400">Al continuar, accedes a tu espacio de gestión de citas médicas.</p>
                </section>
            </div>
        </main>
    </body>
</html>
