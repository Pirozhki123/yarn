<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'test01@example.com',
            'password' => 'test01',
            'number' => 111111,
            'name' => '保全太郎',
        ]);
        User::create([
            'email' => 'test02@example.com',
            'password' => 'test02',
            'number' => 222222,
            'name' => 'オペ太郎',
        ]);
        User::create([
            'email' => 'test03@example.com',
            'password' => 'test03',
            'number' => 333333,
            'name' => '検査太郎',
        ]);
        User::create([
            'email' => 'test04@example.com',
            'password' => 'test04',
            'number' => 444444,
            'name' => '材料太郎',
        ]);
    }
}
