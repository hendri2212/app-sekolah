<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            [
                'name' => 'Ruang Kelas',
                'image' => 'storage/news/1778735569_UI7coeEx4c.jpg',
                'icon_class' => 'bi bi-building',
                'description' => 'Ruang kelas nyaman',
                'order_number' => 1,
            ],
            [
                'name' => 'Lab Komputer',
                'image' => 'storage/facility/Lab Komputer.jfif',
                'icon_class' => 'bi bi-laptop',
                'description' => 'Laboratorium komputer dengan perangkat modern',
                'order_number' => 2,
            ],
            [
                'name' => 'Lab IPA',
                'image' => 'storage/facility/Lab IPA.jfif',
                'icon_class' => 'bi bi-search',
                'description' => 'Laboratorium IPA lengkap untuk praktikum',
                'order_number' => 3,
            ],
            [
                'name' => 'Perpustakaan',
                'image' => 'storage/facility/perpustakaan.jfif',
                'icon_class' => 'bi bi-book',
                'description' => 'Perpustakaan dengan koleksi buku lengkap',
                'order_number' => 4,
            ],
            [
                'name' => 'Masjid',
                'image' => 'storage/facility/masjid.jfif',
                'icon_class' => 'bi bi-moon-stars',
                'description' => 'Masjid sekolah untuk kegiatan keagamaan',
                'order_number' => 5,
            ],
            [
                'name' => 'Lapangan Olahraga',
                'image' => 'storage/eskul/Basket.jpeg',
                'icon_class' => 'bi bi-grid-3x3',
                'description' => 'Lapangan untuk berbagai kegiatan olahraga',
                'order_number' => 6,
            ],
            [
                'name' => 'Kantin',
                'image' => 'storage/facility/kantin.jfif',
                'icon_class' => 'bi bi-cup-hot',
                'description' => 'Kantin sehat dengan makanan bergizi',
                'order_number' => 7,
            ],
            [
                'name' => 'Taman Sekolah',
                'image' => 'storage/news/1778736484_ou6oi74UzA.jpg',
                'icon_class' => 'bi bi-flower1',
                'description' => 'Taman hijau sebagai sekolah Adiwiyata',
                'order_number' => 8,
            ],
        ];

        foreach ($facilities as $facility) {
            DB::table('facilities')->updateOrInsert(
                ['slug' => Str::slug($facility['name'])],
                [
                    'name' => $facility['name'],
                    'image' => $facility['image'],
                    'icon_class' => $facility['icon_class'],
                    'description' => $facility['description'],
                    'order_number' => $facility['order_number'],
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
