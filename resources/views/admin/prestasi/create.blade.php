@extends('admin.layouts.app')
@section('title', 'Tambah Prestasi')
@section('page-title', 'Tambah Prestasi')
@section('page-subtitle', 'Tambahkan data prestasi baru untuk Pojok Prestasi')

@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="content-card">
            <div class="card-header">
                <i class="bi bi-trophy me-2 text-success"></i>Formulir Prestasi
            </div>
            <div class="card-body">
                <form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data">
                    @include('admin.prestasi._form')

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-success px-4">Simpan Prestasi</button>
                        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
