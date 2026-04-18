<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">Citas</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="col-span-1">
                <livewire:appointment-create />
            </div>

            <div class="col-span-2">
                <livewire:appointments-list />
            </div>

        </div>

    </div>
</x-app-layout>
