<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $slug = $this->faker->name;
        $filepath = storage_path('images');

        if (!File::exists($filepath)) {
            File::makeDirectory($filepath);  //follow the declaration to see the complete signature
        }
        return [
            'clubName' => $this->faker->name(),
            'mission' => $this->faker->text(),
            'description' => $this->faker->text(),
            'slug' => Str::of($slug)->slug('-'),
            'dateOfCreation' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'ClubImage' => $this->faker->image($filepath, 400, 300),
        ];
    }
}
