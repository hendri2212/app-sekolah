<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Agenda;
use App\Models\Announcement;
use App\Models\News;

class CategoryController extends Controller
{
    /**
     * Tampilkan berita berdasarkan kategori tertentu.
     */
    public function show(Category $category)
    {
        $categories = Category::withCount('news')->get();

        $popularNews = News::with('category')
            ->orderByDesc('views')
            ->limit(3)
            ->get();

        $newsList = News::with('category')
            ->where('category_id', $category->id)
            ->latest('published_at')
            ->paginate(6);

        $featuredNews = null; // Tidak ada featured pada filter kategori
        $totalNewsCount = News::count();
        $agendas = Agenda::where('is_published', true)
            ->orderBy('start_at')
            ->limit(4)
            ->get();

        $announcements = Announcement::where('is_published', true)
            ->orderByDesc('published_at')
            ->get();

        return view('berita', compact('categories', 'popularNews', 'featuredNews', 'newsList', 'category', 'totalNewsCount', 'agendas', 'announcements'));
    }
}
