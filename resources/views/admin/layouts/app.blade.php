<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') — MTS Negeri 2 Kotabaru</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-bg: #0f1b2d;
            --sidebar-hover: #1a2d45;
            --sidebar-active: #198754;
            --topbar-height: 60px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
        }

        /* ── Sidebar ── */
        #sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: var(--sidebar-bg);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1040;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        #sidebar .sidebar-brand {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            min-height: var(--topbar-height);
        }

        #sidebar .sidebar-brand img {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            object-fit: contain;
        }

        #sidebar .sidebar-brand span {
            color: white;
            font-weight: 700;
            font-size: 0.95rem;
            line-height: 1.3;
        }

        #sidebar .sidebar-brand small {
            color: rgba(255,255,255,0.45);
            font-size: 0.7rem;
            display: block;
        }

        .sidebar-nav {
            flex: 1;
            padding: 1rem 0;
            overflow-y: auto;
        }

        .sidebar-section-label {
            color: rgba(255,255,255,0.3);
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding: 0.75rem 1.5rem 0.25rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 1.5rem;
            color: rgba(255,255,255,0.65);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-link i {
            width: 20px;
            font-size: 1.05rem;
            text-align: center;
        }

        .sidebar-link:hover {
            color: white;
            background: var(--sidebar-hover);
        }

        .sidebar-link.active {
            color: white;
            background: rgba(25,135,84,0.15);
            border-left-color: var(--sidebar-active);
        }

        .sidebar-link .badge {
            margin-left: auto;
            font-size: 0.65rem;
        }

        .sidebar-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        .sidebar-footer .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-footer .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--sidebar-active);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .sidebar-footer .user-name {
            color: white;
            font-size: 0.825rem;
            font-weight: 600;
            line-height: 1.2;
        }

        .sidebar-footer .user-role {
            color: rgba(255,255,255,0.4);
            font-size: 0.7rem;
        }

        /* ── Main Content ── */
        #main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease;
        }

        /* ── Top Bar ── */
        #topbar {
            height: var(--topbar-height);
            background: white;
            border-bottom: 1px solid #e5eaf0;
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            gap: 1rem;
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        #topbar .topbar-title {
            font-weight: 600;
            font-size: 1rem;
            color: #1a1a2e;
        }

        #topbar .topbar-subtitle {
            font-size: 0.75rem;
            color: #6c757d;
        }

        /* ── Page Content ── */
        .page-content {
            flex: 1;
            padding: 1.5rem;
        }

        /* ── Stat Cards ── */
        .stat-card {
            background: white;
            border-radius: 14px;
            padding: 1.5rem;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            border: 1px solid #f0f4f8;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        /* ── Content Card ── */
        .content-card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            border: 1px solid #f0f4f8;
        }

        .content-card .card-header {
            background: transparent;
            border-bottom: 1px solid #f0f4f8;
            padding: 1.25rem 1.5rem;
            font-weight: 600;
        }

        .content-card .card-body {
            padding: 1.5rem;
        }

        /* ── Sidebar Overlay (mobile) ── */
        #sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1035;
        }

        /* ── Responsive ── */
        @media (max-width: 991.98px) {
            #sidebar {
                transform: translateX(-100%);
            }

            #sidebar.show {
                transform: translateX(0);
            }

            #main-content {
                margin-left: 0 !important;
            }

            #sidebar-overlay.show {
                display: block;
            }
        }
    </style>

    @yield('styles')
</head>
<body>

    <!-- Sidebar Overlay (mobile) -->
    <div id="sidebar-overlay"></div>

    <!-- ── Sidebar ── -->
    <nav id="sidebar">
        <!-- Brand -->
        <div class="sidebar-brand">
            <img src="{{ asset('assets/foto/logo-sekolah.png') }}" alt="Logo">
            <div>
                <span>Admin Panel<small>MTS Negeri 2 Kotabaru</small></span>
            </div>
        </div>

        <!-- Navigation -->
        <div class="sidebar-nav">
            <div class="sidebar-section-label">Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="sidebar-section-label">Konten</div>
            <a href="{{ route('admin.berita.index') }}" class="sidebar-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i> Berita
                <span class="badge bg-success rounded-pill">4</span>
            </a>
            <a href="{{ route('admin.agenda.index') }}" class="sidebar-link {{ request()->routeIs('admin.agenda.*') ? 'active' : '' }}">
                <i class="bi bi-calendar-event"></i> Agenda
            </a>
            <a href="{{ route('admin.pengumuman.index') }}" class="sidebar-link {{ request()->routeIs('admin.pengumuman.*') ? 'active' : '' }}">
                <i class="bi bi-megaphone"></i> Pengumuman
            </a>
            <a href="{{ route('admin.osis.index') }}" class="sidebar-link {{ request()->routeIs('admin.osis.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> OSIS
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="sidebar-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                <i class="bi bi-images"></i> Galeri
            </a>

            <div class="sidebar-section-label">Akademik</div>
            <a href="{{ route('admin.siswa.index') }}" class="sidebar-link {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Data Siswa
            </a>
            <a href="{{ route('admin.prestasi.index') }}" class="sidebar-link {{ request()->routeIs('admin.prestasi.*') ? 'active' : '' }}">
                <i class="bi bi-trophy"></i> Prestasi
            </a>
            <a href="{{ route('admin.ppdb.index') }}" class="sidebar-link {{ request()->routeIs('admin.ppdb.*') ? 'active' : '' }}">
                <i class="bi bi-person-plus"></i> PPDB
                <span class="badge bg-warning text-dark rounded-pill">3</span>
            </a>

            <div class="sidebar-section-label">Sistem</div>
            <a href="{{ route('admin.profil.index') }}" class="sidebar-link {{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
                <i class="bi bi-building"></i> Profil Sekolah
            </a>
            <a href="{{ route('admin.pengguna.index') }}" class="sidebar-link {{ request()->routeIs('admin.pengguna.*') ? 'active' : '' }}">
                <i class="bi bi-person-gear"></i> Pengguna
            </a>
            <a href="{{ url('/') }}" target="_blank" class="sidebar-link">
                <i class="bi bi-box-arrow-up-right"></i> Lihat Website
            </a>
        </div>

        <!-- Footer -->
        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="flex-grow-1 overflow-hidden">
                    <div class="user-name text-truncate">{{ Auth::user()->name }}</div>
                    <div class="user-role">Administrator</div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm p-0 border-0" style="background:transparent;"
                        title="Logout">
                        <i class="bi bi-box-arrow-right text-danger fs-5"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- ── Main Content ── -->
    <div id="main-content">

        <!-- Top Bar -->
        <div id="topbar">
            <!-- Hamburger (mobile) -->
            <button class="btn btn-sm d-lg-none me-2 p-1" id="sidebar-toggle" style="border:none;">
                <i class="bi bi-list fs-4"></i>
            </button>

            <!-- Title -->
            <div class="flex-grow-1">
                <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
                <div class="topbar-subtitle">@yield('page-subtitle', 'Panel Admin MTS Negeri 2 Kotabaru')</div>
            </div>

            <!-- Right Side -->
            <div class="d-flex align-items-center gap-3">
                <!-- Notifications -->
                <div class="dropdown">
                    <button class="btn btn-sm position-relative" id="notifBtn" data-bs-toggle="dropdown">
                        <i class="bi bi-bell fs-5 text-secondary"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            style="font-size:0.55rem;">3</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0" style="width:300px;">
                        <li class="dropdown-header fw-semibold py-2 px-3 border-bottom">Notifikasi</li>
                        <li>
                            <a class="dropdown-item py-2 px-3" href="#">
                                <div class="d-flex gap-2">
                                    <i class="bi bi-person-plus text-success mt-1"></i>
                                    <div>
                                        <div class="small fw-semibold">Pendaftar PPDB baru</div>
                                        <div class="text-muted" style="font-size:0.75rem;">3 menit lalu</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2 px-3" href="#">
                                <div class="d-flex gap-2">
                                    <i class="bi bi-chat-dots text-primary mt-1"></i>
                                    <div>
                                        <div class="small fw-semibold">Pesan kontak masuk</div>
                                        <div class="text-muted" style="font-size:0.75rem;">15 menit lalu</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="border-top">
                            <a class="dropdown-item text-center small text-success py-2" href="#">Lihat semua</a>
                        </li>
                    </ul>
                </div>

                <!-- User Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-sm d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                        <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold"
                            style="width:32px;height:32px;font-size:0.8rem;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <span class="d-none d-md-block small fw-semibold">{{ Auth::user()->name }}</span>
                        <i class="bi bi-chevron-down small text-muted"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil Saya</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Pengaturan</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="text-center py-3 border-top bg-white mt-auto">
            <small class="text-muted">© {{ date('Y') }} MTS Negeri 2 Kotabaru · Admin Panel</small>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sidebar toggle for mobile
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        sidebarToggle?.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
    </script>

    @yield('scripts')
</body>
</html>
