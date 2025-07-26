<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Genshin Impact',
            'description' => 'Top up game Genshin murah & cepat.',
            'price' => 10000,
            'image' => 'Genshin Impact.webp',
        ]);

        Product::create([
            'name' => 'Mobile Legends',
            'description' => 'Top up diamond ML dengan harga terbaik.',
            'price' => 5000,
            'image' => 'Mobile Legends.webp',
        ]);
    }
}
