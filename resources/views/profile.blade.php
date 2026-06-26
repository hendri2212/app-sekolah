@extends('welcome')

@section('title', 'Profil - MTS Negeri 2 Kotabaru')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Profil Sekolah</h1>
            <p class="lead mb-0">Mengenal Lebih Dekat MTS Negeri 2 Kotabaru</p>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Profil</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Sejarah Singkat Section -->
    <section id="sejarah" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="{{ asset('storage/news/1778735569_UI7coeEx4c.jpg') }}" alt="Sejarah MTS Negeri 2 Kotabaru" class="img-fluid rounded shadow-lg">
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title">Sejarah Singkat</h2>
                    <p class="lead text-muted">Perjalanan panjang MTS Negeri 2 Kotabaru dalam mendidik generasi bangsa</p>
                    
                    <div class="timeline mt-4">
                        <div class="timeline-item">
                            <h5 class="fw-bold">1997</h5>
                            <p class="text-muted">MTs Negeri 2 Kotabaru resmi didirikan melalui Keputusan Menteri Agama Nomor 107 Tahun 1997 sebagai lembaga pendidikan Islam tingkat menengah di Kabupaten Kotabaru.</p>
                        </div>
                        <div class="timeline-item">
                            <h5 class="fw-bold">2018</h5>
                            <p class="text-muted">Meraih predikat Terakreditasi <strong>{{ $schoolProfile->accreditation ?? '-' }}</strong> dari Badan Akreditasi Nasional Sekolah/Madrasah (BAN-S/M) yang mengukuhkan standar mutu pendidikannya.</p>
                        </div>
                        <div class="timeline-item">
                            <h5 class="fw-bold">2025</h5>
                            <p class="text-muted">Berhasil menyabet gelar <strong>Juara Umum</strong> pada ajang Lomba Olahraga Tradisional tingkat Kabupaten Kotabaru dalam rangka memperingati Hari Olahraga Nasional (HAORNAS) ke-42.</p>
                        </div>
                        <div class="timeline-item">
                            <h5 class="fw-bold">2026</h5>
                            <p class="text-muted">MTs Negeri 2 Kotabaru terus berkomitmen mencetak generasi yang islami, cerdas, dan berprestasi, baik di bidang akademik maupun non-akademik di Bumi Saijaan.</p>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <span class="accreditation-badge">
                            <i class="bi bi-star-fill"></i> AKREDITASI {{ $schoolProfile->accreditation ?? '-' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi, Misi & Tujuan Section -->
    <section id="visi-misi" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Visi, Misi & Tujuan</h2>
                <p class="text-muted">Arah dan komitmen MTS Negeri 2 Kotabaru dalam pendidikan</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row g-4">
                <!-- Visi -->
                <div class="col-lg-4">
                    <div class="vision-card h-100">
                        <div class="text-center mb-4">
                            <i class="bi bi-eye-fill fs-1"></i>
                        </div>
                        <h4 class="fw-bold text-center mb-4">VISI</h4>
                        <p class="text-center">
                            "Terwujudnya Generasi yang Berakhlakul Karimah, Unggul dalam Prestasi, Berwawasan Lingkungan, dan Terampil dalam IPTEK."
                        </p>
                    </div>
                </div>
                
                <!-- Misi -->
                <div class="col-lg-8">
                    <div class="mission-card h-100">
                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-bullseye fs-1 text-success me-3"></i>
                            <h4 class="fw-bold mb-0">MISI</h4>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                               Menyelenggarakan pendidikan yang mengedepankan pembentukan karakter islami dan pembiasaan amaliah keagamaan sehari-hari.
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Mengembangkan potensi siswa-siswi agar mampu bersaing dalam prestasi akademik maupun bakat minat, seperti olahraga tradisional dan seni.
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Menyelenggarakan pembelajaran berbasis teknologi informasi (IPTEK) guna menjawab tantangan zaman.
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Menciptakan lingkungan madrasah yang bersih, asri, dan nyaman untuk mendukung proses belajar mengajar.
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Menanamkan nilai-nilai moral, etika, dan adab sebagai landasan utama dalam berperilaku di masyarakat.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Tujuan -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card border-0 shadow">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <i class="bi bi-flag-fill fs-1 text-success me-3"></i>
                                <h4 class="fw-bold mb-0">TUJUAN</h4>
                            </div>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <p>MTs Negeri 2 Kotabaru bertujuan untuk memberikan pendidikan Islam yang komprehensif dan holistik kepada siswa-siswi, mempersiapkan mereka untuk menghadapi tantangan masa depan dengan keseimbangan antara keunggulan akademik, penguasaan IPTEK, and penguatan akhlakul karimah.</p>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="bi bi-dot text-success"></i>Menghasilkan lulusan yang unggul dalam prestasi akademik dan non-akademik yang berlandaskan nilai-nilai islami.</li>
                                        <li class="mb-2"><i class="bi bi-dot text-success"></i> Membentuk karakter siswa-siswi yang berakhlakul karimah, berintegritas, and disiplin dalam menjalankan ibadah serta kehidupan bermasyarakat.</li>
                                        <li class="mb-2"><i class="bi bi-dot text-success"></i> Menciptakan lingkungan madrasah yang bersih, asri, and religius guna mendukung kenyamanan proses belajar mengajar.</li>
                                        <li class="mb-2"><i class="bi bi-dot text-success"></i> Mengembangkan potensi serta minat bakat siswa-siswi secara optimal melalui integrasi IPTEK and kegiatan ekstrakurikuler yang inovatif.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi Section -->
    <section id="struktur" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Struktur Organisasi</h2>
                <p class="text-muted">Tata kelola and kepemimpinan MTS Negeri 2 Kotabaru</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="org-chart">
                <!-- Kepala Sekolah -->
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="org-box">
                            <i class="bi bi-person-circle fs-1 text-success mb-2 d-block"></i>
                            <h6>KEPALA SEKOLAH</h6>
                            <p class="mb-0 text-muted small">[Nama Kepala Sekolah]</p>
                        </div>
                    </div>
                </div>
                
                <!-- Garis Penghubung -->
                <div class="text-center">
                    <div style="width: 2px; height: 30px; background-color: #198754; margin: 0 auto;"></div>
                </div>
                
                <!-- Wakil Kepala Sekolah -->
                <div class="row justify-content-center">
                    <div class="col-md-3 col-lg-2">
                        <div class="org-box">
                            <i class="bi bi-person-badge fs-4 text-success mb-2 d-block"></i>
                            <h6 class="small">WAKA KURIKULUM</h6>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <div class="org-box">
                            <i class="bi bi-person-badge fs-4 text-success mb-2 d-block"></i>
                            <h6 class="small">WAKA KESISWAAN</h6>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <div class="org-box">
                            <i class="bi bi-person-badge fs-4 text-success mb-2 d-block"></i>
                            <h6 class="small">WAKA SARPRAS</h6>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <div class="org-box">
                            <i class="bi bi-person-badge fs-4 text-success mb-2 d-block"></i>
                            <h6 class="small">WAKA HUMAS</h6>
                        </div>
                    </div>
                </div>
                
                <!-- Garis Penghubung -->
                <div class="text-center">
                    <div style="width: 2px; height: 30px; background-color: #198754; margin: 0 auto;"></div>
                </div>
                
                <!-- Guru & Staff -->
                <div class="row justify-content-center">
                    <div class="col-md-4 col-lg-3">
                        <div class="org-box">
                            <i class="bi bi-people fs-4 text-success mb-2 d-block"></i>
                            <h6 class="small">GURU & TENAGA PENDIDIK</h6>
                            <p class="mb-0 text-muted small">50+ Personel</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="org-box">
                            <i class="bi bi-person-gear fs-4 text-success mb-2 d-block"></i>
                            <h6 class="small">TENAGA KEPENDIDIKAN</h6>
                            <p class="mb-0 text-muted small">Administrasi & Staff</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="org-box">
                            <i class="bi bi-shield-check fs-4 text-success mb-2 d-block"></i>
                            <h6 class="small">KOMITE SEKOLAH</h6>
                            <p class="mb-0 text-muted small">Mitra Sekolah</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Download Struktur -->
            <div class="text-center mt-4">
                <a href="{{ asset('assets/docs/struktur-organisasi.pdf') }}" class="btn btn-outline-success" download>
                    <i class="bi bi-download"></i> Unduh Struktur Organisasi Lengkap
                </a>
            </div>
        </div>
    </section>

    <!-- Sarana dan Prasarana Section -->
    <section id="sarana" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Sarana dan Prasarana</h2>
                <p class="text-muted">Fasilitas modern and lengkap untuk mendukung pembelajaran</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row g-4">
                <!-- Ruang Kelas -->
                <div class="col-md-4 col-lg-3">
                    <div class="card facility-card h-100">
                        <img src="{{ asset('storage/news/1778735569_UI7coeEx4c.jpg') }}" alt="Ruang Kelas" class="card-img-top">
                        <div class="card-body">
                            <h6 class="card-title fw-bold"><i class="bi bi-building text-success me-2"></i>Ruang Kelas</h6>
                            <p class="card-text small text-muted">Ruang kelas nyaman</p>
                        </div>
                    </div>
                </div>
                
                <!-- Laboratorium Komputer -->
                <div class="col-md-4 col-lg-3">
                    <div class="card facility-card h-100">
                        <img src="{{ asset('storage/facility/Lab Komputer.jfif') }}" alt="Lab Komputer" class="card-img-top">
                        <div class="card-body">
                            <h6 class="card-title fw-bold"><i class="bi bi-laptop text-success me-2"></i>Lab Komputer</h6>
                            <p class="card-text small text-muted">Laboratorium komputer dengan perangkat modern</p>
                        </div>
                    </div>
                </div>
                
                <!-- Laboratorium IPA -->
                <div class="col-md-4 col-lg-3">
                    <div class="card facility-card h-100">
                        <img src="{{ asset('storage/facility/Lab IPA.jfif') }}" alt="Lab IPA" class="card-img-top">
                        <div class="card-body">
                            <h6 class="card-title fw-bold"><i class="bi bi-search text-success me-2"></i>Lab IPA</h6>
                            <p class="card-text small text-muted">Laboratorium IPA lengkap untuk praktikum</p>
                        </div>
                    </div>
                </div>
                
                <!-- Perpustakaan -->
                <div class="col-md-4 col-lg-3">
                    <div class="card facility-card h-100">
                        <img src="{{ asset('storage/facility/perpustakaan.jfif') }}" alt="Perpustakaan" class="card-img-top">
                        <div class="card-body">
                            <h6 class="card-title fw-bold"><i class="bi bi-book text-success me-2"></i>Perpustakaan</h6>
                            <p class="card-text small text-muted">Perpustakaan dengan koleksi buku lengkap</p>
                        </div>
                    </div>
                </div>
                
                <!-- Masjid -->
                <div class="col-md-4 col-lg-3">
                    <div class="card facility-card h-100">
                        <img src="{{ asset('storage/facility/masjid.jfif') }}" alt="Masjid" class="card-img-top">
                        <div class="card-body">
                            <h6 class="card-title fw-bold"><i class="bi bi-moon-stars text-success me-2"></i>Masjid</h6>
                            <p class="card-text small text-muted">Masjid sekolah untuk kegiatan keagamaan</p>
                        </div>
                    </div>
                </div>
                
                <!-- Lapangan Olahraga -->
                <div class="col-md-4 col-lg-3">
                    <div class="card facility-card h-100">
                        <img src="{{ asset('storage/eskul/Basket.jpeg') }}" alt="Lapangan Olahraga" class="card-img-top">
                        <div class="card-body">
                            <h6 class="card-title fw-bold"><i class="bi bi-grid-3x3 text-success me-2"></i>Lapangan Olahraga</h6>
                            <p class="card-text small text-muted">Lapangan untuk berbagai kegiatan olahraga</p>
                        </div>
                    </div>
                </div>
                
                <!-- Kantin -->
                <div class="col-md-4 col-lg-3">
                    <div class="card facility-card h-100">
                        <img src="{{ asset('storage/facility/kantin.jfif') }}" alt="Kantin" class="card-img-top">
                        <div class="card-body">
                            <h6 class="card-title fw-bold"><i class="bi bi-cup-hot text-success me-2"></i>Kantin</h6>
                            <p class="card-text small text-muted">Kantin sehat dengan makanan bergizi</p>
                        </div>
                    </div>
                </div>
                
                <!-- Taman Sekolah -->
                <div class="col-md-4 col-lg-3">
                    <div class="card facility-card h-100">
                        <img src="{{ asset('storage/news/1778736484_ou6oi74UzA.jpg') }}" alt="Taman Sekolah" class="card-img-top">
                        <div class="card-body">
                            <h6 class="card-title fw-bold"><i class="bi bi-flower1 text-success me-2"></i>Taman Sekolah</h6>
                            <p class="card-text small text-muted">Taman hijau sebagai sekolah Adiwiyata</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        // Custom scripts for profile page if any
    </script>
@endsection
