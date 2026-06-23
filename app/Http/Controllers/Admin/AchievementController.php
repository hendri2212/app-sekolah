<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AchievementController extends Controller
{
    private const IMAGE_MAX_WIDTH = 1000;
    private const IMAGE_MAX_HEIGHT = 700;
    private const IMAGE_QUALITY = 75;

    public function index()
    {
        $achievements = Achievement::with('news')
            ->orderBy('order_number')
            ->orderByDesc('achieved_at')
            ->get();

        return view('admin.prestasi.index', compact('achievements'));
    }

    public function create()
    {
        $news = News::orderByDesc('published_at')->get(['id', 'title']);

        return view('admin.prestasi.create', compact('news'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');
        $data['order_number'] = $data['order_number'] ?? 1;
        $data['image'] = $this->storeImage($request, $data['title']);

        Achievement::create($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function show(Achievement $achievement)
    {
        return redirect()->route('admin.prestasi.edit', $achievement);
    }

    public function edit(Achievement $achievement)
    {
        $news = News::orderByDesc('published_at')->get(['id', 'title']);

        return view('admin.prestasi.edit', compact('achievement', 'news'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $data = $this->validatedData($request, $achievement);
        $data['slug'] = $this->uniqueSlug($data['title'], $achievement->id);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');
        $data['order_number'] = $data['order_number'] ?? 1;

        if ($request->hasFile('image')) {
            $this->deleteImage($achievement->image);
            $data['image'] = $this->storeImage($request, $data['title']);
        }

        $achievement->update($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Achievement $achievement)
    {
        $this->deleteImage($achievement->image);
        $achievement->delete();

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus.');
    }

    private function validatedData(Request $request, ?Achievement $achievement = null): array
    {
        return $request->validate([
            'news_id' => ['nullable', 'exists:news,id'],
            'title' => ['required', 'string', 'max:255'],
            'competition_name' => ['required', 'string', 'max:255'],
            'organizer' => ['nullable', 'string', 'max:255'],
            'level' => ['required', Rule::in(['kota', 'kabupaten', 'provinsi', 'nasional', 'internasional'])],
            'rank' => ['nullable', 'string', 'max:255'],
            'medal_icon' => ['required', 'string', 'max:10'],
            'recipient_name' => ['required', 'string', 'max:255'],
            'recipient_type' => ['required', Rule::in(['siswa', 'tim', 'sekolah'])],
            'achieved_at' => ['nullable', 'date'],
            'certificate_number' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'order_number' => ['nullable', 'integer', 'min:1', 'max:65535'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'slug' => [
                'nullable',
                'max:255',
                Rule::unique('achievements', 'slug')->ignore($achievement?->id),
            ],
        ]);
    }

    private function storeImage(Request $request, string $title): ?string
    {
        if (!$request->hasFile('image')) {
            return null;
        }

        $file = $request->file('image');
        $filename = Str::slug($title) . '-' . time() . '.jpg';
        $directory = Storage::disk('public')->path('achievements');
        $targetPath = $directory . DIRECTORY_SEPARATOR . $filename;

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $this->resizeImage($file->getPathname(), $targetPath);

        return $filename;
    }

    private function resizeImage(string $sourcePath, string $targetPath): void
    {
        [$width, $height, $type] = getimagesize($sourcePath);

        $source = match ($type) {
            IMAGETYPE_JPEG => imagecreatefromjpeg($sourcePath),
            IMAGETYPE_PNG => imagecreatefrompng($sourcePath),
            IMAGETYPE_WEBP => imagecreatefromwebp($sourcePath),
            default => null,
        };

        if (!$source) {
            return;
        }

        $scale = min(self::IMAGE_MAX_WIDTH / $width, self::IMAGE_MAX_HEIGHT / $height, 1);
        $targetWidth = (int) round($width * $scale);
        $targetHeight = (int) round($height * $scale);

        $target = imagecreatetruecolor($targetWidth, $targetHeight);
        $white = imagecolorallocate($target, 255, 255, 255);
        imagefill($target, 0, 0, $white);
        imagecopyresampled($target, $source, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
        imagejpeg($target, $targetPath, self::IMAGE_QUALITY);

        imagedestroy($source);
        imagedestroy($target);
    }

    private function deleteImage(?string $image): void
    {
        if (!$image) {
            return;
        }

        Storage::disk('public')->delete('achievements/' . $image);
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 2;

        while (
            Achievement::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
