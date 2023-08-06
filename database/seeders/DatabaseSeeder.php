<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->has(
            \App\Models\Agence::factory()->count(1)->has(
                \App\Models\Estate::factory()->count(2)
            )
        )->create();
        \App\Models\Role::factory(4)->create();
    }
}
