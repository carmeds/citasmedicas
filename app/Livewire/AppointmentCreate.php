<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;

class AppointmentCreate extends Component
{
    public $patient_id;
    public $doctor_id;
    public $appointment_date;
    public $appointment_time;
    public $reason;

    public $patients = [];
    public $doctors = [];

    public function mount()
    {
        $this->patients = Patient::with('user')->get();
        $this->doctors = Doctor::with('user')->get();
    }

    public function save()
    {
        $this->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
        ]);

        Appointment::create([
            'patient_id' => $this->patient_id,
            'doctor_id' => $this->doctor_id,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'status' => 'pending',
            'reason' => $this->reason,
        ]);

        $this->reset([
            'patient_id',
            'doctor_id',
            'appointment_date',
            'appointment_time',
            'reason'
        ]);

         $this->dispatch('appointment-created');
         session()->flash('success', 'Cita creada correctamente');
    }

    public function render()
    {
        return view('livewire.appointment-create');
    }
}
