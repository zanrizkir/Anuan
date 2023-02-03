<?php

namespace Database\Seeders;

use App\Models\Admin\Provinsi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provinsi::create([
            'provinsi' => 'Jawa Barat',
        ]);
        Provinsi::create([
            'provinsi' => 'Banten',
        ]);
        Provinsi::create([
            'provinsi' => 'Jakarta',
        ]);
    }
}
