<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorSchedule>
 */
class DoctorScheduleFactory extends Factory
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
            'day_of_week' => fake()->numberBetween(1,5),
            'start_time' => '08:00:00',
            'end_time' => '17:00:00',
        ];
    }
}
