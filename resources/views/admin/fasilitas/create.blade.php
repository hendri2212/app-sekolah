@extends('admin.layouts.app')

@section('title', 'Tambah Fasilitas')
@section('page-title', 'Tambah Fasilitas')
@section('page-subtitle', 'Buat data Sarana dan Prasarana baru')

@section('content')

@if($errors->any())
    <div class="alert alert-danger border-0 shadow-sm">
        <div class="fw-semibold mb-1"><i class="bi bi-exclamation-triangle-fill me-2"></i>Data belum valid</div>
        <ul class="mb-0 small">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="content-card">
    <div class="card-header">
        <span><i class="bi bi-plus-circle me-2 text-success"></i>Form Fasilitas</span>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.fasilitas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Ruang Kelas" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                    <div class="form-text">Gambar otomatis diperkecil menjadi JPG saat disimpan.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Icon Class</label>
                    <input type="text" name="icon_class" class="form-control" value="{{ old('icon_class', 'bi bi-building') }}" required>
                    <div class="form-text">Contoh: bi bi-building, bi bi-book</div>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Urutan</label>
                    <input type="number" name="order_number" class="form-control" value="{{ old('order_number', $nextOrderNumber) }}" min="1">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="facility-active" checked>
                        <label class="form-check-label" for="facility-active">Aktif</label>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" rows="4" class="form-control" placeholder="Deskripsi singkat">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
