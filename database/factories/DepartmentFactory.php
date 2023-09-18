<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Department>
     */
    protected $model = Department::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                "Surgery Department",
                "Emergency Department (ED)",
                "Internal Medicine Department",
                "Pediatrics Department",
                "Obstetrics and Gynecology Department (OB/GYN)",
                "Cardiology Department",
                "Orthopedics Department",
                "Neurology Department",
                "Oncology Department",
                "Radiology Department",
                "Anesthesiology Department",
                "Intensive Care Unit (ICU)",
                "Psychiatry Department",
                "Dermatology Department",
                "ENT (Ear, Nose, and Throat) Department",
                "Urology Department",
                "Gastroenterology Department",
                "Pulmonology Department",
                "Nephrology Department",
            ]),
            'description' => $this->faker->paragraph,
        ];
    }
}
