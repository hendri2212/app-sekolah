@extends('admin.layouts.app')

@section('title', 'Manajemen Fasilitas')
@section('page-title', 'Manajemen Fasilitas')
@section('page-subtitle', 'Kelola data Sarana dan Prasarana yang tampil di halaman profil')

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

<div class="content-card mb-4">
    <div class="card-header">
        <span><i class="bi bi-plus-circle me-2 text-success"></i>Tambah Fasilitas</span>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.fasilitas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Ruang Kelas" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Gambar</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                    <div class="form-text">Gambar otomatis diperkecil menjadi JPG saat disimpan.</div>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Icon Class</label>
                    <input type="text" name="icon_class" class="form-control" value="{{ old('icon_class', 'bi bi-building') }}" required>
                    <div class="form-text">Contoh: bi bi-building, bi bi-book</div>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-semibold">Urutan</label>
                    <input type="number" name="order_number" class="form-control" value="{{ old('order_number', $facilities->count() + 1) }}" min="1">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="facility-active" checked>
                        <label class="form-check-label" for="facility-active">Aktif</label>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label small fw-semibold">Deskripsi</label>
                    <textarea name="description" rows="2" class="form-control" placeholder="Deskripsi singkat">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-plus-circle me-1"></i>Tambah Fasilitas
                </button>
            </div>
        </form>
    </div>
</div>

<div class="content-card">
    <div class="card-header">
        <span><i class="bi bi-building-gear me-2 text-success"></i>Daftar Fasilitas</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3 small">Fasilitas</th>
                        <th class="small">Detail</th>
                        <th class="small">Status</th>
                        <th class="small">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($facilities as $facility)
                        <tr>
                            <td class="ps-3" style="min-width: 260px;">
                                <form id="facility-form-{{ $facility->id }}" action="{{ route('admin.fasilitas.update', $facility) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                </form>
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    @if($facility->image_url)
                                        <img src="{{ $facility->image_url }}" alt="{{ $facility->name }}" style="width:54px;height:54px;object-fit:cover;border-radius:6px;">
                                    @endif
                                    <input form="facility-form-{{ $facility->id }}" type="text" name="name" class="form-control form-control-sm" value="{{ $facility->name }}" required>
                                </div>
                                <input form="facility-form-{{ $facility->id }}" type="file" name="image" class="form-control form-control-sm" accept="image/*">
                                <div class="form-text">Kosongkan jika tidak mengganti gambar.</div>
                            </td>
                            <td style="min-width: 320px;">
                                <div class="row g-2">
                                    <div class="col-md-5">
                                        <input form="facility-form-{{ $facility->id }}" type="number" name="order_number" class="form-control form-control-sm" value="{{ $facility->order_number }}" min="1">
                                    </div>
                                    <div class="col-12">
                                        <input form="facility-form-{{ $facility->id }}" type="text" name="icon_class" class="form-control form-control-sm" value="{{ $facility->icon_class }}" required>
                                    </div>
                                    <div class="col-12">
                                        <textarea form="facility-form-{{ $facility->id }}" name="description" rows="2" class="form-control form-control-sm">{{ $facility->description }}</textarea>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input form="facility-form-{{ $facility->id }}" class="form-check-input" type="checkbox" name="is_active" value="1" {{ $facility->is_active ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button form="facility-form-{{ $facility->id }}" type="submit" class="btn btn-outline-primary btn-sm" title="Simpan">
                                        <i class="bi bi-check2"></i>
                                    </button>
                                    <form action="{{ route('admin.fasilitas.destroy', $facility) }}" method="POST" onsubmit="return confirm('Hapus fasilitas ini?')">
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
                            <td colspan="4" class="text-center py-4 text-muted">Belum ada fasilitas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
