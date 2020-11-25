<?php

namespace Database\Factories;

use App\Models\Edicija;
use Illuminate\Database\Eloquent\Factories\Factory;

class EdicijaFactory extends Factory
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
            'naziv'                     => "SSA Edicija " . strval(rand(15, 50)),
            'logo'                      => '/img/logo1.png',
            'datum_pocetka'             => $this->faker->dateTime(),
            'datum_kraja'               => $this->faker->dateTime(),
            'mjesto_odrzavanja'         => $this->faker->city,
            'datum_otvaranja_prijava'   => $this->faker->dateTime(),
            'datum_zatvaranja_prijava'  => $this->faker->dateTime(),
            'broj_ucesnika'             => rand(15, 40)
        ];
    }
}
