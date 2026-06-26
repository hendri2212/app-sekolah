<?php

namespace Tests\Feature;

use App\Models\Facility;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfilePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_shows_active_facilities_from_database(): void
    {
        Facility::create([
            'name' => 'Studio Podcast',
            'slug' => 'studio-podcast',
            'image' => 'storage/facility/studio-podcast.jpg',
            'icon_class' => 'bi bi-mic',
            'description' => 'Ruang produksi konten pembelajaran',
            'order_number' => 1,
            'is_active' => true,
        ]);

        Facility::create([
            'name' => 'Gudang Arsip',
            'slug' => 'gudang-arsip',
            'image' => 'storage/facility/gudang-arsip.jpg',
            'icon_class' => 'bi bi-archive',
            'description' => 'Tidak tampil di halaman profil',
            'order_number' => 2,
            'is_active' => false,
        ]);

        $response = $this->get('/profile');

        $response->assertStatus(200);
        $response->assertSee('Studio Podcast');
        $response->assertSee('Ruang produksi konten pembelajaran');
        $response->assertSee('bi bi-mic', false);
        $response->assertDontSee('Gudang Arsip');
        $response->assertDontSee('Tidak tampil di halaman profil');
    }
}
