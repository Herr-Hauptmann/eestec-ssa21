<?php

namespace Database\Factories;

use App\Models\Izjava;
use Illuminate\Database\Eloquent\Factories\Factory;

class IzjavaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Izjava::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ime' => $this->faker->firstName,
            'prezime' => $this->faker->lastName,
            'tekst' => $this->faker->text,
            'slika' => $this->fake->imageUrl
        ];
    }
}
