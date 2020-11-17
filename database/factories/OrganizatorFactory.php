<?php

namespace Database\Factories;

use App\Models\Organizator;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizatorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organizator::class;

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
            'slika' => $this->faker->imageUrl,
            'mail' => $this->faker->email,
            'telefon' => $this->faker->phoneNumber

        ];
    }
}
