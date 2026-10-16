<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Product - Admin NARRA</title>

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
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, sans-serif;
            background-color: var(--light-bg);
            color: var(--text-main);
            overflow-x: hidden;
            min-height: 100vh;
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

        .brand-logo:hover {
            color: var(--primary-blue-hover);
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

        .nav-link-custom.active:hover {
            background-color: var(--primary-blue-hover);
            color: #ffffff;
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

        .mobile-profile {
            border-top: 1px solid #f1f5f9;
            margin-top: 0.75rem;
            padding-top: 1rem;
        }

        /* =========================
           Main
           ========================= */

        .main-wrapper {
            margin-left: 260px;
            padding: 2.25rem 2.5rem;
            min-height: 100vh;
        }

        /* =========================
           Header
           ========================= */

        .page-title {
            font-weight: 800;
            font-size: 2.1rem;
            color: #0f172a;
            letter-spacing: -0.5px;
            margin-bottom: 0.25rem;
        }

        .page-subtitle {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        /* =========================
           Form Card
           ========================= */

        .form-card {
            background-color: #ffffff;
            border-radius: 1rem;
            border: 1px solid #f1f5f9;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            overflow: hidden;
        }

        .form-card-header {
            padding: 1.5rem 1.75rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .form-card-title {
            font-size: 1.15rem;
            font-weight: 800;
            margin-bottom: 0.25rem;
        }

        .form-card-subtitle {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-bottom: 0;
        }

        .form-card-body {
            padding: 1.75rem;
        }

        /* =========================
           Form
           ========================= */

        .form-label {
            font-weight: 700;
            font-size: 0.875rem;
            color: #334155;
        }

        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 0.6rem;
            padding: 0.7rem 0.9rem;
            font-size: 0.9rem;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(43, 102, 246, 0.15);
        }

        textarea.form-control {
            resize: vertical;
        }

        .current-image-wrapper {
            display: inline-block;
            padding: 0.4rem;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 0.65rem;
        }

        .current-image {
            width: 240px;
            height: 155px;
            object-fit: cover;
            display: block;
            border-radius: 0.4rem;
        }

        .image-help {
            color: var(--text-muted);
            font-size: 0.8rem;
            margin-top: 0.5rem;
        }

        /* =========================
           Buttons
           ========================= */

        .btn-primary-custom {
            background-color: var(--primary-blue);
            color: #ffffff;
            font-weight: 600;
            padding: 0.65rem 1.25rem;
            border-radius: 0.5rem;
            border: none;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .btn-primary-custom:hover {
            background-color: var(--primary-blue-hover);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(43, 102, 246, 0.25);
        }

        .btn-cancel {
            background-color: #ffffff;
            color: #475569;
            font-weight: 600;
            padding: 0.65rem 1.25rem;
            border-radius: 0.5rem;
            border: 1px solid #e2e8f0;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-cancel:hover {
            background-color: #f1f5f9;
            color: #334155;
        }

        /* =========================
           Responsive
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
                padding: 0.75rem 1.25rem 1min;
            }

            .mobile-menu .nav-link-custom {
                margin-bottom: 0.35rem;
            }

            .main-wrapper {
                margin-left: 0;
                padding: 1.5rem;
            }
        }

        @media (max-width: 575.98px) {

            .page-title {
                font-size: 1.7rem;
            }

            .form-card-body {
                padding: 1.25rem;
            }

            .current-image {
                width: 100%;
                max-width: 240px;
            }
        }

    </style>
</head>

<body>

<!-- =========================================
     Desktop Sidebar
========================================= -->

<aside class="sidebar">

    <div>

        <a href="{{ url('/') }}" class="brand-logo">
            Narra
        </a>

        <nav class="nav flex-column">

            <a href="{{ route('dashboard') }}" class="nav-link-custom">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin-news.index') }}" class="nav-link-custom">
                <i class="bi bi-newspaper"></i>
                <span>News</span>
            </a>

            <a href="{{ route('admin-gallery.index') }}" class="nav-link-custom active">
                <i class="bi bi-images"></i>
                <span>Gallery</span>
            </a>

            <a href="{{ route('admin-inbox.index') }}" class="nav-link-custom">
                <i class="bi bi-envelope"></i>
                <span>Inbox</span>
            </a>

            <a href="{{ route('admin-rating.index') }}" class="nav-link-custom">
                <i class="bi bi-star"></i>
                <span>Rating</span>
            </a>

            <a href="{{ route('admin-product.index') }}" class="nav-link-custom">
                <i class="bi bi-box"></i>
                <span>Product</span>
            </a>

            @can('manage-admins')
                <a href="{{ route('admin-admins.index') }}" class="nav-link-custom">
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
                        {{ auth()->user()->name }}
                    </div>

                    <div class="admin-role">
                        {{ auth()->user()->role === 'super_admin' ? 'Super Admin' : 'Admin' }}
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

            <a href="{{ url('/') }}" class="brand-logo">
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

    <div class="collapse mobile-menu" id="adminNavbar">

        <nav class="nav flex-column">

            <a href="{{ route('dashboard') }}" class="nav-link-custom">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin-news.index') }}" class="nav-link-custom">
                <i class="bi bi-newspaper"></i>
                <span>News</span>
            </a>

            <a href="{{ route('admin-gallery.index') }}" class="nav-link-custom active">
                <i class="bi bi-images"></i>
                <span>Gallery</span>
            </a>

            <a href="{{ route('admin-inbox.index') }}" class="nav-link-custom">
                <i class="bi bi-envelope"></i>
                <span>Inbox</span>
            </a>

            <a href="{{ route('admin-rating.index') }}" class="nav-link-custom">
                <i class="bi bi-star"></i>
                <span>Rating</span>
            </a>

            <a href="{{ route('admin-product.index') }}" class="nav-link-custom">
                <i class="bi bi-box"></i>
                <span>Product</span>
            </a>

            @can('manage-admins')
                <a href="{{ route('admin-admins.index') }}" class="nav-link-custom">
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
                            {{ auth()->user()->name }}
                        </div>

                        <div class="admin-role">
                            {{ auth()->user()->role === 'super_admin' ? 'Super Admin' : 'Admin' }}
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

    <!-- Page Header -->

    <div class="mb-4">

        <h1 class="page-title">
            Edit Product
        </h1>

        <p class="page-subtitle m-0">
            Perbarui data product yang sudah tersimpan.
        </p>

    </div>


    <!-- Form Card -->

    <div class="form-card">

        <div class="form-card-header">

            <h2 class="form-card-title">
                Informasi Product
            </h2>

            <p class="form-card-subtitle">
                Ubah data product yang sudah tersimpan.
            </p>

        </div>


        <div class="form-card-body">

            <form
                action="{{ route('admin-product.update', $product->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <!-- Title -->

                <div class="mb-4">

                    <label for="title" class="form-label">
                        Judul Product
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $product->title) }}"
                        placeholder="Masukkan judul product"
                    >

                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Description -->

                <div class="mb-4">

                    <label for="description" class="form-label">
                        Deskripsi
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Tulis deskripsi product..."
                    >{{ old('description', $product->description) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Current Image -->

                @if($product->image)

                    <div class="mb-4">

                        <label class="form-label d-block">
                            Gambar Saat Ini
                        </label>

                        <div class="current-image-wrapper">

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->title }}"
                                class="current-image"
                            >

                        </div>

                    </div>

                @endif


                <!-- New Image -->

                <div class="mb-4">

                    <label for="image" class="form-label">
                        Ganti Gambar
                    </label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        class="form-control @error('image') is-invalid @enderror"
                    >

                    <div class="image-help">
                        Kosongkan jika ingin tetap menggunakan gambar saat ini.
                    </div>

                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Actions -->

                <div class="d-flex gap-2 pt-2">

                    <button
                        type="submit"
                        class="btn btn-primary-custom"
                    >
                        <i class="bi bi-check-lg me-1"></i>
                        Update Product
                    </button>

                    <a
                        href="{{ route('admin-product.index') }}"
                        class="btn-cancel"
                    >
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

</main>


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>

</body>
</html>
