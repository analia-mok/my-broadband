<?php

namespace Database\Factories;

use App\Enums\EquipmentType;
use App\Models\Equipment;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\DataUnitConversionFacade as DataUnitConversion;

class EquipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $address = $this->faker->macAddress;

        return [
            'name' => $this->faker->name(),
            'type' => 'Internet Device',
            'serial_number' => str_replace(':', '', $address),
            'device_address' => $address,
            'make' => strtoupper($this->faker->bothify('?####')),
            'model' => strtoupper($this->faker->bothify('??####')),
            'status' => true,
        ];
    }

    /**
     * Indicate that this equipment is voice-related.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function isVoice()
    {
        return $this->state(
            function (array $attributes) {
                return [
                    'type' => EquipmentType::VOICE(),
                    'name' => 'Voice Device',
                ];
            }
        );
    }

    /**
     * Indicate that this equipment is internet-related.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function isInternet()
    {
        return $this->state(
            function (array $attributes) {
                $hasUnlimitedData = $this->faker->optional($weight = 0.3, $default = false)->boolean();
                // For now, max data between 5GB to 125GB.
                // Keep all as increments of 5.
                $multipleOfFive = $this->faker->numberBetween(1, 25);
                $maxData = DataUnitConversion::gbToBytes($multipleOfFive * 5);

                return [
                    'type' => EquipmentType::INTERNET(),
                    'name' => 'Internet Device',
                    'max_data' => $maxData,
                    'has_unlimited_data' => $hasUnlimitedData,
                ];
            }
        );
    }
    /**
     * Indicate that this equipment is video-related.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function isVideo()
    {
        return $this->state(
            function (array $attributes) {
                return [
                    'type' => EquipmentType::VIDEO(),
                    'name' => 'Video Device',
                ];
            }
        );
    }
}
