<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Image>
 */
class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Image>
     */
    protected $model = Image::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => $this->faker->randomElement([
               '1.png', '2.png', '3.png', '4.png',
            ]),

            'imageable_id' => Doctor::all()->random()->id,
            'imageable_type' => Doctor::class,
        ];
    }
}
