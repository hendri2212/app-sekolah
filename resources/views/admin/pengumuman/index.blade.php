@extends('admin.layouts.app')
@section('title', 'Manajemen Pengumuman')
@section('page-title', 'Manajemen Pengumuman')
@section('page-subtitle', 'Tambah, edit, dan hapus pengumuman')

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
        <span><i class="bi bi-megaphone me-2 text-primary"></i>Daftar Pengumuman</span>
        <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Tambah Pengumuman
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" style="font-size:0.8rem;">NO</th>
                        <th style="font-size:0.8rem;">JUDUL</th>
                        <th style="font-size:0.8rem;">VARIAN</th>
                        <th style="font-size:0.8rem;">STATUS</th>
                        <th style="font-size:0.8rem;">TANGGAL</th>
                        <th style="font-size:0.8rem;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($announcements as $index => $item)
                    <tr>
                        <td class="ps-3 text-muted small">{{ $index + 1 }}</td>
                        <td>
                            <div class="fw-semibold small">{{ $item->title }}</div>
                            <div class="text-muted small">{{ \Illuminate\Support\Str::limit($item->content, 80) }}</div>
                        </td>
                        <td>
                            <span class="badge bg-{{ $item->variant == 'urgent' ? 'danger' : ($item->variant == 'success' ? 'success' : ($item->variant == 'primary' ? 'primary' : 'warning')) }} text-dark">
                                {{ strtoupper($item->variant) }}
                            </span>
                        </td>
                        <td>
                            @if($item->is_published)
                                <span class="badge bg-success">TERBIT</span>
                            @else
                                <span class="badge bg-secondary">DRAFT</span>
                            @endif
                        </td>
                        <td><span class="text-muted small">{{ $item->published_at ? $item->published_at->format('d M Y') : '-' }}</span></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.pengumuman.edit', $item->id) }}" class="btn btn-outline-primary btn-sm" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.pengumuman.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pengumuman ini?')">
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
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada pengumuman.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
