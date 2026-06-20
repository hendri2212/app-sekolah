<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Agenda::orderByDesc('start_at')->get();
        return view('admin.agenda.index', compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['is_published'] = $request->has('is_published');

        Agenda::create($data);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        return redirect()->route('admin.agenda.edit', $agenda);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $data = $this->validatedData($request, $agenda);
        $data['slug'] = $this->uniqueSlug($data['title'], $agenda->id);
        $data['is_published'] = $request->has('is_published');

        $agenda->update($data);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dihapus.');
    }

    private function validatedData(Request $request, ?Agenda $agenda = null): array
    {
        return $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['nullable', 'max:1000'],
            'location' => ['required', 'max:255'],
            'start_at' => ['required', 'date'],
            'end_at' => ['nullable', 'date', 'after_or_equal:start_at'],
            'slug' => [
                'nullable',
                'max:255',
                Rule::unique('agendas', 'slug')->ignore($agenda?->id),
            ],
        ]);
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 2;

        while (
            Agenda::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
