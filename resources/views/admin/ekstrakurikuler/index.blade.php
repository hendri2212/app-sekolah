@extends('admin.layouts.app')

@section('title', 'Manajemen Ekstrakurikuler')
@section('page-title', 'Manajemen Ekstrakurikuler')
@section('page-subtitle', 'Kelola kategori, gambar, ikon, dan status ekstrakurikuler')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

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

<div class="row g-4">
    <div class="col-lg-4">
        <div class="content-card mb-4">
            <div class="card-header">
                <span><i class="bi bi-tags me-2 text-success"></i>Tambah Kategori</span>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.ekstrakurikuler.kategori.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Nama Kategori</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Olahraga" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Class Badge</label>
                        <input type="text" name="badge_class" class="form-control" value="{{ old('badge_class', 'bg-success') }}" placeholder="bg-success" required>
                        <div class="form-text">Contoh: bg-success, bg-danger, bg-warning text-dark</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Urutan</label>
                        <input type="number" name="order_number" class="form-control" value="{{ old('order_number', $categories->count() + 1) }}" min="1">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="category-active" checked>
                        <label class="form-check-label" for="category-active">Aktif</label>
                    </div>
                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Kategori
                    </button>
                </form>
            </div>
        </div>

        <div class="content-card">
            <div class="card-header">
                <span><i class="bi bi-list-check me-2 text-success"></i>Daftar Kategori</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3 small">Kategori</th>
                                <th class="small">Status</th>
                                <th class="small">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td class="ps-3">
                                        <form id="category-form-{{ $category->id }}" action="{{ route('admin.ekstrakurikuler.kategori.update', $category) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                        <input form="category-form-{{ $category->id }}" type="text" name="name" class="form-control form-control-sm mb-2" value="{{ $category->name }}" required>
                                        <input form="category-form-{{ $category->id }}" type="text" name="badge_class" class="form-control form-control-sm mb-2" value="{{ $category->badge_class }}" required>
                                        <input form="category-form-{{ $category->id }}" type="number" name="order_number" class="form-control form-control-sm" value="{{ $category->order_number }}" min="1">
                                        <div class="small text-muted mt-1">{{ $category->extracurriculars_count }} ekskul</div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input form="category-form-{{ $category->id }}" class="form-check-input" type="checkbox" name="is_active" value="1" {{ $category->is_active ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button form="category-form-{{ $category->id }}" type="submit" class="btn btn-outline-primary btn-sm" title="Simpan">
                                                <i class="bi bi-check2"></i>
                                            </button>
                                            <form action="{{ route('admin.ekstrakurikuler.kategori.destroy', $category) }}" method="POST" onsubmit="return confirm('Hapus kategori ini? Semua ekstrakurikuler di kategori ini ikut terhapus.')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">Belum ada kategori.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="content-card mb-4">
            <div class="card-header">
                <span><i class="bi bi-grid-3x3-gap me-2 text-success"></i>Tambah Ekstrakurikuler</span>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Pramuka" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Kategori</label>
                            <select name="extracurricular_category_id" class="form-select" required>
                                <option value="">Pilih kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('extracurricular_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Gambar</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Icon Class</label>
                            <input type="text" name="icon_class" class="form-control" value="{{ old('icon_class', 'bi bi-circle') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">URL Pendaftaran</label>
                            <input type="url" name="registration_url" class="form-control" value="{{ old('registration_url') }}" placeholder="https://...">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small fw-semibold">Urutan</label>
                            <input type="number" name="order_number" class="form-control" value="{{ old('order_number', $extracurriculars->count() + 1) }}" min="1">
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="extracurricular-active" checked>
                                <label class="form-check-label" for="extracurricular-active">Aktif</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-semibold">Deskripsi</label>
                            <textarea name="description" rows="2" class="form-control" placeholder="Deskripsi singkat">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-plus-circle me-1"></i>Tambah Ekstrakurikuler
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="content-card">
            <div class="card-header">
                <span><i class="bi bi-list-ul me-2 text-success"></i>Daftar Ekstrakurikuler</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3 small">Ekskul</th>
                                <th class="small">Kategori</th>
                                <th class="small">Detail</th>
                                <th class="small">Status</th>
                                <th class="small">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($extracurriculars as $extracurricular)
                                <tr>
                                    <td class="ps-3" style="min-width: 210px;">
                                        <form id="extracurricular-form-{{ $extracurricular->id }}" action="{{ route('admin.ekstrakurikuler.update', $extracurricular) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            @if($extracurricular->image_url)
                                                <img src="{{ $extracurricular->image_url }}" alt="{{ $extracurricular->name }}" style="width:48px;height:48px;object-fit:cover;border-radius:6px;">
                                            @endif
                                            <input form="extracurricular-form-{{ $extracurricular->id }}" type="text" name="name" class="form-control form-control-sm" value="{{ $extracurricular->name }}" required>
                                        </div>
                                        <input form="extracurricular-form-{{ $extracurricular->id }}" type="file" name="image" class="form-control form-control-sm" accept="image/*">
                                    </td>
                                    <td style="min-width: 150px;">
                                        <select form="extracurricular-form-{{ $extracurricular->id }}" name="extracurricular_category_id" class="form-select form-select-sm" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $extracurricular->extracurricular_category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <input form="extracurricular-form-{{ $extracurricular->id }}" type="number" name="order_number" class="form-control form-control-sm mt-2" value="{{ $extracurricular->order_number }}" min="1">
                                    </td>
                                    <td style="min-width: 260px;">
                                        <input form="extracurricular-form-{{ $extracurricular->id }}" type="text" name="icon_class" class="form-control form-control-sm mb-2" value="{{ $extracurricular->icon_class }}" required>
                                        <textarea form="extracurricular-form-{{ $extracurricular->id }}" name="description" rows="2" class="form-control form-control-sm mb-2">{{ $extracurricular->description }}</textarea>
                                        <input form="extracurricular-form-{{ $extracurricular->id }}" type="url" name="registration_url" class="form-control form-control-sm" value="{{ $extracurricular->registration_url }}" placeholder="URL pendaftaran">
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input form="extracurricular-form-{{ $extracurricular->id }}" class="form-check-input" type="checkbox" name="is_active" value="1" {{ $extracurricular->is_active ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button form="extracurricular-form-{{ $extracurricular->id }}" type="submit" class="btn btn-outline-primary btn-sm" title="Simpan">
                                                <i class="bi bi-check2"></i>
                                            </button>
                                            <form action="{{ route('admin.ekstrakurikuler.destroy', $extracurricular) }}" method="POST" onsubmit="return confirm('Hapus ekstrakurikuler ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">Belum ada ekstrakurikuler.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
