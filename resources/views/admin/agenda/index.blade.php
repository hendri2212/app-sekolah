@extends('admin.layouts.app')
@section('title', 'Manajemen Agenda')
@section('page-title', 'Manajemen Agenda')
@section('page-subtitle', 'Tambah, edit, dan hapus jadwal agenda sekolah')

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
        <span><i class="bi bi-calendar-event me-2 text-success"></i>Daftar Agenda</span>
        <a href="{{ route('admin.agenda.create') }}" class="btn btn-success btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Tambah Agenda
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" style="font-size:0.8rem;">NO</th>
                        <th style="font-size:0.8rem;">AGENDA</th>
                        <th style="font-size:0.8rem;">TANGGAL</th>
                        <th style="font-size:0.8rem;">WAKTU</th>
                        <th style="font-size:0.8rem;">LOKASI</th>
                        <th style="font-size:0.8rem;">STATUS</th>
                        <th style="font-size:0.8rem;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($agendas as $index => $agenda)
                    <tr>
                        <td class="ps-3 text-muted small">{{ $index + 1 }}</td>
                        <td>
                            <div class="fw-semibold small">{{ $agenda->title }}</div>
                            @if($agenda->description)
                                <div class="text-muted small text-truncate" style="max-width: 320px;">{{ $agenda->description }}</div>
                            @endif
                        </td>
                        <td><span class="text-muted small">{{ $agenda->start_at->translatedFormat('d M Y') }}</span></td>
                        <td><span class="text-muted small">{{ $agenda->time_range }}</span></td>
                        <td><span class="text-muted small">{{ $agenda->location }}</span></td>
                        <td>
                            @if($agenda->is_published)
                                <span class="badge bg-success" style="font-size:0.65rem;">TERBIT</span>
                            @else
                                <span class="badge bg-secondary" style="font-size:0.65rem;">DRAFT</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.agenda.edit', $agenda->id) }}" class="btn btn-outline-primary btn-sm" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST"
                                      class="d-inline" onsubmit="return confirm('Hapus agenda ini?')">
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
                        <td colspan="7" class="text-center py-4 text-muted">Belum ada agenda.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
