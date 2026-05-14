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
                            <div class="col-md-4">
                                <img src="{{ asset('assets/foto/Ketua Osis.jpg') }}" alt="Ketua OSIS" class="osis-photo">
                                <h4 class="fw-bold">KETUA OSIS</h4>
                                <p class="mb-0">Masa Bakti 2024/2025</p>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('assets/foto/Wakil Ketua Osis.png') }}" alt="Wakil Ketua OSIS" class="osis-photo">
                                <h4 class="fw-bold">WAKIL KETUA OSIS</h4>
                                <p class="mb-0">Masa Bakti 2024/2025</p>
                            </div>
                            <div class="col-md-4">
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

            <!-- Pemilihan OSIS -->
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

            <!-- Struktur OSIS -->
            <div id="struktur-osis" class="mt-5">
                <h3 class="fw-bold text-center mb-4">Struktur Organisasi OSIS</h3>
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <div class="row text-center">
                            <div class="col-12 mb-3">
                                <div class="d-inline-block bg-success text-white px-4 py-2 rounded">
                                    <strong>PEMBINA OSIS</strong>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="d-inline-block bg-primary text-white px-4 py-2 rounded">
                                    <strong>KETUA & WAKIL KETUA OSIS</strong>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="d-inline-block bg-secondary text-white px-3 py-2 rounded small">
                                    Sekretaris 1 & 2
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="d-inline-block bg-secondary text-white px-3 py-2 rounded small">
                                    Bendahara 1 & 2
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="d-inline-block bg-secondary text-white px-3 py-2 rounded small">
                                    Seksi-Seksi Bidang
                                </div>
                            </div>
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
                <p class="text-muted">20+ Program ekstrakurikuler untuk mengembangkan bakat dan minat siswa-siswi</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>

            <!-- Filter Kategori -->
            <div class="text-center mb-4">
                <button class="btn btn-outline-success filter-btn active" data-filter="all">Semua</button>
                <button class="btn btn-outline-success filter-btn" data-filter="olahraga">Olahraga</button>
                <button class="btn btn-outline-success filter-btn" data-filter="seni">Seni</button>
                <button class="btn btn-outline-success filter-btn" data-filter="ilmiah">Ilmiah</button>
                <button class="btn btn-outline-success filter-btn" data-filter="keagamaan">Keagamaan</button>
                <button class="btn btn-outline-success filter-btn" data-filter="keterampilan">Keterampilan</button>
            </div>
            
            <div class="row g-4">
                <!-- Pramuka -->
                <div class="col-md-4 col-lg-3 ekskul-item" data-category="keagamaan">
                    <div class="card ekskul-card">
                        <img src="{{ asset('assets/foto/Pramuka.jpg') }}" alt="Pramuka" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-compass display-5 text-success mb-3"></i>
                            <h6 class="card-title fw-bold">Pramuka</h6>
                            <span class="badge bg-success">Keagamaan</span>
                            <p class="card-text small text-muted mt-2">Pendidikan karakter dan kepemimpinan</p>
                        </div>
                    </div>
                </div>

                <!-- PMR -->
                <div class="col-md-4 col-lg-3 ekskul-item" data-category="keterampilan">
                    <div class="card ekskul-card">
                        <img src="{{ asset('assets/foto/PMR.jpg') }}" alt="PMR" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-heart-pulse display-5 text-success mb-3"></i>
                            <h6 class="card-title fw-bold">PMR</h6>
                            <span class="badge" style="background-color:#fd7e14;color:white;">Keterampilan</span>
                            <p class="card-text small text-muted mt-2">Palang Merah Remaja</p>
                        </div>
                    </div>
                </div>

                <!-- Paskibra -->
                <div class="col-md-4 col-lg-3 ekskul-item" data-category="keagamaan">
                    <div class="card ekskul-card">
                        <img src="{{ asset('assets/foto/Paskibra.jpg') }}" alt="Paskibra" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-flag display-5 text-success mb-3"></i>
                            <h6 class="card-title fw-bold">Paskibra</h6>
                            <span class="badge bg-success">Keagamaan</span>
                            <p class="card-text small text-muted mt-2">Pasukan Pengibar Bendera</p>
                        </div>
                    </div>
                </div>

                <!-- Basket -->
                <div class="col-md-4 col-lg-3 ekskul-item" data-category="olahraga">
                    <div class="card ekskul-card">
                        <img src="{{ asset('assets/foto/Basket.jpeg') }}" alt="Basket" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-dribbble display-5 text-success mb-3"></i>
                            <h6 class="card-title fw-bold">Basket</h6>
                            <span class="badge bg-danger">Olahraga</span>
                            <p class="card-text small text-muted mt-2">Tim basket sekolah</p>
                        </div>
                    </div>
                </div>

                <!-- Futsal -->
                <div class="col-md-4 col-lg-3 ekskul-item" data-category="olahraga">
                    <div class="card ekskul-card">
                        <img src="{{ asset('assets/foto/Futsal.jpg') }}" alt="Futsal" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-dribbble display-5 text-success mb-3"></i>
                            <h6 class="card-title fw-bold">Futsal</h6>
                            <span class="badge bg-danger">Olahraga</span>
                            <p class="card-text small text-muted mt-2">Tim futsal sekolah</p>
                        </div>
                    </div>
                </div>

                <!-- Badminton -->
                <div class="col-md-4 col-lg-3 ekskul-item" data-category="olahraga">
                    <div class="card ekskul-card">
                        <img src="{{ asset('assets/foto/Badminton.jpeg') }}" alt="Badminton" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-search display-5 text-success mb-3" style="transform: rotate(45deg);"></i>
                            <h6 class="card-title fw-bold">Badminton</h6>
                            <span class="badge bg-danger">Olahraga</span>
                            <p class="card-text small text-muted mt-2">Bulutangkis sekolah</p>
                        </div>
                    </div>
                </div>

                <!-- Seni Tari -->
                <div class="col-md-4 col-lg-3 ekskul-item" data-category="seni">
                    <div class="card ekskul-card">
                        <img src="{{ asset('assets/foto/Seni Tari.png') }}" alt="Seni Tari" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-music-note-beamed display-5 text-success mb-3"></i>
                            <h6 class="card-title fw-bold">Seni Tari</h6>
                            <span class="badge" style="background-color:#6f42c1;color:white;">Seni</span>
                            <p class="card-text small text-muted mt-2">Tari tradisional & modern</p>
                        </div>
                    </div>
                </div>

                <!-- Seni Musik -->
                <div class="col-md-4 col-lg-3 ekskul-item" data-category="seni">
                    <div class="card ekskul-card">
                        <img src="{{ asset('assets/foto/Seni Musik.jpg') }}" alt="Seni Musik" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-music-note-list display-5 text-success mb-3"></i>
                            <h6 class="card-title fw-bold">Seni Musik</h6>
                            <span class="badge" style="background-color:#6f42c1;color:white;">Seni</span>
                            <p class="card-text small text-muted mt-2">Band & paduan suara</p>
                        </div>
                    </div>
                </div>

                <!-- KIR -->
                <div class="col-md-4 col-lg-3 ekskul-item" data-category="ilmiah">
                    <div class="card ekskul-card">
                        <img src="{{ asset('assets/foto/KIR.jpeg') }}" alt="KIR" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-book display-5 text-success mb-3"></i>
                            <h6 class="card-title fw-bold">KIR</h6>
                            <span class="badge bg-primary">Ilmiah</span>
                            <p class="card-text small text-muted mt-2">Karya Ilmiah Remaja</p>
                        </div>
                    </div>
                </div>

                <!-- Komputer -->
                <div class="col-md-4 col-lg-3 ekskul-item" data-category="ilmiah">
                    <div class="card ekskul-card">
                        <img src="{{ asset('assets/foto/Komputer.jpeg') }}" alt="Komputer" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-pc-display display-5 text-success mb-3"></i>
                            <h6 class="card-title fw-bold">Komputer</h6>
                            <span class="badge bg-primary">Ilmiah</span>
                            <p class="card-text small text-muted mt-2">Programming & desain</p>
                        </div>
                    </div>
                </div>

                <!-- Rohis -->
                <div class="col-md-4 col-lg-3 ekskul-item" data-category="keagamaan">
                    <div class="card ekskul-card">
                        <img src="{{ asset('assets/foto/Rohis.jpg') }}" alt="Rohis" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-moon-stars display-5 text-success mb-3"></i>
                            <h6 class="card-title fw-bold">Rohis</h6>
                            <span class="badge bg-success">Keagamaan</span>
                            <p class="card-text small text-muted mt-2">Rohani Islam</p>
                        </div>
                    </div>
                </div>

                <!-- Jurnalistik -->
                <div class="col-md-4 col-lg-3 ekskul-item" data-category="keterampilan">
                    <div class="card ekskul-card">
                        <img src="{{ asset('assets/foto/Jurnalistik.jpg') }}" alt="Jurnalistik" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-newspaper display-5 text-success mb-3"></i>
                            <h6 class="card-title fw-bold">Jurnalistik</h6>
                            <span class="badge" style="background-color:#fd7e14;color:white;">Keterampilan</span>
                            <p class="card-text small text-muted mt-2">Mading & media sekolah</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="#" class="btn btn-outline-success btn-lg">
                    <i class="bi bi-plus-circle"></i> Daftar Ekstrakurikuler
                </a>
            </div>
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
                        <div class="display-5 fw-bold lh-1">50+</div>
                        <p class="mb-0 fw-bold">Prestasi Tahun 2024</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="achievement-box">
                        <div class="display-5 fw-bold lh-1">15</div>
                        <p class="mb-0 fw-bold">Tingkat Nasional</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="achievement-box">
                        <div class="display-5 fw-bold lh-1">20</div>
                        <p class="mb-0 fw-bold">Tingkat Provinsi</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="achievement-box">
                        <div class="display-5 fw-bold lh-1">15+</div>
                        <p class="mb-0 fw-bold">Tingkat Kota</p>
                    </div>
                </div>
            </div>

            <!-- Daftar Prestasi -->
            <h3 class="fw-bold mb-4">Daftar Prestasi Terbaru</h3>
            
            <div class="prestasi-card">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="display-5 me-3">🥇</span>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="fw-bold mb-0">Medali Emas OSN Matematika</h5>
                            <span class="badge bg-danger rounded-pill px-3 py-2 small fw-semibold ms-3">Nasional</span>
                        </div>
                        <p class="text-muted mb-1">Olimpiade Sains Nasional 2024</p>
                        <small class="text-muted"><i class="bi bi-calendar3"></i> Desember 2024 | <i class="bi bi-person"></i> [Nama Siswa]</small>
                    </div>
                    <div class="col-auto">
                        <a href="{{ url('/news/detail') }}" class="btn btn-success btn-sm">Detail</a>
                    </div>
                </div>
            </div>

            <div class="prestasi-card">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="display-5 me-3">🥈</span>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="fw-bold mb-0">Juara 2 Lomba Karya Ilmiah</h5>
                            <span class="badge rounded-pill px-3 py-2 small fw-semibold ms-3" style="background-color:#fd7e14;color:white;">Provinsi</span>
                        </div>
                        <p class="text-muted mb-1">LKIR Kalimantan Selatan 2024</p>
                        <small class="text-muted"><i class="bi bi-calendar3"></i> November 2024 | <i class="bi bi-person"></i> Tim KIR</small>
                    </div>
                    <div class="col-auto">
                        <a href="{{ url('/news/detail') }}" class="btn btn-success btn-sm">Detail</a>
                    </div>
                </div>
            </div>

            <div class="prestasi-card">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="display-5 me-3">🥉</span>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="fw-bold mb-0">Juara 3 Lomba Basket</h5>
                            <span class="badge bg-primary rounded-pill px-3 py-2 small fw-semibold ms-3">Kota</span>
                        </div>
                        <p class="text-muted mb-1">Kejuaraan Basket Pelajar Kotabaru 2024</p>
                        <small class="text-muted"><i class="bi bi-calendar3"></i> Oktober 2024 | <i class="bi bi-person"></i> Tim Basket</small>
                    </div>
                    <div class="col-auto">
                        <a href="{{ url('/news/detail') }}" class="btn btn-success btn-sm">Detail</a>
                    </div>
                </div>
            </div>

            <div class="prestasi-card">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="display-5 me-3">🏆</span>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="fw-bold mb-0">Sekolah Adiwiyata </h5>
                            <span class="badge bg-danger rounded-pill px-3 py-2 small fw-semibold ms-3">Nasional</span>
                        </div>
                        <p class="text-muted mb-1">Kementerian Lingkungan Hidup dan Kehutanan RI</p>
                        <small class="text-muted"><i class="bi bi-calendar3"></i> 2022 | <i class="bi bi-award"></i> MTS Negeri 2 Kotabaru</small>
                    </div>
                    <div class="col-auto">
                        <a href="{{ url('/profile') }}" class="btn btn-success btn-sm">Detail</a>
                    </div>
                </div>
            </div>

            <div class="prestasi-card">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span class="display-5 me-3">🥇</span>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="fw-bold mb-0">Juara 1 Lomba Seni Tari</h5>
                            <span class="badge bg-primary rounded-pill px-3 py-2 small fw-semibold ms-3">Kota</span>
                        </div>
                        <p class="text-muted mb-1">Festival Seni Pelajar Kotabaru 2024</p>
                        <small class="text-muted"><i class="bi bi-calendar3"></i> September 2024 | <i class="bi bi-person"></i> Tim Seni Tari</small>
                    </div>
                    <div class="col-auto">
                        <a href="{{ url('/news/detail') }}" class="btn btn-success btn-sm">Detail</a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="#" class="btn btn-outline-success">
                    <i class="bi bi-list-ul"></i> Lihat Semua Prestasi
                </a>
            </div>
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
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Galeri Kegiatan Kesiswaan</h2>
                <p class="text-muted">Dokumentasi kegiatan OSIS dan ekstrakurikuler</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="{{ asset('assets/foto/KIR.jpeg') }}" alt="Kegiatan OSIS 1">
                        <div class="gallery-overlay">
                            <h6 class="mb-0">Pelantikan OSIS 2025</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="{{ asset('assets/foto/Futsal.jpg') }}" alt="Kegiatan OSIS 2">
                        <div class="gallery-overlay">
                            <h6 class="mb-0">Latihan Paskibra</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="{{ asset('assets/foto/upacara.jpeg') }}" alt="Kegiatan OSIS 3">
                        <div class="gallery-overlay">
                            <h6 class="mb-0">Pentas Seni Sekolah</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="{{ asset('assets/foto/Badminton.jpeg') }}" alt="Kegiatan OSIS 4">
                        <div class="gallery-overlay">
                            <h6 class="mb-0">Kompetisi Basket</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="{{ asset('assets/foto/Jurnalistik.jpg') }}" alt="Kegiatan OSIS 5">
                        <div class="gallery-overlay">
                            <h6 class="mb-0">Kegiatan Pramuka</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="{{ asset('assets/foto/Seni Tari.png') }}" alt="Kegiatan OSIS 6">
                        <div class="gallery-overlay">
                            <h6 class="mb-0">Pameran Karya Siswa</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Link Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="fw-bold text-center mb-5">Tautan Terkait</h2>
            <div class="row g-4">
                <div class="col-6 col-md-3">
                    <a href="https://elearning.smpn24sby.sch.id" class="card text-center text-decoration-none border-0 shadow-sm h-100" target="_blank">
                        <div class="card-body">
                            <i class="bi bi-laptop fs-2 text-primary mb-2 d-block"></i>
                            <span class="fw-bold">E-Learning</span>
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
