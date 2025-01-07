<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MachineStatus;

class MachineStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            ['machine_status' => '稼働'],
            ['machine_status' => '故障'],
            ['machine_status' => '終了'],
            ['machine_status' => '切替中'],
            ['machine_status' => '検査中'],
        ];
        foreach($values as $value) {
            MachineStatus::create($value);
        }
    }
}
