<?php

namespace Database\Factories;

use App\Models\FederalEntity;
use Illuminate\Database\Eloquent\Factories\Factory;

class FederalEntityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FederalEntity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->state,
            'code' => $this->faker->stateAbbr
        ];
    }
}
