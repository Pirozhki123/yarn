<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'number' => 123456,
        //     'delete_flag' => false,
        // ]);
        $this->call([
            EquipmentSeeder::class,
            ProductSeeder::class,
            MachineStatusSeeder::class,
            MachineSeeder::class,
            ReportTypeSeeder::class,
            UserSeeder::class,
        ]);
    }
}
