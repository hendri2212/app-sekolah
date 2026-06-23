@extends('admin.layouts.app')
@section('title', 'Edit Prestasi')
@section('page-title', 'Edit Prestasi')
@section('page-subtitle', 'Perbarui data prestasi di Pojok Prestasi')

@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="content-card">
            <div class="card-header">
                <i class="bi bi-pencil-square me-2 text-warning"></i>Edit Formulir Prestasi
            </div>
            <div class="card-body">
                <form action="{{ route('admin.prestasi.update', $achievement) }}" method="POST" enctype="multipart/form-data">
                    @include('admin.prestasi._form', ['achievement' => $achievement])

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-warning px-4 text-dark fw-semibold">Update Prestasi</button>
                        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
