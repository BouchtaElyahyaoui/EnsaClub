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
        // \App\Models\User::factory(50)->hasPosts(5)->hasProfile()->create();
        // \App\Models\Comment::factory(2)->create();
        // \App\Models\Club::factory(10)->create();
        // \App\Models\Event::factory(10)->create();
        // $clubs = \App\Models\Club::all();
        $rooms = \App\Models\Room::all();

        User::all()->each(function ($user) use ($rooms) {
            $user->rooms()->attach(
                $rooms->random(rand(1, $rooms->count()))->pluck('id')->toArray()
            );
        });

        // \App\Models\Room::factory(5)->create();
    }
}
