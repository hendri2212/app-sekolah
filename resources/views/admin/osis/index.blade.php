@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Data OSIS</h2>
            <p class="text-muted mb-0">Kelola periode dan struktur organisasi siswa</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.osis.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Nama Periode</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $period->name ?? '') }}" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Tahun Mulai</label>
                        <input type="number" name="start_year" class="form-control" value="{{ old('start_year', $period->start_year ?? '') }}" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Tahun Selesai</label>
                        <input type="number" name="end_year" class="form-control" value="{{ old('end_year', $period->end_year ?? '') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" name="description" class="form-control" value="{{ old('description', $period->description ?? '') }}">
                    </div>
                </div>

                <hr class="my-4">

                <h5 class="fw-bold mb-3">Struktur Pengurus</h5>
                <div id="member-list">
                    @php $members = old('members', $period?->members ?? []); @endphp
                    @if(!empty($members))
                        @foreach($members as $index => $member)
                            <div class="row g-3 member-row mb-3">
                                <div class="col-md-2">
                                    <label class="form-label">Urutan</label>
                                    <input type="number" name="members[{{ $index }}][order_number]" class="form-control" value="{{ $member['order_number'] ?? $index + 1 }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Jabatan</label>
                                    <input type="text" name="members[{{ $index }}][position]" class="form-control" value="{{ $member['position'] ?? '' }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="members[{{ $index }}][name]" class="form-control" value="{{ $member['name'] ?? '' }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Bidang</label>
                                    <input type="text" name="members[{{ $index }}][department]" class="form-control" value="{{ $member['department'] ?? '' }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Foto</label>
                                    <input type="file" name="members[{{ $index }}][photo]" class="form-control">
                                    <div class="form-text">Foto otomatis diperkecil menjadi JPG.</div>
                                </div>
                                <div class="col-md-1 d-flex align-items-end">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="members[{{ $index }}][is_primary]" value="1" {{ !empty($member['is_primary']) ? 'checked' : '' }}>
                                        <label class="form-check-label">Utama</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row g-3 member-row mb-3">
                            <div class="col-md-2">
                                <label class="form-label">Urutan</label>
                                <input type="number" name="members[0][order_number]" class="form-control" value="1">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Jabatan</label>
                                <input type="text" name="members[0][position]" class="form-control" placeholder="Contoh: Ketua OSIS" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="members[0][name]" class="form-control" placeholder="Nama pengurus" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Bidang</label>
                                <input type="text" name="members[0][department]" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Foto</label>
                                <input type="file" name="members[0][photo]" class="form-control">
                                <div class="form-text">Foto otomatis diperkecil menjadi JPG.</div>
                            </div>
                            <div class="col-md-1 d-flex align-items-end">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="members[0][is_primary]" value="1">
                                    <label class="form-check-label">Utama</label>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="addMemberRow()">+ Tambah Anggota</button>
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function addMemberRow() {
    const list = document.getElementById('member-list');
    const count = list.querySelectorAll('.member-row').length;
    const row = document.createElement('div');
    row.className = 'row g-3 member-row mb-3';
    row.innerHTML = `
        <div class="col-md-2">
            <label class="form-label">Urutan</label>
            <input type="number" name="members[${count}][order_number]" class="form-control" value="${count + 1}">
        </div>
        <div class="col-md-2">
            <label class="form-label">Jabatan</label>
            <input type="text" name="members[${count}][position]" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label class="form-label">Nama</label>
            <input type="text" name="members[${count}][name]" class="form-control" required>
        </div>
        <div class="col-md-2">
            <label class="form-label">Bidang</label>
            <input type="text" name="members[${count}][department]" class="form-control">
        </div>
        <div class="col-md-2">
            <label class="form-label">Foto</label>
            <input type="file" name="members[${count}][photo]" class="form-control">
            <div class="form-text">Foto otomatis diperkecil menjadi JPG.</div>
        </div>
        <div class="col-md-1 d-flex align-items-end">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="members[${count}][is_primary]" value="1">
                <label class="form-check-label">Utama</label>
            </div>
        </div>
    `;
    list.appendChild(row);
}
</script>
@endsection
