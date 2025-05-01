<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Master>
 */
class MasterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('role', '=', 'пользователь')->inRandomOrder()->first()->id,
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'work_experience' => $this->faker->dateTime(),
            'image' => 'uploads/masters/default.png',
        ];
    }
}
