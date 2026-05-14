@extends('welcome')

@section('title', 'Akademik - MTS Negeri 2 Kotabaru')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Akademik</h1>
            <p class="lead mb-0">Kurikulum, Jadwal, Penilaian, dan Program MTS Negeri 2 Kotabaru</p>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Akademik</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Kurikulum Section -->
    <section id="kurikulum" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Kurikulum Pendidikan</h2>
                <p class="text-muted">Kurikulum Merdeka dengan pendekatan pembelajaran inovatif</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="curriculum-card">
                        <i class="bi bi-book display-5 text-success mb-3"></i>
                        <h5 class="fw-bold">Kurikulum Merdeka</h5>
                        <p class="text-muted small">Kurikulum dengan pembelajaran intrakurikuler yang beragam untuk mengembangkan kompetensi dan karakter siswa-siswi.</p>
                        <a href="#" class="btn btn-outline-success btn-sm">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="curriculum-card">
                        <i class="bi bi-people display-5 text-success mb-3"></i>
                        <h5 class="fw-bold">Intrakurikuler</h5>
                        <p class="text-muted small">Kegiatan pembelajaran dalam kurikulum yang mendukung pencapaian kompetensi siswa-siswi sesuai standar nasional.</p>
                        <a href="#" class="btn btn-outline-success btn-sm">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="curriculum-card">
                        <i class="bi bi-globe display-5 text-success mb-3"></i>
                        <h5 class="fw-bold">Muatan Lokal</h5>
                        <p class="text-muted small">Pembelajaran berbasis kearifan lokal dan budaya daerah Saijaan untuk melestarikan budaya setempat.</p>
                        <a href="#" class="btn btn-outline-success btn-sm">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="curriculum-card">
                        <i class="bi bi-puzzle display-5 text-success mb-3"></i>
                        <h5 class="fw-bold">Projek P5</h5>
                        <p class="text-muted small">Projek Penguatan Profil Pelajar Pancasila untuk mengembangkan karakter dan kompetensi siswa-siswi.</p>
                        <a href="#" class="btn btn-outline-success btn-sm">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
            </div>

            <!-- Struktur Kurikulum -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="bi bi-diagram-3"></i> Struktur Kurikulum MTS Negeri 2 Kotabaru</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Mata Pelajaran</th>
                                            <th class="text-center">Fase D (Kelas 7)</th>
                                            <th class="text-center">Fase D (Kelas 8)</th>
                                            <th class="text-center">Fase D (Kelas 9)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pendidikan Agama dan Budi Pekerti</td>
                                            <td class="text-center">3</td>
                                            <td class="text-center">3</td>
                                            <td class="text-center">3</td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan Pancasila</td>
                                            <td class="text-center">2</td>
                                            <td class="text-center">2</td>
                                            <td class="text-center">2</td>
                                        </tr>
                                        <tr>
                                            <td>Bahasa Indonesia</td>
                                            <td class="text-center">5</td>
                                            <td class="text-center">5</td>
                                            <td class="text-center">5</td>
                                        </tr>
                                        <tr>
                                            <td>Matematika</td>
                                            <td class="text-center">5</td>
                                            <td class="text-center">5</td>
                                            <td class="text-center">5</td>
                                        </tr>
                                        <tr>
                                            <td>IPA (Fisika, Biologi, Kimia)</td>
                                            <td class="text-center">5</td>
                                            <td class="text-center">5</td>
                                            <td class="text-center">5</td>
                                        </tr>
                                        <tr>
                                            <td>IPS (Sejarah, Geografi, Ekonomi, Sosiologi)</td>
                                            <td class="text-center">4</td>
                                            <td class="text-center">4</td>
                                            <td class="text-center">4</td>
                                        </tr>
                                        <tr>
                                            <td>Bahasa Inggris</td>
                                            <td class="text-center">4</td>
                                            <td class="text-center">4</td>
                                            <td class="text-center">4</td>
                                        </tr>
                                        <tr>
                                            <td>Seni dan Budaya</td>
                                            <td class="text-center">3</td>
                                            <td class="text-center">3</td>
                                            <td class="text-center">3</td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
                                            <td class="text-center">3</td>
                                            <td class="text-center">3</td>
                                            <td class="text-center">3</td>
                                        </tr>
                                        <tr>
                                            <td>Informatika</td>
                                            <td class="text-center">2</td>
                                            <td class="text-center">2</td>
                                            <td class="text-center">2</td>
                                        </tr>
                                        <tr>
                                            <td>Bahasa Arab</td>
                                            <td class="text-center">2</td>
                                            <td class="text-center">2</td>
                                            <td class="text-center">2</td>
                                        </tr>
                                        <tr class="table-success">
                                            <td><strong>Total Jam Pelajaran per Minggu</strong></td>
                                            <td class="text-center"><strong>38</strong></td>
                                            <td class="text-center"><strong>38</strong></td>
                                            <td class="text-center"><strong>38</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jadwal Pelajaran Section -->
    <section id="jadwal" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Jadwal Pelajaran</h2>
                <p class="text-muted">Jadwal pembelajaran untuk setiap tingkatan kelas</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>

            <!-- Filter Kelas -->
            <div class="text-center mb-4">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-success active">Kelas 7</button>
                    <button type="button" class="btn btn-outline-success">Kelas 8</button>
                    <button type="button" class="btn btn-outline-success">Kelas 9</button>
                </div>
            </div>
            
            <div class="schedule-table">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Jam</th>
                                <th>Senin</th>
                                <th>Selasa</th>
                                <th>Rabu</th>
                                <th>Kamis</th>
                                <th>Jumat</th>
                                <th>Sabtu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">07:00 - 07:40</td>
                                <td><span class="badge bg-primary">Upacara</span></td>
                                <td><span class="badge bg-success">Matematika</span></td>
                                <td><span class="badge" style="background-color:#6f42c1;color:white;">B. Indonesia</span></td>
                                <td><span class="badge bg-success">IPA</span></td>
                                <td><span class="badge bg-primary">Agama</span></td>
                                <td><span class="badge bg-warning text-dark">B. Arab</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">07:40 - 08:20</td>
                                <td><span class="badge bg-primary">Upacara</span></td>
                                <td><span class="badge bg-success">Matematika</span></td>
                                <td><span class="badge" style="background-color:#6f42c1;color:white;">B. Indonesia</span></td>
                                <td><span class="badge bg-success">IPA</span></td>
                                <td><span class="badge bg-primary">Agama</span></td>
                                <td><span class="badge bg-warning text-dark">B. Arab</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">08:20 - 09:00</td>
                                <td><span class="badge" style="background-color:#6f42c1;color:white;">B. Inggris</span></td>
                                <td><span class="badge" style="background-color:#fd7e14;color:white;">IPS</span></td>
                                <td><span class="badge bg-success">Matematika</span></td>
                                <td><span class="badge" style="background-color:#6f42c1;color:white;">B. Inggris</span></td>
                                <td><span class="badge bg-primary">Pancasila</span></td>
                                <td><span class="badge bg-success">IPA</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">09:00 - 09:30</td>
                                <td colspan="6" class="bg-warning text-center fw-bold">ISTIRAHAT</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">09:30 - 10:10</td>
                                <td><span class="badge bg-success">IPA</span></td>
                                <td><span class="badge" style="background-color:#6f42c1;color:white;">B. Inggris</span></td>
                                <td><span class="badge" style="background-color:#fd7e14;color:white;">IPS</span></td>
                                <td><span class="badge bg-primary">PJOK</span></td>
                                <td><span class="badge" style="background-color:#6f42c1;color:white;">B. Indonesia</span></td>
                                <td><span class="badge bg-primary">BK</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">10:10 - 10:50</td>
                                <td><span class="badge" style="background-color:#fd7e14;color:white;">IPS</span></td>
                                <td><span class="badge bg-primary">PJOK</span></td>
                                <td><span class="badge" style="background-color:#6f42c1;color:white;">B. Inggris</span></td>
                                <td><span class="badge bg-primary">PJOK</span></td>
                                <td><span class="badge bg-success">Matematika</span></td>
                                <td><span class="badge bg-primary">Wali Kelas</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">10:50 - 11:30</td>
                                <td><span class="badge bg-primary">Seni Budaya</span></td>
                                <td><span class="badge bg-primary">Informatika</span></td>
                                <td><span class="badge bg-primary">P5</span></td>
                                <td><span class="badge bg-primary">P5</span></td>
                                <td><span class="badge bg-primary">Jumat Bersih</span></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ asset('assets/docs/jadwal-pelajaran.pdf') }}" class="btn btn-success" download>
                    <i class="bi bi-download"></i> Unduh Jadwal Lengkap
                </a>
            </div>
        </div>
    </section>

    <!-- Penilaian & Asesmen Section -->
    <section id="penilaian" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Penilaian & Asesmen</h2>
                <p class="text-muted">Sistem penilaian untuk mengukur pencapaian kompetensi siswa</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="assessment-card">
                        <div class="text-center">
                            <i class="bi bi-clipboard-check display-4 text-success mb-3"></i>
                        </div>
                        <h4 class="fw-bold text-center mb-3">Asesmen Formatif</h4>
                        <p class="text-center">Penilaian selama proses pembelajaran untuk memberikan umpan balik dan memperbaiki pembelajaran.</p>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2"></i> Kuis harian</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2"></i> Tugas individu</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2"></i> Diskusi kelas</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="assessment-card" style="background: linear-gradient(135deg, #0d6efd, #0dcaf0);">
                        <div class="text-center">
                            <i class="bi bi-journal-check display-4 text-success mb-3"></i>
                        </div>
                        <h4 class="fw-bold text-center mb-3">Asesmen Sumatif</h4>
                        <p class="text-center">Penilaian di akhir periode pembelajaran untuk mengukur pencapaian kompetensi siswa-siswi.</p>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2"></i> PTS (Penilaian Tengah Semester)</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2"></i> PAS (Penilaian Akhir Semester)</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2"></i> Ujian Projek</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="assessment-card" style="background: linear-gradient(135deg, #6f42c1, #a855f7);">
                        <div class="text-center">
                            <i class="bi bi-graph-up display-4 text-success mb-3"></i>
                        </div>
                        <h4 class="fw-bold text-center mb-3">Asesmen Nasional</h4>
                        <p class="text-center">Evaluasi sistem pendidikan oleh pemerintah untuk mengukur mutu sekolah.</p>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2"></i> AKM (Asesmen Kompetensi Minimum)</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2"></i> TKA (Tes Kemampuan Akademik)</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2"></i> Survei Karakter</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill me-2"></i> Survei Lingkungan Belajar</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Timeline Penilaian -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="bi bi-calendar-event"></i> Kalender Penilaian Tahun Ajaran 2025/2026</h5>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <div class="timeline-item">
                                    <h5 class="fw-bold">Juli 2025</h5>
                                    <p class="text-muted">Asesmen Diagnostik Awal Tahun Ajaran</p>
                                </div>
                                <div class="timeline-item">
                                    <h5 class="fw-bold">September 2025</h5>
                                    <p class="text-muted">Penilaian Tengah Semester (PTS) Ganjil</p>
                                </div>
                                <div class="timeline-item">
                                    <h5 class="fw-bold">Desember 2025</h5>
                                    <p class="text-muted">Penilaian Akhir Semester (PAS) Ganjil</p>
                                </div>
                                <div class="timeline-item">
                                    <h5 class="fw-bold">Maret 2026</h5>
                                    <p class="text-muted">Penilaian Tengah Semester (PTS) Genap</p>
                                </div>
                                <div class="timeline-item">
                                    <h5 class="fw-bold">Juni 2026</h5>
                                    <p class="text-muted">Penilaian Akhir Semester (PAS) Genap & Asesmen Nasional</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Literasi & Numerasi Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Literasi & Numerasi</h2>
                <p class="text-muted">Program peningkatan kemampuan dasar siswa</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="literacy-card">
                        <div class="text-center mb-4">
                            <i class="bi bi-book-half display-4 text-success mb-3"></i>
                        </div>
                        <h4 class="fw-bold text-center mb-3">Program Literasi</h4>
                        <p class="text-muted">Meningkatkan kemampuan membaca, memahami, dan menganalisis teks untuk mendukung pembelajaran semua mata pelajaran.</p>
                        <div class="row g-3 mt-3">
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <i class="bi bi-clock fs-4 text-success"></i>
                                    <p class="mb-0 mt-2 small fw-bold">15 Menit</p>
                                    <p class="mb-0 small">Membaca Pagi</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <i class="bi bi-book fs-4 text-success"></i>
                                    <p class="mb-0 mt-2 small fw-bold">Pojok Baca</p>
                                    <p class="mb-0 small">Di Setiap Kelas</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-outline-success mt-3 w-100">
                            <i class="bi bi-link-45deg"></i> Akses Jam Perpustakaan
                        </a>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="literacy-card">
                        <div class="text-center mb-4">
                            <i class="bi bi-calculator display-4 text-success mb-3"></i>
                        </div>
                        <h4 class="fw-bold text-center mb-3">Program Numerasi</h4>
                        <p class="text-muted">Mengembangkan kemampuan berpikir menggunakan konsep, prosedur, fakta, dan alat matematika untuk menyelesaikan masalah.</p>
                        <div class="row g-3 mt-3">
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <i class="bi bi-puzzle fs-4 text-success"></i>
                                    <p class="mb-0 mt-2 small fw-bold">Olimpiade</p>
                                    <p class="mb-0 small">Matematika</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <i class="bi bi-trophy fs-4 text-success"></i>
                                    <p class="mb-0 mt-2 small fw-bold">OSN</p>
                                    <p class="mb-0 small">Persiapan</p>
                                </div>
                            </div>
                        </div>
                        <a href="#osn" class="btn btn-outline-success mt-3 w-100">
                            <i class="bi bi-trophy"></i> Lihat Program OSN
                        </a>
                    </div>
                </div>
            </div>

            <!-- Statistik Literasi Numerasi -->
            <div class="row g-4 mt-5">
                <div class="col-md-3 col-6">
                    <div class="stats-card">
                        <div class="display-6 fw-bold lh-1">85%</div>
                        <p class="mb-0">Kemampuan Literasi</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stats-card">
                        <div class="display-6 fw-bold lh-1">80%</div>
                        <p class="mb-0">Kemampuan Numerasi</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stats-card">
                        <div class="display-6 fw-bold lh-1">500+</div>
                        <p class="mb-0">Buku Perpustakaan</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stats-card">
                        <div class="display-6 fw-bold lh-1">50+</div>
                        <p class="mb-0">Siswa Berprestasi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- OSN & Olimpiade Section -->
    <section id="osn" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Olimpiade Sains Nasional (OSN)</h2>
                <p class="text-muted">Program pembinaan siswa-siswi berprestasi dalam kompetisi sains</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card osn-card h-100">
                        <img src="{{ asset('assets/foto/Matematika.webp') }}" alt="OSN Matematika" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-calculator display-5 mb-3 text-primary"></i>
                            <h5 class="card-title fw-bold">Matematika</h5>
                            <p class="card-text small text-muted">Pembinaan intensif untuk kompetisi matematika tingkat kota, provinsi, dan nasional.</p>
                            <a href="{{ url('/kesiswaan') }}#prestasi" class="btn btn-outline-primary btn-sm">Lihat Prestasi</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card osn-card h-100">
                        <img src="{{ asset('assets/foto/IPA.jpg') }}" alt="OSN IPA" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-flask display-5 mb-3 text-success"></i>
                            <h5 class="card-title fw-bold">IPA</h5>
                            <p class="card-text small text-muted">Program khusus untuk siswa-siswi berbakat dalam bidang Ilmu Pengetahuan Alam.</p>
                            <a href="{{ url('/kesiswaan') }}#prestasi" class="btn btn-outline-success btn-sm">Lihat Prestasi</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card osn-card h-100">
                        <img src="{{ asset('assets/foto/IPS.png') }}" alt="OSN IPS" class="card-img-top">
                        <div class="card-body text-center">
                            <i class="bi bi-globe display-5 mb-3 text-warning"></i>
                            <h5 class="card-title fw-bold">IPS</h5>
                            <p class="card-text small text-muted">Pembinaan siswa-siswi untuk kompetisi Ilmu Pengetahuan Sosial tingkat nasional.</p>
                            <a href="{{ url('/kesiswaan') }}#prestasi" class="btn btn-outline-warning btn-sm">Lihat Prestasi</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tahapan OSN -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="bi bi-trophy"></i> Tahapan Kompetisi OSN</h5>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-md-3 mb-3 mb-md-0">
                                    <div class="p-3">
                                        <i class="bi bi-award fs-1 text-warning mb-2 d-block"></i>
                                        <h6 class="fw-bold">Tingkat Sekolah</h6>
                                        <p class="small text-muted">Seleksi internal siswa-siswi</p>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3 mb-md-0">
                                    <div class="p-3">
                                        <i class="bi bi-award fs-1 text-primary mb-2 d-block"></i>
                                        <h6 class="fw-bold">Tingkat Kota</h6>
                                        <p class="small text-muted">Kompetisi tingkat kota/kabupaten</p>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3 mb-md-0">
                                    <div class="p-3">
                                        <i class="bi bi-award fs-1 text-success mb-2 d-block"></i>
                                        <h6 class="fw-bold">Tingkat Provinsi</h6>
                                        <p class="small text-muted">Kompetisi tingkat provinsi</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3">
                                        <i class="bi bi-award fs-1 text-danger mb-2 d-block"></i>
                                        <h6 class="fw-bold">Tingkat Nasional</h6>
                                        <p class="small text-muted">Kompetisi tingkat nasional</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Download Dokumen Akademik</h2>
                <p class="text-muted">Unduh berbagai dokumen dan materi pembelajaran</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="download-box d-flex align-items-center">
                        <i class="bi bi-file-earmark-pdf download-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Kalender Akademik</h6>
                            <small class="text-muted">Tahun Ajaran 2025/2026</small>
                        </div>
                        <a href="{{ asset('assets/docs/kalender-akademik.pdf') }}" class="btn btn-outline-success btn-sm ms-auto" download>
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="download-box d-flex align-items-center">
                        <i class="bi bi-file-earmark-pdf download-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Jadwal Pelajaran</h6>
                            <small class="text-muted">Semester Genap 2025</small>
                        </div>
                        <a href="{{ asset('assets/docs/jadwal-pelajaran.pdf') }}" class="btn btn-outline-success btn-sm ms-auto" download>
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="download-box d-flex align-items-center">
                        <i class="bi bi-file-earmark-pdf download-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Panduan Penilaian</h6>
                            <small class="text-muted">Kurikulum Merdeka</small>
                        </div>
                        <a href="{{ asset('assets/docs/panduan-penilaian.pdf') }}" class="btn btn-outline-success btn-sm ms-auto" download>
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="download-box d-flex align-items-center">
                        <i class="bi bi-file-earmark-pdf download-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Silabus Pembelajaran</h6>
                            <small class="text-muted">Semua Mata Pelajaran</small>
                        </div>
                        <a href="{{ asset('assets/docs/silabus.pdf') }}" class="btn btn-outline-success btn-sm ms-auto" download>
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="download-box d-flex align-items-center">
                        <i class="bi bi-file-earmark-pdf download-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Program Tahunan</h6>
                            <small class="text-muted">Prota 2025/2026</small>
                        </div>
                        <a href="{{ asset('assets/docs/program-tahunan.pdf') }}" class="btn btn-outline-success btn-sm ms-auto" download>
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="download-box d-flex align-items-center">
                        <i class="bi bi-file-earmark-pdf download-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Panduan OSN</h6>
                            <small class="text-muted">Persiapan Kompetisi</small>
                        </div>
                        <a href="{{ asset('assets/docs/panduan-osn.pdf') }}" class="btn btn-outline-success btn-sm ms-auto" download>
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Kerja Akademik Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Program Kerja Akademik</h2>
                <p class="text-muted">Rencana program untuk meningkatkan kualitas pembelajaran</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="program-box">
                        <i class="bi bi-laptop display-5 text-success mb-3"></i>
                        <h5 class="fw-bold">Digitalisasi Pembelajaran</h5>
                        <p class="text-muted small">Implementasi E-Learning dan platform digital untuk mendukung pembelajaran hybrid.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="program-box">
                        <i class="bi bi-people display-5 text-success mb-3"></i>
                        <h5 class="fw-bold">Pelatihan Guru</h5>
                        <p class="text-muted small">Workshop dan pelatihan berkelanjutan untuk meningkatkan kompetensi guru.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="program-box">
                        <i class="bi bi-book display-5 text-success mb-3"></i>
                        <h5 class="fw-bold">Pengembangan Materi</h5>
                        <p class="text-muted small">Penyusunan modul dan materi ajar yang inovatif sesuai Kurikulum Merdeka.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
