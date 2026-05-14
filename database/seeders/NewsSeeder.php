<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::first();
        if (!$admin) return;

        $akademik = Category::where('slug', 'akademik')->first();
        $kesiswaan = Category::where('slug', 'kesiswaan')->first();
        $prestasi = Category::where('slug', 'prestasi')->first();
        $adiwiyata = Category::where('slug', 'adiwiyata')->first();

        $newsData = [
            [
                'title' => 'MTsN 2 Kotabaru berhasil menyabet predikat Juara Umum Lomba Olahraga Tradisional',
                'category_id' => $prestasi->id,
                'content' => 'Tingkat Kabupaten Kotabaru dalam rangka memperingati Hari Olahraga Nasional (HAORNAS) ke-42. Kegiatan ini diikuti oleh berbagai sekolah tingkat menengah pertama se-Kabupaten Kotabaru.',
                'image' => 'Kegiatan Sekolah 2.jpg',
                'is_featured' => true,
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'Persiapan Asesmen Nasional 2025',
                'category_id' => $akademik->id,
                'content' => 'MTS Negeri 2 Kotabaru mempersiapkan siswa-siswi untuk menghadapi Asesmen Nasional dengan program intensif. Program ini meliputi simulasi berbasis komputer dan pendalaman materi esensial.',
                'image' => 'Ruang Kelas.jfif',
                'is_featured' => false,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Pemilihan Ketua OSIS 2025/2026',
                'category_id' => $kesiswaan->id,
                'content' => 'Pemilihan Ketua dan Wakil Ketua OSIS Masa Bakti 2025/2026 dilaksanakan secara Offline. Seluruh siswa berpartisipasi memberikan suaranya untuk menentukan pemimpin baru organisasi kesiswaan.',
                'image' => 'Osis.jfif',
                'is_featured' => false,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Kegiatan Penanaman Pohon di Lingkungan Sekolah',
                'category_id' => $adiwiyata->id,
                'content' => 'Kegiatan penanaman pohon dalam rangka menjaga lingkungan sekolah yang hijau dan asri. Seluruh warga sekolah terlibat aktif dalam menghijaukan area madrasah.',
                'image' => 'Menanam.jpeg',
                'is_featured' => false,
                'published_at' => now()->subDays(5),
            ],
        ];

        foreach ($newsData as $data) {
            News::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'category_id' => $data['category_id'],
                    'user_id' => $admin->id,
                    'title' => $data['title'],
                    'content' => $data['content'],
                    'image' => $data['image'],
                    'is_featured' => $data['is_featured'],
                    'views' => rand(100, 1000),
                    'published_at' => $data['published_at'],
                ]
            );
        }
    }
}
