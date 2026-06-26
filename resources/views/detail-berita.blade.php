@extends('welcome')

@section('title', $news->title . ' - MTS Negeri 2 Kotabaru')

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
                    @php
                        $articleImg = null;
                        if ($news->image) {
                            if (file_exists(public_path('storage/news/' . $news->image))) {
                                $articleImg = asset('storage/news/' . $news->image);
                            } elseif (file_exists(public_path('assets/foto/' . $news->image))) {
                                $articleImg = asset('assets/foto/' . $news->image);
                            }
                        }

                        $wordCount = str_word_count(strip_tags($news->content));
                        $readingMinutes = max(1, ceil($wordCount / 200));
                    @endphp
                    
                    <!-- Article Header -->
                    <div class="article-header">
                        <span class="badge bg-{{ $news->category->color ?? 'secondary' }} rounded-pill px-3 py-2">
                            {{ $news->category->name ?? 'Umum' }}
                        </span>
                        <h1 class="fs-2 fw-bold lh-sm mb-3">{{ $news->title }}</h1>
                        <div class="d-flex flex-wrap gap-4 text-muted small mb-4 pb-4 border-bottom">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-calendar3"></i>
                                <span>{{ optional($news->published_at)->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-clock"></i>
                                <span>{{ $readingMinutes }} Menit Baca</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-person"></i>
                                <span>{{ $news->user->name ?? 'Admin MTS Negeri 2 Kotabaru' }}</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-eye"></i>
                                <span>{{ number_format($news->views) }} Dilihat</span>
                            </div>
                        </div>
                    </div>

                    @if($articleImg)
                    <img src="{{ $articleImg }}" alt="{{ $news->title }}" class="article-featured-image">
                    @endif

                    <!-- Article Content -->
                    <div class="article-content">
                        {!! nl2br(e($news->content)) !!}
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
                            @if($news->category)
                                <a href="{{ route('news.index', ['kategori' => $news->category->slug]) }}" class="tag">{{ $news->category->name }}</a>
                            @else
                                <a href="{{ route('news.index') }}" class="tag">Umum</a>
                            @endif
                        </div>
                    </div>

                    <!-- Post Navigation -->
                    <div class="navigation-post">
                        <div class="row">
                            <div class="col-md-6">
                                @if($previousNews)
                                <a href="{{ route('news.show', $previousNews->slug) }}" class="nav-post-item">
                                    <i class="bi bi-arrow-left"></i>
                                    <div>
                                        <small class="text-muted">Berita Sebelumnya</small>
                                        <h6 class="mb-0">{{ Str::limit($previousNews->title, 45) }}</h6>
                                    </div>
                                </a>
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if($nextNews)
                                <a href="{{ route('news.show', $nextNews->slug) }}" class="nav-post-item prev">
                                    <div>
                                        <small class="text-muted">Berita Selanjutnya</small>
                                        <h6 class="mb-0">{{ Str::limit($nextNews->title, 45) }}</h6>
                                    </div>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                @endif
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
                            <li>
                                <a href="{{ route('news.index') }}">
                                    <span>Semua Berita</span>
                                    <span class="badge bg-dark">{{ $totalNewsCount ?? 0 }}</span>
                                </a>
                            </li>
                            @foreach($categories as $category)
                            <li class="{{ optional($news->category)->slug === $category->slug ? 'active' : '' }}">
                                <a href="{{ route('news.index', ['kategori' => $category->slug]) }}">
                                    <span>{{ $category->name }}</span>
                                    <span class="badge bg-{{ $category->color ?? 'secondary' }}">{{ $category->news_count }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Berita Terbaru -->
                    <div class="sidebar-card">
                        <h5 class="fw-semibold text-success mb-3 pb-2 border-bottom border-2 border-success"><i class="bi bi-clock-history"></i> Berita Terbaru</h5>
                        @forelse($latestNews as $latest)
                        @php
                            $latestImg = asset('assets/foto/logo-sekolah.png');
                            if ($latest->image) {
                                if (file_exists(public_path('storage/news/' . $latest->image))) {
                                    $latestImg = asset('storage/news/' . $latest->image);
                                } elseif (file_exists(public_path('assets/foto/' . $latest->image))) {
                                    $latestImg = asset('assets/foto/' . $latest->image);
                                }
                            }
                        @endphp
                        <div class="recent-post">
                            <img src="{{ $latestImg }}" alt="{{ $latest->title }}">
                            <div>
                                <h6><a href="{{ route('news.show', $latest->slug) }}">{{ Str::limit($latest->title, 45) }}</a></h6>
                                <small><i class="bi bi-calendar3"></i> {{ $latest->published_at->translatedFormat('d M Y') }}</small>
                            </div>
                        </div>
                        @empty
                        <p class="text-muted small">Belum ada berita terbaru.</p>
                        @endforelse
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
