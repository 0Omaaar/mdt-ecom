<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'PC Portable' => Category::where('name', 'PC Portable')->first()->id,
            'Pc Bureau' => Category::where('name', 'Pc Bureau')->first()->id,
            'Accessoires' => Category::where('name', 'Accessoires')->first()->id,
        ];

        DB::table('sub_categories')->insert([
            [
                'image' => '1728900093.png',
                'name' => 'Pc Portable',
                'category_id' => $categories['PC Portable']
            ],
            [
                'image' => '1728900130.webp',
                'name' => 'Pc Portable Gamer',
                'category_id' => $categories['PC Portable']
            ],
            [
                'image' => '1728900166.webp',
                'name' => 'Pc Complet',
                'category_id' => $categories['Pc Bureau']
            ],
            [
                'image' => '1728900221.png',
                'name' => 'Unité Centrale',
                'category_id' => $categories['Pc Bureau']
            ],
            [
                'image' => '1728900316.webp',
                'name' => 'Cartouche & Toner',
                'category_id' => $categories['Accessoires']
            ],
            [
                'image' => '1728900360.png',
                'name' => 'Accessoire Pc',
                'category_id' => $categories['Accessoires']
            ],
            [
                'image' => '1728900450.jpg',
                'name' => 'Accessoire Téléphone',
                'category_id' => $categories['Accessoires']
            ],
            [
                'image' => '1728900493.jpg',
                'name' => 'Stockage',
                'category_id' => $categories['Accessoires']
            ],
            [
                'image' => '1728900554.jpg',
                'name' => 'Réseaux',
                'category_id' => $categories['Accessoires']
            ],
        ]);
    }
}
