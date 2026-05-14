@extends('welcome')

@section('title', 'PPDB / SPMB 2025 - MTS Negeri 2 Kotabaru')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container text-center">
            <span class="status-badge status-open mb-3 d-inline-block">
                <i class="bi bi-check-circle-fill"></i> Pendaftaran Dibuka
            </span>
            <h1 class="display-4 fw-bold mb-3">PPDB / SPMB 2025</h1>
            <p class="lead mb-0">Penerimaan Peserta Didik Baru MTS Negeri 2 Kotabaru Tahun Ajaran 2025/2026</p>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">PPDB 2025</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Info Banner Section -->
    <section class="py-5">
        <div class="container">
            <div class="info-banner mb-5">
                <i class="bi bi-mortarboard-fill fs-1 mb-3 d-block"></i>
                <h2>SELAMAT DATANG CALON MURID BARU</h2>
                <p class="lead mb-0">Tahun Ajaran 2025/2026 - MTS Negeri 2 Kotabaru</p>
            </div>

            <!-- Countdown -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <div class="countdown-box">
                        <h4 class="fw-bold mb-4">Hitung Mundur Penutupan Pendaftaran</h4>
                        <div class="text-center">
                            <div class="countdown-item">
                                <div class="countdown-number" id="days">00</div>
                                <div class="countdown-label">Hari</div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-number" id="hours">00</div>
                                <div class="countdown-label">Jam</div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-number" id="minutes">00</div>
                                <div class="countdown-label">Menit</div>
                            </div>
                            <div class="countdown-item">
                                <div class="countdown-number" id="seconds">00</div>
                                <div class="countdown-label">Detik</div>
                            </div>
                        </div>
                        <p class="text-muted mt-4 mb-0"><small>*Waktu setempat Kotabaru (WIB)</small></p>
                    </div>
                </div>
            </div>

            <!-- Quota Information -->
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="quota-box">
                        <i class="bi bi-people-fill fs-1 mb-3 d-block"></i>
                        <div class="quota-number">100</div>
                        <p class="mb-0">Kuota siswa-siswi Baru</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="quota-box" style="background: linear-gradient(135deg, #0d6efd, #0dcaf0);">
                        <i class="bi bi-building fs-1 mb-3 d-block"></i>
                        <div class="quota-number">10</div>
                        <p class="mb-0">Rombongan Belajar</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="quota-box" style="background: linear-gradient(135deg, #6f42c1, #a855f7);">
                        <i class="bi bi-calendar-check fs-1 mb-3 d-block"></i>
                        <div class="quota-number">2025</div>
                        <p class="mb-0">Tahun Ajaran</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alur Pendaftaran Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Alur Pendaftaran</h2>
                <p class="text-muted">Ikuti langkah-langkah berikut untuk mendaftar sebagai siswa-siswi baru</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <i class="bi bi-file-earmark-text step-icon"></i>
                        <h5 class="fw-bold">Isi Formulir</h5>
                        <p class="text-muted small">Lengkapi formulir pendaftaran online dengan data yang benar dan valid.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <i class="bi bi-upload step-icon"></i>
                        <h5 class="fw-bold">Upload Dokumen</h5>
                        <p class="text-muted small">Unggah dokumen persyaratan dalam format PDF atau JPG yang jelas.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <i class="bi bi-check-circle step-icon"></i>
                        <h5 class="fw-bold">Verifikasi</h5>
                        <p class="text-muted small">Tunggu proses verifikasi dokumen oleh panitia PPDB sekolah.</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="step-card">
                        <div class="step-number">4</div>
                        <i class="bi bi-person-check step-icon"></i>
                        <h5 class="fw-bold">Daftar Ulang</h5>
                        <p class="text-muted small">Jika diterima, lakukan daftar ulang sesuai jadwal yang ditentukan.</p>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="text-center mt-5">
                <a href="https://ppdb.smpn24sby.sch.id" class="cta-button" target="_blank">
                    <i class="bi bi-person-plus-fill"></i> DAFTAR SEKARANG
                </a>
                <p class="text-muted mt-3 small">*Klik tombol di atas untuk mengakses formulir pendaftaran online</p>
            </div>
        </div>
    </section>

    <!-- Syarat Pendaftaran Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Syarat Pendaftaran</h2>
                <p class="text-muted">Dokumen yang perlu disiapkan untuk pendaftaran siswa-siswi baru</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="fw-bold mb-4"><i class="bi bi-folder-check text-success"></i> Dokumen Umum</h4>
                    
                    <div class="requirement-card d-flex align-items-center">
                        <i class="bi bi-file-earmark-text requirement-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Fotokopi Akta Kelahiran</h6>
                            <p class="text-muted small mb-0">Maksimal 2 lembar, dilegalisir</p>
                        </div>
                    </div>

                    <div class="requirement-card d-flex align-items-center">
                        <i class="bi bi-file-earmark-person requirement-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Fotokopi Kartu Keluarga (KK)</h6>
                            <p class="text-muted small mb-0">Asli dan fotokopi 2 lembar</p>
                        </div>
                    </div>

                    <div class="requirement-card d-flex align-items-center">
                        <i class="bi bi-person-badge requirement-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Fotokopi KTP Orang Tua</h6>
                            <p class="text-muted small mb-0">KTP ayah dan ibu (2 lembar)</p>
                        </div>
                    </div>

                    <div class="requirement-card d-flex align-items-center">
                        <i class="bi bi-journal-text requirement-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Fotokopi Ijazah SD/Sederajat</h6>
                            <p class="text-muted small mb-0">Atau surat keterangan lulus</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h4 class="fw-bold mb-4"><i class="bi bi-star text-warning"></i> Dokumen Tambahan</h4>
                    
                    <div class="requirement-card d-flex align-items-center">
                        <i class="bi bi-file-earmark-image requirement-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Pas Foto 3x4</h6>
                            <p class="text-muted small mb-0">4 lembar, latar merah, seragam SD</p>
                        </div>
                    </div>

                    <div class="requirement-card d-flex align-items-center">
                        <i class="bi bi-award requirement-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Fotokopi Piagam Prestasi</h6>
                            <p class="text-muted small mb-0">Jika ada (akademik/non-akademik)</p>
                        </div>
                    </div>

                    <div class="requirement-card d-flex align-items-center">
                        <i class="bi bi-file-earmark-medical requirement-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Surat Keterangan Sehat</h6>
                            <p class="text-muted small mb-0">Dari puskesmas atau dokter</p>
                        </div>
                    </div>

                    <div class="requirement-card d-flex align-items-center">
                        <i class="bi bi-envelope requirement-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Surat Pindah (Jika Ada)</h6>
                            <p class="text-muted small mb-0">Untuk siswa-siswi pindahan</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Catatan Penting -->
            <div class="alert alert-warning mt-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <strong>Catatan Penting:</strong> Semua dokumen harus dibawa dalam bentuk asli dan fotokopi saat verifikasi ulang. Dokumen yang tidak lengkap akan ditolak.
            </div>
        </div>
    </section>

    <!-- Jadwal PPDB Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Jadwal PPDB 2025</h2>
                <p class="text-muted">Timeline kegiatan penerimaan siswa-siswi baru tahun ajaran 2025/2026</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="timeline-box">
                        <div class="timeline-item completed">
                            <div class="timeline-date">1 Mei - 31 Mei 2025</div>
                            <h5 class="fw-bold">Sosialisasi PPDB</h5>
                            <p class="text-muted mb-0">Penyebaran informasi dan sosialisasi program PPDB kepada masyarakat.</p>
                        </div>

                        <div class="timeline-item active">
                            <div class="timeline-date">1 Juni - 30 Juni 2025</div>
                            <h5 class="fw-bold">Pendaftaran Online</h5>
                            <p class="text-muted mb-0">Pendaftaran calon siswa-siswi baru melalui Google Forms resmi sekolah.</p>
                            <span class="badge bg-success">Sedang Berlangsung</span>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-date">1 Juli - 5 Juli 2025</div>
                            <h5 class="fw-bold">Verifikasi Berkas</h5>
                            <p class="text-muted mb-0">Pemeriksaan dan validasi dokumen pendaftaran oleh panitia.</p>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-date">10 Juli 2025</div>
                            <h5 class="fw-bold">Pengumuman Hasil</h5>
                            <p class="text-muted mb-0">Pengumuman siswa-siswi yang diterima melalui website dan SMS.</p>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-date">11 Juli - 15 Juli 2025</div>
                            <h5 class="fw-bold">Daftar Ulang</h5>
                            <p class="text-muted mb-0">Proses daftar ulang bagi siswa-siswi yang dinyatakan diterima.</p>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-date">17 Juli 2025</div>
                            <h5 class="fw-bold">MPLS (Masa Pengenalan Lingkungan Sekolah)</h5>
                            <p class="text-muted mb-0">Kegiatan pengenalan lingkungan sekolah untuk siswa-siswi baru.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Download Panduan</h2>
                <p class="text-muted">Unduh dokumen dan panduan lengkap PPDB</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="download-box">
                        <i class="bi bi-file-earmark-pdf download-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Panduan MPLS Ramah</h6>
                            <small class="text-muted">PDF - 2.5 MB</small>
                        </div>
                        <a href="{{ asset('assets/docs/panduan-mpls.pdf') }}" class="btn btn-outline-success btn-sm ms-auto" download>
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="download-box">
                        <i class="bi bi-file-earmark-pdf download-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Brosur PPDB 2025</h6>
                            <small class="text-muted">PDF - 1.8 MB</small>
                        </div>
                        <a href="{{ asset('assets/docs/brosur-ppdb.pdf') }}" class="btn btn-outline-success btn-sm ms-auto" download>
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="download-box">
                        <i class="bi bi-file-earmark-pdf download-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Formulir Pendaftaran</h6>
                            <small class="text-muted">PDF - 0.5 MB</small>
                        </div>
                        <a href="{{ asset('assets/docs/formulir-ppdb.pdf') }}" class="btn btn-outline-success btn-sm ms-auto" download>
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="download-box">
                        <i class="bi bi-file-earmark-pdf download-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Jadwal Lengkap PPDB</h6>
                            <small class="text-muted">PDF - 0.8 MB</small>
                        </div>
                        <a href="{{ asset('assets/docs/jadwal-ppdb.pdf') }}" class="btn btn-outline-success btn-sm ms-auto" download>
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="download-box">
                        <i class="bi bi-file-earmark-pdf download-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Syarat & Ketentuan</h6>
                            <small class="text-muted">PDF - 0.6 MB</small>
                        </div>
                        <a href="{{ asset('assets/docs/syarat-ppdb.pdf') }}" class="btn btn-outline-success btn-sm ms-auto" download>
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="download-box">
                        <i class="bi bi-file-earmark-pdf download-icon"></i>
                        <div>
                            <h6 class="fw-bold mb-1">FAQ PPDB 2025</h6>
                            <small class="text-muted">PDF - 1.2 MB</small>
                        </div>
                        <a href="{{ asset('assets/docs/faq-ppdb.pdf') }}" class="btn btn-outline-success btn-sm ms-auto" download>
                            <i class="bi bi-download"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pertanyaan Umum (FAQ)</h2>
                <p class="text-muted">Jawaban untuk pertanyaan yang sering diajukan seputar PPDB</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="accordionPPDB">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    Kapan pendaftaran PPDB dibuka?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionPPDB">
                                <div class="accordion-body">
                                    Pendaftaran PPDB MTS Negeri 2 Kotabaru Tahun Ajaran 2025/2026 dibuka pada <strong>1 Juni 2025</strong> dan ditutup pada <strong>30 Juni 2025</strong>. Pendaftaran dilakukan secara offline melalui sekolah.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    Berapa kuota siswa-siswi baru yang diterima?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionPPDB">
                                <div class="accordion-body">
                                    Kuota siswa-siswi baru untuk Tahun Ajaran 2025/2026 adalah <strong>300 siswa-siswi</strong> yang akan dibagi menjadi <strong>10 rombongan belajar</strong> dengan rata-rata 30 siswa-siswi per kelas.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Apakah ada biaya pendaftaran?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionPPDB">
                                <div class="accordion-body">
                                    <strong>Pendaftaran PPDB MTS Negeri 2 Kotabaru GRATIS</strong>. Tidak dipungut biaya apapun untuk proses pendaftaran. Hati-hati terhadap pihak yang mengatasnamakan sekolah dan meminta biaya.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                    Bagaimana cara mendaftar online?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionPPDB">
                                <div class="accordion-body">
                                    1. Klik tombol "Daftar Sekarang" di halaman ini<br>
                                    2. Isi formulir pendaftaran dengan data yang benar<br>
                                    3. Upload dokumen persyaratan<br>
                                    4. Submit formulir dan catat nomor pendaftaran<br>
                                    5. Tunggu informasi verifikasi dari panitia
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                    Kapan pengumuman hasil seleksi?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionPPDB">
                                <div class="accordion-body">
                                    Pengumuman hasil seleksi akan diumumkan pada <strong>10 Juli 2025</strong> melalui website resmi sekolah dan SMS ke nomor orang tua/wali yang terdaftar.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix">
                                    Apa yang harus dilakukan jika diterima?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionPPDB">
                                <div class="accordion-body">
                                    Jika dinyatakan diterima, siswa-siswi harus melakukan <strong>daftar ulang</strong> pada tanggal <strong>11-15 Juli 2025</strong> dengan membawa dokumen asli untuk verifikasi. Setelah itu, siswa-siswi akan mengikuti MPLS pada 17 Juli 2025.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven">
                                    Apakah ada jalur prestasi?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionPPDB">
                                <div class="accordion-body">
                                    Ya, MTS Negeri 2 Kotabaru menyediakan <strong>jalur prestasi</strong> untuk siswa-siswi yang memiliki pencapaian akademik atau non-akademik. Silakan lampirkan fotokopi piagam prestasi saat pendaftaran.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact PPDB Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Kontak Panitia PPDB</h2>
                <p class="text-muted">Hubungi kami jika ada pertanyaan atau kendala dalam pendaftaran</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="contact-box h-100">
                        <i class="bi bi-headset fs-1 mb-3 d-block"></i>
                        <h4 class="fw-bold mb-4">Layanan Informasi PPDB</h4>
                        
                        <div class="contact-item">
                            <i class="bi bi-telephone-fill contact-icon"></i>
                            <span>(08...)</span>
                        </div>
                        
                        <div class="contact-item">
                            <i class="bi bi-whatsapp contact-icon"></i>
                            <span>0857-....</span>
                        </div>
                        
                        <div class="contact-item">
                            <i class="bi bi-envelope-fill contact-icon"></i>
                            <span>ppdb@mtsn2kotabaru.sch.id</span>
                        </div>
                        
                        <div class="contact-item">
                            <i class="bi bi-clock contact-icon"></i>
                            <span>Senin - Jumat: 07:00 - 15:00 WITA</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card border-0 shadow h-100">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-4">Kirim Pertanyaan</h4>
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Nama Anda">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="email@contoh.com">
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">Nomor Telepon</label>
                                    <input type="tel" class="form-control" id="telepon" placeholder="08xxxxxxxxxx">
                                </div>
                                <div class="mb-3">
                                    <label for="pesan" class="form-label">Pertanyaan</label>
                                    <textarea class="form-control" id="pesan" rows="4" placeholder="Tulis pertanyaan Anda di sini"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="bi bi-send"></i> Kirim Pertanyaan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Tambahan Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="{{ asset('assets/foto/PPDB.jpg') }}" alt="Info PPDB" class="img-fluid rounded shadow-lg">
                </div>
                <div class="col-lg-6">
                    <h3 class="fw-bold mb-4">Mengapa Memilih MTS Negeri 2 Kotabaru?</h3>
                    
                    <div class="d-flex mb-3">
                        <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
                        <div>
                            <h6 class="fw-bold">Sekolah Adiwiyata Mandiri</h6>
                            <p class="text-muted small mb-0">Lingkungan belajar yang hijau dan berkelanjutan</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-3">
                        <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
                        <div>
                            <h6 class="fw-bold">Akreditasi A (Sangat Baik)</h6>
                            <p class="text-muted small mb-0">Kualitas pendidikan terjamin dan terpercaya</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-3">
                        <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
                        <div>
                            <h6 class="fw-bold">Fasilitas Lengkap & Modern</h6>
                            <p class="text-muted small mb-0">Menunjang proses pembelajaran yang optimal</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-3">
                        <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
                        <div>
                            <h6 class="fw-bold">Guru Berkualitas</h6>
                            <p class="text-muted small mb-0">Tenaga pendidik profesional dan berpengalaman</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-3">
                        <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
                        <div>
                            <h6 class="fw-bold">Prestasi Akademik & Non-Akademik</h6>
                            <p class="text-muted small mb-0">Catatan prestasi membanggakan di berbagai kompetisi</p>
                        </div>
                    </div>
                    
                    <a href="{{ url('/profile') }}" class="btn btn-outline-success mt-3">
                        <i class="bi bi-info-circle"></i> Selengkapnya Tentang Sekolah
                    </a>
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
                    <a href="{{ url('/profile') }}" class="card text-center text-decoration-none border-0 shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-building fs-2 text-success mb-2 d-block"></i>
                            <span class="fw-bold">Profil Sekolah</span>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{ url('/akademik') }}" class="card text-center text-decoration-none border-0 shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-book fs-2 text-primary mb-2 d-block"></i>
                            <span class="fw-bold">Akademik</span>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{ url('/kesiswaan') }}" class="card text-center text-decoration-none border-0 shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-people fs-2 text-warning mb-2 d-block"></i>
                            <span class="fw-bold">Kesiswaan</span>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{ url('/kontak') }}" class="card text-center text-decoration-none border-0 shadow-sm h-100">
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

@section('scripts')
    <script>
        // Countdown Timer
        const countdownDate = new Date("June 30, 2025 23:59:59").getTime();

        const x = setInterval(function() {
            const now = new Date().getTime();
            const distance = countdownDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").innerHTML = days < 10 ? "0" + days : days;
            document.getElementById("hours").innerHTML = hours < 10 ? "0" + hours : hours;
            document.getElementById("minutes").innerHTML = minutes < 10 ? "0" + minutes : minutes;
            document.getElementById("seconds").innerHTML = seconds < 10 ? "0" + seconds : seconds;

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("days").innerHTML = "00";
                document.getElementById("hours").innerHTML = "00";
                document.getElementById("minutes").innerHTML = "00";
                document.getElementById("seconds").innerHTML = "00";
            }
        }, 1000);
    </script>
@endsection
