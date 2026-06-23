<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Extracurricular;
use App\Models\ExtracurricularCategory;
use App\Models\OsisPeriod;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KesiswaanController extends Controller
{
    public function index()
    {
        $period = OsisPeriod::with(['members' => function ($query) {
            $query->orderBy('order_number');
        }])
            ->where('is_active', true)
            ->first();

        if (!$period) {
            $period = OsisPeriod::with(['members' => function ($query) {
                $query->orderBy('order_number');
            }])->latest()->first();
        }

        $extracurricularCategories = ExtracurricularCategory::where('is_active', true)
            ->whereHas('extracurriculars', fn ($query) => $query->where('is_active', true))
            ->orderBy('order_number')
            ->get();

        $extracurriculars = Extracurricular::with('category')
            ->where('is_active', true)
            ->whereHas('category', fn ($query) => $query->where('is_active', true))
            ->orderBy('order_number')
            ->get();

        $achievements = Achievement::where('is_active', true)
            ->orderBy('order_number')
            ->orderByDesc('achieved_at')
            ->get();

        $latestAchievement = Achievement::where('is_active', true)
            ->whereNotNull('achieved_at')
            ->orderByDesc('achieved_at')
            ->first();

        $achievementYear = $latestAchievement?->achieved_at->year ?? now()->year;

        $achievementStats = [
            'year' => $achievementYear,
            'year_total' => Achievement::where('is_active', true)
                ->whereYear('achieved_at', $achievementYear)
                ->count(),
            'national_total' => Achievement::where('is_active', true)
                ->where('level', 'nasional')
                ->count(),
            'province_total' => Achievement::where('is_active', true)
                ->where('level', 'provinsi')
                ->count(),
            'city_total' => Achievement::where('is_active', true)
                ->where('level', 'kota')
                ->count(),
        ];

        $galleryImageItems = collect(Storage::disk('public')->allFiles())
            ->filter(fn ($path) => str_contains($path, '/'))
            ->filter(function ($path) {
                $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

                return in_array($extension, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'avif'], true);
            })
            ->sort()
            ->values()
            ->map(function ($path) {
                $title = Str::of(pathinfo($path, PATHINFO_FILENAME))
                    ->replace(['-', '_'], ' ')
                    ->squish()
                    ->title();

                return [
                    'path' => $path,
                    'url' => asset('storage/'.$path),
                    'title' => (string) $title,
                ];
            });
        $galleryPerPage = 6;
        $galleryPageName = 'gallery_page';
        $galleryCurrentPage = LengthAwarePaginator::resolveCurrentPage($galleryPageName);
        $galleryImages = new LengthAwarePaginator(
            $galleryImageItems->forPage($galleryCurrentPage, $galleryPerPage)->values(),
            $galleryImageItems->count(),
            $galleryPerPage,
            $galleryCurrentPage,
            [
                'path' => request()->url(),
                'pageName' => $galleryPageName,
            ],
        );

        $galleryImages->withQueryString()->fragment('galeri-kegiatan');

        return view('kesiswaan', compact(
            'period',
            'extracurricularCategories',
            'extracurriculars',
            'achievements',
            'achievementStats',
            'galleryImages',
        ));
    }
}
