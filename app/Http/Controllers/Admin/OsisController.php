<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OsisMember;
use App\Models\OsisPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OsisController extends Controller
{
    private const PHOTO_MAX_WIDTH = 700;
    private const PHOTO_MAX_HEIGHT = 900;
    private const PHOTO_QUALITY = 75;

    public function index()
    {
        $period = OsisPeriod::with(['members' => function ($query) {
            $query->orderBy('order_number');
        }])
            ->where('is_active', true)
            ->first();

        if (!$period) {
            $period = OsisPeriod::with('members')->latest()->first();
        }

        return view('admin.osis.index', compact('period'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_year' => 'required|integer|min:2000|max:2100',
            'end_year' => 'required|integer|min:2000|max:2100',
            'description' => 'nullable|string',
            'members' => 'nullable|array',
            'members.*.position' => 'required|string|max:255',
            'members.*.name' => 'required|string|max:255',
            'members.*.department' => 'nullable|string|max:255',
            'members.*.order_number' => 'nullable|integer|min:1',
            'members.*.is_primary' => 'nullable|boolean',
            'members.*.photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $period = OsisPeriod::updateOrCreate(
            ['name' => $request->name],
            [
                'start_year' => $request->start_year,
                'end_year' => $request->end_year,
                'is_active' => true,
                'description' => $request->description,
            ]
        );

        if ($request->has('members')) {
            foreach ($request->members as $index => $memberData) {
                $member = OsisMember::updateOrCreate(
                    [
                        'osis_period_id' => $period->id,
                        'position' => $memberData['position'],
                    ],
                    [
                        'name' => $memberData['name'],
                        'department' => $memberData['department'] ?? null,
                        'order_number' => $memberData['order_number'] ?? ($index + 1),
                        'is_primary' => (bool) ($memberData['is_primary'] ?? false),
                    ]
                );

                if ($request->hasFile("members.$index.photo")) {
                    if ($member->photo) {
                        Storage::disk('public')->delete($member->photo);
                    }

                    $member->photo = $this->storeResizedPhoto($request->file("members.$index.photo"), $memberData['name']);
                    $member->save();
                }
            }
        }

        return redirect()->route('admin.osis.index')->with('success', 'Data OSIS berhasil disimpan.');
    }

    private function storeResizedPhoto($file, string $name): string
    {
        $filename = Str::slug($name) . '-' . time() . '-' . Str::random(6) . '.jpg';
        $directory = Storage::disk('public')->path('osis');
        $targetPath = $directory . DIRECTORY_SEPARATOR . $filename;

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $this->resizePhoto($file->getPathname(), $targetPath);

        return 'osis/' . $filename;
    }

    private function resizePhoto(string $sourcePath, string $targetPath): void
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

        $scale = min(self::PHOTO_MAX_WIDTH / $width, self::PHOTO_MAX_HEIGHT / $height, 1);
        $targetWidth = (int) round($width * $scale);
        $targetHeight = (int) round($height * $scale);

        $target = imagecreatetruecolor($targetWidth, $targetHeight);
        $white = imagecolorallocate($target, 255, 255, 255);
        imagefill($target, 0, 0, $white);
        imagecopyresampled($target, $source, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
        imagejpeg($target, $targetPath, self::PHOTO_QUALITY);

        imagedestroy($source);
        imagedestroy($target);
    }
}
