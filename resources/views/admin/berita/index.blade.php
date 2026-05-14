@extends('admin.layouts.app')
@section('title', 'Manajemen Berita')
@section('page-title', 'Manajemen Berita')
@section('page-subtitle', 'Tambah, edit, dan hapus berita')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="content-card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span><i class="bi bi-newspaper me-2 text-primary"></i>Daftar Berita</span>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Tambah Berita
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" style="font-size:0.8rem;">NO</th>
                        <th style="font-size:0.8rem;">JUDUL</th>
                        <th style="font-size:0.8rem;">KATEGORI</th>
                        <th style="font-size:0.8rem;">TANGGAL</th>
                        <th style="font-size:0.8rem;">STATUS</th>
                        <th style="font-size:0.8rem;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $index => $item)
                    <tr>
                        <td class="ps-3 text-muted small">{{ $index + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                @if($item->image)
                                    <img src="{{ Str::startsWith($item->image, 'http') ? $item->image : asset('storage/news/' . $item->image) }}" 
                                         alt="Thumb" class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                @else
                                    <div class="rounded bg-light d-flex align-items-center justify-content-center text-muted" style="width: 40px; height: 40px;">
                                        <i class="bi bi-image" style="font-size: 0.8rem;"></i>
                                    </div>
                                @endif
                                <div class="fw-semibold small text-truncate" style="max-width: 300px;">{{ $item->title }}</div>
                            </div>
                        </td>
                        <td><span class="badge bg-{{ $item->category->color ?? 'secondary' }}">{{ $item->category->name }}</span></td>
                        <td><span class="text-muted small">{{ $item->published_at->format('d M Y') }}</span></td>
                        <td>
                            @if($item->is_featured)
                                <span class="badge bg-info text-dark" style="font-size: 0.65rem;">UTAMA</span>
                            @else
                                <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-outline-primary btn-sm" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" 
                                      class="d-inline" onsubmit="return confirm('Hapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" style="border-top-left-radius: 0; border-bottom-left-radius: 0;" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada berita.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
