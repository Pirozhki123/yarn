<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Report;
use App\Models\User;
use App\Models\Machine;
use App\Models\Product;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i < 50; $i++) {
            $user = User::inRandomOrder()->first();
            $machine = Machine::inRandomOrder()->first();
            $product = Product::inRandomOrder()->first();
            $size = $product->sizes()->inRandomOrder()->first();
            $symbol = $product->symbols()->inRandomOrder()->first();
            $length = mt_rand(1, 100);
            Report::create([
                'user_id' => $user->id,
                'machine_id' => $machine->id,
                'product_id' => $product->id,
                'size_id' => $size->id,
                'symbol_id' => $symbol->id,
                'report_type' => array_rand(config('constants.report_types')),
                'report' => Str::random($length),
            ]);
        }
    }
}
