
<div class="bg-white p-6 rounded-xl shadow">
    <h2 class="text-lg font-semibold mb-4">Nueva Cita</h2>
    @if (session()->has('success'))
        <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700">
            {{ session('success') }}
        </div>
    @endif
    <form wire:submit.prevent="save" class="space-y-4">

        <select wire:model="patient_id"
            class="w-full border rounded-lg px-3 py-2">
            <option value="">Seleccione paciente</option>
            @foreach($patients as $p)
                <option value="{{ $p->id }}">
                    {{ $p->user->name }}
                </option>
            @endforeach
        </select>

        <select wire:model="doctor_id"
            class="w-full border rounded-lg px-3 py-2">
            <option value="">Seleccione doctor</option>
            @foreach($doctors as $d)
                <option value="{{ $d->id }}">
                    {{ $d->user->name }}
                </option>
            @endforeach
        </select>

        <input type="date" wire:model="appointment_date"
            class="w-full border rounded-lg px-3 py-2">

        <input type="time" wire:model="appointment_time"
            class="w-full border rounded-lg px-3 py-2">

        <textarea wire:model="reason"
            placeholder="Motivo"
            class="w-full border rounded-lg px-3 py-2"></textarea>

        <button
            class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
            Guardar
        </button>
    </form>
</div>
