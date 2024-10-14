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
                'image' => public_path('images/categories/1728899724.png'),
                'nom' => 'PC Portable',
                'slug' => 'pc-portable',
            ],
            [
                'image' => public_path('images/categories/1728899678.jpg'),
                'nom' => 'Pc Bureau',
                'slug' => 'pc-bureau',
            ],
            [
                'image' => public_path('images/categories/1728899805.jpg'),
                'nom' => 'Écran PC',
                'slug' => 'ecran-pc',
            ],
            [
                'image' => public_path('images/categories/1728899874.jpg'),
                'nom' => 'Accessoires',
                'slug' => 'accessoires',
            ],
            [
                'image' => public_path('images/categories/1728899929.jpg'),
                'nom' => 'Imprimantes',
                'slug' => 'imprimantes', 
            ],
        ]);
    }
}
