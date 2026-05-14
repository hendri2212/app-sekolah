@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan data dan aktivitas terkini')

@section('content')

    {{-- Stat Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="stat-icon bg-success bg-opacity-10">
                        <i class="bi bi-people-fill text-success"></i>
                    </div>
                    <span class="badge bg-success-subtle text-success small">+12%</span>
                </div>
                <div class="fs-2 fw-bold lh-1 mb-1">{{ number_format($stats['total_siswa']) }}</div>
                <div class="text-muted small">Total Siswa</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="stat-icon bg-primary bg-opacity-10">
                        <i class="bi bi-newspaper text-primary"></i>
                    </div>
                    <span class="badge bg-primary-subtle text-primary small">{{ $stats['total_news'] }} item</span>
                </div>
                <div class="fs-2 fw-bold lh-1 mb-1">{{ number_format($stats['total_news']) }}</div>
                <div class="text-muted small">Total Berita</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="stat-icon bg-warning bg-opacity-10">
                        <i class="bi bi-trophy-fill text-warning"></i>
                    </div>
                    <span class="badge bg-warning-subtle text-warning small">+3</span>
                </div>
                <div class="fs-2 fw-bold lh-1 mb-1">{{ number_format($stats['total_prestasi']) }}+</div>
                <div class="text-muted small">Prestasi</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="stat-icon bg-info bg-opacity-10">
                        <i class="bi bi-eye-fill text-info"></i>
                    </div>
                    <span class="badge bg-info-subtle text-info small">Views</span>
                </div>
                <div class="fs-2 fw-bold lh-1 mb-1">{{ number_format($stats['total_views']) }}</div>
                <div class="text-muted small">Total Kunjungan Berita</div>
            </div>
        </div>
    </div>

    <div class="row g-3">

        {{-- Berita Terbaru --}}
        <div class="col-lg-7">
            <div class="content-card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span><i class="bi bi-newspaper me-2 text-primary"></i>Berita Terbaru</span>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3 fw-semibold" style="font-size:0.8rem;">JUDUL</th>
                                    <th class="fw-semibold" style="font-size:0.8rem;">KATEGORI</th>
                                    <th class="fw-semibold" style="font-size:0.8rem;">TANGGAL</th>
                                    <th class="fw-semibold" style="font-size:0.8rem;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recent_news as $item)
                                <tr>
                                    <td class="ps-3">
                                        <div class="fw-semibold small text-truncate" style="max-width: 250px;">{{ $item->title }}</div>
                                    </td>
                                    <td><span class="badge bg-{{ $item->category->color ?? 'secondary' }}">{{ $item->category->name }}</span></td>
                                    <td><span class="text-muted small">{{ $item->published_at->format('d M Y') }}</span></td>
                                    <td>
                                        <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-xs btn-outline-secondary py-0 px-2" style="font-size:0.75rem;">Edit</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada berita.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Column --}}
        <div class="col-lg-5">

            {{-- Aktivitas Terbaru --}}
            <div class="content-card mb-3">
                <div class="card-header">
                    <i class="bi bi-clock-history me-2 text-success"></i>Aktivitas Terbaru
                </div>
                <div class="card-body py-2">
                    @if($recent_news->count() > 0)
                    <div class="d-flex align-items-start gap-2 py-2 border-bottom">
                        <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0" style="width:32px;height:32px;">
                            <i class="bi bi-plus text-success"></i>
                        </div>
                        <div>
                            <div class="small fw-semibold">Berita baru ditambahkan</div>
                            <div class="text-muted" style="font-size:0.75rem;">{{ $recent_news->first()->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    @endif
                    <div class="d-flex align-items-start gap-2 py-2 border-bottom">
                        <div class="rounded-circle bg-warning bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0" style="width:32px;height:32px;">
                            <i class="bi bi-person-plus text-warning"></i>
                        </div>
                        <div>
                            <div class="small fw-semibold">Pendaftar PPDB baru</div>
                            <div class="text-muted" style="font-size:0.75rem;">15 menit lalu</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-2 py-2">
                        <div class="rounded-circle bg-info bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0" style="width:32px;height:32px;">
                            <i class="bi bi-pencil text-info"></i>
                        </div>
                        <div>
                            <div class="small fw-semibold">Profil sekolah diperbarui</div>
                            <div class="text-muted" style="font-size:0.75rem;">1 jam lalu</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="content-card">
                <div class="card-header">
                    <i class="bi bi-lightning-charge me-2 text-warning"></i>Aksi Cepat
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.berita.create') }}" class="btn btn-outline-primary btn-sm text-start">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Berita Baru
                        </a>
                        <a href="{{ route('admin.agenda.index') }}" class="btn btn-outline-success btn-sm text-start">
                            <i class="bi bi-calendar-plus me-2"></i>Tambah Agenda
                        </a>
                        <a href="{{ route('admin.ppdb.index') }}" class="btn btn-outline-warning btn-sm text-start">
                            <i class="bi bi-person-check me-2"></i>Kelola Pendaftar PPDB
                        </a>
                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-info btn-sm text-start">
                            <i class="bi bi-upload me-2"></i>Upload Galeri Foto
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
