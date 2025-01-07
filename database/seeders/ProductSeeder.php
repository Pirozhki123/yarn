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
        $product = Product::create([
            'product_number' => 'B5631-250ZG',
            'memo' => '廃番',
        ]);
        ProductSeeder::addSize($product);
        ProductSeeder::addSymbol($product);

        $product = Product::create([
            'product_number' => 'B5631-270ZG',
            'memo' => '廃番',
        ]);
        ProductSeeder::addSize($product);
        ProductSeeder::addSymbol($product);
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
