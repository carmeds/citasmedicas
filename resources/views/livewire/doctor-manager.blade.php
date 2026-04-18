<div>

    <button wire:click="create"
        class="mb-4 bg-blue-500 text-white px-4 py-2 rounded">
        + Nuevo Doctor
    </button>

    @if (session()->has('message'))
        <div class="bg-green-200 p-2 mb-4 rounded">
            {{ session('message') }}
        </div>
    @endif

    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Usuario</th>
                <th class="p-2">CMP</th>
                <th class="p-2">Especialidad</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($doctors as $doctor)
                <tr class="border-t">
                    <td class="p-2">{{ $doctor->user->name }}</td>
                    <td class="p-2">{{ $doctor->cmp }}</td>
                    <td class="p-2">{{ $doctor->specialty->name }}</td>
                    <td class="p-2">
                        <button wire:click="edit({{ $doctor->id }})"
                            class="bg-yellow-400 px-2 py-1 rounded">
                            Editar
                        </button>

                        <button wire:click="delete({{ $doctor->id }})"
                            class="bg-red-500 text-white px-2 py-1 rounded">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $doctors->links() }}
    </div>

    <!-- MODAL -->
    @if($isOpen)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">

        <div class="bg-white p-6 rounded shadow w-1/3">

            <h2 class="text-lg mb-4">
                {{ $doctor_id ? 'Editar Doctor' : 'Nuevo Doctor' }}
            </h2>

            <select wire:model="user_id" class="w-full mb-3 p-2 border rounded">
                <option value="">Seleccione Usuario</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

            <input type="text" wire:model="cmp"
                placeholder="CMP"
                class="w-full mb-3 p-2 border rounded">

            <select wire:model="specialty_id" class="w-full mb-3 p-2 border rounded">
                <option value="">Seleccione Especialidad</option>
                @foreach($specialties as $spec)
                    <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                @endforeach
            </select>

            <div class="flex justify-end gap-2">
                <button wire:click="closeModal"
                    class="bg-gray-400 px-3 py-1 rounded">
                    Cancelar
                </button>

                <button wire:click="store"
                    class="bg-blue-500 text-white px-3 py-1 rounded">
                    Guardar
                </button>
            </div>

        </div>
    </div>
    @endif

</div>
