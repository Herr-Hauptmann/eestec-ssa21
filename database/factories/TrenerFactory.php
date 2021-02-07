<?php

namespace Database\Factories;

use App\Models\Trener;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrenerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trener::class;

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
            'slika' => $this->faker->imageUrl
        ];
    }
}
