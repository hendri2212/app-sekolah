@extends('admin.layouts.app')
@section('title', 'Tambah Pengumuman')
@section('page-title', 'Tambah Pengumuman')
@section('page-subtitle', 'Buat pengumuman baru')

@section('content')
<div class="content-card">
    <div class="card-header">
        <span><i class="bi bi-plus-circle me-2 text-primary"></i>Form Pengumuman</span>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.pengumuman.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Judul</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Varian</label>
                    <select name="variant" class="form-select" required>
                        <option value="urgent" {{ old('variant') == 'urgent' ? 'selected' : '' }}>Urgent</option>
                        <option value="success" {{ old('variant') == 'success' ? 'selected' : '' }}>Success</option>
                        <option value="info" {{ old('variant') == 'info' ? 'selected' : '' }}>Info</option>
                        <option value="primary" {{ old('variant') == 'primary' ? 'selected' : '' }}>Primary</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Isi Pengumuman</label>
                    <textarea name="content" rows="5" class="form-control" required>{{ old('content') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Icon (Bootstrap Icons)</label>
                    <input type="text" name="icon" class="form-control" value="{{ old('icon', 'bi bi-info-circle-fill') }}" placeholder="bi bi-info-circle-fill">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Publikasi</label>
                    <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Label Tombol</label>
                    <input type="text" name="button_label" class="form-control" value="{{ old('button_label') }}" placeholder="Unduh Dokumen">
                </div>
                <div class="col-md-6">
                    <label class="form-label">URL Tombol</label>
                    <input type="url" name="button_url" class="form-control" value="{{ old('button_url') }}" placeholder="https://example.com/file.pdf">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_published" value="1" id="is_published" checked>
                        <label class="form-check-label" for="is_published">Tampilkan di website</label>
                    </div>
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
