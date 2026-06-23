@extends('admin.layouts.app')
@section('title', 'Edit Pengguna')
@section('page-title', 'Edit Pengguna')
@section('page-subtitle', 'Perbarui data akun pengguna')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="content-card">
            <div class="card-header">
                <i class="bi bi-pencil-square me-2 text-warning"></i>Edit Formulir Pengguna
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pengguna.update', $pengguna) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.pengguna._form', ['pengguna' => $pengguna])

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning px-4 text-dark fw-semibold">Update Pengguna</button>
                        <a href="{{ route('admin.pengguna.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
