<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Top Up Game', 'slug' => 'topup'],
            ['name' => 'Voucher', 'slug' => 'voucher'],
            ['name' => 'E-Wallet', 'slug' => 'ewallet']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}