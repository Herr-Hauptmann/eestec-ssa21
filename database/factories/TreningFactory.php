<?php

namespace Database\Factories;

use App\Models\Trening;
use Illuminate\Database\Eloquent\Factories\Factory;

class TreningFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trening::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naziv' => $this->faker->name,
            'opis' => $this->faker->text,
            'slika' => $this->faker->imageUrl
        ];
    }
}
