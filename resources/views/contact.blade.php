@extends('welcome')

@section('title', 'Kontak - MTS Negeri 2 Kotabaru')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Hubungi Kami</h1>
            <p class="lead mb-0">Informasi Kontak dan Lokasi MTS Negeri 2 Kotabaru</p>
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Kontak</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Alamat Sekolah</h5>
                        <p class="text-muted mb-0">Jl. Berangas Km. 3.5 Desa Sigam, Kotabaru - Kalimantan Selatan</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Telepon</h5>
                        <p class="text-muted mb-0">(08) ....</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <h5 class="fw-bold mb-3">WhatsApp</h5>
                        <p class="text-muted mb-0">0857-...</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Email</h5>
                        <p class="text-muted mb-0">mtsn2kotabaru@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <!-- Contact Form -->
                <div class="col-lg-6">
                    <div class="contact-form-card">
                        <h3 class="fw-bold mb-4"><i class="bi bi-chat-dots text-success me-2"></i>Kirim Pesan</h3>
                        <p class="text-muted mb-4">Silakan isi formulir di bawah ini untuk mengirim pertanyaan atau pesan kepada kami.</p>
                        
                        <form id="contactForm">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required>
                            </div>
                            
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="contoh@email.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="telepon" class="form-label">Nomor Telepon</label>
                                    <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="08xxxxxxxxxx">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="subjek" class="form-label">Subjek Pesan <span class="text-danger">*</span></label>
                                <select class="form-select" id="subjek" name="subjek" required>
                                    <option value="">Pilih Subjek</option>
                                    <option value="informasi-umum">Informasi Umum</option>
                                    <option value="ppdb">PPDB / Pendaftaran</option>
                                    <option value="akademik">Akademik</option>
                                    <option value="kesiswaan">Kesiswaan</option>
                                    <option value="kerjasama">Kerjasama</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="pesan" class="form-label">Pesan <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="persetujuan" required>
                                <label class="form-check-label small text-muted" for="persetujuan">
                                    Saya menyetujui data saya digunakan untuk keperluan komunikasi
                                </label>
                            </div>
                            
                            <button type="submit" class="btn submit-btn text-white w-100">
                                <i class="bi bi-send-fill me-2"></i>Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Google Maps -->
                <div class="col-lg-6">
                    <div class="map-container mb-4">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.4811771804143!2d116.2409516749714!3d-3.229723396745386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2def2f10b898ba77%3A0x9aa1dbc6186880a7!2sMTsN%202%20Kotabaru!5e0!3m2!1sid!2sid!4v1775490899339!5m2!1sid!2sid" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Lokasi MTS Negeri 2 Kotabaru">
                        </iframe>
                    </div>

                    <div class="office-hour-card">
                        <h4 class="fw-bold mb-4"><i class="bi bi-clock-history me-2"></i>Jam Operasional</h4>
                        
                        <div class="office-hour-item">
                            <span>Senin - Kamis</span>
                            <span class="fw-bold">07:00 - 15:00 WIB</span>
                        </div>
                        <div class="office-hour-item">
                            <span>Jumat</span>
                            <span class="fw-bold">07:00 - 11:00 WIB</span>
                        </div>
                        <div class="office-hour-item">
                            <span>Sabtu</span>
                            <span class="fw-bold">07:00 - 12:00 WIB</span>
                        </div>
                        <div class="office-hour-item">
                            <span>Minggu</span>
                            <span class="fw-bold">Tutup</span>
                        </div>
                        
                        <p class="small mt-3 mb-0 opacity-75">*Jam operasional kantor tata usaha</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Department Contact Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Kontak Departemen</h2>
                <p class="text-muted">Hubungi departemen terkait sesuai kebutuhan Anda</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="department-card">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-person-badge department-icon"></i>
                            <div>
                                <h6 class="fw-bold mb-2">Tata Usaha</h6>
                                <p class="text-muted small mb-2">Administrasi dan informasi umum</p>
                                <p class="mb-0 small">
                                    <i class="bi bi-telephone text-success me-1"></i> (031) 7675188<br>
                                    <i class="bi bi-envelope text-success me-1"></i> admin@mtsn2kotabaru.sch.id
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="department-card">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-mortarboard department-icon"></i>
                            <div>
                                <h6 class="fw-bold mb-2">Bagian Akademik</h6>
                                <p class="text-muted small mb-2">Kurikulum dan pembelajaran</p>
                                <p class="mb-0 small">
                                    <i class="bi bi-telephone text-success me-1"></i> (031) 7675188<br>
                                    <i class="bi bi-envelope text-success me-1"></i> akademik@mtsn2kotabaru.sch.id
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="department-card">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-people department-icon"></i>
                            <div>
                                <h6 class="fw-bold mb-2">Bagian Kesiswaan</h6>
                                <p class="text-muted small mb-2">OSIS dan ekstrakurikuler</p>
                                <p class="mb-0 small">
                                    <i class="bi bi-telephone text-success me-1"></i> (031) 7675188<br>
                                    <i class="bi bi-envelope text-success me-1"></i> kesiswaan@mtsn2kotabaru.sch.id
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="department-card">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-person-plus department-icon"></i>
                            <div>
                                <h6 class="fw-bold mb-2">Panitia PPDB</h6>
                                <p class="text-muted small mb-2">Pendaftaran siswa-siswi baru</p>
                                <p class="mb-0 small">
                                    <i class="bi bi-telephone text-success me-1"></i> (031) 7675188<br>
                                    <i class="bi bi-envelope text-success me-1"></i> ppdb@mtsn2kotabaru.sch.id
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="department-card">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-megaphone department-icon"></i>
                            <div>
                                <h6 class="fw-bold mb-2">Humas</h6>
                                <p class="text-muted small mb-2">Hubungan masyarakat dan kemitraan</p>
                                <p class="mb-0 small">
                                    <i class="bi bi-telephone text-success me-1"></i> (031) 7675188<br>
                                    <i class="bi bi-envelope text-success me-1"></i> humas@mtsn2kotabaru.sch.id
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                    <div class="department-card">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-heart department-icon"></i>
                            <div>
                                <h6 class="fw-bold mb-2">Layanan Konseling</h6>
                                <p class="text-muted small mb-2">Bimbingan dan konseling siswa</p>
                                <p class="mb-0 small">
                                    <i class="bi bi-telephone text-success me-1"></i> (031) 7675188<br>
                                    <i class="bi bi-envelope text-success me-1"></i> bk@mtsn2kotabaru.sch.id
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Media Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Media Sosial</h2>
                <p class="text-muted">Ikuti kami di media sosial untuk update terbaru</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="social-card">
                        <div class="mb-4">
                            <a href="https://www.youtube.com/@mtsn2kotabaru590" class="contact-social-link social-youtube" target="_blank" title="YouTube">
                                <i class="bi bi-youtube"></i>
                            </a>
                            <a href="https://www.instagram.com/mtsn2ktb/" class="contact-social-link social-instagram" target="_blank" title="Instagram">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="https://www.tiktok.com/@mtsn.2.kotabaru" class="contact-social-link social-tiktok" target="_blank" title="TikTok">
                                <i class="bi bi-tiktok"></i>
                            </a>
                            <a href="https://web.facebook.com/mtsn2ktb" class="contact-social-link social-facebook" target="_blank" title="Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                        </div>
                        <p class="text-muted mb-0">Dapatkan informasi terbaru seputar kegiatan, prestasi, dan pengumuman sekolah melalui media sosial resmi kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pertanyaan Umum</h2>
                <p class="text-muted">Jawaban untuk pertanyaan yang sering diajukan</p>
                <div class="bg-success mx-auto" style="width: 80px; height: 3px;"></div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="accordionKontak">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    Bagaimana cara menghubungi sekolah untuk informasi PPDB?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionKontak">
                                <div class="accordion-body">
                                    Anda dapat menghubungi panitia PPDB melalui telepon (031) 7675188, WhatsApp 0857-3114-6554, atau email ppdb@mtsn2kotabaru.sch.id. Jam layanan: Senin-Jumat 07:00-15:00 WIB.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    Apakah sekolah menerima kunjungan?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionKontak">
                                <div class="accordion-body">
                                    Ya, sekolah menerima kunjungan dengan terlebih dahulu membuat janji melalui telepon atau email. Kunjungan dilayani pada hari dan jam kerja.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Bagaimana cara mengakses E-Learning?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionKontak">
                                <div class="accordion-body">
                                    E-Learning dapat diakses melalui menu di navbar atau langsung ke elearning.mtsn2kotabaru.sch.id. Siswa menggunakan akun yang diberikan oleh sekolah.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                    Apakah ada layanan konseling untuk siswa-siswi?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionKontak">
                                <div class="accordion-body">
                                    Ya, MTS Negeri 2 Kotabaru menyediakan layanan Bimbingan Konseling (BK) untuk siswa-siswi. Dapat dihubungi melalui bk@mtsn2kotabaru.sch.id atau datang langsung ke ruang BK.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                    Bagaimana cara mengajukan surat keterangan sekolah?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionKontak">
                                <div class="accordion-body">
                                    Pengajuan surat keterangan dapat dilakukan melalui tata usaha dengan membawa identitas dan keperluan surat. Proses biasanya 1-3 hari kerja.
                                </div>
                            </div>
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
                    <a href="{{ url('/ppdb') }}" class="card text-center text-decoration-none border-0 shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-person-plus fs-2 text-success mb-2 d-block"></i>
                            <span class="fw-bold">PPDB 2025</span>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="{{ url('/profile') }}" class="card text-center text-decoration-none border-0 shadow-sm h-100">
                        <div class="card-body">
                            <i class="bi bi-building fs-2 text-primary mb-2 d-block"></i>
                            <span class="fw-bold">Profil Sekolah</span>
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
                    <a href="https://elearning.mtsn2kotabaru.sch.id" class="card text-center text-decoration-none border-0 shadow-sm h-100" target="_blank">
                        <div class="card-body">
                            <i class="bi bi-laptop fs-2 text-danger mb-2 d-block"></i>
                            <span class="fw-bold">E-Learning</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6285731146554" class="whatsapp-float" target="_blank" title="Chat WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>
@endsection

@section('scripts')
    <script>
        // Contact Form Submission (Demo)
        const contactForm = document.getElementById('contactForm');
        
        if (contactForm) {
            contactForm.addEventListener('submit', (e) => {
                e.preventDefault();
                
                // Get form values
                const nama = document.getElementById('nama').value;
                const email = document.getElementById('email').value;
                const subjek = document.getElementById('subjek').value;
                
                // Show success message (Demo)
                alert(`Terima kasih, ${nama}! Pesan Anda telah terkirim. Kami akan menghubungi Anda melalui ${email} segera.`);
                
                // Reset form
                contactForm.reset();
            });
        }
        
        // Form Validation Visual Feedback
        const formInputs = document.querySelectorAll('.form-control, .form-select');
        
        formInputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value.trim() === '' && this.hasAttribute('required')) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                }
            });
            
            input.addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });
        });
    </script>
@endsection
