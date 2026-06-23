<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $achievements = [
            [
                'title' => 'Medali Emas OSN Matematika',
                'competition_name' => 'Olimpiade Sains Nasional 2024',
                'organizer' => null,
                'level' => 'nasional',
                'rank' => 'Medali Emas',
                'medal_icon' => '🥇',
                'recipient_name' => '[Nama Siswa]',
                'recipient_type' => 'siswa',
                'achieved_at' => '2024-12-01',
                'order_number' => 1,
            ],
            [
                'title' => 'Juara 2 Lomba Karya Ilmiah',
                'competition_name' => 'LKIR Kalimantan Selatan 2024',
                'organizer' => null,
                'level' => 'provinsi',
                'rank' => 'Juara 2',
                'medal_icon' => '🥈',
                'recipient_name' => 'Tim KIR',
                'recipient_type' => 'tim',
                'achieved_at' => '2024-11-01',
                'order_number' => 2,
            ],
            [
                'title' => 'Juara 3 Lomba Basket',
                'competition_name' => 'Kejuaraan Basket Pelajar Kotabaru 2024',
                'organizer' => null,
                'level' => 'kota',
                'rank' => 'Juara 3',
                'medal_icon' => '🥉',
                'recipient_name' => 'Tim Basket',
                'recipient_type' => 'tim',
                'achieved_at' => '2024-10-01',
                'order_number' => 3,
            ],
            [
                'title' => 'Sekolah Adiwiyata',
                'competition_name' => 'Sekolah Adiwiyata',
                'organizer' => 'Kementerian Lingkungan Hidup dan Kehutanan RI',
                'level' => 'nasional',
                'rank' => 'Sekolah Adiwiyata',
                'medal_icon' => '🏆',
                'recipient_name' => 'MTS Negeri 2 Kotabaru',
                'recipient_type' => 'sekolah',
                'achieved_at' => '2022-01-01',
                'order_number' => 4,
            ],
            [
                'title' => 'Juara 1 Lomba Seni Tari',
                'competition_name' => 'Festival Seni Pelajar Kotabaru 2024',
                'organizer' => null,
                'level' => 'kota',
                'rank' => 'Juara 1',
                'medal_icon' => '🥇',
                'recipient_name' => 'Tim Seni Tari',
                'recipient_type' => 'tim',
                'achieved_at' => '2024-09-01',
                'order_number' => 5,
            ],
        ];

        foreach ($achievements as $achievement) {
            DB::table('achievements')->updateOrInsert(
                ['slug' => Str::slug($achievement['title'])],
                [
                    ...$achievement,
                    'slug' => Str::slug($achievement['title']),
                    'is_featured' => true,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
