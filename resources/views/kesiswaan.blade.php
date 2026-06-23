@extends('welcome')

@section('title', 'Kesiswaan - MTS Negeri 2 Kotabaru')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Kesiswaan</h1>
            <p class="lead mb-0">OSIS, Ekstrakurikuler, dan Prestasi Siswa-Siswi MTS Negeri 2 Kotabaru</p>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Kesiswaan</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- OSIS Section -->
    <section id="osis" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Organisasi Siswa Intra Sekolah (OSIS)</h2>
                <p class="text-muted">Wadah kepemimpinan dan pengembangan karakter siswa-siswi</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10">
                    <div class="osis-card">
                        <div class="row align-items-center">
                            @php
                                $primaryMembers = $period?->members->where('is_primary', true)->sortBy('order_number') ?? collect();
                            @endphp

                            @if($primaryMembers->isNotEmpty())
                                @foreach($primaryMembers->take(2) as $member)
                                    <div class="col-md-4 text-center">
                                        @if($member->photo_url)
                                            <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" class="osis-photo">
                                        @else
                                            <i class="bi bi-person-circle fs-1 mb-3 d-block"></i>
                                        @endif
                                        <h4 class="fw-bold text-uppercase">{{ $member->position }}</h4>
                                        <p class="fw-semibold mb-0">{{ $member->name }}</p>
                                        <p class="mb-0">Masa Bakti {{ $period->name ?? '-' }}</p>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('assets/foto/osis/Ketua Osis.jpg') }}" alt="Ketua OSIS" class="osis-photo">
                                    <h4 class="fw-bold">KETUA OSIS</h4>
                                    <p class="mb-0">Masa Bakti {{ $period->name ?? '2024/2025' }}</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('assets/foto/osis/Wakil Ketua Osis.png') }}" alt="Wakil Ketua OSIS" class="osis-photo">
                                    <h4 class="fw-bold">WAKIL KETUA OSIS</h4>
                                    <p class="mb-0">Masa Bakti {{ $period->name ?? '2024/2025' }}</p>
                                </div>
                            @endif

                            <div class="col-md-4 text-center">
                                <i class="bi bi-people-fill fs-1 mb-3 d-block"></i>
                                <h4 class="fw-bold">STRUKTUR OSIS</h4>
                                <p class="mb-3">Terdiri dari berbagai seksi dan bidang</p>
                                <a href="#struktur-osis" class="btn btn-light text-success">
                                    <i class="bi bi-eye"></i> Lihat Struktur
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--
            <div class="vote-section mb-5">
                <div class="container">
                    <i class="bi bi-ballot-check fs-1 mb-3 d-block"></i>
                    <h2 class="fw-bold mb-3">Pemilihan Ketua OSIS 2025/2026</h2>
                    <p class="lead mb-4">Pemilihan Ketua dan Wakil Ketua OSIS Masa Bakti 2025/2026 dilaksanakan secara Offline</p>
                    <div class="row justify-content-center g-4">
                        <div class="col-md-5 col-lg-4">
                            <div class="candidate-card">
                                <img src="{{ asset('assets/foto/K1.jpg') }}" alt="Kandidat 1" class="candidate-photo">
                                <h5 class="fw-bold">Kandidat 01</h5>
                                <p class="text-muted small">[Nama Kandidat]</p>
                                <p class="small">Visi: Mewujudkan OSIS yang inovatif dan berintegritas</p>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-4">
                            <div class="candidate-card">
                                <img src="{{ asset('assets/foto/K2.jfif') }}" alt="Kandidat 2" class="candidate-photo">
                                <h5 class="fw-bold">Kandidat 02</h5>
                                <p class="text-muted small">[Nama Kandidat]</p>
                                <p class="small">Visi: Mengembangkan potensi siswa secara maksimal</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="https://elearning.smpn24sby.sch.id" class="btn btn-light btn-lg text-success fw-bold" target="_blank">
                            <i class="bi bi-vote"></i> Vote Sekarang
                        </a>
                    </div>
                </div>
            </div>
            -->

            <!-- Struktur OSIS -->
            <div id="struktur-osis" class="mt-5">
                <h3 class="fw-bold text-center mb-4">Struktur Organisasi OSIS</h3>
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <div class="row text-center justify-content-center">
                            <div class="col-12 mb-3">
                                <div class="d-inline-block bg-success text-white px-4 py-2 rounded">
                                    <strong>PERIODE {{ $period->name ?? '-' }}</strong>
                                </div>
                            </div>

                            @if($period && $period->members->isNotEmpty())
                                @php
                                    $members = $period->members->sortBy('order_number');
                                    $leadershipMembers = $members->filter(fn ($member) => str_contains(strtolower($member->position), 'ketua'));
                                    $secretaryTreasurerMembers = $members->filter(function ($member) {
                                        $position = strtolower($member->position);

                                        return str_contains($position, 'sekretaris') || str_contains($position, 'bendahara');
                                    });
                                    $otherMembers = $members->diff($leadershipMembers)->diff($secretaryTreasurerMembers);
                                @endphp

                                @foreach($leadershipMembers as $member)
                                    <div class="col-md-5 col-lg-4 mb-3">
                                        <div class="d-inline-block bg-primary text-white px-3 py-2 rounded small w-100">
                                            <div class="fw-semibold">{{ $member->position }}</div>
                                            <small>{{ $member->name }}</small>
                                        </div>
                                    </div>
                                @endforeach

                                @if($secretaryTreasurerMembers->isNotEmpty())
                                    <div class="col-12"></div>
                                    @foreach($secretaryTreasurerMembers as $member)
                                        <div class="col-md-4 col-lg-3 mb-3">
                                            <div class="d-inline-block bg-secondary text-white px-3 py-2 rounded small w-100">
                                                <div class="fw-semibold">{{ $member->position }}</div>
                                                <small>{{ $member->name }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                @if($otherMembers->isNotEmpty())
                                    <div class="col-12"></div>
                                    @foreach($otherMembers as $member)
                                        <div class="col-md-4 col-lg-3 mb-3">
                                            <div class="d-inline-block bg-secondary text-white px-3 py-2 rounded small w-100">
                                                <div class="fw-semibold">{{ $member->position }}</div>
                                                <small>{{ $member->name }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @else
                                <div class="col-12">
                                    <p class="text-muted mb-0">Belum ada data struktur OSIS.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ekstrakurikuler Section -->
    <section id="ekskul" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Ekstrakurikuler</h2>
                <p class="text-muted">{{ $extracurriculars->count() }} Program ekstrakurikuler untuk mengembangkan bakat dan minat siswa-siswi</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>

            <!-- Filter Kategori -->
            <div class="text-center mb-4">
                <button class="btn btn-outline-success filter-btn active" data-filter="all">Semua</button>
                @foreach($extracurricularCategories as $category)
                    <button class="btn btn-outline-success filter-btn" data-filter="{{ $category->slug }}">{{ $category->name }}</button>
                @endforeach
            </div>
            
            <div class="row g-4">
                @forelse($extracurriculars as $extracurricular)
                    <div class="col-md-4 col-lg-3 ekskul-item" data-category="{{ $extracurricular->category->slug }}">
                        <div class="card ekskul-card">
                            @if($extracurricular->image_url)
                                <img src="{{ $extracurricular->image_url }}" alt="{{ $extracurricular->name }}" class="card-img-top">
                            @endif
                            <div class="card-body text-center">
                                <i class="{{ $extracurricular->icon_class }} display-5 text-success mb-3"></i>
                                <h6 class="card-title fw-bold">{{ $extracurricular->name }}</h6>
                                <span class="badge {{ $extracurricular->category->badge_class }}">{{ $extracurricular->category->name }}</span>
                                @if($extracurricular->description)
                                    <p class="card-text small text-muted mt-2">{{ $extracurricular->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted mb-0">Belum ada data ekstrakurikuler.</p>
                    </div>
                @endforelse
            </div>

            {{--
            <div class="text-center mt-5">
                <a href="#" class="btn btn-outline-success btn-lg">
                    <i class="bi bi-plus-circle"></i> Daftar Ekstrakurikuler
                </a>
            </div>
            --}}
        </div>
    </section>

    <!-- Pojok Prestasi Section -->
    <section id="prestasi" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pojok Prestasi</h2>
                <p class="text-muted">Kabar prestasi siswa MTS Negeri 2 Kotabaru di berbagai kompetisi</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>

            <!-- Statistik Prestasi -->
            <div class="row g-4 mb-5">
                <div class="col-md-3 col-6">
                    <div class="achievement-box">
                        <div class="display-5 fw-bold lh-1">{{ number_format($achievementStats['year_total']) }}</div>
                        <p class="mb-0 fw-bold">Prestasi Tahun {{ $achievementStats['year'] }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="achievement-box">
                        <div class="display-5 fw-bold lh-1">{{ number_format($achievementStats['national_total']) }}</div>
                        <p class="mb-0 fw-bold">Tingkat Nasional</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="achievement-box">
                        <div class="display-5 fw-bold lh-1">{{ number_format($achievementStats['province_total']) }}</div>
                        <p class="mb-0 fw-bold">Tingkat Provinsi</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="achievement-box">
                        <div class="display-5 fw-bold lh-1">{{ number_format($achievementStats['city_total']) }}</div>
                        <p class="mb-0 fw-bold">Tingkat Kota</p>
                    </div>
                </div>
            </div>

            <!-- Daftar Prestasi -->
            <h3 class="fw-bold mb-4">Daftar Prestasi Terbaru</h3>

            @forelse($achievements as $achievement)
                <div class="prestasi-card">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="display-5 me-3">{{ $achievement->medal_icon }}</span>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center mb-2 flex-wrap gap-2">
                                <h5 class="fw-bold mb-0">{{ $achievement->title }}</h5>
                                <span class="badge {{ $achievement->level_badge_class }} rounded-pill px-3 py-2 small fw-semibold">{{ $achievement->level_label }}</span>
                            </div>
                            <p class="text-muted mb-1">{{ $achievement->competition_name }}</p>
                            <small class="text-muted">
                                <i class="bi bi-calendar3"></i> {{ $achievement->display_date }}
                                |
                                <i class="bi {{ $achievement->recipient_type === 'sekolah' ? 'bi-award' : 'bi-person' }}"></i> {{ $achievement->recipient_name }}
                            </small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="prestasi-card text-center text-muted">
                    Belum ada data prestasi.
                </div>
            @endforelse
        </div>
    </section>

    <!-- Program Kesiswaan Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Program Kesiswaan</h2>
                <p class="text-muted">Berbagai program untuk pengembangan siswa-siswi</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="program-box">
                        <i class="bi bi-mortarboard display-5 text-success mb-3"></i>
                        <h5 class="fw-bold">Intrakurikuler</h5>
                        <p class="text-muted small">Kegiatan pembelajaran dalam kurikulum yang mendukung pencapaian kompetensi siswa-siswi</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="program-box">
                        <i class="bi bi-book display-5 text-success mb-3"></i>
                        <h5 class="fw-bold">Muatan Lokal</h5>
                        <p class="text-muted small">Pembelajaran berbasis kearifan lokal dan budaya daerah Kotabaru</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="program-box">
                        <i class="bi bi-heart display-5 text-success mb-3"></i>
                        <h5 class="fw-bold">Layanan Konseling</h5>
                        <p class="text-muted small">Bimbingan dan konseling untuk perkembangan psikologis siswa-siswi</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="program-box">
                        <i class="bi bi-palette display-5 text-success mb-3"></i>
                        <h5 class="fw-bold">Karya Guru & Siswa</h5>
                        <p class="text-muted small">Publikasi dan pameran karya kreatif guru dan siswa-siswi</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="program-box">
                        <i class="bi bi-trophy display-5 text-success mb-3"></i>
                        <h5 class="fw-bold">Kompetisi & Lomba</h5>
                        <p class="text-muted small">Persiapan dan partisipasi dalam berbagai kompetisi akademik dan non-akademik</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="program-box">
                        <i class="bi bi-people display-5 text-success mb-3"></i>
                        <h5 class="fw-bold">Kepemimpinan</h5>
                        <p class="text-muted small">Pelatihan kepemimpinan melalui OSIS dan organisasi siswa-siswi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Konseling Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Layanan Konseling</h2>
                <p class="text-muted">Bimbingan dan konseling untuk kesejahteraan siswa-siswi</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="konseling-card">
                        <div class="text-center mb-4">
                            <i class="bi bi-chat-heart display-4 text-success mb-3"></i>
                        </div>
                        <h4 class="fw-bold text-center mb-3">Konseling Individual</h4>
                        <p class="text-muted">Layanan konseling satu lawan satu untuk membantu siswa mengatasi masalah pribadi, akademik, atau sosial.</p>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Konseling akademik</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Konseling karir</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Konseling pribadi</li>
                        </ul>
                        <a href="{{ url('/kontak') }}" class="btn btn-success mt-3">
                            <i class="bi bi-calendar-check"></i> Jadwalkan Konseling
                        </a>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="konseling-card">
                        <div class="text-center mb-4">
                            <i class="bi bi-people display-4 text-success mb-3"></i>
                        </div>
                        <h4 class="fw-bold text-center mb-3">Konseling Kelompok</h4>
                        <p class="text-muted">Layanan konseling dalam kelompok untuk membahas topik tertentu dan saling berbagi pengalaman.</p>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Kelompok belajar</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Kelompok minat</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Kelompok dukungan</li>
                        </ul>
                        <a href="{{ url('/kontak') }}" class="btn btn-outline-success mt-3">
                            <i class="bi bi-info-circle"></i> Info Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri Kegiatan Kesiswaan -->
    <section id="galeri-kegiatan" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Galeri Kegiatan Kesiswaan</h2>
                <p class="text-muted">Dokumentasi kegiatan OSIS dan ekstrakurikuler</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row">
                @forelse($galleryImages as $image)
                    <div class="col-md-4">
                        <div class="gallery-item">
                            <img src="{{ $image['url'] }}" alt="{{ $image['title'] }}">
                            <div class="gallery-overlay">
                                <h6 class="mb-0">{{ $image['title'] }}</h6>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted mb-0">Belum ada gambar galeri.</p>
                    </div>
                @endforelse
            </div>

            @if($galleryImages->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $galleryImages->links('pagination::bootstrap-5') }}
                </div>
            @endif

            <div class="text-center mt-4">
                <a href="https://www.youtube.com/@mtsn2kotabaru590" class="btn btn-danger" target="_blank">
                    <i class="bi bi-youtube"></i> Lihat Video di YouTube
                </a>
            </div>
        </div>
    </section>

    <!-- Quick Link Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="fw-bold text-center mb-5">Tautan Terkait</h2>
            <div class="row g-4">
                <div class="col-6 col-md-3">
                    <a href="{{ url('/profile') }}#visi-misi" class="card text-center text-decoration-none border-0 shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-bullseye fs-2 text-primary mb-2 d-block"></i>
                            <span class="fw-bold">Visi Misi</span>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{ url('/news') }}" class="card text-center text-decoration-none border-0 shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-newspaper fs-2 text-success mb-2 d-block"></i>
                            <span class="fw-bold">Berita</span>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{ url('/akademik') }}" class="card text-center text-decoration-none border-0 shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-book fs-2 text-warning mb-2 d-block"></i>
                            <span class="fw-bold">Akademik</span>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{ url('/kontak') }}" class="card text-center text-decoration-none border-0 shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-geo-alt fs-2 text-danger mb-2 d-block"></i>
                            <span class="fw-bold">Kontak</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Filter Ekstrakurikuler
        const filterBtns = document.querySelectorAll('.filter-btn');
        const ekskulItems = document.querySelectorAll('.ekskul-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Update active state
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');

                ekskulItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
