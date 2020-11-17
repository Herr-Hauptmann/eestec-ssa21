<?php

namespace Database\Factories;

use App\Models\Edicija;
use Illuminate\Database\Eloquent\Factories\Factory;

class EditionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Edicija::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naziv'                     => $this->faker->name,
            'logo'                      => '/img/logo1.png',
            'datum_odrzavanja'          => $this->faker->dateTime(),
            'mjesto_odrzavanja'         => $this->faker->city,
            'datum_otvaranja_prijava'   => $this->faker->dateTime(),
            'datum_zatvaranja_prijava'  => $this->faker->dateTime(),
            'broj_ucesnika'             => rand(15, 40)
        ];
    }
}
