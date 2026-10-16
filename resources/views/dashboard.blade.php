<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ringkasan Dasbor - Admin NARRA</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- Google Fonts -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    >

    <style>
        :root {
            --primary-blue: #2b66f6;
            --primary-blue-hover: #1e52d8;
            --light-bg: #f8f9fa;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --icon-bg-blue: #eef2ff;
            --border-color: #f1f5f9;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--light-bg);
            color: var(--text-main);
            overflow-x: hidden;
        }

        /* =========================
           Sidebar
        ========================= */

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ffffff;
            border-right: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.5rem 1.25rem;
            z-index: 1000;
        }

        .brand-logo {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--primary-blue);
            text-decoration: none;
            letter-spacing: -0.5px;
            display: inline-block;
            margin-bottom: 2rem;
            padding-left: 0.75rem;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.75rem 1rem;
            color: #475569;
            font-weight: 600;
            font-size: 0.925rem;
            border-radius: 0.5rem;
            text-decoration: none;
            margin-bottom: 0.35rem;
            transition: all 0.2s ease;
        }

        .nav-link-custom i {
            font-size: 1.15rem;
        }

        .nav-link-custom:hover {
            background-color: #f1f5f9;
            color: var(--primary-blue);
        }

        .nav-link-custom.active {
            background-color: var(--primary-blue);
            color: #ffffff;
        }

        /* =========================
           Mobile Navbar
        ========================= */

        .mobile-navbar {
            display: none;
        }

        .mobile-navbar .brand-logo {
            margin: 0;
            padding: 0;
        }

        .navbar-toggler {
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 0.45rem 0.65rem;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(43, 102, 246, 0.15);
        }

        .mobile-menu {
            background-color: #ffffff;
            border-top: 1px solid #f1f5f9;
        }

        /* =========================
           Admin Profile
        ========================= */

        .admin-profile {
            padding-top: 1rem;
            border-top: 1px solid #f1f5f9;
        }

        .admin-avatar {
            width: 38px;
            height: 38px;
            background-color: var(--primary-blue);
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .admin-name {
            font-weight: 700;
            font-size: 0.9rem;
            color: #0f172a;
            line-height: 1.2;
        }

        .admin-role {
            font-size: 0.75rem;
            color: #64748b;
        }

        /* =========================
           Logout
        ========================= */

        .logout-btn {
            width: 38px;
            height: 38px;
            border: none;
            border-radius: 9px;
            background-color: #fee2e2;
            color: #ef4444;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background-color: #ef4444;
            color: #ffffff;
        }

        /* =========================
           Main
        ========================= */

        .main-wrapper {
            margin-left: 260px;
            padding: 2.25rem 2.5rem;
            min-height: 100vh;
        }

        .dashboard-title {
            font-weight: 800;
            font-size: 2.1rem;
            color: #0f172a;
            letter-spacing: -0.5px;
            margin-bottom: 0.25rem;
        }

        .dashboard-subtitle {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        /* =========================
           Buttons
        ========================= */

        .btn-custom-outline {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            color: #334155;
            font-weight: 600;
            padding: 0.6rem 1.25rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .btn-custom-outline:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            color: #0f172a;
        }

        .btn-custom-primary {
            background-color: var(--primary-blue);
            border: none;
            color: #ffffff;
            font-weight: 600;
            padding: 0.6rem 1.25rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .btn-custom-primary:hover {
            background-color: var(--primary-blue-hover);
            color: #ffffff;
        }

        /* =========================
           Stat Cards
        ========================= */

        .stat-card {
            background: #ffffff;
            border-radius: 1rem;
            padding: 1.5rem;
            border: 1px solid #f1f5f9;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            height: 100%;
        }

        .stat-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #64748b;
        }

        .stat-value {
            font-size: 2.25rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
            margin-top: 0.75rem;
        }

        .icon-box {
            width: 42px;
            height: 42px;
            border-radius: 0.6rem;
            background-color: var(--icon-bg-blue);
            color: var(--primary-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        /* =========================
           Content Cards
        ========================= */

        .content-card {
            background: #ffffff;
            border-radius: 1rem;
            padding: 1.75rem;
            border: 1px solid #f1f5f9;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            margin-bottom: 1.5rem;
        }

        .section-link {
            color: var(--primary-blue);
            font-weight: 600;
            font-size: 0.875rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .section-link:hover {
            color: var(--primary-blue-hover);
            text-decoration: underline;
        }

        /* =========================
           Messages
        ========================= */

        .message-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 0.85rem 0;
        }

        .message-item:not(:last-child) {
            border-bottom: 1px solid #f8fafc;
        }

        .avatar-icon-square {
            width: 36px;
            height: 36px;
            border-radius: 0.5rem;
            background-color: #eff6ff;
            color: var(--primary-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .message-author {
            font-weight: 700;
            font-size: 0.95rem;
            color: #0f172a;
            margin-bottom: 0.15rem;
        }

        .message-text {
            font-size: 0.875rem;
            color: #475569;
            font-weight: 600;
            margin-bottom: 0.25rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .message-time {
            font-size: 0.775rem;
            color: #94a3b8;
        }

        /* =========================
           Reviews
        ========================= */

        .review-card-item {
            background-color: #f8fafc;
            border-radius: 0.75rem;
            padding: 1rem 1.15rem;
            margin-bottom: 1rem;
        }

        .review-author {
            font-weight: 700;
            font-size: 0.925rem;
            color: #0f172a;
        }

        .review-text {
            font-size: 0.825rem;
            color: #475569;
            font-style: italic;
            margin-top: 0.4rem;
            margin-bottom: 0.75rem;
            line-height: 1.45;
        }

        .review-date {
            font-size: 0.75rem;
            color: #94a3b8;
        }

        .action-link {
            font-size: 0.775rem;
            font-weight: 600;
            text-decoration: none;
        }

        .action-link-approve {
            color: var(--primary-blue);
        }

        .action-link-delete {
            color: #ef4444;
        }

        .action-link:hover {
            text-decoration: underline;
        }

        /* =========================
           Mobile
        ========================= */

        @media (max-width: 991.98px) {

            .sidebar {
                display: none;
            }

            .mobile-navbar {
                display: block;
                position: sticky;
                top: 0;
                z-index: 1000;
                background-color: #ffffff;
                border-bottom: 1px solid #e2e8f0;
            }

            .mobile-navbar-inner {
                padding: 1rem 1.25rem;
            }

            .mobile-menu {
                padding: 0.75rem 1.25rem 1rem;
            }

            .mobile-menu .nav-link-custom {
                margin-bottom: 0.35rem;
            }

            .mobile-profile {
                border-top: 1px solid #f1f5f9;
                margin-top: 0.75rem;
                padding-top: 1rem;
            }

            .main-wrapper {
                margin-left: 0;
                padding: 1.5rem;
            }

            .dashboard-title {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 575.98px) {

            .main-wrapper {
                padding: 1.25rem;
            }

            .dashboard-title {
                font-size: 1.5rem;
            }

            .dashboard-subtitle {
                font-size: 0.85rem;
            }

            .content-card {
                padding: 1.25rem;
            }

            .btn-custom-outline,
            .btn-custom-primary {
                width: 100%;
            }
        }
    </style>
</head>

<body>

@php
    use App\Models\News;
    use App\Models\Gallery;
    use App\Models\Inbox;
    use App\Models\Rating;

    $newsCount = News::count();
    $galleryCount = Gallery::count();
    $inboxCount = Inbox::count();

    $ratingCount = Rating::count();
    $averageRating = Rating::avg('rating');

    $latestMessages = Inbox::latest()->take(3)->get();
    $latestRatings = Rating::latest()->take(2)->get();

    $latestNews = News::latest()->take(3)->get();

    $user = auth()->user();
@endphp


<!-- =========================================
     Desktop Sidebar
========================================= -->

<aside class="sidebar">

    <div>

        <a href="{{ url('/') }}" class="brand-logo">
            Narra
        </a>

        <nav class="nav flex-column">

            <a
                href="{{ route('dashboard') }}"
                class="nav-link-custom active"
            >
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>

            <a
                href="{{ route('admin-news.index') }}"
                class="nav-link-custom"
            >
                <i class="bi bi-newspaper"></i>
                <span>News</span>
            </a>

            <a
                href="{{ route('admin-gallery.index') }}"
                class="nav-link-custom"
            >
                <i class="bi bi-images"></i>
                <span>Gallery</span>
            </a>

            <a
                href="{{ route('admin-inbox.index') }}"
                class="nav-link-custom"
            >
                <i class="bi bi-envelope"></i>
                <span>Inbox</span>
            </a>

            <a
                href="{{ route('admin-rating.index') }}"
                class="nav-link-custom"
            >
                <i class="bi bi-star"></i>
                <span>Rating</span>
            </a>

            <a
                href="{{ route('admin-product.index') }}"
                class="nav-link-custom"
            >
                <i class="bi bi-box"></i>
                <span>Product</span>
            </a>
            @can('manage-admins')
                <a
                    href="{{ route('admin-admins.index') }}"
                    class="nav-link-custom"
                >
                    <i class="bi bi-gear"></i>
                    <span>Akun</span>
                </a>
            @endcan

        </nav>

    </div>


    <!-- Desktop Admin Profile -->

    <div class="admin-profile">

        <div class="d-flex align-items-center justify-content-between gap-3">

            <div class="d-flex align-items-center gap-3 flex-grow-1 overflow-hidden">

                <div class="admin-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>

                <div class="overflow-hidden">

                    <div class="admin-name text-truncate">
                        {{ $user->name }}
                    </div>

                    <div class="admin-role">
                        {{ $user->role === 'super_admin' ? 'Super Admin' : 'Admin' }}
                    </div>

                </div>

            </div>

            <form
                method="POST"
                action="{{ route('logout') }}"
                class="flex-shrink-0"
            >
                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                    title="Keluar"
                    aria-label="Keluar"
                >
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>

        </div>

    </div>

</aside>


<!-- =========================================
     Mobile Navbar
========================================= -->

<nav class="mobile-navbar navbar">

    <div class="container-fluid mobile-navbar-inner">

        <div class="d-flex align-items-center justify-content-between w-100">

            <a
                href="{{ url('/') }}"
                class="brand-logo"
            >
                Narra
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#adminNavbar"
                aria-controls="adminNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>

    </div>


    <!-- Collapsed Menu -->

    <div
        class="collapse mobile-menu"
        id="adminNavbar"
    >

        <nav class="nav flex-column">

            <a
                href="{{ route('dashboard') }}"
                class="nav-link-custom active"
            >
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>

            <a
                href="{{ route('admin-news.index') }}"
                class="nav-link-custom"
            >
                <i class="bi bi-newspaper"></i>
                <span>News</span>
            </a>

            <a
                href="{{ route('admin-gallery.index') }}"
                class="nav-link-custom"
            >
                <i class="bi bi-images"></i>
                <span>Gallery</span>
            </a>

            <a
                href="{{ route('admin-inbox.index') }}"
                class="nav-link-custom"
            >
                <i class="bi bi-envelope"></i>
                <span>Inbox</span>
            </a>

            <a
                href="{{ route('admin-rating.index') }}"
                class="nav-link-custom"
            >
                <i class="bi bi-star"></i>
                <span>Rating</span>
            </a>

            <a
                href="{{ route('admin-product.index') }}"
                class="nav-link-custom"
            >
                <i class="bi bi-box"></i>
                <span>Product</span>
            </a>
            @can('manage-admins')
                <a
                    href="{{ route('admin-admins.index') }}"
                    class="nav-link-custom"
                >
                    <i class="bi bi-gear"></i>
                    <span>Akun</span>
                </a>
            @endcan

        </nav>


        <!-- Mobile Profile -->

        <div class="mobile-profile">

            <div class="d-flex align-items-center justify-content-between gap-3">

                <div class="d-flex align-items-center gap-3 flex-grow-1 overflow-hidden">

                    <div class="admin-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div class="overflow-hidden">

                        <div class="admin-name text-truncate">
                            {{ $user->name }}
                        </div>

                        <div class="admin-role">
                            {{ $user->role === 'super_admin' ? 'Super Admin' : 'Admin' }}
                        </div>

                    </div>

                </div>

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                    class="flex-shrink-0"
                >
                    @csrf

                    <button
                        type="submit"
                        class="logout-btn"
                        title="Keluar"
                        aria-label="Keluar"
                    >
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>

            </div>

        </div>

    </div>

</nav>


<!-- =========================================
     Main Content
========================================= -->

<main class="main-wrapper">

    <!-- Header -->

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

        <div>

            <h1 class="dashboard-title">
                Ringkasan Dasbor
            </h1>

            <p class="dashboard-subtitle m-0">
                Ringkasan data operasional website & konten publikasi
            </p>

        </div>

        <div class="d-flex gap-2">

            <a
                href="{{ route('admin-gallery.create') }}"
                class="btn btn-custom-outline"
            >
                <i class="bi bi-cloud-arrow-up me-1"></i>
                Upload Galeri
            </a>

            <a
                href="{{ route('admin-news.create') }}"
                class="btn btn-custom-primary"
            >
                <i class="bi bi-plus-lg me-1"></i>
                Tambah Berita Baru
            </a>

        </div>

    </div>


    <!-- Statistics -->

    <div class="row g-3 mb-4">

        <!-- News -->

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="d-flex justify-content-between align-items-center">

                    <span class="stat-label">
                        Total Berita
                    </span>

                    <div class="icon-box">
                        <i class="bi bi-newspaper"></i>
                    </div>

                </div>

                <div class="stat-value">
                    {{ $newsCount }}
                </div>

            </div>

        </div>


        <!-- Gallery -->

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="d-flex justify-content-between align-items-center">

                    <span class="stat-label">
                        Item Galeri
                    </span>

                    <div class="icon-box">
                        <i class="bi bi-image"></i>
                    </div>

                </div>

                <div class="stat-value">
                    {{ $galleryCount }}
                </div>

            </div>

        </div>


        <!-- Inbox -->

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="d-flex justify-content-between align-items-center">

                    <span class="stat-label">
                        Pesan Masuk
                    </span>

                    <div class="icon-box">
                        <i class="bi bi-envelope"></i>
                    </div>

                </div>

                <div class="stat-value">
                    {{ $inboxCount }}
                </div>

            </div>

        </div>


        <!-- Rating -->

        <div class="col-12 col-sm-6 col-xl-3">

            <div class="stat-card">

                <div class="d-flex justify-content-between align-items-center">

                    <span class="stat-label">
                        Rata-rata Rating
                    </span>

                    <div class="icon-box">
                        <i class="bi bi-star-fill"></i>
                    </div>

                </div>

                <div class="stat-value">

                    {{ $averageRating ? number_format($averageRating, 2) : '0.00' }}

                    <span style="font-size: 1.1rem; color: #94a3b8; font-weight: 500;">
                        / 5.0
                    </span>

                </div>

            </div>

        </div>

    </div>


    <!-- Main Grid -->

    <div class="row g-4">

        <!-- Left -->

        <div class="col-12 col-lg-8">

            <!-- Latest Inbox -->

            <div class="content-card">

                <div class="d-flex justify-content-between align-items-start mb-3">

                    <div class="d-flex align-items-center gap-3">

                        <div class="icon-box">
                            <i class="bi bi-inbox-fill"></i>
                        </div>

                        <div>

                            <h5
                                class="fw-bold mb-1"
                                style="font-size: 1.05rem; color: #0f172a;"
                            >
                                Pesan Masuk Terbaru
                            </h5>

                            <p class="text-muted small m-0">
                                Pesan terbaru dari pengunjung website
                            </p>

                        </div>

                    </div>

                    <a
                        href="{{ route('admin-inbox.index') }}"
                        class="section-link"
                    >
                        Buka Semua
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>


                <div class="mt-4">

                    @forelse ($latestMessages as $message)

                        <div class="message-item">

                            <div class="avatar-icon-square">
                                {{ strtoupper(substr($message->name ?? '?', 0, 1)) }}
                            </div>

                            <div class="flex-grow-1 overflow-hidden">

                                <div class="message-author">
                                    {{ $message->name ?? 'Tanpa Nama' }}
                                </div>

                                <div class="message-text">
                                    {{ $message->message ?? '-' }}
                                </div>

                                <div class="message-time">
                                    {{ $message->created_at->format('d M Y, H:i') }}
                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-4 text-muted">

                            <i class="bi bi-inbox fs-2 d-block mb-2"></i>

                            Belum ada pesan masuk.

                        </div>

                    @endforelse

                </div>

            </div>


            <!-- Latest News -->

            <div class="content-card mb-0">

                <div class="d-flex justify-content-between align-items-center">

                    <div class="d-flex align-items-center gap-3">

                        <div class="icon-box">
                            <i class="bi bi-file-earmark-text-fill"></i>
                        </div>

                        <div>

                            <h5
                                class="fw-bold mb-1"
                                style="font-size: 1.05rem; color: #0f172a;"
                            >
                                Berita Terbaru
                            </h5>

                            <p class="text-muted small m-0">
                                Artikel dan publikasi terbaru NARRA
                            </p>

                        </div>

                    </div>

                    <a
                        href="{{ route('admin-news.index') }}"
                        class="section-link"
                    >
                        Kelola Berita
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>


                @if ($latestNews->count())

                    <div class="mt-4">

                        @foreach ($latestNews as $news)

                            <div class="message-item">

                                <div class="avatar-icon-square">
                                    <i class="bi bi-newspaper"></i>
                                </div>

                                <div class="flex-grow-1 overflow-hidden">

                                    <div class="message-author">
                                        {{ $news->title }}
                                    </div>

                                    <div class="message-text">
                                        {{ $news->description ?? 'Tidak ada deskripsi.' }}
                                    </div>

                                    <div class="message-time">
                                        {{ $news->created_at->format('d M Y, H:i') }}
                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="text-center py-4 text-muted">
                        Belum ada berita.
                    </div>

                @endif

            </div>

        </div>


        <!-- Right -->

        <div class="col-12 col-lg-4">

            <div class="content-card h-100 d-flex flex-column justify-content-between">

                <div>

                    <div class="mb-3">

                        <h5
                            class="fw-bold mb-1"
                            style="font-size: 1.05rem; color: #0f172a;"
                        >
                            Ulasan & Rating

                            <span
                                style="font-size: 0.75rem; color: #94a3b8; font-weight: 500;"
                            >
                                ({{ $ratingCount }} Voters)
                            </span>

                        </h5>

                        <p class="text-muted small m-0">
                            Suara pengunjung website
                        </p>

                    </div>


                    @forelse ($latestRatings as $rating)

                        <div class="review-card-item">

                            <div class="d-flex justify-content-between align-items-center">

                                <span class="review-author">
                                    {{ $rating->name ?? 'Anonim' }}
                                </span>

                                <div
                                    class="text-warning small"
                                    style="letter-spacing: 1px;"
                                >

                                    @for ($i = 1; $i <= 5; $i++)

                                        @if ($i <= $rating->rating)
                                            <i class="bi bi-star-fill"></i>
                                        @else
                                            <i class="bi bi-star"></i>
                                        @endif

                                    @endfor

                                </div>

                            </div>


                            <p class="review-text">
                                "{{ $rating->message ?? 'Tidak ada pesan.' }}"
                            </p>


                            <div class="d-flex justify-content-between align-items-center">

                                <span class="review-date">
                                    {{ $rating->created_at->format('d M Y') }}
                                </span>

                                <a
                                    href="{{ route('admin-rating.index', $rating) }}"
                                    class="action-link action-link-approve"
                                >
                                    Lihat
                                </a>

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-4 text-muted">

                            <i class="bi bi-star fs-2 d-block mb-2"></i>

                            Belum ada rating.

                        </div>

                    @endforelse

                </div>


                <div class="text-center mt-3">

                    <a
                        href="{{ route('admin-rating.index') }}"
                        class="section-link"
                    >
                        Kelola Semua Rating
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

</main>


<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

