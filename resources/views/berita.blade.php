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
                <div class="col-lg-8">
                    <div class="mb-4">
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
                            <a href="{{ url('/kesiswaan') }}#osis" class="btn btn-outline-primary">
                                <i class="bi bi-people"></i> OSIS
                            </a>
                            <a href="{{ url('/kesiswaan') }}#ekskul" class="btn btn-outline-info">
                                <i class="bi bi-stars"></i> Ekstrakurikuler
                            </a>
                            <a href="{{ url('/kontak') }}" class="btn btn-outline-danger">
                                <i class="bi bi-geo-alt"></i> Lokasi Sekolah
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-5 pt-3">
                <!-- Agenda Sekolah Section -->
                <div id="agenda">
                    <h2 class="section-title">Agenda Sekolah</h2>

                    @forelse($agendas as $agenda)
                    <div class="agenda-card">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="agenda-date">
                                    <div class="day">{{ $agenda->start_at->format('d') }}</div>
                                    <div class="month">{{ $agenda->start_at->translatedFormat('M') }}</div>
                                </div>
                            </div>
                            <div class="col">
                                <h5 class="fw-bold mb-1">{{ $agenda->title }}</h5>
                                @if($agenda->description)
                                    <p class="small text-muted mb-1">{{ $agenda->description }}</p>
                                @endif
                                <p class="text-muted mb-0"><i class="bi bi-clock"></i> {{ $agenda->time_range }} | <i
                                        class="bi bi-geo-alt"></i> {{ $agenda->location }}</p>
                            </div>
                            <div class="col-auto">
                                <span class="badge bg-{{ $agenda->status_label === 'Selesai' ? 'secondary' : ($agenda->status_label === 'Berlangsung' ? 'success' : 'primary') }}">
                                    {{ $agenda->status_label }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-muted text-center py-4">Belum ada agenda sekolah.</p>
                    @endforelse
                </div>

                <!-- Pengumuman Section -->
                <div id="pengumuman" class="mt-5 pt-3">
                    <h2 class="section-title">Pengumuman</h2>

                    <div class="row g-4">
                        @foreach($announcements as $announcement)
                            @php
                                $variantClass = match($announcement->variant) {
                                    'urgent' => 'urgent',
                                    'success' => 'success',
                                    'primary' => 'primary',
                                    default => 'info'
                                };

                                $iconColor = match($announcement->variant) {
                                    'urgent' => 'text-danger',
                                    'success' => 'text-success',
                                    'primary' => 'text-primary',
                                    default => 'text-warning'
                                };

                                $titleColor = match($announcement->variant) {
                                    'urgent' => 'text-danger',
                                    'success' => 'text-success',
                                    'primary' => 'text-primary',
                                    default => 'text-dark'
                                };
                            @endphp

                            <div class="col-md-6">
                                <div class="announcement-card {{ $variantClass }} h-100">
                                    <div class="d-flex align-items-start">
                                        <i class="{{ $announcement->icon ?? 'bi bi-info-circle-fill' }} fs-3 {{ $iconColor }} me-3"></i>
                                        <div>
                                            <h5 class="fw-bold {{ $titleColor }} mb-2">{{ $announcement->title }}</h5>
                                            <p class="mb-0">{{ $announcement->content }}</p>
                                            @if($announcement->button_url && $announcement->button_label)
                                                <a href="{{ $announcement->button_url }}" class="btn btn-success btn-sm mt-2" @if(str_contains($announcement->button_url, '.pdf')) download @endif>
                                                    <i class="bi bi-download"></i> {{ $announcement->button_label }}
                                                </a>
                                            @endif
                                            <small class="text-muted {{ $announcement->button_url && $announcement->button_label ? 'd-block mt-2' : '' }}">
                                                <i class="bi bi-clock"></i> Diposting: {{ optional($announcement->published_at)->translatedFormat('d F Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                @forelse($activityNews as $activity)
                    @php
                        $activityImg = $activity->image
                            ? (file_exists(public_path('storage/news/' . $activity->image))
                                ? asset('storage/news/' . $activity->image)
                                : asset('assets/foto/' . $activity->image))
                            : asset('assets/foto/logo-sekolah.png');
                    @endphp
                    <div class="col-md-4">
                        <div class="card news-card h-100">
                            <img src="{{ $activityImg }}" alt="{{ $activity->title }}" class="card-img-top" style="height:220px;object-fit:cover;">
                            <div class="card-body">
                                <span class="badge bg-{{ $activity->category->color ?? 'secondary' }}">{{ $activity->category->name ?? 'Umum' }}</span>
                                <span class="news-date float-end"><i class="bi bi-calendar3"></i> {{ $activity->published_at->translatedFormat('d M Y') }}</span>
                                <h6 class="card-title fw-bold mt-2">{{ $activity->title }}</h6>
                                <p class="card-text small text-muted">{{ $activity->excerpt }}</p>
                                <a href="{{ url('/news/' . $activity->slug) }}" class="btn btn-outline-success btn-sm">Baca Artikel</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-muted text-center py-4">Belum ada artikel kegiatan.</p>
                    </div>
                @endforelse
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
