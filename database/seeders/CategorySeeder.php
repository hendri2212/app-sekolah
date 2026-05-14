<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Akademik', 'color' => 'primary'],
            ['name' => 'Kesiswaan', 'color' => 'success'],
            ['name' => 'Prestasi', 'color' => 'warning'],
            ['name' => 'Adiwiyata', 'color' => 'info'],
            ['name' => 'Umum', 'color' => 'secondary'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'color' => $category['color'],
                ]
            );
        }
    }
}
