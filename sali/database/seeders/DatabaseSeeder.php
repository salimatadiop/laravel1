<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\etudiant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        etudiant::factory(30) ->create();
        // $this->call(ClassesTableSeeder::class);

        // \App\Models\User::factory(10)->create();

    }
}
