@extends('welcome')

@section('title', 'Berita - MTS Negeri 2 Kotabaru')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Berita & Informasi</h1>
            <p class="lead mb-0">Update Terbaru Kegiatan, Agenda, dan Pengumuman MTS Negeri 2 Kotabaru</p>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Berita</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Main News Column -->
                <div class="col-lg-8">
                    <div class="col-8 mb-4">
                        <form action="{{ route('news.index') }}" method="GET">
                            @if(request('kategori'))
                                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                            @endif
                            <div class="input-group">
                                <input type="text" name="search" class="form-control rounded-pill" 
                                       placeholder="Cari berita..." value="{{ request('search') }}">
                                <button class="btn btn-success rounded-pill ms-2 px-4" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>

                    <!-- Berita Sekolah Section -->
                    <div id="berita-sekolah">
                        <h2 class="section-title">Berita Sekolah</h2>

                        {{-- Featured News --}}
                        @if($featuredNews)
                        @php
                            $fImg = $featuredNews->image
                                ? (file_exists(public_path('storage/news/' . $featuredNews->image))
                                    ? asset('storage/news/' . $featuredNews->image)
                                    : asset('assets/foto/' . $featuredNews->image))
                                : asset('assets/foto/logo-sekolah.png');
                        @endphp
                        <div class="card news-card mb-4">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ $fImg }}" alt="{{ $featuredNews->title }}"
                                        class="img-fluid rounded-start h-100" style="object-fit: cover;">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body p-4">
                                        <span class="news-category">UTAMA</span>
                                        <span class="news-date float-end"><i class="bi bi-calendar3"></i> {{ $featuredNews->published_at->translatedFormat('d F Y') }}</span>
                                        <h4 class="card-title fw-bold mt-2">{{ $featuredNews->title }}</h4>
                                        <p class="card-text text-muted">{{ $featuredNews->excerpt }}</p>
                                        <a href="{{ url('/news/' . $featuredNews->slug) }}" class="btn btn-success btn-sm">
                                            <i class="bi bi-book"></i> Baca Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- News Grid --}}
                        <div class="row g-4">
                            @forelse($newsList as $item)
                            @php
                                $nImg = $item->image
                                    ? (file_exists(public_path('storage/news/' . $item->image))
                                        ? asset('storage/news/' . $item->image)
                                        : asset('assets/foto/' . $item->image))
                                    : asset('assets/foto/logo-sekolah.png');
                            @endphp
                            <div class="col-md-6">
                                <div class="card news-card">
                                    <img src="{{ $nImg }}" alt="{{ $item->title }}" class="card-img-top" style="height:200px;object-fit:cover;">
                                    <div class="card-body">
                                        <span class="badge bg-{{ $item->category->color ?? 'secondary' }}">{{ $item->category->name }}</span>
                                        <span class="news-date float-end"><i class="bi bi-calendar3"></i> {{ $item->published_at->translatedFormat('d M Y') }}</span>
                                        <h6 class="card-title fw-bold mt-2">{{ $item->title }}</h6>
                                        <p class="card-text small text-muted">{{ $item->excerpt }}</p>
                                        <a href="{{ url('/news/' . $item->slug) }}" class="btn btn-outline-success btn-sm">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <p class="text-muted text-center py-4">Belum ada berita terbaru.</p>
                            </div>
                            @endforelse
                        </div>

                        {{-- Pagination --}}
                        @if($newsList->hasPages())
                        <nav aria-label="Page navigation" class="mt-5">
                            {{ $newsList->links('pagination::bootstrap-5') }}
                        </nav>
                        @endif
                    </div>

                    <!-- Agenda Sekolah Section -->
                    <div id="agenda" class="mt-5 pt-5">
                        <h2 class="section-title">Agenda Sekolah</h2>

                        <div class="agenda-card">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="agenda-date">
                                        <div class="day">20</div>
                                        <div class="month">Jan</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="fw-bold mb-1">Masa Pengenalan Lingkungan Sekolah (MPLS)</h5>
                                    <p class="text-muted mb-0"><i class="bi bi-clock"></i> 07:00 - 14:00 WITA | <i
                                            class="bi bi-geo-alt"></i> MTS Negeri 2 Kotabaru</p>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ url('/news/detail') }}" class="btn btn-success btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>

                        <div class="agenda-card">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="agenda-date">
                                        <div class="day">25</div>
                                        <div class="month">Jan</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="fw-bold mb-1">Rapat Dewan Guru</h5>
                                    <p class="text-muted mb-0"><i class="bi bi-clock"></i> 13:00 - 15:00 WITA | <i
                                            class="bi bi-geo-alt"></i> Ruang Guru</p>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ url('/news/detail') }}" class="btn btn-success btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>

                        <div class="agenda-card">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="agenda-date">
                                        <div class="day">01</div>
                                        <div class="month">Feb</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="fw-bold mb-1">Awal Semester Genap 2025</h5>
                                    <p class="text-muted mb-0"><i class="bi bi-clock"></i> 07:00 - 12:00 WITA | <i
                                            class="bi bi-geo-alt"></i> Seluruh Kelas</p>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ url('/news/detail') }}" class="btn btn-success btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>

                        <div class="agenda-card">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="agenda-date">
                                        <div class="day">10</div>
                                        <div class="month">Feb</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="fw-bold mb-1">Pentas Seni Sekolah</h5>
                                    <p class="text-muted mb-0"><i class="bi bi-clock"></i> 08:00 - 15:00 WIB | <i
                                            class="bi bi-geo-alt"></i> Aula Sekolah</p>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ url('/news/detail') }}" class="btn btn-success btn-sm">Detail</a>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="#" class="btn btn-outline-success">
                                <i class="bi bi-calendar-check"></i> Lihat Semua Agenda
                            </a>
                        </div>
                    </div>

                    <!-- Pengumuman Section -->
                    <div id="pengumuman" class="mt-5 pt-5">
                        <h2 class="section-title">Pengumuman</h2>

                        <div class="announcement-card urgent">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-exclamation-triangle-fill fs-3 text-danger me-3"></i>
                                <div>
                                    <h5 class="fw-bold text-danger mb-2">PENTING: Libur Nasional</h5>
                                    <p class="mb-0">Diberitahukan kepada seluruh siswa-siswi dan orang tua bahwa sekolah
                                        akan diliburkan pada tanggal 25 Januari 2025 dikarenakan hari libur nasional.
                                    </p>
                                    <small class="text-muted"><i class="bi bi-clock"></i> Diposting: 15 Januari
                                        2025</small>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-card success">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-check-circle-fill fs-3 text-success me-3"></i>
                                <div>
                                    <h5 class="fw-bold text-success mb-2">Selamat Kepada Peserta SPMB 2025</h5>
                                    <p class="mb-0">Selamat kepada murid yang telah diterima di MTS Negeri 2 Kotabaru.
                                        Silahkan mengunduh file panduan MPLS di bawah ini.</p>
                                    <a href="{{ asset('assets/docs/panduan-mpls.pdf') }}" class="btn btn-success btn-sm mt-2" download>
                                        <i class="bi bi-download"></i> Unduh Panduan MPLS
                                    </a>
                                    <small class="text-muted d-block mt-2"><i class="bi bi-clock"></i> Diposting: 10
                                        Januari 2025</small>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-card">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-info-circle-fill fs-3 text-warning me-3"></i>
                                <div>
                                    <h5 class="fw-bold text-dark mb-2">Jadwal Penilaian Tengah Semester</h5>
                                    <p class="mb-0">Penilaian Tengah Semester (PTS) akan dilaksanakan pada minggu ketiga
                                        Februari 2025. Siswa-siswi diharapkan mempersiapkan diri dengan baik.</p>
                                    <small class="text-muted"><i class="bi bi-clock"></i> Diposting: 8 Januari
                                        2025</small>
                                </div>
                            </div>
                        </div>

                        <div class="announcement-card">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-megaphone-fill fs-3 text-primary me-3"></i>
                                <div>
                                    <h5 class="fw-bold text-dark mb-2">Pendaftaran Ekstrakurikuler</h5>
                                    <p class="mb-0">Pendaftaran ekstrakurikuler untuk semester genap telah dibuka.
                                        Siswa-siswi dapat mendaftar melalui wali kelas masing-masing.</p>
                                    <small class="text-muted"><i class="bi bi-clock"></i> Diposting: 5 Januari
                                        2025</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Kategori Berita -->
                    <div class="sidebar-card">
                        <h5 class="fw-semibold text-success mb-3 pb-2 border-bottom border-2 border-success"><i class="bi bi-folder"></i> Kategori Berita</h5>
                        <ul class="category-list">
                            <li class="{{ !request('kategori') ? 'active' : '' }}">
                                <a href="{{ route('news.index') }}">
                                    <span>Semua Berita</span>
                                    <span class="badge bg-dark">{{ $totalNewsCount ?? 0 }}</span>
                                </a>
                            </li>
                            @foreach($categories as $category)
                            <li class="{{ request('kategori') === $category->slug ? 'active' : '' }}">
                                <a href="{{ route('news.index', ['kategori' => $category->slug]) }}">
                                    <span>{{ $category->name }}</span>
                                    <span class="badge bg-{{ $category->color }}">{{ $category->news_count }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Berita Populer -->
                    <div class="sidebar-card">
                        <h5 class="fw-semibold text-success mb-3 pb-2 border-bottom border-2 border-success"><i class="bi bi-fire"></i> Berita Populer</h5>

                        @forelse($popularNews as $popular)
                        @php
                            // Support dua sumber gambar: seeder (assets/foto) dan upload baru (storage/news)
                            $imgSrc = $popular->image
                                ? (file_exists(public_path('storage/news/' . $popular->image))
                                    ? asset('storage/news/' . $popular->image)
                                    : asset('assets/foto/' . $popular->image))
                                : asset('assets/foto/logo-sekolah.png');
                        @endphp
                        <div class="popular-post">
                            <img src="{{ $imgSrc }}" alt="{{ $popular->title }}">
                            <div>
                                <h6 class="fw-bold mb-1 small">{{ Str::limit($popular->title, 45) }}</h6>
                                <small class="text-muted">
                                    <i class="bi bi-eye"></i> {{ number_format($popular->views) }} views
                                </small>
                            </div>
                        </div>
                        @empty
                        <p class="text-muted small">Belum ada berita populer.</p>
                        @endforelse
                    </div>

                    <!-- Quick Link -->
                    <div class="sidebar-card">
                        <h5 class="fw-semibold text-success mb-3 pb-2 border-bottom border-2 border-success"><i class="bi bi-link-45deg"></i> Tautan Cepat</h5>
                        <div class="d-grid gap-2">
                            <a href="{{ url('/ppdb') }}" class="btn btn-outline-success">
                                <i class="bi bi-person-plus"></i> PPDB 2025
                            </a>
                            <a href="{{ url('/kesiswaan') }}#prestasi" class="btn btn-outline-warning">
                                <i class="bi bi-trophy"></i> Pojok Prestasi
                            </a>
                            <a href="{{ url('/akademik') }}#jadwal" class="btn btn-outline-primary">
                                <i class="bi bi-calendar"></i> Jadwal Pelajaran
                            </a>
                            <a href="{{ url('/kontak') }}" class="btn btn-outline-danger">
                                <i class="bi bi-geo-alt"></i> Lokasi Sekolah
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Artikel Kegiatan Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Artikel Kegiatan</h2>
                <p class="text-muted">Dokumentasi dan artikel tentang berbagai kegiatan sekolah</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card news-card h-100">
                        <img src="{{ asset('assets/foto/mpls.jpg') }}" alt="Artikel 1" class="card-img-top">
                        <div class="card-body">
                            <span class="badge bg-success">Kesiswaan</span>
                            <h6 class="card-title fw-bold mt-2">Kegiatan MPLS Ramah 2025</h6>
                            <p class="card-text small text-muted">Panduan MPLS Ramah bertujuan memastikan setiap
                                rangkaian kegiatan berorientasi pada kebutuhan murid baru.</p>
                            <a href="{{ url('/news/detail') }}" class="btn btn-outline-success btn-sm">Baca Artikel</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card news-card h-100">
                        <img src="{{ asset('assets/foto/Literasi.jfif') }}" alt="Artikel 2" class="card-img-top">
                        <div class="card-body">
                            <span class="badge bg-primary">Akademik</span>
                            <h6 class="card-title fw-bold mt-2">Program Literasi Numerasi</h6>
                            <p class="card-text small text-muted">Program peningkatan literasi dan numerasi siswa
                                melalui berbagai kegiatan pembelajaran inovatif.</p>
                            <a href="{{ url('/news/detail') }}" class="btn btn-outline-success btn-sm">Baca Artikel</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card news-card h-100">
                        <img src="{{ asset('assets/foto/taman sekolah.jfif') }}" alt="Artikel 3" class="card-img-top">
                        <div class="card-body">
                            <span class="badge bg-info">Adiwiyata</span>
                            <h6 class="card-title fw-bold mt-2">Program Sekolah Hijau</h6>
                            <p class="card-text small text-muted">Kegiatan penghijauan dan pengelolaan sampah dalam
                                rangka menjaga lingkungan sekolah.</p>
                            <a href="{{ url('/news/detail') }}" class="btn btn-outline-success btn-sm">Baca Artikel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Filter Button Active State
        const filterBtns = document.querySelectorAll('.filter-btn');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                filterBtns.forEach(b => {
                    b.classList.remove('active', 'btn-success');
                    b.classList.add('btn-outline-success');
                });
                this.classList.add('active', 'btn-success');
                this.classList.remove('btn-outline-success');
            });
        });
    </script>
@endsection
