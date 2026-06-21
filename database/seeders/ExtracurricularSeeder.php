<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExtracurricularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Olahraga', 'badge_class' => 'bg-danger', 'order_number' => 1],
            ['name' => 'Seni', 'badge_class' => 'bg-info', 'order_number' => 2],
            ['name' => 'Ilmiah', 'badge_class' => 'bg-primary', 'order_number' => 3],
            ['name' => 'Keagamaan', 'badge_class' => 'bg-success', 'order_number' => 4],
            ['name' => 'Keterampilan', 'badge_class' => 'bg-warning text-dark', 'order_number' => 5],
        ];

        $categoryIds = [];

        foreach ($categories as $category) {
            DB::table('extracurricular_categories')->updateOrInsert(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'badge_class' => $category['badge_class'],
                    'order_number' => $category['order_number'],
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            $categoryIds[Str::slug($category['name'])] = DB::table('extracurricular_categories')
                ->where('slug', Str::slug($category['name']))
                ->value('id');
        }

        $extracurriculars = [
            [
                'category' => 'keagamaan',
                'name' => 'Pramuka',
                'image' => 'Pramuka.jpg',
                'icon_class' => 'bi bi-compass',
                'description' => 'Pendidikan karakter dan kepemimpinan',
                'order_number' => 1,
            ],
            [
                'category' => 'keterampilan',
                'name' => 'PMR',
                'image' => 'PMR.jpg',
                'icon_class' => 'bi bi-heart-pulse',
                'description' => 'Palang Merah Remaja',
                'order_number' => 2,
            ],
            [
                'category' => 'keagamaan',
                'name' => 'Paskibra',
                'image' => 'Paskibra.jpg',
                'icon_class' => 'bi bi-flag',
                'description' => 'Pasukan Pengibar Bendera',
                'order_number' => 3,
            ],
            [
                'category' => 'olahraga',
                'name' => 'Basket',
                'image' => 'Basket.jpeg',
                'icon_class' => 'bi bi-dribbble',
                'description' => 'Tim basket sekolah',
                'order_number' => 4,
            ],
            [
                'category' => 'olahraga',
                'name' => 'Futsal',
                'image' => 'Futsal.jpg',
                'icon_class' => 'bi bi-dribbble',
                'description' => 'Tim futsal sekolah',
                'order_number' => 5,
            ],
            [
                'category' => 'olahraga',
                'name' => 'Badminton',
                'image' => 'Badminton.jpeg',
                'icon_class' => 'bi bi-search',
                'description' => 'Bulutangkis sekolah',
                'order_number' => 6,
            ],
            [
                'category' => 'seni',
                'name' => 'Seni Tari',
                'image' => 'Seni Tari.png',
                'icon_class' => 'bi bi-music-note-beamed',
                'description' => 'Tari tradisional & modern',
                'order_number' => 7,
            ],
            [
                'category' => 'seni',
                'name' => 'Seni Musik',
                'image' => 'Seni Musik.jpg',
                'icon_class' => 'bi bi-music-note-list',
                'description' => 'Band & paduan suara',
                'order_number' => 8,
            ],
            [
                'category' => 'ilmiah',
                'name' => 'KIR',
                'image' => 'KIR.jpeg',
                'icon_class' => 'bi bi-book',
                'description' => 'Karya Ilmiah Remaja',
                'order_number' => 9,
            ],
            [
                'category' => 'ilmiah',
                'name' => 'Komputer',
                'image' => 'Komputer.jpeg',
                'icon_class' => 'bi bi-pc-display',
                'description' => 'Programming & desain',
                'order_number' => 10,
            ],
            [
                'category' => 'keagamaan',
                'name' => 'Rohis',
                'image' => 'Rohis.jpg',
                'icon_class' => 'bi bi-moon-stars',
                'description' => 'Rohani Islam',
                'order_number' => 11,
            ],
            [
                'category' => 'keterampilan',
                'name' => 'Jurnalistik',
                'image' => 'Jurnalistik.jpg',
                'icon_class' => 'bi bi-newspaper',
                'description' => 'Mading & media sekolah',
                'order_number' => 12,
            ],
        ];

        foreach ($extracurriculars as $extracurricular) {
            DB::table('extracurriculars')->updateOrInsert(
                ['slug' => Str::slug($extracurricular['name'])],
                [
                    'extracurricular_category_id' => $categoryIds[$extracurricular['category']],
                    'name' => $extracurricular['name'],
                    'image' => $extracurricular['image'],
                    'icon_class' => $extracurricular['icon_class'],
                    'description' => $extracurricular['description'],
                    'registration_url' => null,
                    'order_number' => $extracurricular['order_number'],
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
