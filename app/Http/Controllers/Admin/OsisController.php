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

                    $photoPath = $request->file("members.$index.photo")->store('osis', 'public');
                    $member->photo = $photoPath;
                    $member->save();
                }
            }
        }

        return redirect()->route('admin.osis.index')->with('success', 'Data OSIS berhasil disimpan.');
    }
}
