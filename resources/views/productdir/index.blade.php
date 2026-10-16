<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Product - Admin NARRA</title>

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
            --danger-red: #dc2626;
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
           Add Button
           ========================= */

        .btn-add-product {
            background-color: var(--primary-blue);
            color: #ffffff;
            font-weight: 600;
            padding: 0.65rem 1.25rem;
            border-radius: 0.5rem;
            border: none;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-add-product:hover {
            background-color: var(--primary-blue-hover);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(43, 102, 246, 0.25);
        }

        /* =========================
           Product Card
           ========================= */

        .product-card {
            background-color: #ffffff;
            border-radius: 1rem;
            border: 1px solid #f1f5f9;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            overflow: hidden;
        }

        /* =========================
           Product Item
           ========================= */

        .product-item {
            padding: 1.25rem 1.75rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .product-item:last-child {
            border-bottom: none;
        }

        .product-image {
            width: 180px;
            height: 115px;
            object-fit: cover;
            border-radius: 0.75rem;
            border: 1px solid var(--border-color);
            display: block;
        }

        .no-image {
            width: 180px;
            height: 115px;
            background-color: #f1f5f9;
            color: var(--text-muted);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .product-title {
            font-size: 1rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 0.4rem;
        }

        .product-description {
            color: var(--text-muted);
            font-size: 0.85rem;
            line-height: 1.6;
            margin-bottom: 0;
        }

        .product-date {
            color: var(--text-muted);
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* =========================
           Actions
           ========================= */

        .action-btn-edit {
            color: var(--primary-blue);
            font-weight: 600;
            text-decoration: none;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .action-btn-edit:hover {
            color: var(--primary-blue-hover);
            text-decoration: underline;
        }

        .action-btn-delete {
            color: var(--danger-red);
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .action-btn-delete:hover {
            color: #b91c1c;
            text-decoration: underline;
        }

        /* =========================
           Empty State
           ========================= */

        .empty-state {
            padding: 3.5rem 1.75rem;
            text-align: center;
        }

        .empty-icon {
            width: 56px;
            height: 56px;
            background-color: #f1f5f9;
            color: var(--text-muted);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.4rem;
        }

        .empty-title {
            font-size: 1rem;
            font-weight: 800;
            margin-bottom: 0.35rem;
        }

        .empty-text {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-bottom: 1.25rem;
        }

        /* =========================
           Pagination
           ========================= */

        .pagination-wrapper {
            padding: 1.25rem 1.75rem;
            border-top: 1px solid #f1f5f9;
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
                padding: 0.75rem 1.25rem 1rem;
            }

            .mobile-menu .nav-link-custom {
                margin-bottom: 0.35rem;
            }

            .main-wrapper {
                margin-left: 0;
                padding: 1.5rem;
            }

            .product-item {
                padding: 1.25rem;
            }
        }

        @media (max-width: 575.98px) {

            .page-title {
                font-size: 1.7rem;
            }

            .product-image,
            .no-image {
                width: 100%;
                height: 180px;
            }

            .product-item .row {
                gap: 1rem;
            }

            .pagination-wrapper {
                padding: 1.25rem;
            }
        }

        /* =========================
           Search
           ========================= */

        .search-container {
            position: relative;
            max-width: 380px;
            margin-bottom: 1.5rem;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 0.95rem;
        }

        .search-input {
            width: 100%;
            padding: 0.65rem 1rem 0.65rem 2.6rem;
            background-color: #ffffff;
            border: 1px solid transparent;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: #334155;
            outline: none;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
            transition: all 0.2s ease;
        }

        .search-input::placeholder {
            color: #94a3b8;
        }

        .search-input:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(43, 102, 246, 0.12);
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

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

        <div>

            <h1 class="page-title">
                Kelola Product
            </h1>

            <p class="page-subtitle m-0">
                Dokumentasi produk NARRA.
            </p>

        </div>


        <div>

            <a
                href="{{ route('admin-product.create') }}"
                class="btn-add-product"
            >
                <i class="bi bi-plus-lg"></i>
                <span>Tambah Product</span>
            </a>

        </div>

    </div>


    <div class="search-container">
        <i class="bi bi-search search-icon"></i>
        <input
            type="text"
            id="productSearch"
            class="search-input"
            placeholder="Cari judul atau deskripsi product..."
            aria-label="Cari product"
        >
    </div>


    <!-- Product Card -->

    <div class="product-card">

        @forelse ($product as $item)

            <div class="product-item product-row">

                <div class="row align-items-center g-4">

                    <!-- Image -->

                    <div class="col-md-3">

                        @if ($item->image)

                            <img
                                src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->title }}"
                                class="product-image"
                            >

                        @else

                            <div class="no-image">
                                No Image
                            </div>

                        @endif

                    </div>


                    <!-- Content -->

                    <div class="col-md-6">

                        <div class="product-title">
                            {{ $item->title }}
                        </div>

                        @if ($item->description)

                            <p class="product-description">
                                {{ Str::limit($item->description, 120) }}
                            </p>

                        @endif

                    </div>


                    <!-- Date + Actions -->

                    <div class="col-md-3">

                        <div class="d-flex flex-column align-items-md-end gap-2">

                            <div class="product-date">
                                {{ $item->created_at->format('d M Y') }}
                            </div>

                            <div class="d-flex gap-3 align-items-center">

                                <a
                                    href="{{ route('admin-product.edit', $item->id) }}"
                                    class="action-btn-edit"
                                >
                                    <i class="bi bi-pencil"></i>
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin-product.destroy', $item->id) }}"
                                    method="POST"
                                    class="d-inline"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-btn-delete border-0 bg-transparent p-0"
                                        onclick="return confirm('Yakin ingin menghapus product ini?')"
                                    >
                                        <i class="bi bi-trash"></i>
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <!-- Empty State -->

            <div class="empty-state">

                <div class="empty-icon">
                    <i class="bi bi-box"></i>
                </div>

                <div class="empty-title">
                    Belum ada product
                </div>

                <p class="empty-text">
                    Belum ada product yang ditambahkan ke product.
                </p>

                <a
                    href="{{ route('admin-product.create') }}"
                    class="btn-add-product"
                >
                    <i class="bi bi-plus-lg"></i>
                    <span>Tambah Product</span>
                </a>

            </div>

        @endforelse


        <!-- Pagination -->

        @if ($product->hasPages())

            <div class="pagination-wrapper">
                {{ $product->links() }}
            </div>

        @endif

    </div>

</main>


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>

</body>
</html>

<script>
    document.getElementById('productSearch').addEventListener('input', function () {
        const search = this.value.toLowerCase().trim();
        const items = document.querySelectorAll('.product-row');

        items.forEach(function (item) {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(search) ? '' : 'none';
        });
    });
</script>
