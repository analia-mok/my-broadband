<?php

namespace Database\Factories;

use App\Enums\EquipmentType;
use App\Models\Equipment;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return $this->state(function (array $attributes) {
            return [
                'type' => EquipmentType::VOICE(),
                'name' => 'Voice Device',
            ];
        });
    }

    /**
     * Indicate that this equipment is internet-related.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function isInternet()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => EquipmentType::INTERNET(),
                'name' => 'Internet Device',
            ];
        });
    }
    /**
     * Indicate that this equipment is video-related.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function isVideo()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => EquipmentType::VIDEO(),
                'name' => 'Video Device',
            ];
        });
    }
}
