<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Appointment;

class AppointmentsList extends Component
{
    use WithPagination;
    protected $listeners = ['appointment-created' => 'refreshList'];
    public function render()
    {
        $appointments = Appointment::with(['patient.user', 'doctor.user'])
            ->whereIn('status', ['pending', 'confirmed'])
            ->latest()
            ->paginate(5);
        return view('livewire.appointments-list', compact('appointments'));
    }
}
