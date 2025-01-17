<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Equipment;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            [
                'equipment_name' => 'ニードル 6mm long',
                'quantity' => 1000,
            ],
            [
                'equipment_name' => 'ニードル 6mm short',
                'quantity' => 1000,
            ],
            [
                'equipment_name' => 'ニードル 9.5mm long',
                'quantity' => 1000,
            ],
            [
                'equipment_name' => 'ニードル 9.5mm short',
                'quantity' => 1000,
            ],
            [
                'equipment_name' => 'ニードル 7mm long',
                'quantity' => 1000,
            ],
            [
                'equipment_name' => 'ニードル 7mm short',
                'quantity' => 1000,
            ],
            [
                'equipment_name' => 'シンカー 12F',
                'quantity' => 1000,
            ],
            [
                'equipment_name' => 'シンカー Lonati',
                'quantity' => 1000,
            ],
        ];
        foreach($values as $value) {
            Equipment::create($value);
        }
    }
}
