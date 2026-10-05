<div class="bg-white dark:bg-gray-800 shadow-md rounded-xl overflow-hidden">

    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            Listado de Citas
        </h2>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-600 dark:text-gray-300">
            <thead class="bg-gray-100 dark:bg-gray-700 text-xs uppercase text-gray-500 dark:text-gray-300">
                <tr>
                    <th class="px-6 py-3">Paciente</th>
                    <th class="px-6 py-3">Doctor</th>
                    <th class="px-6 py-3">Fecha</th>
                    <th class="px-6 py-3">Hora</th>
                    <th class="px-6 py-3">Estado</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($appointments as $a)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <td class="px-6 py-4 font-medium text-gray-800 dark:text-gray-100">
                            {{ $a->patient->user->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $a->doctor->user->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $a->appointment_date }}
                        </td>

                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($a->appointment_time)->format('h:i A') }}
                        </td>

                        <td class="px-6 py-4">
                            <span class="
                                px-2 py-1 text-xs font-semibold rounded-full
                                @if($a->status === 'pending') bg-yellow-100 text-yellow-700
                                @elseif($a->status === 'confirmed') bg-green-100 text-green-700
                                @endif
                            ">
                                {{ ucfirst($a->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="p-4">
        {{ $appointments->links('pagination::tailwind') }}
    </div>

</div>
