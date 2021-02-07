<?php

namespace Database\Factories;

use App\Models\Galerija;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalerijaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Galerija::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slika' => $this->faker->imageUrl
        ];
    }
}
