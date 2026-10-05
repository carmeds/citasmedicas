<x-guest-layout>
<div>
    <div class="mb-8">
        <div class="mb-5 inline-flex items-center gap-2 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold uppercase tracking-[0.12em] text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/></svg>
            Portal de citas médicas
        </div>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Inicia sesión</h2>
        <p class="mt-2 leading-6 text-gray-600 dark:text-gray-400">Qué bueno tenerte de vuelta. Ingresa para consultar y gestionar tus citas médicas.</p>
    </div>

    <x-auth-session-status class="mb-5 rounded-xl bg-green-50 px-4 py-3 dark:bg-green-900/20" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" value="Correo electrónico" class="mb-2 text-sm font-semibold text-gray-700 dark:text-gray-200" />
            <x-text-input id="email" class="block w-full rounded-xl border-gray-300 bg-gray-50 px-4 py-3 text-gray-900 placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-blue-400 dark:focus:ring-blue-400" type="email" name="email" :value="old('email')" placeholder="nombre@correo.com" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="mb-2 flex items-center justify-between gap-3">
                <x-input-label for="password" value="Contraseña" class="text-sm font-semibold text-gray-700 dark:text-gray-200" />
                @if (Route::has('password.request'))
                    <a class="text-sm font-medium text-blue-600 transition hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                @endif
            </div>
            <x-text-input id="password" class="block w-full rounded-xl border-gray-300 bg-gray-50 px-4 py-3 text-gray-900 placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-blue-400 dark:focus:ring-blue-400" type="password" name="password" placeholder="Ingresa tu contraseña" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex cursor-pointer items-center gap-2.5">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:focus:ring-blue-400" name="remember">
                <span class="text-sm text-gray-600 dark:text-gray-400">Recordarme</span>
            </label>
        </div>

        <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3.5 font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
            Ingresar a mi cuenta
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7"/></svg>
        </button>
    </form>

    @if (Route::has('register'))
        <p class="mt-7 text-center text-sm text-gray-600 dark:text-gray-400">
            ¿Aún no tienes una cuenta?
            <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">Regístrate</a>
        </p>
    @endif
</div>
</x-guest-layout>
