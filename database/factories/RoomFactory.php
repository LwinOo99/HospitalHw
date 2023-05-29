<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    protected $model = Room::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "r_number" => $this->faker->numerify("##"),
            "r_status" => $this->faker->randomElement(["avaliable","active","lock"]),
            "r_guestNumber"=> $this->faker->numerify("#"),
            "r_fees"=> $this->faker->numerify("###")
        ];
    }
}
