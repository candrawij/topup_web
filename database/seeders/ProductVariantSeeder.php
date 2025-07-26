<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; 
use App\Models\ProductVariant; 

class ProductVariantSeeder extends Seeder
{
    public function run()
    {
        if (Product::count() === 0) {
            $this->call(ProductSeeder::class);
        }

        $variants = [
            ['name' => 'Express Supply Pass', 'price' => 57418],
            ['name' => '60 Oneiric Shard', 'price' => 11679],
            ['name' => '330 Oneiric Shard', 'price' => 57418],
            ['name' => '1090 Oneiric Shard', 'price' => 176804],
        ];

        Product::each(function ($product) use ($variants) {
            foreach ($variants as $variant) {
                ProductVariant::firstOrCreate(
                    ['product_id' => $product->id, 'name' => $variant['name']],
                    ['price' => $variant['price']]
                );
            }
        });
    }
}