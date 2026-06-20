<?php

namespace Database\Seeders;

use App\Models\SchoolProfile;
use Illuminate\Database\Seeder;

class SchoolProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolProfile::updateOrCreate(
            ['school_name' => 'MTSN 2 Kotabaru'],
            [
                'school_name' => 'MTSN 2 Kotabaru',
                'active_school_year' => '2026/2027',
                'established_year' => 1991,
                'teacher_count' => 55,
                'staff_count' => 7,
                'student_count' => 364,
                'establishment_decree_number' => '1991/mtsn2/kotabaru/UK',
                'accreditation' => 'C',
                'profile_photo' => 'school-profile/Kegiatan Sekolah 3.jpg',
            ]
        );
    }
}
