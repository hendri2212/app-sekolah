<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use App\Models\ExtracurricularCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ExtracurricularController extends Controller
{
    private const IMAGE_MAX_WIDTH = 900;
    private const IMAGE_MAX_HEIGHT = 650;
    private const IMAGE_QUALITY = 75;

    public function index()
    {
        $categories = ExtracurricularCategory::withCount('extracurriculars')
            ->orderBy('order_number')
            ->get();

        $extracurriculars = Extracurricular::with('category')
            ->orderBy('order_number')
            ->get();

        return view('admin.ekstrakurikuler.index', compact('categories', 'extracurriculars'));
    }

    public function storeCategory(Request $request)
    {
        $data = $this->validatedCategoryData($request);
        $data['slug'] = $this->uniqueCategorySlug($data['name']);
        $data['is_active'] = $request->has('is_active');
        $data['order_number'] = $data['order_number'] ?? 1;

        ExtracurricularCategory::create($data);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Kategori ekstrakurikuler berhasil ditambahkan.');
    }

    public function updateCategory(Request $request, ExtracurricularCategory $category)
    {
        $data = $this->validatedCategoryData($request, $category);
        $data['slug'] = $this->uniqueCategorySlug($data['name'], $category->id);
        $data['is_active'] = $request->has('is_active');
        $data['order_number'] = $data['order_number'] ?? 1;

        $category->update($data);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Kategori ekstrakurikuler berhasil diperbarui.');
    }

    public function destroyCategory(ExtracurricularCategory $category)
    {
        $category->delete();

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Kategori ekstrakurikuler berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $data = $this->validatedExtracurricularData($request);
        $data['slug'] = $this->uniqueExtracurricularSlug($data['name']);
        $data['is_active'] = $request->has('is_active');
        $data['order_number'] = $data['order_number'] ?? 1;
        $data['image'] = $this->storeImage($request, $data['name']);

        Extracurricular::create($data);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function update(Request $request, Extracurricular $extracurricular)
    {
        $data = $this->validatedExtracurricularData($request, $extracurricular);
        $data['slug'] = $this->uniqueExtracurricularSlug($data['name'], $extracurricular->id);
        $data['is_active'] = $request->has('is_active');
        $data['order_number'] = $data['order_number'] ?? 1;

        if ($request->hasFile('image')) {
            $this->deleteImage($extracurricular->image);
            $data['image'] = $this->storeImage($request, $data['name']);
        }

        $extracurricular->update($data);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(Extracurricular $extracurricular)
    {
        $this->deleteImage($extracurricular->image);
        $extracurricular->delete();

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }

    private function validatedCategoryData(Request $request, ?ExtracurricularCategory $category = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'badge_class' => ['required', 'string', 'max:255'],
            'order_number' => ['nullable', 'integer', 'min:1', 'max:255'],
            'slug' => [
                'nullable',
                'max:255',
                Rule::unique('extracurricular_categories', 'slug')->ignore($category?->id),
            ],
        ]);
    }

    private function validatedExtracurricularData(Request $request, ?Extracurricular $extracurricular = null): array
    {
        return $request->validate([
            'extracurricular_category_id' => ['required', 'exists:extracurricular_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'icon_class' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'order_number' => ['nullable', 'integer', 'min:1', 'max:65535'],
            'image' => [
                $extracurricular ? 'nullable' : 'required',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:2048',
            ],
            'slug' => [
                'nullable',
                'max:255',
                Rule::unique('extracurriculars', 'slug')->ignore($extracurricular?->id),
            ],
        ]);
    }

    private function storeImage(Request $request, string $name): string
    {
        if (!$request->hasFile('image')) {
            return '';
        }

        $file = $request->file('image');
        $filename = Str::slug($name) . '-' . time() . '.jpg';
        $directory = Storage::disk('public')->path('eskul');
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

        Storage::disk('public')->delete('eskul/' . $image);
    }

    private function uniqueCategorySlug(string $name, ?int $ignoreId = null): string
    {
        return $this->uniqueSlug(ExtracurricularCategory::class, $name, $ignoreId);
    }

    private function uniqueExtracurricularSlug(string $name, ?int $ignoreId = null): string
    {
        return $this->uniqueSlug(Extracurricular::class, $name, $ignoreId);
    }

    private function uniqueSlug(string $modelClass, string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 2;

        while (
            $modelClass::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
