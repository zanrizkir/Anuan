<?php

namespace Database\Seeders;

use App\Models\Admin\Kota;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kota::create([
            'provinsi_id' => 'Jawa Barat',
            'kota' => 'Kota Bandung',
        ]);
    }
}
