<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'image' => '1728899724.png',
                'name' => 'PC Portable',
                'slug' => 'pc-portable',
            ],
            [
                'image' => '1728899678.jpg',
                'name' => 'Pc Bureau',
                'slug' => 'pc-bureau',
            ],
            [
                'image' => '1728899805.jpg',
                'name' => 'Écran PC',
                'slug' => 'ecran-pc',
            ],
            [
                'image' => '1728899874.jpg',
                'name' => 'Accessoires',
                'slug' => 'accessoires',
            ],
            [
                'image' => '1728899929.jpg',
                'name' => 'Imprimantes',
                'slug' => 'imprimantes',
            ],
        ]);
    }
}
