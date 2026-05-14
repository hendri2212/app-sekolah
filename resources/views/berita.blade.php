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

                    <!-- Search & Filter -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-3">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-6">
                                    <div class="search-box">
                                        <input type="text" placeholder="Cari berita...">
                                    </div>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button class="btn btn-outline-success filter-btn active">Semua</button>
                                    <button class="btn btn-outline-success filter-btn">Akademik</button>
                                    <button class="btn btn-outline-success filter-btn">Kesiswaan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Berita Sekolah Section -->
                    <div id="berita-sekolah">
                        <h2 class="section-title">Berita Sekolah</h2>

                        <!-- Featured News -->
                        <div class="card news-card mb-4">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ asset('assets/foto/Kegiatan Sekolah 2.jpg') }}" alt="Berita Utama"
                                        class="img-fluid rounded-start h-100" style="object-fit: cover;">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body p-4">
                                        <span class="news-category">UTAMA</span>
                                        <span class="news-date float-end"><i class="bi bi-calendar3"></i> 15 Januari
                                            2025</span>
                                        <h4 class="card-title fw-bold mt-2">MTsN 2 Kotabaru berhasil menyabet predikat
                                            Juara Umum Lomba Olahraga Tradisional</h4>
                                        <p class="card-text text-muted">Tingkat Kabupaten Kotabaru dalam rangka
                                            memperingati Hari Olahraga Nasional (HAORNAS) ke-42.</p>
                                        <a href="{{ url('/news/detail') }}" class="btn btn-success btn-sm">
                                            <i class="bi bi-read-more"></i> Baca Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- News Grid -->
                        <div class="row g-4">
                            <!-- News 1 -->
                            <div class="col-md-6">
                                <div class="card news-card">
                                    <img src="{{ asset('assets/foto/Ruang Kelas.jfif') }}" alt="Berita 1" class="card-img-top">
                                    <div class="card-body">
                                        <span class="badge badge-kategori badge-akademik">Akademik</span>
                                        <span class="news-date float-end"><i class="bi bi-calendar3"></i> 12 Januari
                                            2025</span>
                                        <h6 class="card-title fw-bold mt-2">Persiapan Asesmen Nasional 2025</h6>
                                        <p class="card-text small text-muted">MTS Negeri 2 Kotabaru mempersiapkan
                                            siswa-siswi untuk menghadapi Asesmen Nasional dengan program intensif.</p>
                                        <a href="{{ url('/news/detail') }}" class="btn btn-outline-success btn-sm">Baca
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            </div>

                            <!-- News 2 -->
                            <div class="col-md-6">
                                <div class="card news-card">
                                    <img src="{{ asset('assets/foto/Osis.jfif') }}" alt="Berita 2" class="card-img-top">
                                    <div class="card-body">
                                        <span class="badge badge-kategori badge-kesiswaan">Kesiswaan</span>
                                        <span class="news-date float-end"><i class="bi bi-calendar3"></i> 10 Januari
                                            2025</span>
                                        <h6 class="card-title fw-bold mt-2">Pemilihan Ketua OSIS 2025/2026</h6>
                                        <p class="card-text small text-muted">Pemilihan Ketua dan Wakil Ketua OSIS Masa
                                            Bakti 2025/2026 dilaksanakan secara Offline.</p>
                                        <a href="{{ url('/news/detail') }}" class="btn btn-outline-success btn-sm">Baca
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            </div>

                            <!-- News 3 -->
                            <div class="col-md-6">
                                <div class="card news-card">
                                    <img src="{{ asset('assets/foto/Kegiatan Sekolah 2.jpg') }}" alt="Berita 3" class="card-img-top">
                                    <div class="card-body">
                                        <span class="badge badge-kategori badge-prestasi">Prestasi</span>
                                        <span class="news-date float-end"><i class="bi bi-calendar3"></i> 8 Januari
                                            2025</span>
                                        <h6 class="card-title fw-bold mt-2">Siswa MTS Negeri 2 Kotabaru</h6>
                                        <p class="card-text small text-muted">Siswa MTS Negeri 2 Kotabaru berhasil
                                            meraih medali dalam Olimpiade Sains Nasional tingkat kota.</p>
                                        <a href="{{ url('/news/detail') }}" class="btn btn-outline-success btn-sm">Baca
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            </div>

                            <!-- News 4 -->
                            <div class="col-md-6">
                                <div class="card news-card">
                                    <img src="{{ asset('assets/foto/Menanam.jpeg') }}" alt="Berita 4" class="card-img-top">
                                    <div class="card-body">
                                        <span class="badge badge-kategori badge-adiwiyata">Adiwiyata</span>
                                        <span class="news-date float-end"><i class="bi bi-calendar3"></i> 5 Januari
                                            2025</span>
                                        <h6 class="card-title fw-bold mt-2">Kegiatan Penanaman Pohon</h6>
                                        <p class="card-text small text-muted">Kegiatan penanaman pohon dalam rangka
                                            menjaga lingkungan sekolah yang hijau dan asri.</p>
                                        <a href="{{ url('/news/detail') }}" class="btn btn-outline-success btn-sm">Baca
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation" class="mt-5">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
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
                        <h5 class="sidebar-title"><i class="bi bi-folder"></i> Kategori Berita</h5>
                        <ul class="category-list">
                            <li><a href="#"><span>Akademik</span> <span class="badge bg-primary">12</span></a></li>
                            <li><a href="#"><span>Kesiswaan</span> <span class="badge bg-success">8</span></a></li>
                            <li><a href="#"><span>Prestasi</span> <span class="badge bg-warning text-dark">15</span></a>
                            </li>
                            <li><a href="#"><span>Adiwiyata</span> <span class="badge bg-info">6</span></a></li>
                            <li><a href="#"><span>Umum</span> <span class="badge bg-secondary">20</span></a></li>
                        </ul>
                    </div>

                    <!-- Berita Populer -->
                    <div class="sidebar-card">
                        <h5 class="sidebar-title"><i class="bi bi-fire"></i> Berita Populer</h5>

                        <div class="popular-post">
                            <img src="{{ asset('assets/foto/Kegiatan Sekolah 2.jpg') }}" alt="Populer 1">
                            <div>
                                <h6 class="fw-bold mb-1 small">Juara Umum Lomba Olahraga Tradisional</h6>
                                <small class="text-muted"><i class="bi bi-eye"></i> 1.2K views</small>
                            </div>
                        </div>

                        <div class="popular-post">
                            <img src="{{ asset('assets/foto/Osis.jfif') }}" alt="Populer 2">
                            <div>
                                <h6 class="fw-bold mb-1 small">Pemilihan Ketua OSIS 2025</h6>
                                <small class="text-muted"><i class="bi bi-eye"></i> 980 views</small>
                            </div>
                        </div>

                        <div class="popular-post">
                            <img src="{{ asset('assets/foto/OSN.jpeg') }}" alt="Populer 3">
                            <div>
                                <h6 class="fw-bold mb-1 small">Prestasi OSN Tingkat Kota</h6>
                                <small class="text-muted"><i class="bi bi-eye"></i> 850 views</small>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Link -->
                    <div class="sidebar-card">
                        <h5 class="sidebar-title"><i class="bi bi-link-45deg"></i> Tautan Cepat</h5>
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
                            <span class="badge badge-kategori badge-kesiswaan">Kesiswaan</span>
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
                            <span class="badge badge-kategori badge-akademik">Akademik</span>
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
                            <span class="badge badge-kategori badge-adiwiyata">Adiwiyata</span>
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
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
@endsection
