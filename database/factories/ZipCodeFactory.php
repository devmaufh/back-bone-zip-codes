<?php

namespace Database\Factories;

use App\Models\Municipality;
use App\Models\ZipCode;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZipCodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ZipCode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $municipality = Municipality::all()->random();
        return [
            'zip_code'=> $this->faker->numberBetween(10000,99999),
            'locality'=> $this->faker->citySuffix ,
            'municipality'=>  $municipality->key ,
            'federal_entity'=> $municipality->federalEntity->key,
        ];
    }
}
