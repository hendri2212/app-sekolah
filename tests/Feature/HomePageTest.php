<?php

namespace Tests\Feature;

use App\Models\SchoolProfile;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_home_page_shows_dynamic_school_age_from_profile(): void
    {
        SchoolProfile::create([
            'school_name' => 'MTs Negeri 2 Kotabaru',
            'established_year' => 2000,
            'active_school_year' => '2025/2026',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee((string) (now()->year - 2000));
        $response->assertSee('Tahun Berdiri');
    }
}
