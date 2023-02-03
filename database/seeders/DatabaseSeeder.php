<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\UserSeeder;
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
        $this->call([
            // KategoriSeeder::class,
            // SubKategoriSeeder::class,
            // ProdukSeeder::class,
            UserSeeder::class,
            ProvinsiSeeder::class,
            KotaSeeder::class,
        ]);
    }
}
