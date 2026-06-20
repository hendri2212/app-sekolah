@extends('admin.layouts.app')
@section('title', 'Profil Sekolah')
@section('page-title', 'Profil Sekolah')
@section('page-subtitle', 'Kelola data utama sekolah')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="content-card">
    <div class="card-header">
        <span><i class="bi bi-building me-2 text-primary"></i>Data Profil Sekolah</span>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.profil.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Sekolah</label>
                    <input type="text" name="school_name" class="form-control" value="{{ old('school_name', $profile->school_name ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tahun Ajaran Aktif</label>
                    <input type="text" name="active_school_year" class="form-control" value="{{ old('active_school_year', $profile->active_school_year ?? '') }}" placeholder="2025/2026">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tahun Sekolah Berdiri</label>
                    <input type="number" name="established_year" class="form-control" value="{{ old('established_year', $profile->established_year ?? '') }}" min="1900" max="2100">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Akreditasi</label>
                    <input type="text" name="accreditation" class="form-control" value="{{ old('accreditation', $profile->accreditation ?? '') }}" placeholder="A / B / C">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Jumlah Guru</label>
                    <input type="number" name="teacher_count" class="form-control" value="{{ old('teacher_count', $profile->teacher_count ?? '') }}" min="0">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Jumlah Staff</label>
                    <input type="number" name="staff_count" class="form-control" value="{{ old('staff_count', $profile->staff_count ?? '') }}" min="0">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Jumlah Siswa</label>
                    <input type="number" name="student_count" class="form-control" value="{{ old('student_count', $profile->student_count ?? '') }}" min="0">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nomor SK Berdiri</label>
                    <input type="text" name="establishment_decree_number" class="form-control" value="{{ old('establishment_decree_number', $profile->establishment_decree_number ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Foto Profil Sekolah</label>
                    <input type="file" name="profile_photo" class="form-control">
                    @if(!empty($profile->profile_photo))
                        <small class="text-muted">File saat ini: {{ basename($profile->profile_photo) }}</small>
                    @endif
                </div>
                <div class="col-md-6">
                    <label class="form-label">File SK Berdiri</label>
                    <input type="file" name="establishment_decree_file" class="form-control">
                    @if(!empty($profile->establishment_decree_file))
                        <small class="text-muted">File saat ini: {{ basename($profile->establishment_decree_file) }}</small>
                    @endif
                </div>
                <div class="col-12">
                    <label class="form-label">Catatan</label>
                    <textarea name="notes" rows="4" class="form-control">{{ old('notes', $profile->notes ?? '') }}</textarea>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
