<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SchoolProfileController extends Controller
{
    public function index()
    {
        $profile = SchoolProfile::first();

        return view('admin.profil.index', compact('profile'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'school_name' => ['nullable', 'max:255'],
            'active_school_year' => ['nullable', 'max:50'],
            'established_year' => ['nullable', 'integer', 'min:1900', 'max:2100'],
            'teacher_count' => ['nullable', 'integer', 'min:0'],
            'staff_count' => ['nullable', 'integer', 'min:0'],
            'student_count' => ['nullable', 'integer', 'min:0'],
            'establishment_decree_number' => ['nullable', 'max:255'],
            'accreditation' => ['nullable', 'max:50'],
            'notes' => ['nullable', 'string'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'establishment_decree_file' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,webp', 'max:4096'],
        ]);

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('school-profile', 'public');
        }

        if ($request->hasFile('establishment_decree_file')) {
            $data['establishment_decree_file'] = $request->file('establishment_decree_file')->store('school-docs', 'public');
        }

        SchoolProfile::updateOrCreate(
            [],
            $data
        );

        return redirect()->route('admin.profil.index')->with('success', 'Profil sekolah berhasil disimpan.');
    }
}
