<div class="text-gray-800 dark:text-gray-100">

    <button wire:click="create"
        class="mb-4 bg-blue-500 text-white px-4 py-2 rounded">
        + Nuevo Paciente
    </button>

    <table class="w-full bg-white dark:bg-gray-800 shadow rounded">
        <thead>
            <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                <th class="p-2">Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $p)
                <tr class="border-t border-gray-200 dark:border-gray-700">
                    <td class="p-2">{{ $p->user->name }}</td>
                    <td>{{ $p->user->email }}</td>
                    <td>{{ $p->user->phone }}</td>
                    <td class="space-x-2">
                        <button wire:click="edit({{ $p->id }})"
                            class="text-blue-500">Editar</button>

                        <button wire:click="delete({{ $p->id }})"
                            class="text-red-500">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $patients->links() }}
    </div>

    <!-- 🔥 MODAL REAL -->
    @if($isOpen)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">

            <div class="bg-white dark:bg-gray-800 p-6 rounded w-96 shadow-lg">

                <h2 class="text-lg font-bold mb-4">
                    {{ $patient_id ? 'Editar' : 'Nuevo' }} Paciente
                </h2>

                <input type="text" wire:model="name" placeholder="Nombre"
                    class="w-full mb-2 border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 p-2">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <input type="email" wire:model="email" placeholder="Email"
                    class="w-full mb-2 border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 p-2">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <input type="text" wire:model="phone" placeholder="Teléfono"
                    class="w-full mb-2 border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 p-2">
                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <input type="text" wire:model="dni" placeholder="DNI"
                    class="w-full mb-2 border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 p-2">
                @error('dni') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <input type="date" wire:model="birth_date"
                    class="w-full mb-2 border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 p-2">

                <select wire:model="gender" class="w-full mb-4 border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 p-2">
                    <option value="">Seleccione género</option>
                    <option value="male">Masculino</option>
                    <option value="female">Femenino</option>
                    <option value="other">Otro</option>
                </select>

                <div class="flex justify-end space-x-2">
                    <button wire:click="closeModal"
                        class="px-4 py-2 bg-gray-300 dark:bg-gray-600 dark:text-white rounded">
                        Cancelar
                    </button>

                    <button wire:click="store"
                        class="bg-blue-500 text-white px-4 py-2 rounded">
                        Guardar
                    </button>
                </div>

            </div>
        </div>
    @endif

</div>
