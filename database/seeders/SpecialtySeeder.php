<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $specialties = [
        'Cardiología',
        'Dermatología',
        'Pediatría',
        'Neurología',
        'Ginecología',
        'Traumatología',
        'Oftalmología',
        'Psiquiatría',
        'Endocrinología',
        'Oncología'
    ];

    foreach ($specialties as $name) {
        Specialty::create([
            'name' => $name,
            'description' => fake()->sentence()
        ]);
    }
    }
}
