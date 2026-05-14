@extends('welcome')

@section('title', 'Detail Berita - MTS Negeri 2 Kotabaru')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-custom">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/news') }}">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Article Content -->
                <div class="col-lg-8">
                    
                    <!-- Article Header -->
                    <div class="article-header">
                        <span class="badge bg-success rounded-pill px-3 py-2">Adiwiyata</span>
                        <h1 class="fs-2 fw-bold lh-sm mb-3">MTS Negeri 2 Kotabaru Terima Penghargaan Adiwiyata Tingkat Provinsi Kalimantan Selatan 2026</h1>
                        <div class="d-flex flex-wrap gap-4 text-muted small mb-4 pb-4 border-bottom">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-calendar3"></i>
                                <span>15 Januari 2025</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-clock"></i>
                                <span>5 Menit Baca</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-person"></i>
                                <span>Admin MTS Negeri 2 Kotabaru</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-eye"></i>
                                <span>1,234 Dilihat</span>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <img src="{{ asset('assets/foto/adiwiyata.jpeg') }}" alt="Penghargaan Adiwiyata" class="article-featured-image">

                    <!-- Article Content -->
                    <div class="article-content">
                        <p class="lead">
                            <strong>Kotabaru</strong> - MTs Negeri 2 Kotabaru kembali menorehkan prestasi membanggakan dengan menerima penghargaan Sekolah Adiwiyata Tingkat Provinsi Kalimantan Selatan. Penghargaan ini menjadi bukti nyata komitmen madrasah dalam menciptakan lingkungan pendidikan yang bersih, sehat, dan berbudaya lingkungan.
                        </p>

                        <p>
                            Capaian ini diraih setelah melalui proses penilaian ketat yang mencakup pengelolaan sampah, penghijauan area madrasah, serta integrasi kurikulum berbasis lingkungan. Penghargaan Adiwiyata ini merupakan langkah penting bagi MTsN 2 Kotabaru untuk terus meningkatkan standar kepedulian lingkungan menuju tingkat yang lebih tinggi di masa depan.
                        </p>

                        <h2><i class="bi bi-award-fill text-warning me-2"></i>Tentang Penghargaan Adiwiyata</h2>
                        
                        <p>
                            Program Adiwiyata adalah program Kementerian Lingkungan Hidup dan Kehutanan RI yang bertujuan untuk mewujudkan warga sekolah yang bertanggung jawab dalam upaya perlindungan dan pengelolaan lingkungan hidup melalui tata kelola sekolah yang baik.
                        </p>

                        <blockquote>
                            "Penghargaan ini merupakan hasil kerja keras seluruh warga sekolah dalam menjaga lingkungan dan menerapkan pendidikan berbasis lingkungan secara konsisten."
                            <footer class="mt-2">— Kepala Madrasah</footer>
                        </blockquote>

                        <h2><i class="bi bi-check-circle-fill text-success me-2"></i>Kriteria Penilaian</h2>
                        
                        <p>Sekolah Adiwiyata dinilai berdasarkan beberapa kriteria utama:</p>

                        <ul>
                            <li><strong>Kebijakan Berwawasan Lingkungan:</strong> Sekolah memiliki visi, misi, dan tujuan yang mencakup upaya perlindungan dan pengelolaan lingkungan hidup.</li>
                            <li><strong>Kurikulum Berbasis Lingkungan:</strong> Integrasi pendidikan lingkungan hidup dalam semua mata pelajaran.</li>
                            <li><strong>Kegiatan Lingkungan:</strong> Pelaksanaan kegiatan berbasis partisipatif yang ramah lingkungan.</li>
                            <li><strong>Pengelolaan Sarana Pendukung:</strong> Pengelolaan sarana sekolah yang mendukung pelestarian lingkungan hidup.</li>
                        </ul>

                        <img src="{{ asset('assets/foto/upacara.jpeg') }}" alt="Upacara Penghargaan Adiwiyata">
                        <p class="caption">Upacara penerimaan penghargaan Adiwiyata</p>

                        <h2><i class="bi bi-flower1 text-success me-2"></i>Program Lingkungan</h2>
                        
                        <p>
                            MTS Negeri 2 Kotabaru telah menerapkan berbagai program lingkungan yang konsisten, antara lain:
                        </p>

                        <div class="row g-3 my-3">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <i class="bi bi-recycle text-success fs-4"></i>
                                    <h6 class="fw-bold mt-2">Bank Sampah Sekolah</h6>
                                    <p class="small text-muted mb-0">Pengelolaan sampah dengan sistem 3R (Reduce, Reuse, Recycle)</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <i class="bi bi-droplet text-primary fs-4"></i>
                                    <h6 class="fw-bold mt-2">Penghematan Air</h6>
                                    <p class="small text-muted mb-0">Program konservasi dan penggunaan air yang efisien</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <i class="bi bi-lightning-charge text-warning fs-4"></i>
                                    <h6 class="fw-bold mt-2">Penghematan Energi</h6>
                                    <p class="small text-muted mb-0">Penggunaan listrik yang efisien dan energi terbarukan</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <i class="bi bi-tree text-success fs-4"></i>
                                    <h6 class="fw-bold mt-2">Penghijauan</h6>
                                    <p class="small text-muted mb-0">Penanaman dan perawatan tanaman di area sekolah</p>
                                </div>
                            </div>
                        </div>

                        <h2><i class="bi bi-people-fill text-primary me-2"></i>Peran Serta Warga Sekolah</h2>
                        
                        <p>
                            Keberhasilan meraih penghargaan Adiwiyata tidak lepas dari peran serta seluruh warga sekolah, termasuk:
                        </p>

                        <ol>
                            <li><strong>Guru dan Tenaga Kependidikan:</strong> Mengintegrasikan pendidikan lingkungan dalam pembelajaran dan menjadi teladan dalam perilaku ramah lingkungan.</li>
                            <li><strong>Siswa-Siswi:</strong> Berpartisipasi aktif dalam kegiatan lingkungan dan menerapkan perilaku ramah lingkungan sehari-hari.</li>
                            <li><strong>Orang Tua:</strong> Mendukung program lingkungan sekolah dan menerapkan di rumah.</li>
                            <li><strong>Masyarakat Sekitar:</strong> Berpartisipasi dalam kegiatan lingkungan yang melibatkan komunitas sekitar sekolah.</li>
                        </ol>

                        <div class="alert alert-success mt-4" role="alert">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            <strong>Informasi:</strong> Penghargaan Adiwiyata ini merupakan bukti komitmen MTS Negeri 2 Kotabaru dalam menciptakan generasi yang peduli dan cinta lingkungan.
                        </div>
                    </div>

                    <!-- Share Section -->
                    <div class="share-section">
                        <h5 class="fw-semibold mb-3"><i class="bi bi-share-fill me-2"></i>Bagikan Berita Ini</h5>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="#" class="share-btn share-facebook" title="Share to Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="share-btn share-twitter" title="Share to Twitter">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="#" class="share-btn share-whatsapp" title="Share to WhatsApp">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <button class="share-btn share-copy" onclick="copyLink()" title="Copy Link">
                                <i class="bi bi-link-45deg"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Tags Section -->
                    <div class="tags-section">
                        <h5 class="fw-semibold mb-3"><i class="bi bi-tags-fill me-2"></i>Tags</h5>
                        <div>
                            <a href="{{ url('/news') }}" class="tag">Adiwiyata</a>
                            <a href="{{ url('/news') }}" class="tag">Penghargaan</a>
                            <a href="{{ url('/news') }}" class="tag">Lingkungan</a>
                        </div>
                    </div>

                    <!-- Post Navigation -->
                    <div class="navigation-post">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="nav-post-item">
                                    <i class="bi bi-arrow-left"></i>
                                    <div>
                                        <small class="text-muted">Berita Sebelumnya</small>
                                        <h6 class="mb-0">Persiapan Asesmen Nasional 2025</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="nav-post-item prev">
                                    <div>
                                        <small class="text-muted">Berita Selanjutnya</small>
                                        <h6 class="mb-0">Pemilihan Ketua OSIS 2025/2026</h6>
                                    </div>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
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
                            <li><a href="{{ url('/news') }}"><span>Akademik</span> <span class="badge bg-primary">12</span></a></li>
                            <li><a href="{{ url('/news') }}"><span>Kesiswaan</span> <span class="badge bg-success">8</span></a></li>
                            <li><a href="{{ url('/news') }}"><span>Prestasi</span> <span class="badge bg-warning text-dark">15</span></a></li>
                            <li><a href="{{ url('/news') }}"><span>Adiwiyata</span> <span class="badge bg-info">6</span></a></li>
                        </ul>
                    </div>

                    <!-- Berita Terbaru -->
                    <div class="sidebar-card">
                        <h5 class="fw-semibold text-success mb-3 pb-2 border-bottom border-2 border-success"><i class="bi bi-clock-history"></i> Berita Terbaru</h5>
                        <div class="recent-post">
                            <img src="{{ asset('assets/foto/adiwiyata.jpeg') }}" alt="Berita 1">
                            <div>
                                <h6><a href="{{ url('/news/detail') }}">Penghargaan Adiwiyata</a></h6>
                                <small><i class="bi bi-calendar3"></i> 15 Jan 2025</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function copyLink() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                alert('Link berhasil disalin ke clipboard!');
            }).catch(err => {
                console.error('Gagal menyalin link: ', err);
            });
        }
    </script>
@endsection
