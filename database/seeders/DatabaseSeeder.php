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
        \App\Models\User::factory(20)->hasPosts(5)->hasProfile()->create();
        $clubs = \App\Models\Club::factory(5)->create();


        // $rooms = \App\Models\Room::all();

        User::all()->each(function ($user) use ($clubs) {
            $user->clubs()->attach(
                $clubs->random(rand(1, $clubs->count()))->pluck('id')->toArray()
            );
        });
        \App\Models\Revision::factory(40)->create();

        // \App\Models\Room::factory(5)->create();
    }
}
