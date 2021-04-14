<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            [
                'title' => 'Do Homework',
                'description' => "Do some homework from binus lecturer",
                'enddate' => "2020-05-10",
                'status' => "Completed"
            ],
            [
                'title' => 'Do Home Cleaning',
                'description' => "Do some cleaning and mopping",
                'enddate' => "2020-5-20",
                'status' => "Todo"
            ],
            [
                'title' => 'Watch Netflix',
                'description' => "Watch Netflix all day long",
                'enddate' => "2020-05-15",
                'status' => "On Progress"
            ]
        ]);

        DB::table("users")->insert([
            'name' => "Raymond",
            'email' => "raymond@mail.com",
            'password' => Hash::make("raymond123"),
        ]);
    }
}
