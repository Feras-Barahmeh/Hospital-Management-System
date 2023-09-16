<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<Doctor>
 */
class DoctorFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Doctor>
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'              => $this->faker->name,
            'email'             => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'phone'             => $this->faker->phoneNumber,
            'price'             => $this->faker->randomElement([100,200,300,400,500]),

            'appointments'      => $this->faker->randomElement([
                'Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday'
            ]),

        ];
    }
}
