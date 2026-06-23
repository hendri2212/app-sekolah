@extends('admin.layouts.app')

@section('title', 'Manajemen Prestasi')
@section('page-title', 'Manajemen Prestasi')
@section('page-subtitle', 'Kelola data Pojok Prestasi yang tampil di halaman kesiswaan')

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
        <span><i class="bi bi-trophy me-2 text-success"></i>Daftar Prestasi</span>
        <a href="{{ route('admin.prestasi.create') }}" class="btn btn-success btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Tambah Prestasi
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3 small">NO</th>
                        <th class="small">PRESTASI</th>
                        <th class="small">TINGKAT</th>
                        <th class="small">PENERIMA</th>
                        <th class="small">TANGGAL</th>
                        <th class="small">STATUS</th>
                        <th class="small">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($achievements as $index => $achievement)
                        <tr>
                            <td class="ps-3 text-muted small">{{ $index + 1 }}</td>
                            <td style="min-width: 280px;">
                                <div class="d-flex align-items-center gap-2">
                                    @if($achievement->image_url)
                                        <img src="{{ $achievement->image_url }}" alt="{{ $achievement->title }}" style="width:46px;height:46px;object-fit:cover;border-radius:6px;">
                                    @else
                                        <span class="fs-3">{{ $achievement->medal_icon }}</span>
                                    @endif
                                    <div>
                                        <div class="fw-semibold small">{{ $achievement->title }}</div>
                                        <div class="text-muted small">{{ $achievement->competition_name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge {{ $achievement->level_badge_class }}" style="font-size:0.65rem;">{{ strtoupper($achievement->level_label) }}</span>
                            </td>
                            <td>
                                <div class="small">{{ $achievement->recipient_name }}</div>
                                <div class="text-muted small text-uppercase">{{ $achievement->recipient_type }}</div>
                            </td>
                            <td><span class="text-muted small">{{ $achievement->display_date }}</span></td>
                            <td>
                                @if($achievement->is_active)
                                    <span class="badge bg-success" style="font-size:0.65rem;">AKTIF</span>
                                @else
                                    <span class="badge bg-secondary" style="font-size:0.65rem;">NONAKTIF</span>
                                @endif
                                @if($achievement->is_featured)
                                    <span class="badge bg-warning text-dark" style="font-size:0.65rem;">UNGGULAN</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.prestasi.edit', $achievement) }}" class="btn btn-outline-primary btn-sm" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.prestasi.destroy', $achievement) }}" method="POST"
                                          class="d-inline" onsubmit="return confirm('Hapus prestasi ini?')">
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
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada data prestasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
