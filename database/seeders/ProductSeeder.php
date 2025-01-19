<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 30; $i++) {
            $product = Product::create([
                'product_number' => chr(mt_rand(65, 90)) . mt_rand(1,9) . mt_rand(0,9) . mt_rand(0,9) . "-" .  mt_rand(0,9) . mt_rand(0,9) . mt_rand(0,9) . mt_rand(0,9),
                'memo' => 'seed',
            ]);
            ProductSeeder::addSize($product);
            ProductSeeder::addSymbol($product);
        }
    }

    public function addSize($product): void
    {
        $product->sizes()->createMany([
            ['size' => 'SM'],
            ['size' => 'ML'],
            ['size' => 'L-LL']
        ]);
    }
    public function addSymbol($product): void
    {
        $product->symbols()->createMany([
            ['symbol' => 'A'],
            ['symbol' => 'B'],
            ['symbol' => 'C']
        ]);
    }
}
