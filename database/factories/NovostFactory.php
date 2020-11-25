<?php

namespace Database\Factories;

use App\Models\Novost;
use Illuminate\Database\Eloquent\Factories\Factory;

class NovostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Novost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naslov' => $this->faker->title,
            'tekst' => $this->faker->text,
            'slika' => $this->faker->imageUrl,
            'datum' => $this->faker->dateTime
        ];
    }
}
