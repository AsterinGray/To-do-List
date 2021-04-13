<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('todos')->insert([
            'title' => 'Do Homework',
            'description' => "Do some homework from binus lecturer",
            'enddate' => "2020-05-10",
            'status' => "Completed"
        ]);
    }
}
