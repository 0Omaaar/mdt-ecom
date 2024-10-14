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
            'PC Portable' => Category::where('nom', 'PC Portable')->first()->id,
            'Pc Bureau' => Category::where('nom', 'Pc Bureau')->first()->id,
            'Accessoires' => Category::where('nom', 'Accessoires')->first()->id,
        ];

        DB::table('subcategories')->insert([
            [
                'image' => public_path('images/subCategories/1728900093.png'),
                'nom' => 'Pc Portable',
                'category_id' => $categories['PC Portable']
            ],
            [
                'image' => public_path('images/subCategories/1728900130.webp'),
                'nom' => 'Pc Portable Gamer',
                'category_id' => $categories['PC Portable']
            ],
            [
                'image' => public_path('images/subCategories/1728900166.webp'),
                'nom' => 'Pc Complet',
                'category_id' => $categories['Pc Bureau']
            ],
            [
                'image' => public_path('images/subCategories/1728900221.png'),
                'nom' => 'Unité Centrale',
                'category_id' => $categories['Pc Bureau']
            ],
            [
                'image' => public_path('images/subCategories/1728900316.webp'),
                'nom' => 'Cartouche & Toner',
                'category_id' => $categories['Accessoires']
            ],
            [
                'image' => public_path('images/subCategories/1728900360.png'),
                'nom' => 'Accessoire Pc',
                'category_id' => $categories['Accessoires']
            ],
            [
                'image' => public_path('images/subCategories/1728900450.jpg'),
                'nom' => 'Accessoire Téléphone',
                'category_id' => $categories['Accessoires']
            ],
            [
                'image' => public_path('images/subCategories/1728900493.jpg'),
                'nom' => 'Stockage',
                'category_id' => $categories['Accessoires']
            ],
            [
                'image' => public_path('images/subCategories/1728900554.jpg'),
                'nom' => 'Réseaux',
                'category_id' => $categories['Accessoires']
            ],
        ]);
    }
}
