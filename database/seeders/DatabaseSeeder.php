<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\MedicalRecord;
use App\Models\Patient;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            SpecialtySeeder::class,
        ]);

        // 1. Crear doctores y pacientes
        $doctors = Doctor::factory(20)->create();
        $patients = Patient::factory(50)->create();

        // 2. Crear horarios por doctor
        foreach ($doctors as $doctor) {
            DoctorSchedule::factory()->count(5)->create([
                'doctor_id' => $doctor->id,
            ]);
        }

        // 3. Crear citas SIN conflicto
        $appointments = [];

        foreach ($doctors as $doctor) {
            for ($i = 0; $i < 3; $i++) {

                $date = now()->addDays(rand(1, 15))->toDateString();
                $time = rand(8, 16) . ':00:00';

                $appointments[] = Appointment::create([
                    'doctor_id' => $doctor->id,
                    'patient_id' => $patients->random()->id,
                    'appointment_date' => $date,
                    'appointment_time' => $time,
                    'status' => 'confirmed',
                    'reason' => fake()->sentence(),
                ]);
            }
        }

        // 4. Crear historiales solo para algunas citas
        foreach ($appointments as $appointment) {
            if (rand(0,1)) {
                MedicalRecord::create([
                    'appointment_id' => $appointment->id,
                    'diagnosis' => fake()->sentence(),
                    'treatment' => fake()->sentence(),
                    'notes' => fake()->paragraph(),
                ]);
            }
        }
    }
}
