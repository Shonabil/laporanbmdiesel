<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Contoh seeder bawaan Laravel
        // \App\Models\User::factory(10)->create();

        // Di sini kita panggil AdminUserSeeder
        $this->call(AdminUserSeeder::class);
    }
}
