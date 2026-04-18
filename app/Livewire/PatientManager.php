<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Patient;
use App\Models\User;
use Livewire\WithPagination;
class PatientManager extends Component
{
    public $name, $email, $phone, $patient_id;
    public $dni, $birth_date, $gender;
    public $isOpen = false;
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $patients = Patient::with('user')->latest()->paginate(5);
        return view('livewire.patient-manager', compact('patients'));
    }

    public function create()
    {
        $this->resetInput();
        $this->isOpen = true;
    }

    public function store(){

        if ($this->patient_id) {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'dni' => 'required',
            ]);

            $patient = Patient::findOrFail($this->patient_id);

            $patient->user->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);

            $patient->update([
                'dni' => $this->dni,
                'birth_date' => $this->birth_date,
                'gender' => $this->gender,
            ]);

        } else {

            $this->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'dni' => 'required|unique:patients,dni',
            ]);
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'password' => bcrypt('123456'), // luego mejoras esto
            ]);

            Patient::create([
                'user_id' => $user->id,
                'dni' => $this->dni,
                'birth_date' => $this->birth_date,
                'gender' => $this->gender,
            ]);
        }

        $this->resetInput();
        $this->closeModal();
    }


    public function edit($id)
    {
        $patient = Patient::with('user')->findOrFail($id);

        $this->patient_id = $id;

        $this->name = $patient->user->name ?? '';
        $this->email = $patient->user->email ?? '';
        $this->phone = $patient->user->phone ?? '';

        $this->dni = $patient->dni;
        $this->birth_date = $patient->birth_date;
        $this->gender = $patient->gender;

        $this->isOpen = true;
    }

    public function delete($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->dni = '';
        $this->birth_date = '';
        $this->gender = '';
        $this->patient_id = null;
        $this->phone = '';
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
}
