@extends('admin.layouts.app')
@section('title', 'Tambah Pengguna')
@section('page-title', 'Tambah Pengguna')
@section('page-subtitle', 'Buat akun akses panel admin')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="content-card">
            <div class="card-header">
                <i class="bi bi-person-plus me-2 text-success"></i>Formulir Pengguna
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pengguna.store') }}" method="POST">
                    @csrf
                    @include('admin.pengguna._form')

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success px-4">Simpan Pengguna</button>
                        <a href="{{ route('admin.pengguna.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="content-card mb-3">
            <div class="card-header"><i class="bi bi-info-circle me-2"></i>Panduan Role</div>
            <div class="card-body small">
                <ul class="ps-3 mb-0">
                    <li class="mb-2"><strong>Superadmin</strong> untuk akses pengelolaan penuh.</li>
                    <li class="mb-2"><strong>Admin</strong> untuk pengelolaan konten utama.</li>
                    <li><strong>Operator</strong> untuk kebutuhan operasional harian.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
