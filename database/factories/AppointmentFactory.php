<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "a_drName"=> $this->faker->name(),
            "a_room"=> $this->faker->numerify("##"),
            "a_dateTime"=> $this->faker->dateTime(),
        ];
    }
}
