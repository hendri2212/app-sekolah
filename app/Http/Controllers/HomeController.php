<?php

namespace App\Http\Controllers;

use App\Models\SchoolProfile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $schoolProfile = SchoolProfile::first();
        $schoolAge = $schoolProfile && $schoolProfile->established_year
            ? now()->year - (int) $schoolProfile->established_year
            : 0;
        $dashboardGalleryImages = collect(Storage::disk('public')->allFiles())
            ->filter(fn ($path) => str_contains($path, '/'))
            ->filter(function ($path) {
                $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

                return in_array($extension, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'avif'], true);
            })
            ->sort()
            ->take(3)
            ->values()
            ->map(function ($path) {
                $title = Str::of(pathinfo($path, PATHINFO_FILENAME))
                    ->replace(['-', '_'], ' ')
                    ->squish()
                    ->title();

                return [
                    'url' => asset('storage/'.$path),
                    'title' => (string) $title,
                ];
            });

        return view('dashboard', compact('schoolProfile', 'schoolAge', 'dashboardGalleryImages'));
    }
}
