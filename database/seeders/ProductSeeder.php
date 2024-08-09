<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_category_id' => 1,
                'name' => 'Laptop',
                'price' => 1000.00,
                'image' => 'laptop.jpg',
            ],
            [
                'product_category_id' => 2,
                'name' => 'Sofa',
                'price' => 500.00,
                'image' => 'sofa.jpg',
            ],
            [
                'product_category_id' => 3,
                'name' => 'T-shirt',
                'price' => 20.00,
                'image' => 'tshirt.jpg',
            ],
        ]);
    }
}
