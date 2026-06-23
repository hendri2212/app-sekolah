@csrf
@isset($achievement)
    @method('PUT')
@endisset

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label fw-semibold">Judul Prestasi</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
               value="{{ old('title', $achievement->title ?? '') }}" placeholder="Contoh: Medali Emas OSN Matematika" required>
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Ikon Medali</label>
        <input type="text" name="medal_icon" class="form-control @error('medal_icon') is-invalid @enderror"
               value="{{ old('medal_icon', $achievement->medal_icon ?? '🏆') }}" maxlength="10" required>
        @error('medal_icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Nama Kompetisi</label>
        <input type="text" name="competition_name" class="form-control @error('competition_name') is-invalid @enderror"
               value="{{ old('competition_name', $achievement->competition_name ?? '') }}" placeholder="Contoh: Olimpiade Sains Nasional 2024" required>
        @error('competition_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Penyelenggara</label>
        <input type="text" name="organizer" class="form-control @error('organizer') is-invalid @enderror"
               value="{{ old('organizer', $achievement->organizer ?? '') }}" placeholder="Opsional">
        @error('organizer') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Tingkat</label>
        <select name="level" class="form-select @error('level') is-invalid @enderror" required>
            @foreach(['kota' => 'Kota', 'kabupaten' => 'Kabupaten', 'provinsi' => 'Provinsi', 'nasional' => 'Nasional', 'internasional' => 'Internasional'] as $value => $label)
                <option value="{{ $value }}" {{ old('level', $achievement->level ?? '') === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        @error('level') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Peringkat</label>
        <input type="text" name="rank" class="form-control @error('rank') is-invalid @enderror"
               value="{{ old('rank', $achievement->rank ?? '') }}" placeholder="Contoh: Juara 1">
        @error('rank') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Tanggal Prestasi</label>
        <input type="date" name="achieved_at" class="form-control @error('achieved_at') is-invalid @enderror"
               value="{{ old('achieved_at', isset($achievement) && $achievement->achieved_at ? $achievement->achieved_at->format('Y-m-d') : '') }}">
        @error('achieved_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-5">
        <label class="form-label fw-semibold">Nama Penerima</label>
        <input type="text" name="recipient_name" class="form-control @error('recipient_name') is-invalid @enderror"
               value="{{ old('recipient_name', $achievement->recipient_name ?? '') }}" placeholder="Nama siswa, tim, atau sekolah" required>
        @error('recipient_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-3">
        <label class="form-label fw-semibold">Jenis Penerima</label>
        <select name="recipient_type" class="form-select @error('recipient_type') is-invalid @enderror" required>
            @foreach(['siswa' => 'Siswa', 'tim' => 'Tim', 'sekolah' => 'Sekolah'] as $value => $label)
                <option value="{{ $value }}" {{ old('recipient_type', $achievement->recipient_type ?? 'siswa') === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        @error('recipient_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Nomor Sertifikat</label>
        <input type="text" name="certificate_number" class="form-control @error('certificate_number') is-invalid @enderror"
               value="{{ old('certificate_number', $achievement->certificate_number ?? '') }}" placeholder="Opsional">
        @error('certificate_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-5">
        <label class="form-label fw-semibold">Berita Terkait</label>
        <select name="news_id" class="form-select @error('news_id') is-invalid @enderror">
            <option value="">Tidak ditautkan</option>
            @foreach($news as $item)
                <option value="{{ $item->id }}" {{ (string) old('news_id', $achievement->news_id ?? '') === (string) $item->id ? 'selected' : '' }}>{{ $item->title }}</option>
            @endforeach
        </select>
        @error('news_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-3">
        <label class="form-label fw-semibold">Urutan</label>
        <input type="number" name="order_number" class="form-control @error('order_number') is-invalid @enderror"
               value="{{ old('order_number', $achievement->order_number ?? 1) }}" min="1">
        @error('order_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Gambar</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        @isset($achievement)
            @if($achievement->image_url)
                <div class="mt-2">
                    <img src="{{ $achievement->image_url }}" alt="{{ $achievement->title }}" style="width:96px;height:64px;object-fit:cover;border-radius:6px;">
                </div>
            @endif
        @endisset
    </div>

    <div class="col-12">
        <label class="form-label fw-semibold">Deskripsi</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                  rows="3" placeholder="Catatan singkat prestasi, opsional">{{ old('description', $achievement->description ?? '') }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_featured" id="isFeatured" {{ old('is_featured', $achievement->is_featured ?? false) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="isFeatured">Tandai Unggulan</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" id="isActive" {{ old('is_active', $achievement->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="isActive">Tampilkan di Website</label>
        </div>
    </div>
</div>
