@extends('admin.layouts.app')
@section('title', 'Manajemen Berita')
@section('page-title', 'Manajemen Berita')
@section('page-subtitle', 'Tambah, edit, dan hapus berita')

@section('content')
<div class="content-card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span><i class="bi bi-newspaper me-2 text-primary"></i>Daftar Berita</span>
        <button class="btn btn-primary btn-sm"><i class="bi bi-plus-circle me-1"></i>Tambah Berita</button>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" style="font-size:0.8rem;">NO</th>
                        <th style="font-size:0.8rem;">JUDUL</th>
                        <th style="font-size:0.8rem;">KATEGORI</th>
                        <th style="font-size:0.8rem;">TANGGAL</th>
                        <th style="font-size:0.8rem;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-3 text-muted small">1</td>
                        <td><div class="fw-semibold small">Juara Umum Lomba Olahraga Tradisional</div></td>
                        <td><span class="badge bg-warning text-dark">Prestasi</span></td>
                        <td><span class="text-muted small">15 Jan 2025</span></td>
                        <td>
                            <button class="btn btn-outline-primary btn-sm py-0 px-2">Edit</button>
                            <button class="btn btn-outline-danger btn-sm py-0 px-2">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3 text-muted small">2</td>
                        <td><div class="fw-semibold small">Persiapan Asesmen Nasional 2025</div></td>
                        <td><span class="badge bg-primary">Akademik</span></td>
                        <td><span class="text-muted small">12 Jan 2025</span></td>
                        <td>
                            <button class="btn btn-outline-primary btn-sm py-0 px-2">Edit</button>
                            <button class="btn btn-outline-danger btn-sm py-0 px-2">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3 text-muted small">3</td>
                        <td><div class="fw-semibold small">Kegiatan Penanaman Pohon Bersama</div></td>
                        <td><span class="badge bg-info">Adiwiyata</span></td>
                        <td><span class="text-muted small">5 Jan 2025</span></td>
                        <td>
                            <button class="btn btn-outline-primary btn-sm py-0 px-2">Edit</button>
                            <button class="btn btn-outline-danger btn-sm py-0 px-2">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
