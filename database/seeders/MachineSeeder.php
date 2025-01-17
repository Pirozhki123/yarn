<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Machine;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 6; $i++) {
            for($j = 1; $j <= 70; $j++) {
                $product = \App\Models\Product::inRandomOrder()->first();
                $size_id = $product->sizes()->where('product_id', $product->id)->inRandomOrder()->pluck('id')->first();
                $symbol_id = $product->symbols()->where('product_id', $product->id)->inRandomOrder()->pluck('id')->first();
                $machine_name = [
                    1 => '12F',
                    2 => 'L01E',
                    3 => 'M7',
                    4 => 'LA5T',
                    5 => '12F9.5',
                    6 => 'BRAVO',
                ];
                $manufacture = [
                    1 => '永田精機',
                    2 => 'Lonati',
                    3 => 'Lonati',
                    4 => 'Lonati',
                    5 => '永田精機',
                    6 => 'Lonati',
                ];
                $needle_count = [
                    1 => 400,
                    2 => 351,
                    3 => 400,
                    4 => 220,
                    5 => 360,
                    6 => 180,
                ];
                $needle_type = [
                    1 => '6mm',
                    2 => '7mm',
                    3 => '7mm',
                    4 => '12mm',
                    5 => '9.5mm',
                    6 => 'double',
                ];

                Machine::create([
                    'machine_status_id' => mt_rand(1, 5),
                    'product_id' => $product->id,
                    'size_id' => $size_id,
                    'symbol_id' => $symbol_id,
                    'machine_name' => $machine_name[$i],
                    'manufacture' => $manufacture[$i],
                    'needle_count' => $needle_count[$i],
                    'needle_type' => $needle_type[$i],
                    'lane_number' => $i,
                    'machine_number' => $j,
                ]);
            }
        }
    }
}
