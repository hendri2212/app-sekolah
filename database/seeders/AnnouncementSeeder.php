<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $announcements = [
            [
                'title' => 'PENTING: Libur Nasional',
                'content' => 'Diberitahukan kepada seluruh siswa-siswi dan orang tua bahwa sekolah akan diliburkan pada tanggal 25 Januari 2025 dikarenakan hari libur nasional.',
                'icon' => 'bi bi-exclamation-triangle-fill',
                'variant' => 'urgent',
                'button_label' => null,
                'button_url' => null,
                'published_at' => '2025-01-15 08:00:00',
                'is_published' => true,
            ],
            [
                'title' => 'Selamat Kepada Peserta SPMB 2025',
                'content' => 'Selamat kepada murid yang telah diterima di MTS Negeri 2 Kotabaru. Silahkan mengunduh file panduan MPLS di bawah ini.',
                'icon' => 'bi bi-check-circle-fill',
                'variant' => 'success',
                'button_label' => 'Unduh Panduan MPLS',
                'button_url' => '/storage/docs/panduan-mpls.pdf',
                'published_at' => '2025-01-10 09:30:00',
                'is_published' => true,
            ],
            [
                'title' => 'Jadwal Penilaian Tengah Semester',
                'content' => 'Penilaian Tengah Semester (PTS) akan dilaksanakan pada minggu ketiga Februari 2025. Siswa-siswi diharapkan mempersiapkan diri dengan baik.',
                'icon' => 'bi bi-info-circle-fill',
                'variant' => 'info',
                'button_label' => null,
                'button_url' => null,
                'published_at' => '2025-01-08 10:00:00',
                'is_published' => true,
            ],
            [
                'title' => 'Pendaftaran Ekstrakurikuler',
                'content' => 'Pendaftaran ekstrakurikuler untuk semester genap telah dibuka. Siswa-siswi dapat mendaftar melalui wali kelas masing-masing.',
                'icon' => 'bi bi-megaphone-fill',
                'variant' => 'primary',
                'button_label' => null,
                'button_url' => null,
                'published_at' => '2025-01-05 11:00:00',
                'is_published' => true,
            ],
        ];

        foreach ($announcements as $announcement) {
            Announcement::updateOrCreate(
                ['title' => $announcement['title']],
                $announcement
            );
        }
    }
}
