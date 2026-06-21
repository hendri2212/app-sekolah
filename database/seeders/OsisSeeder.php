<?php

namespace Database\Seeders;

use App\Models\OsisMember;
use App\Models\OsisPeriod;
use Illuminate\Database\Seeder;

class OsisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $period = OsisPeriod::updateOrCreate(
            ['name' => '2025/2026'],
            [
                'start_year' => 2025,
                'end_year' => 2026,
                'is_active' => true,
                'description' => 'Periode OSIS masa bakti 2025/2026',
            ]
        );

        $members = [
            [
                'position' => 'Ketua OSIS',
                'name' => 'Ketua OSIS',
                'photo' => 'osis/Ketua Osis.jpg',
                'department' => 'Pimpinan',
                'order_number' => 1,
                'is_primary' => true,
            ],
            [
                'position' => 'Wakil Ketua OSIS',
                'name' => 'Wakil Ketua OSIS',
                'photo' => 'osis/Wakil Ketua Osis.png',
                'department' => 'Pimpinan',
                'order_number' => 2,
                'is_primary' => true,
            ],
            [
                'position' => 'Sekretaris 1',
                'name' => 'Sekretaris 1',
                'photo' => null,
                'department' => 'Sekretaris',
                'order_number' => 3,
                'is_primary' => false,
            ],
            [
                'position' => 'Sekretaris 2',
                'name' => 'Sekretaris 2',
                'photo' => null,
                'department' => 'Sekretaris',
                'order_number' => 4,
                'is_primary' => false,
            ],
            [
                'position' => 'Bendahara 1',
                'name' => 'Bendahara 1',
                'photo' => null,
                'department' => 'Bendahara',
                'order_number' => 5,
                'is_primary' => false,
            ],
            [
                'position' => 'Bendahara 2',
                'name' => 'Bendahara 2',
                'photo' => null,
                'department' => 'Bendahara',
                'order_number' => 6,
                'is_primary' => false,
            ],
        ];

        foreach ($members as $member) {
            OsisMember::updateOrCreate(
                [
                    'osis_period_id' => $period->id,
                    'position' => $member['position'],
                ],
                $member
            );
        }
    }
}
