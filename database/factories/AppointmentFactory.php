<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'doctor_id' => Doctor::inRandomOrder()->first()->id ?? 1,
        'patient_id' => Patient::inRandomOrder()->first()->id ?? 1,
        'appointment_date' => fake()->dateTimeBetween('+1 days', '+30 days'),
        'appointment_time' => fake()->time(),
        'status' => fake()->randomElement(['pending','confirmed','completed']),
        'reason' => fake()->sentence(),
        ];
    }
}
