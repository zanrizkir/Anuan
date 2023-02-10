<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name' => 'Gaming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Editing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'RGB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'wireless',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'name' => 'Css',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'name' => 'Php',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'name' => 'Python',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ];
        Tag::insert($tags);
    }
}