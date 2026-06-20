<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest('published_at')->latest()->get();

        return view('admin.pengumuman.index', compact('announcements'));
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'icon' => ['nullable', 'max:100'],
            'variant' => ['required', 'in:urgent,success,info,primary'],
            'button_label' => ['nullable', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:500'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $data['is_published'] = $request->has('is_published');
        $data['published_at'] = $data['published_at'] ?? now();

        Announcement::create($data);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function show(Announcement $pengumuman)
    {
        return redirect()->route('admin.pengumuman.edit', $pengumuman);
    }

    public function edit(Announcement $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, Announcement $pengumuman)
    {
        $data = $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'icon' => ['nullable', 'max:100'],
            'variant' => ['required', 'in:urgent,success,info,primary'],
            'button_label' => ['nullable', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:500'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $data['is_published'] = $request->has('is_published');
        $data['published_at'] = $data['published_at'] ?? $pengumuman->published_at ?? now();

        $pengumuman->update($data);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy(Announcement $pengumuman)
    {
        $pengumuman->delete();

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil dihapus.');
    }
}
