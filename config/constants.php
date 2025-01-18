<?php

return [
    'max_lane' => 6,
    'max_machine_number' => 70,
    'report_types' => [
        'malfunction' => '故障・不調',
        'completed' => 'カウンタ終了',
        'switch' => '機械切替',
        'repair' => '修理・調整',
        'inspection' => '検査結果',
        'symbol_change' => '記号変更',
    ],
    'machine_status' => [
        'active' => '稼働',
        'fault' => '故障',
        'completed' => '終了',
        'switching' => '切替中',
        'inspecting' => '検査中',
    ]
];
