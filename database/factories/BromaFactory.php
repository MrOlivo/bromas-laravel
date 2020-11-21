<?php

namespace Database\Factories;

use App\Models\Broma;
use Illuminate\Database\Eloquent\Factories\Factory;

class BromaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Broma::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'autor_id' => rand(1, 12),
            'broma' => $this->faker->sentence(15),
            'fecha' => $this->faker->date(),
        ];
    }
}
