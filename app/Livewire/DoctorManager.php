<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Specialty;

class DoctorManager extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $users, $specialties;

    public $doctor_id;
    public $user_id;
    public $cmp;
    public $specialty_id;

    public $isOpen = false;

    public function render()
    {
        $this->users = User::all();
        $this->specialties = Specialty::all();

        $doctors = Doctor::with(['user', 'specialty'])
            ->latest()
            ->paginate(5);

        return view('livewire.doctor-manager', [
            'doctors' => $doctors
        ]);
    }

    public function create()
    {
        $this->resetInput();
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate([
            'user_id' => 'required|exists:users,id',
            'cmp' => 'required|unique:doctors,cmp,' . $this->doctor_id,
            'specialty_id' => 'required|exists:specialties,id',
        ]);

        Doctor::updateOrCreate(
            ['id' => $this->doctor_id],
            [
                'user_id' => $this->user_id,
                'cmp' => $this->cmp,
                'specialty_id' => $this->specialty_id,
            ]
        );

        session()->flash('message',
            $this->doctor_id ? 'Doctor actualizado.' : 'Doctor creado.'
        );

        $this->closeModal();
        $this->resetInput();
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);

        $this->doctor_id = $id;
        $this->user_id = $doctor->user_id;
        $this->cmp = $doctor->cmp;
        $this->specialty_id = $doctor->specialty_id;

        $this->isOpen = true;
    }

    public function delete($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        $this->resetPage();

        session()->flash('message', 'Doctor eliminado.');
    }

    public function resetInput()
    {
        $this->doctor_id = null;
        $this->user_id = '';
        $this->cmp = '';
        $this->specialty_id = '';
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
}
