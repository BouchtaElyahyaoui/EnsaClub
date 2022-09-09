<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Club;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(200)->hasPosts(5)->hasProfile()->create();
        // \App\Models\Comment::factory(2)->create();
        \App\Models\Club::factory(20)->create();

        $clubs = \App\Models\Club::all();

        User::all()->each(function ($user) use ($clubs) {
            $user->clubs()->attach(
                $clubs->random(rand(1, $clubs->count()))->pluck('id')->toArray()
            );
        });
    }
}
