<?php

namespace Database\Factories;

use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettlementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Settlement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city ,
            'zone_type' => $this->faker->randomElement(['Rural','Urbano']) ,
            'settlement_type' => SettlementType::all()->random()->key ,
            'zip_code' => ZipCode::all()->random()->key ,
        ];
    }
}
