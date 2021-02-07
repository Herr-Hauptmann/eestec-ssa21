<?php

namespace Database\Factories;

use App\Models\Postignuce;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostignuceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Postignuce::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naziv' => $this->faker->bs
        ];
    }
}
