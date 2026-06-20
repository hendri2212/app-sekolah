@extends('admin.layouts.app')
@section('title', 'Edit Agenda')
@section('page-title', 'Edit Agenda')
@section('page-subtitle', 'Perbarui jadwal agenda sekolah')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="content-card">
            <div class="card-header">
                <i class="bi bi-pencil-square me-2 text-warning"></i>Edit Formulir Agenda
            </div>
            <div class="card-body">
                <form action="{{ route('admin.agenda.update', $agenda->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Agenda</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $agenda->title) }}" placeholder="Masukkan judul agenda..." required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi Singkat</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                  rows="3" placeholder="Ringkasan singkat agenda...">{{ old('description', $agenda->description) }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lokasi</label>
                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
                               value="{{ old('location', $agenda->location) }}" placeholder="Contoh: Aula Sekolah" required>
                        @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Mulai</label>
                            <input type="datetime-local" name="start_at" class="form-control @error('start_at') is-invalid @enderror"
                                   value="{{ old('start_at', $agenda->start_at->format('Y-m-d\TH:i')) }}" required>
                            @error('start_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Selesai</label>
                            <input type="datetime-local" name="end_at" class="form-control @error('end_at') is-invalid @enderror"
                                   value="{{ old('end_at', $agenda->end_at?->format('Y-m-d\TH:i')) }}">
                            @error('end_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_published" id="isPublished" {{ old('is_published', $agenda->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="isPublished">Terbitkan di Website</label>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning px-4 text-dark fw-semibold">Update Agenda</button>
                        <a href="{{ route('admin.agenda.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
