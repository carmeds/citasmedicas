<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalRecord>
 */
class MedicalRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'appointment_id' => Appointment::inRandomOrder()->first()->id ?? 1,
            'diagnosis' => fake()->sentence(),
            'treatment' => fake()->sentence(),
            'notes' => fake()->paragraph(),
        ];
    }
}
