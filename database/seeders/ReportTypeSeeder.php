<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReportType;

class ReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $report_types = ['機械切替', '検査結果', '記号変更', '修理・調整', '故障・不調', '生産終了'];
        foreach($report_types as $report_type) {
            ReportType::create(['report_type' => $report_type]);
        }
    }
}
