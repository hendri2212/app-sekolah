<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            CategorySeeder::class,
            NewsSeeder::class,
            AgendaSeeder::class,
            AnnouncementSeeder::class,
            SchoolProfileSeeder::class,
            OsisSeeder::class,
            ExtracurricularSeeder::class,
            AchievementSeeder::class,
        ]);
    }
}
