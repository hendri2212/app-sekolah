<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Extracurricular;
use App\Models\News;
use App\Models\SchoolProfile;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_news' => News::count(),
            'total_views' => News::sum('views'),
            'total_ekstrakurikuler' => Extracurricular::count(),
            'total_prestasi' => Achievement::count(),
            'total_ppdb' => 28
        ];

        $recent_news = News::with('category')->latest()->limit(5)->get();
        $recent_activities = collect()
            ->merge(
                News::latest()
                    ->limit(3)
                    ->get()
                    ->map(fn (News $news) => [
                        'title' => 'Berita baru ditambahkan',
                        'description' => $news->title,
                        'time' => $news->created_at,
                        'icon' => 'bi bi-newspaper',
                        'color' => 'primary',
                    ])
            )
            ->merge(
                Achievement::latest()
                    ->limit(3)
                    ->get()
                    ->map(fn (Achievement $achievement) => [
                        'title' => 'Prestasi baru ditambahkan',
                        'description' => $achievement->title,
                        'time' => $achievement->created_at,
                        'icon' => 'bi bi-trophy-fill',
                        'color' => 'warning',
                    ])
            )
            ->merge(
                Extracurricular::latest()
                    ->limit(3)
                    ->get()
                    ->map(fn (Extracurricular $extracurricular) => [
                        'title' => 'Ekstrakurikuler baru ditambahkan',
                        'description' => $extracurricular->name,
                        'time' => $extracurricular->created_at,
                        'icon' => 'bi bi-grid-3x3-gap-fill',
                        'color' => 'success',
                    ])
            )
            ->merge(
                SchoolProfile::latest('updated_at')
                    ->limit(1)
                    ->get()
                    ->map(fn (SchoolProfile $profile) => [
                        'title' => 'Profil sekolah diperbarui',
                        'description' => $profile->school_name,
                        'time' => $profile->updated_at,
                        'icon' => 'bi bi-pencil',
                        'color' => 'info',
                    ])
            )
            ->filter(fn (array $activity) => $activity['time'])
            ->sortByDesc('time')
            ->take(3)
            ->values();

        return view('admin.dashboard', compact('stats', 'recent_news', 'recent_activities'));
    }
}
