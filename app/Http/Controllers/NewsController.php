<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Halaman daftar berita publik.
     */
    public function index(Request $request)
    {
        $categories = Category::withCount('news')->get();
        $totalNewsCount = News::count();

        $popularNews = News::with('category')
            ->orderByDesc('views')
            ->limit(3)
            ->get();

        // Filter berdasarkan kategori jika ada query ?kategori=slug
        $selectedCategory = null;
        if ($request->filled('kategori')) {
            $selectedCategory = Category::where('slug', $request->kategori)->first();
        }

        // Berita utama: hanya tampil jika tidak ada filter kategori DAN tidak sedang mencari (search)
        $featuredNews = null;
        if (!$selectedCategory && !$request->filled('search')) {
            $featuredNews = News::with('category')
                ->where('is_featured', true)
                ->latest('published_at')
                ->first();
        }

        // Grid berita
        $newsQuery = News::with('category')->latest('published_at');

        // Filter berdasarkan kategori
        if ($selectedCategory) {
            $newsQuery->where('category_id', $selectedCategory->id);
        } elseif (!$request->filled('search')) {
            // Sembunyikan is_featured dari grid HANYA jika sedang TIDAK mencari
            // (karena jika tidak mencari, berita utama sudah tampil di banner atas)
            $newsQuery->where('is_featured', false);
        }

        // Filter pencarian (Search)
        if ($request->filled('search')) {
            $search = $request->search;
            $newsQuery->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        $newsList = $newsQuery->paginate(4)->withQueryString();

        return view('berita', compact('categories', 'popularNews', 'featuredNews', 'newsList', 'totalNewsCount'));
    }

    /**
     * Halaman detail berita publik.
     */
    public function show(News $news)
    {
        // Tambah view count
        $news->increment('views');

        $news->load('category');

        $relatedNews = News::with('category')
            ->where('category_id', $news->category_id)
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->limit(3)
            ->get();

        $categories = Category::withCount('news')->get();

        return view('detail-berita', compact('news', 'relatedNews', 'categories'));
    }
}
