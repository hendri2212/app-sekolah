@extends('admin.layouts.app')
@section('title', 'Manajemen Pengguna')
@section('page-title', 'Manajemen Pengguna')
@section('page-subtitle', 'Kelola akun admin, operator, dan superadmin')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="content-card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span><i class="bi bi-person-gear me-2 text-success"></i>Daftar Pengguna</span>
        <a href="{{ route('admin.pengguna.create') }}" class="btn btn-success btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Tambah Pengguna
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" style="font-size:0.8rem;">NO</th>
                        <th style="font-size:0.8rem;">NAMA</th>
                        <th style="font-size:0.8rem;">EMAIL</th>
                        <th style="font-size:0.8rem;">ROLE</th>
                        <th style="font-size:0.8rem;">DIBUAT</th>
                        <th style="font-size:0.8rem;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                        <tr>
                            <td class="ps-3 text-muted small">{{ $users->firstItem() + $index }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold"
                                         style="width:34px;height:34px;font-size:0.8rem;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-semibold small">{{ $user->name }}</div>
                                        @if(Auth::id() === $user->id)
                                            <div class="text-muted" style="font-size:0.75rem;">Akun sedang digunakan</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td><span class="text-muted small">{{ $user->email }}</span></td>
                            <td>
                                @php
                                    $badgeClass = match($user->role) {
                                        'superadmin' => 'bg-danger',
                                        'admin' => 'bg-primary',
                                        default => 'bg-secondary',
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}" style="font-size:0.65rem;">{{ strtoupper($user->role) }}</span>
                            </td>
                            <td><span class="text-muted small">{{ $user->created_at?->translatedFormat('d M Y') }}</span></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.pengguna.edit', $user) }}" class="btn btn-outline-primary btn-sm" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.pengguna.destroy', $user) }}" method="POST"
                                          class="d-inline" onsubmit="return confirm('Hapus pengguna ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                                style="border-top-left-radius: 0; border-bottom-left-radius: 0;"
                                                title="Hapus" {{ Auth::id() === $user->id ? 'disabled' : '' }}>
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Belum ada pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($users->hasPages())
        <div class="card-footer bg-white border-top-0 px-3 pb-3">
            {{ $users->links() }}
        </div>
    @endif
</div>
@endsection
