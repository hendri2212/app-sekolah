@extends('welcome')

@section('title', 'Beranda - MTS Negeri 2 Kotabaru')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Selamat Datang di Website Resmi MTS Negeri 2 Kotabaru</h1>
                    <p class="lead mb-4">Mewujudkan generasi unggul, berkarakter, berprestasi, dan berakhlakul karimah</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ url('ppdb') }}" class="btn btn-warning btn-lg">
                            <i class="bi bi-person-plus-fill"></i> Info SPMB
                        </a>
                        <a href="{{ url('/profile') }}#sejarah" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-info-circle"></i> Profil Sekolah
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-calendar-event display-6 text-success mb-3"></i>
                            <h5>Tahun Ajaran {{ $schoolProfile->active_school_year ?? 'Belum diatur' }}</h5>
                            <p class="mb-0">Penerimaan Peserta Didik Baru Telah Dibuka</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Boxes Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <!-- SPMB 2025 -->
                <div class="col-md-4">
                    <div class="info-box h-100">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-mortarboard-fill fs-2 me-3"></i>
                            <h4 class="mb-0">SPMB 2026</h4>
                        </div>
                        <p>Calon Murid Baru (CMB) Tahun Ajaran {{ $schoolProfile->active_school_year ?? 'Belum diatur' }}. <br> <br> 
                           Selamat kepada murid yang telah diterima di MTS Negeri 2 Kotabaru.</p>
                        <a href="{{ url('ppdb') }}" class="btn btn-light text-success">
                            Info Selengkapnya <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Panduan MPLS -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-book-fill fs-2 text-primary me-3"></i>
                                <h4 class="mb-0">Panduan MPLS Ramah</h4>
                            </div>
                            <p>Panduan MPLS Ramah ini bertujuan memastikan bahwa setiap rangkaian kegiatan selama MPLS berorientasi pada kebutuhan, perlindungan, dan kesejahteraan murid baru.</p>
                            <a href="{{ asset('assets/docs/panduan-mpls.pdf') }}" class="btn btn-outline-primary" download>
                                <i class="bi bi-download"></i> Unduh Panduan
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Organisasi OSIS -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-people-fill fs-2 text-success me-3"></i>
                                <h4 class="mb-0">Organisasi OSIS</h4>
                            </div>
                            <p>Wadah kesiswaan resmi di MTs Negeri 2 Kotabaru untuk melatih kepemimpinan, kreativitas, dan kolaborasi siswa melalui berbagai kegiatan positif.</p>
                            <a href="{{ url('/kesiswaan') }}#osis" class="btn btn-outline-success">
                                <i class="bi bi-arrow-right"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Mengapa Memilih MTS Negeri 2 Kotabaru?</h2>
                <p class="text-muted">Keunggulan yang membuat kami berbeda dari sekolah lainnya</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row g-4">
                <!-- Prestasi -->
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-trophy-fill display-6 text-success mb-3"></i>
                            <h5 class="card-title fw-bold">Prestasi Akademik & Non-Akademik</h5>
                            <p class="card-text">Kami memiliki catatan prestasi yang membanggakan dalam bidang akademik, seni, olahraga, dan kegiatan lainnya.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Kemitraan -->
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-people-fill display-6 text-success mb-3"></i>
                            <h5 class="card-title fw-bold">Kemitraan Dengan Orang Tua</h5>
                            <p class="card-text">Kami mengutamakan kemitraan yang erat dengan orang tua dalam mendukung perkembangan akademik dan non-akademik siswa-siswi.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Karakter -->
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-shield-check display-6 text-success mb-3"></i>
                            <h5 class="card-title fw-bold">Pembinaan Karakter</h5>
                            <p class="card-text">Kami mendorong pembentukan karakter siswa-siswi yang berintegritas tinggi, disiplin, dan bertanggung jawab.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Ekstrakurikuler -->
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-activity display-6 text-success mb-3"></i>
                            <h5 class="card-title fw-bold">Program Ekstrakurikuler Variatif</h5>
                            <p class="card-text">Kami menawarkan beragam program ekstrakurikuler yang mengembangkan bakat, minat, dan keterampilan siswa-siswi di berbagai bidang.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Lingkungan -->
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-flower1 display-6 text-success mb-3"></i>
                            <h5 class="card-title fw-bold">Lingkungan Belajar Yang Inspiratif</h5>
                            <p class="card-text">Kami menciptakan lingkungan belajar yang positif, kreatif, dan mendukung pertumbuhan dan perkembangan siswa-siswi.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Fasilitas -->
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-building display-6 text-success mb-3"></i>
                            <h5 class="card-title fw-bold">Fasilitas Modern</h5>
                            <p class="card-text">Kami menyediakan fasilitas modern dan lengkap yang mendukung proses pembelajaran dan pengembangan siswa-siswi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Sekolah Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Program Sekolah</h2>
                <p class="text-muted">MTS Negeri 2 Kotabaru bertujuan untuk memberikan pendidikan yang komprehensif dan holistik</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card program-card h-100">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-book fs-1 text-success"></i>
                            </div>
                            <h5 class="card-title fw-bold">Program Akademik Unggulan</h5>
                            <p class="card-text">Memberikan pendidikan akademik berkualitas dengan kurikulum yang komprehensif dan pendekatan pembelajaran inovatif.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card program-card h-100">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-palette fs-1 text-success"></i>
                            </div>
                            <h5 class="card-title fw-bold">Pengembangan Bakat & Minat</h5>
                            <p class="card-text">Menemukan, mengasah, dan mengembangkan bakat serta minat siswa-siswi dalam berbagai bidang seperti seni, olahraga, dan sains.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card program-card h-100">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-person-check fs-1 text-success"></i>
                            </div>
                            <h5 class="card-title fw-bold">Karakter & Kepemimpinan</h5>
                            <p class="card-text">Membangun karakter siswa-siswi yang berintegritas tinggi, bertanggung jawab, dan memiliki kepemimpinan yang berkualitas.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card program-card h-100">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="bi bi-moon-stars fs-1 text-success"></i>
                            </div>
                            <h5 class="card-title fw-bold">Pembinaan Adab & Akhlak</h5>
                            <p class="card-text">Menanamkan nilai-nilai Islam dan adab luhur untuk mencetak siswa-siswi yang cerdas secara intelektual dan mulia secara karakter.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik Section -->
    <section class="py-5 bg-success text-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 mb-4 mb-md-0">
                    <div class="display-4 fw-bold">{{ $schoolAge ?? 0 }}</div>
                    <p>Tahun Berdiri</p>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <div class="display-4 fw-bold">
                        {{ ($schoolProfile->teacher_count ?? 0) + ($schoolProfile->staff_count ?? 0) }}+
                    </div>
                    <p>Guru & Staff</p>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <div class="display-4 fw-bold">{{ $schoolProfile->student_count ?? 0 }}+</div>
                    <p>Siswa-Siswi Aktif</p>
                </div>
                <div class="col-md-3">
                    <div class="display-4 fw-bold">10+</div>
                    <p>Ekstrakurikuler</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri & Prestasi Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-4">Galeri Foto & Video</h2>
                    <p class="text-muted mb-4">Dokumentasi kegiatan sekolah dan pencapaian prestasi siswa-siswi MTS Negeri 2 Kotabaru</p>
                    <div class="row g-2">
                        <div class="col-4">
                            <img src="{{ asset('assets/foto/Kegiatan Sekolah 1.jpg') }}" alt="Kegiatan Sekolah 1" class="img-fluid rounded shadow-sm">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('assets/foto/Kegiatan Sekolah 2.jpg') }}" alt="Kegiatan Sekolah 2" class="img-fluid rounded shadow-sm">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('assets/foto/Kegiatan Sekolah 3.jpg') }}" alt="Kegiatan Sekolah 3" class="img-fluid rounded shadow-sm">
                        </div>
                    </div>
                    <a href="{{ url('profile#galeri') }}" class="btn btn-outline-success mt-3">
                        Lihat Semua Galeri <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <i class="bi bi-award-fill fs-1 text-warning me-3"></i>
                                <div>
                                    <h4 class="mb-0">SK Berdirinya Sekolah</h4>
                                </div>
                            </div>
                            <blockquote class="blockquote">
                                <p class="mb-3">"Berdasarkan Keputusan Menteri Agama Republik Indonesia NOMOR: {{ $schoolProfile->establishment_decree_number ?? 'Belum diatur' }}"</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Link Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold text-center mb-5">Tautan Terkait</h2>
            <div class="row g-4">
                <div class="col-6 col-md-3">
                    <a href="{{ url('akademik') }}" class="card text-center text-decoration-none border-0 shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-book fs-2 text-primary mb-2 d-block"></i>
                            <span class="fw-bold">Akademik</span>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{ url('kesiswaan') }}" class="card text-center text-decoration-none border-0 shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-people fs-2 text-success mb-2 d-block"></i>
                            <span class="fw-bold">Kesiswaan</span>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{ url('news') }}" class="card text-center text-decoration-none border-0 shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-newspaper fs-2 text-warning mb-2 d-block"></i>
                            <span class="fw-bold">Berita</span>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{ url('kontak') }}" class="card text-center text-decoration-none border-0 shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-geo-alt fs-2 text-danger mb-2 d-block"></i>
                            <span class="fw-bold">Lokasi</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
