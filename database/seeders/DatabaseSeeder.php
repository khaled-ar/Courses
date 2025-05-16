<?php

namespace Database\Seeders;

use App\Models\{
    Course,
    User
};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Course::factory(30)->create();
    }
}
