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
        $this->call(MagangSeeder::class);
        $this->call(DivisiSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AbsensiSeeder::class);
    }
}