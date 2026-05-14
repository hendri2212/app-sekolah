@extends('admin.layouts.app')
@section('title', 'Tambah Berita Baru')
@section('page-title', 'Tambah Berita')
@section('page-subtitle', 'Buat artikel berita baru untuk website')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="content-card">
            <div class="card-header">
                <i class="bi bi-pencil-square me-2 text-primary"></i>Formulir Berita
            </div>
            <div class="card-body">
                <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Berita</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                               value="{{ old('title') }}" placeholder="Masukkan judul berita..." required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kategori</label>
                            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tanggal Publikasi</label>
                            <input type="date" name="published_at" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi Berita</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" 
                                  rows="10" placeholder="Tulis konten berita di sini..." required>{{ old('content') }}</textarea>
                        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Gambar Unggulan</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        <div class="form-text small">Format: JPG, PNG, WEBP. Maks: 2MB. Gambar akan dikompresi otomatis.</div>
                        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_featured" id="isFeatured" {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="isFeatured">Jadikan Berita Utama (Featured)</label>
                        </div>
                        <div class="text-muted small">Berita utama akan tampil lebih menonjol di halaman depan.</div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">Simpan Berita</button>
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="content-card mb-3">
            <div class="card-header"><i class="bi bi-info-circle me-2"></i>Panduan Penulisan</div>
            <div class="card-body small">
                <ul class="ps-3 mb-0">
                    <li class="mb-2">Gunakan judul yang menarik dan deskriptif.</li>
                    <li class="mb-2">Pastikan konten memiliki minimal 2-3 paragraf.</li>
                    <li class="mb-2">Gunakan gambar berkualitas baik (orientasi landscape lebih baik).</li>
                    <li>Jangan lupa memilih kategori yang sesuai.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
