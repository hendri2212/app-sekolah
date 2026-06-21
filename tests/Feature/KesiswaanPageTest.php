<?php

namespace Tests\Feature;

use App\Models\OsisMember;
use App\Models\OsisPeriod;
use App\Models\Extracurricular;
use App\Models\ExtracurricularCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KesiswaanPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_kesiswaan_page_shows_data_from_database(): void
    {
        $period = OsisPeriod::create([
            'name' => '2025/2026',
            'start_year' => 2025,
            'end_year' => 2026,
            'is_active' => true,
            'description' => 'Periode 2025/2026',
        ]);

        OsisMember::create([
            'osis_period_id' => $period->id,
            'position' => 'Ketua OSIS',
            'name' => 'Ahmad Fadli',
            'department' => 'Pimpinan',
            'order_number' => 1,
            'is_primary' => true,
        ]);

        OsisMember::create([
            'osis_period_id' => $period->id,
            'position' => 'Wakil Ketua OSIS',
            'name' => 'Siti Aisyah',
            'department' => 'Pimpinan',
            'order_number' => 2,
            'is_primary' => true,
        ]);

        $category = ExtracurricularCategory::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
            'badge_class' => 'bg-danger',
            'order_number' => 1,
            'is_active' => true,
        ]);

        Extracurricular::create([
            'extracurricular_category_id' => $category->id,
            'name' => 'Basket',
            'slug' => 'basket',
            'image' => 'Basket.jpeg',
            'icon_class' => 'bi bi-dribbble',
            'description' => 'Tim basket sekolah',
            'order_number' => 1,
            'is_active' => true,
        ]);

        $response = $this->get('/kesiswaan');

        $response->assertStatus(200);
        $response->assertSee('2025/2026');
        $response->assertSee('Ahmad Fadli');
        $response->assertSee('Siti Aisyah');
        $response->assertSee('Olahraga');
        $response->assertSee('Basket');
        $response->assertSee('Tim basket sekolah');
    }
}
