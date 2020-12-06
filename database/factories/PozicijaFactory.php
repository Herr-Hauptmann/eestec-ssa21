<?php

namespace Database\Factories;

use App\Models\Pozicija;
use Illuminate\Database\Eloquent\Factories\Factory;

class PozicijaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pozicija::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $pozicije = ['Glavni organizator', 'FR', 'PR', 'HR', 'IT'];

        return [
            'naziv' => $pozicije[rand(0, count($pozicije) - 1)],
            'opis'  => $this->faker->text
        ];
    }
}
