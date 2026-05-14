<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::with('category')->latest()->get();
        return view('admin.berita.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.berita.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = Auth::id();
        $data['is_featured'] = $request->has('is_featured');
        $data['published_at'] = $request->published_at ?? now();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadAndCompressImage($request->file('image'));
        }

        News::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $beritum)
    {
        $news = $beritum; // Penyesuaian variabel karena Laravel Resource default
        $categories = Category::all();
        return view('admin.berita.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $beritum)
    {
        $news = $beritum;
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($news->image) {
                Storage::disk('public')->delete('news/' . $news->image);
            }
            $data['image'] = $this->uploadAndCompressImage($request->file('image'));
        }

        $news->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $beritum)
    {
        $news = $beritum;
        if ($news->image) {
            Storage::disk('public')->delete('news/' . $news->image);
        }
        $news->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * Helper: Upload and Compress Image using GD
     */
    private function uploadAndCompressImage($file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '_' . Str::random(10) . '.jpg'; // Convert all to jpg for consistency if desired, or keep original
        
        $path = storage_path('app/public/news');
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $targetPath = $path . '/' . $filename;

        // Load image
        if ($extension == 'png') {
            $image = imagecreatefrompng($file->getRealPath());
        } elseif ($extension == 'webp') {
            $image = imagecreatefromwebp($file->getRealPath());
        } else {
            $image = imagecreatefromjpeg($file->getRealPath());
        }

        // Get original dimensions
        $width = imagesx($image);
        $height = imagesy($image);

        // Max width 1200px
        if ($width > 1200) {
            $newWidth = 1200;
            $newHeight = floor($height * ($newWidth / $width));
            $tmpImage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($tmpImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagedestroy($image);
            $image = $tmpImage;
        }

        // Save with 75% quality
        imagejpeg($image, $targetPath, 75);
        imagedestroy($image);

        return $filename;
    }
}
