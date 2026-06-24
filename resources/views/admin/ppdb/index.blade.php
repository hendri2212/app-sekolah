@extends('admin.layouts.app')

@section('title', 'SPMB')
@section('page-title', 'SPMB')
@section('page-subtitle', 'Kelola tampilan menu SPMB di website')

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="content-card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <div class="fw-semibold">Pengaturan Menu SPMB</div>
                <div class="text-muted small">Aktifkan atau sembunyikan menu SPMB pada website publik.</div>
            </div>
            <span class="badge {{ $spmbMenuEnabled ? 'bg-success' : 'bg-secondary' }}">
                {{ $spmbMenuEnabled ? 'Aktif' : 'Nonaktif' }}
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.ppdb.settings.update') }}" method="POST">
                @csrf

                <div class="form-check form-switch d-flex align-items-center gap-3 ps-0">
                    <input type="hidden" name="spmb_menu_enabled" value="0">
                    <input
                        class="form-check-input ms-0"
                        type="checkbox"
                        role="switch"
                        id="spmb_menu_enabled"
                        name="spmb_menu_enabled"
                        value="1"
                        style="width: 3rem; height: 1.5rem;"
                        @checked($spmbMenuEnabled)
                    >
                    <label class="form-check-label fw-semibold" for="spmb_menu_enabled">
                        Tampilkan menu SPMB di navbar dan footer website
                    </label>
                </div>

                @error('spmb_menu_enabled')
                    <div class="text-danger small mt-2">{{ $message }}</div>
                @enderror

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save me-1"></i> Simpan Pengaturan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
