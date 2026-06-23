<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Resmi MTS Negeri 2 Kotabaru - Sekolah Adiwiyata Mandiri. Pendidikan berkualitas dengan karakter unggul.">
    <meta name="keywords" content="SMPN 24 Surabaya, Madrasah Tsanawiyah Negeri, Adiwiyata, Pendidikan Islami, KOTABARU">
    <meta name="author" content="Team Website Development SMKN 1 Kotabaru">
    <title>@yield('title', 'MTS Negeri 2 Kotabaru')</title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css?v=1.0') }}">

    <!-- Custom Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/foto/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/foto/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/foto/favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/foto/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('assets/foto/site.webmanifest') }}">
    @yield('styles')

</head>
<body>

    <!-- Top Bar -->
    <div class="bg-dark text-white py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <small><i class="bi bi-geo-alt-fill"></i>Jl. Berangas Km. 3.5 Desa Sigam, Kotabaru - Kalimantan Selatan</small>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <small>
                        <i class="bi bi-telephone-fill"></i> (08....) | 
                        <i class="bi bi-envelope-fill"></i> info@mtsn2kotabaru.sch.id
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top shadow">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <video autoplay loop muted class="navbar-logo" style="object-fit: cover; border-radius: 60%; flex-shrink: 0;">
                    <source src="{{ asset('assets/animasi/logomts2.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="d-none d-sm-block">
                    <div>MTS Negeri 2 Kotabaru</div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                            <li><a class="dropdown-item" href="{{ url('/profile') }}#sejarah">Sejarah Singkat</a></li>
                            <li><a class="dropdown-item" href="{{ url('/profile') }}#visi-misi">Visi, Misi & Tujuan</a></li>
                            <li><a class="dropdown-item" href="{{ url('/profile') }}#struktur">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="{{ url('/profile') }}#sarana">Sarana dan Prasarana</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="beritaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Berita
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="beritaDropdown">
                            <li><a class="dropdown-item" href="{{ url('/news') }}">Berita Sekolah</a></li>
                            <li><a class="dropdown-item" href="{{ url('/news') }}#agenda">Agenda Sekolah</a></li>
                            <li><a class="dropdown-item" href="{{ url('/news') }}#pengumuman">Pengumuman</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="akademikDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Akademik
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="akademikDropdown">
                            <li><a class="dropdown-item" href="{{ url('/akademik') }}#kurikulum">Kurikulum</a></li>
                            <li><a class="dropdown-item" href="{{ url('/akademik') }}#jadwal">Jadwal Pelajaran</a></li>
                            <li><a class="dropdown-item" href="{{ url('/akademik') }}#penilaian">Penilaian</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="kesiswaanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kesiswaan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="kesiswaanDropdown">
                            <li><a class="dropdown-item" href="{{ url('/kesiswaan') }}#osis">OSIS</a></li>
                            <li><a class="dropdown-item" href="{{ url('/kesiswaan') }}#ekskul">Ekstrakurikuler</a></li>
                            <li><a class="dropdown-item" href="{{ url('/kesiswaan') }}#prestasi">Pojok Prestasi</a></li>
                            <li><a class="dropdown-item" href="{{ url('/kesiswaan') }}#galeri-kegiatan">Galeri Kegiatan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('ppdb*') ? 'active' : '' }}" href="{{ url('/ppdb') }}">SPMB 2025</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kontak*') ? 'active' : '' }}" href="{{ url('/kontak') }}">Kontak</a>
                    </li>
                </ul>
                <div class="ms-lg-3 mt-2 mt-lg-0">
                    <a href="https://elearning.smpn24sby.sch.id" class="btn btn-warning btn-sm" target="_blank">
                        <i class="bi bi-laptop"></i> E-Learning
                    </a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Social Media Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Ikuti Kami</h2>
                <p class="text-muted">Dapatkan informasi terbaru melalui media sosial kami</p>
            </div>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="https://www.youtube.com/@mtsn2kotabaru590" class="social-link" target="_blank" title="YouTube">
                    <i class="bi bi-youtube"></i>
                </a>
                <a href="https://www.instagram.com/mtsn2ktb/" class="social-link" target="_blank" title="Instagram">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="https://www.tiktok.com/@mtsn.2.kotabaru" class="social-link" target="_blank" title="TikTok">
                    <i class="bi bi-tiktok"></i>
                </a>
                <a href="https://web.facebook.com/mtsn2ktb" class="social-link" target="_blank" title="Facebook">
                    <i class="bi bi-facebook"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white pt-5 pb-3">
        <div class="container">
            <div class="row g-4">
                <!-- Tentang Sekolah -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold mb-4">
                        <img src="{{ asset('assets/foto/logo-sekolah.png') }}" alt="Logo" width="40" class="me-2">
                        MTS Negeri 2 Kotabaru
                    </h5>
                    <p class="text-white-50">Sekolah yang berkomitmen memberikan pendidikan berkualitas dengan karakter unggul and berakhlakul karimah</p>
                    <div class="mt-4">
                        <h6 class="fw-bold mb-3">Terakreditasi</h6>
                        <span class="badge bg-warning text-dark fs-6">A - Sangat Baik</span>
                    </div>
                </div>
                
                <!-- Kontak -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold mb-4">Kontak Sekolah</h5>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-3">
                            <i class="bi bi-geo-alt-fill text-success me-2"></i>
                            Jl. Berangas Km. 3.5 Desa Sigam, Kotabaru - Kalimantan Selatan
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-telephone-fill text-success me-2"></i>
                            (08) .....
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-whatsapp text-success me-2"></i>
                            0857-....
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-envelope-fill text-success me-2"></i>
                            info@mtsn2kotabaru.sch.id
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-globe text-success me-2"></i>
                            <a href="{{ url('/profile') }}" class="text-white-50 text-decoration-none">https://www.mtsn2kotabaru.sch.id/</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Quick Link -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold mb-4">Tautan Cepat</h5>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled text-white-50">
                                <li class="mb-2"><a href="{{ url('/profile') }}" class="text-white-50 text-decoration-none">Profil Sekolah</a></li>
                                <li class="mb-2"><a href="{{ url('/news') }}" class="text-white-50 text-decoration-none">Berita</a></li>
                                <li class="mb-2"><a href="{{ url('/akademik') }}" class="text-white-50 text-decoration-none">Akademik</a></li>
                                <li class="mb-2"><a href="{{ url('/kesiswaan') }}" class="text-white-50 text-decoration-none">Kesiswaan</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled text-white-50">
                                <li class="mb-2"><a href="{{ url('/ppdb') }}" class="text-white-50 text-decoration-none">PPDB 2025</a></li>
                                <li class="mb-2"><a href="{{ url('/kontak') }}" class="text-white-50 text-decoration-none">Kontak</a></li>
                                <li class="mb-2"><a href="{{ url('/profile') }}#galeri" class="text-white-50 text-decoration-none">Galeri</a></li>
                                <li class="mb-2"><a href="{{ url('/kontak') }}" class="text-white-50 text-decoration-none">Lokasi</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <h6 class="fw-bold mt-4 mb-3">Mitra & Instansi</h6>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-secondary">Kementerian Agama Kabupaten Kotabaru</span>
                        <span class="badge bg-secondary">Dinas Pendidikan Kotabaru</span>
                        <span class="badge bg-secondary">SMKN 1 Kotabaru</span>
                    </div>
                </div>
            </div>
            
            <hr class="my-4 border-white-50">
            
            <!-- Copyright -->
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-white-50">
                        &copy; 2026-2027 MTS Negeri 2 Kotabaru. All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0 text-white-50">
                        Developed by <span class="text-success">Jurusan RPL SMKN 1 Kotabaru</span>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a href="#" class="btn btn-success scroll-to-top" id="scrollToTop" title="Kembali ke atas">
        <i class="bi bi-arrow-up"></i>
    </a>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Scroll to Top Button
        const scrollToTopBtn = document.getElementById('scrollToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.style.display = 'block';
            } else {
                scrollToTopBtn.style.display = 'none';
            }
        });
        
        scrollToTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Navbar Background on Scroll
        const navbar = document.querySelector('.navbar');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 50) {
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
            }
        });
        
        // Active Link Highlight
        const currentLocation = location.href;
        const menuItems = document.querySelectorAll('.nav-link');
        const menuLength = menuItems.length;
        
        for (let i = 0; i < menuLength; i++) {
            if (menuItems[i].href === currentLocation) {
                menuItems[i].classList.add('active');
            }
        }
    </script>
    @yield('scripts')
</body>
</html>
