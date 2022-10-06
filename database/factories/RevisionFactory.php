<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Revision>
 */
class RevisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'club_id' => rand(0, 11),
            'text' => $this->faker->text(),
            'user_id' => rand(0, 50),
            'status' => rand(0, 1),
        ];
    }
}
