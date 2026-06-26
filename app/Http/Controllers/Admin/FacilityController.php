<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class FacilityController extends Controller
{
    private const IMAGE_MAX_WIDTH = 900;
    private const IMAGE_MAX_HEIGHT = 650;
    private const IMAGE_QUALITY = 75;

    public function index()
    {
        $facilities = Facility::orderBy('order_number')
            ->orderBy('name')
            ->get();

        return view('admin.fasilitas.index', compact('facilities'));
    }

    public function create()
    {
        $nextOrderNumber = (int) Facility::max('order_number') + 1;

        return view('admin.fasilitas.create', compact('nextOrderNumber'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->uniqueSlug($data['name']);
        $data['is_active'] = $request->has('is_active');
        $data['order_number'] = $data['order_number'] ?? 1;
        $data['image'] = $this->storeImage($request, $data['name']);

        Facility::create($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function update(Request $request, Facility $facility)
    {
        $data = $this->validatedData($request, $facility);
        $data['slug'] = $this->uniqueSlug($data['name'], $facility->id);
        $data['is_active'] = $request->has('is_active');
        $data['order_number'] = $data['order_number'] ?? 1;

        if ($request->hasFile('image')) {
            $this->deleteImage($facility->image);
            $data['image'] = $this->storeImage($request, $data['name']);
        }

        $facility->update($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Facility $facility)
    {
        $this->deleteImage($facility->image);
        $facility->delete();

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus.');
    }

    private function validatedData(Request $request, ?Facility $facility = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'icon_class' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'order_number' => ['nullable', 'integer', 'min:1', 'max:65535'],
            'image' => [
                $facility ? 'nullable' : 'required',
                'image',
                'mimes:jpeg,png,jpg,webp,jfif',
                'max:2048',
            ],
            'slug' => [
                'nullable',
                'max:255',
                Rule::unique('facilities', 'slug')->ignore($facility?->id),
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
        $directory = Storage::disk('public')->path('facility');
        $targetPath = $directory . DIRECTORY_SEPARATOR . $filename;

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $this->resizeImage($file->getPathname(), $targetPath);

        return 'storage/facility/' . $filename;
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
        if (!$image || Str::startsWith($image, ['http://', 'https://'])) {
            return;
        }

        if (!Str::startsWith($image, ['storage/facility/', 'facility/'])) {
            return;
        }

        $path = Str::startsWith($image, 'storage/')
            ? Str::after($image, 'storage/')
            : $image;

        Storage::disk('public')->delete($path);
    }

    private function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 2;

        while (
            Facility::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
