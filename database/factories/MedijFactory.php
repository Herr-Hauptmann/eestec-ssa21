<?php

namespace Database\Factories;

use App\Models\Medij;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedijFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medij::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naziv' => $this->faker->name,
            'link' => $this->faker->url,
            'slika' => $this->faker->imageUrl
        ];
    }
}
