<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_news' => News::count(),
            'total_views' => News::sum('views'),
            // Dummy data for others as they don't have tables yet
            'total_siswa' => 520, 
            'total_prestasi' => Achievement::count(),
            'total_ppdb' => 28
        ];

        $recent_news = News::with('category')->latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_news'));
    }
}
