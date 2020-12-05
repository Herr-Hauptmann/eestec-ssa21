<?php

namespace Database\Factories;

use App\Models\Organizator;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizatorFactory extends Factory
{
    protected $model = Organizator::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'ime' => $this->faker->name,
                'prezime' => $this->faker->lastName,
                'mail' => $this->faker->unique()->safeEmail,
                'slika' => "nema.jbg",
                'telefon' =>"+38769696969",
        ];
    }
}
