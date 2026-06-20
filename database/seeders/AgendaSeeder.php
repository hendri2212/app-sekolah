<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agendas = [
            [
                'title' => 'Masa Pengenalan Lingkungan Sekolah (MPLS)',
                'description' => 'Kegiatan pengenalan lingkungan sekolah untuk peserta didik baru.',
                'location' => 'MTS Negeri 2 Kotabaru',
                'start_at' => '2025-01-20 07:00:00',
                'end_at' => '2025-01-20 14:00:00',
            ],
            [
                'title' => 'Rapat Dewan Guru',
                'description' => 'Rapat koordinasi dewan guru.',
                'location' => 'Ruang Guru',
                'start_at' => '2025-01-25 13:00:00',
                'end_at' => '2025-01-25 15:00:00',
            ],
            [
                'title' => 'Awal Semester Genap 2025',
                'description' => 'Hari pertama kegiatan belajar mengajar semester genap.',
                'location' => 'Seluruh Kelas',
                'start_at' => '2025-02-01 07:00:00',
                'end_at' => '2025-02-01 12:00:00',
            ],
            [
                'title' => 'Pentas Seni Sekolah',
                'description' => 'Kegiatan pentas seni sekolah.',
                'location' => 'Aula Sekolah',
                'start_at' => '2025-02-10 08:00:00',
                'end_at' => '2025-02-10 15:00:00',
            ],
        ];

        foreach ($agendas as $agenda) {
            $slug = Str::slug($agenda['title']);

            Agenda::updateOrCreate(
                ['slug' => $slug],
                array_merge($agenda, [
                    'slug' => $slug,
                    'is_published' => true,
                ])
            );
        }
    }
}
