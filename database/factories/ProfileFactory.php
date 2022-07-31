<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = ['Male', 'Female'];
        $slug = $this->faker->name;
        return [
            'slug' => Str::of($slug)->slug('-'),
            'gender' => Arr::random($gender),
            'dob' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'cne' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ];
    }
}
