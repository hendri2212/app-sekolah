@extends('admin.layouts.app')
@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')
@section('page-subtitle', 'Perbarui artikel berita yang sudah ada')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="content-card">
            <div class="card-header">
                <i class="bi bi-pencil-square me-2 text-warning"></i>Edit Formulir Berita
            </div>
            <div class="card-body">
                <form action="{{ route('admin.berita.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Berita</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                               value="{{ old('title', $news->title) }}" placeholder="Masukkan judul berita..." required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kategori</label>
                            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', $news->category_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tanggal Publikasi</label>
                            <input type="date" name="published_at" class="form-control" 
                                   value="{{ old('published_at', $news->published_at->format('Y-m-d')) }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi Berita</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" 
                                  rows="10" placeholder="Tulis konten berita di sini..." required>{{ old('content', $news->content) }}</textarea>
                        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Gambar Unggulan</label>
                        @if($news->image)
                            <div class="mb-2">
                                <img src="{{ Str::startsWith($news->image, 'http') ? $news->image : asset('storage/news/' . $news->image) }}" 
                                     alt="Current Image" class="img-thumbnail" style="height: 150px;">
                                <div class="small text-muted mt-1">Gambar saat ini</div>
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        <div class="form-text small">Biarkan kosong jika tidak ingin mengganti gambar. Upload baru otomatis diperkecil menjadi JPG.</div>
                        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_featured" id="isFeatured" {{ old('is_featured', $news->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="isFeatured">Jadikan Berita Utama (Featured)</label>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning px-4 text-dark fw-semibold">Update Berita</button>
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
