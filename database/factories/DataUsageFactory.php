<?php

namespace Database\Factories;

use App\Models\DataUsage;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\DataUnitConversionFacade as DataUnitConversion;

class DataUsageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DataUsage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Generating 1 - 10 MBS of data used in a day.
        return [
            'data' => DataUnitConversion::mbToBytes($this->faker->numberBetween(1, 10)),
        ];
    }
}
