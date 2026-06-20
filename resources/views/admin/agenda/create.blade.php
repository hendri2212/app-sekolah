@extends('admin.layouts.app')
@section('title', 'Tambah Agenda')
@section('page-title', 'Tambah Agenda')
@section('page-subtitle', 'Buat jadwal agenda sekolah baru')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="content-card">
            <div class="card-header">
                <i class="bi bi-calendar-plus me-2 text-success"></i>Formulir Agenda
            </div>
            <div class="card-body">
                <form action="{{ route('admin.agenda.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Agenda</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}" placeholder="Masukkan judul agenda..." required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi Singkat</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                  rows="3" placeholder="Ringkasan singkat agenda...">{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lokasi</label>
                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
                               value="{{ old('location') }}" placeholder="Contoh: Aula Sekolah" required>
                        @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Mulai</label>
                            <input type="datetime-local" name="start_at" class="form-control @error('start_at') is-invalid @enderror"
                                   value="{{ old('start_at') }}" required>
                            @error('start_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Selesai</label>
                            <input type="datetime-local" name="end_at" class="form-control @error('end_at') is-invalid @enderror"
                                   value="{{ old('end_at') }}">
                            @error('end_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_published" id="isPublished" checked>
                            <label class="form-check-label fw-semibold" for="isPublished">Terbitkan di Website</label>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success px-4">Simpan Agenda</button>
                        <a href="{{ route('admin.agenda.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="content-card mb-3">
            <div class="card-header"><i class="bi bi-info-circle me-2"></i>Panduan Agenda</div>
            <div class="card-body small">
                <ul class="ps-3 mb-0">
                    <li class="mb-2">Gunakan judul pendek dan jelas.</li>
                    <li class="mb-2">Isi deskripsi sebagai ringkasan, bukan artikel panjang.</li>
                    <li>Jam agenda akan ditampilkan dengan label WITA.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
