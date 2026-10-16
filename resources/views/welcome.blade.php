<x-public.layout
    title="Narra - Setiap Siswa Punya Cerita"
    navbarVariant="landing"
    :container="false"
    :footer="false"
>

    @push('head')
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @endpush

    @push('styles')
        <style>
            /* Page-specific landing styles.
               Shared navbar / footer / base typography live in css/public.css */
            :root {
                --bs-body-color: #334155;
                --bs-heading-color: #0f172a;
            }

            html {
                scroll-behavior: smooth;
                scroll-padding-top: 100px;
            }

            body {
                overflow-x: hidden;
            }

            .btn-primary {
                background-color: var(--bs-primary);
                border-color: var(--bs-primary);
                padding: 0.6rem 1.4rem;
                font-weight: 500;
                border-radius: 0.5rem;
                transition: all 0.2s ease-in-out;
            }

            .btn-primary:hover {
                background-color: var(--bs-primary-hover);
                border-color: var(--bs-primary-hover);
            }

            .btn-outline-custom {
                border: 1px solid #e2e8f0;
                color: #475569;
                background-color: #ffffff;
                padding: 0.6rem 1.4rem;
                font-weight: 500;
                border-radius: 0.5rem;
                transition: all 0.2s ease-in-out;
            }

            .btn-outline-custom:hover {
                background-color: #f8fafc;
                color: #0f172a;
                border-color: #cbd5e1;
            }

            .text-primary-custom {
                color: var(--bs-primary) !important;
            }

            .badge-soft-primary {
                background-color: #eff6ff;
                color: var(--bs-primary);
                font-weight: 600;
                font-size: 0.8rem;
                letter-spacing: 0.05em;
                text-transform: uppercase;
                padding: 0.4rem 0.8rem;
                border-radius: 2rem;
                display: inline-block;
            }

            /* Hero */
            .hero-section {
                padding: 5rem 0 3rem;
            }

            .hero-title {
                font-size: 3rem;
                font-weight: 800;
                letter-spacing: -0.02em;
                line-height: 1.2;
            }

            /* Stats */
            .stats-section {
                padding: 3rem 0;
                border-top: 1px solid #f1f5f9;
                border-bottom: 1px solid #f1f5f9;
            }

            .stat-value {
                font-size: 2.25rem;
                font-weight: 800;
                color: var(--bs-primary);
                line-height: 1;
            }

            .stat-label {
                font-size: 0.75rem;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                color: #94a3b8;
                margin-top: 0.5rem;
            }

            .divider-vertical {
                border-right: 1px solid #e2e8f0;
            }

            /* Feature Cards */
            .card-feature {
                background: #f8fafc;
                border: 1px solid #f1f5f9;
                border-radius: 1rem;
                padding: 2rem;
                height: 100%;
                transition: transform 0.2s, box-shadow 0.2s;
            }

            .card-feature:hover {
                transform: translateY(-4px);
                box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
            }

            .icon-box {
                width: 42px;
                height: 42px;
                border-radius: 0.6rem;
                background-color: #dbeafe;
                color: var(--bs-primary);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.2rem;
                margin-bottom: 1.25rem;
            }

            /* News Cards */
            .card-news {
                border: 1px solid #f1f5f9;
                border-radius: 0.8rem;
                overflow: hidden;
                background: #fff;
                transition: transform 0.2s, box-shadow 0.2s;
                height: 100%;
            }

            .card-news:hover {
                transform: translateY(-3px);
                box-shadow: 0 10px 25px -10px rgba(0, 0, 0, 0.08);
            }

            .card-news img {
                height: 180px;
                object-fit: cover;
                width: 100%;
            }

            .news-date {
                font-size: 0.75rem;
                color: #94a3b8;
            }

            /* Gallery */
            .gallery-item {
                position: relative;
                border-radius: 0.8rem;
                overflow: hidden;
                height: 100%;
                min-height: 220px;
            }

            .gallery-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.3s;
            }

            .gallery-item:hover img {
                transform: scale(1.03);
            }

            /* Contact */
            .contact-section {
                background-color: #1e52f0;
                color: white;
                padding: 5rem 0 3rem;
            }

            .contact-card {
                background: white;
                border-radius: 1rem;
                padding: 2rem;
                color: var(--bs-body-color);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            }

            .form-control,
            .form-select {
                padding: 0.75rem 1rem;
                border-color: #cbd5e1;
                border-radius: 0.5rem;
            }

            .form-control:focus,
            .form-select:focus {
                border-color: var(--bs-primary);
                box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
            }

            /* Rating */
            .rating-section {
                background-color: #f8fafc;
            }

            .rating-card {
                background: #ffffff;
                border: 1px solid #f1f5f9;
                border-radius: 1rem;
                padding: 2rem;
                box-shadow: 0 10px 25px -10px rgba(0, 0, 0, 0.05);
            }

            .rating-stars {
                color: #f59e0b;
            }

            /* Footer */
            .footer-bottom {
                border-top: 1px solid rgba(255, 255, 255, 0.2);
                padding-top: 2rem;
                margin-top: 4rem;
                font-size: 0.875rem;
                color: rgba(255, 255, 255, 0.8);
            }

            @media (max-width: 768px) {
                .hero-title {
                    font-size: 2.3rem;
                }

                .divider-vertical {
                    border-right: none;
                }
            }

            /* Rating + Map */
            .rating-layout {
                display: flex;
                gap: 2rem;
                align-items: stretch;
            }

            .rating-map {
                width: 50%;
                min-height: 100%;
                border-radius: 1rem;
                overflow: hidden;
                box-shadow: 0 10px 25px -10px rgba(0, 0, 0, 0.05);
                background-color: #ffffff;
            }

            .rating-map iframe {
                width: 100%;
                height: 100%;
                min-height: 520px;
                display: block;
                border: 0;
            }

            .rating-form-wrapper {
                width: 50%;
            }

            @media (max-width: 991.98px) {
                .rating-layout {
                    flex-direction: column;
                }

                .rating-map,
                .rating-form-wrapper {
                    width: 100%;
                }

                .rating-map iframe {
                    min-height: 400px;
                }
            }
        </style>
    @endpush

    <!-- Hero Section -->
    <section class="hero-section text-center" id="home">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-9 col-xl-8">

                    <span class="badge-soft-primary mb-3">
                        Pendidikan untuk Masa Depan
                    </span>

                    <h1 class="hero-title mb-4">
                        Setiap Siswa Punya Cerita.
                    </h1>

                    <p
                        class="lead text-secondary mb-4 px-md-4"
                        style="font-size: 1.1rem; line-height: 1.6;"
                    >
                        Jelajahi pengalaman di Narra melalui kisah pembelajaran,
                        kreativitas, prestasi, dan kebersamaan yang membentuk
                        masa depan setiap individu.
                    </p>

                    <div class="d-flex justify-content-center gap-3">

                        <a href="#programs" class="btn btn-primary">
                            Mulai Jelajahi
                        </a>

                        <a href="#about" class="btn btn-outline-custom">
                            Pelajari Lebih Lanjut
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- Stats Section -->
    <section class="stats-section my-4">

        <div class="container">

            <div class="row text-center gy-4">

                <div class="col-md-4 divider-vertical">

                    <div class="stat-value">
                        98%
                    </div>

                    <div class="stat-label">
                        Tingkat Kelulusan
                    </div>

                </div>

                <div class="col-md-4 divider-vertical">

                    <div class="stat-value">
                        50+
                    </div>

                    <div class="stat-label">
                        Program & Komunitas
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="stat-value">
                        20:1
                    </div>

                    <div class="stat-label">
                        Rasio Guru & Siswa
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- About Section -->
    <section id="about" class="py-5 my-4 text-center">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <span class="badge-soft-primary mb-3">
                        Tentang Kami
                    </span>

                    <h2 class="fw-bold mb-4" style="font-size: 2.25rem;">
                        Membentuk Masa Depan melalui Pendidikan
                    </h2>

                    <p
                        class="text-secondary"
                        style="line-height: 1.7; font-size: 1.05rem;"
                    >
                        Narra hadir untuk menyediakan pendidikan berstandar
                        tinggi modern. Kami memadukan kemajuan kurikulum
                        teknologi dengan lingkungan belajar yang mendukung.
                        Keterampilan praktis, kreativitas, dan karakter
                        dibangun bersama untuk membantu menghadapi dunia
                        yang terus berkembang.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- Programs Section -->
    <section id="programs" class="py-5 bg-light-subtle">

        <div class="container">

            <div class="text-center mb-5">

                <span class="badge-soft-primary mb-2">
                    Program Keahlian
                </span>

                <h2 class="fw-bold fs-2">
                    Temukan Bidangmu. Bangun Ceritamu.
                </h2>

                <p class="text-secondary">
                    Pilih alur pembelajaran yang sesuai dengan minat
                    dan potensi masa depan digital Anda.
                </p>

            </div>

            <div class="row g-4">

                <!-- Program 1 -->
                <div class="col-md-4">

                    <div class="card-feature">

                        <div class="icon-box">
                            <i class="bi bi-code-slash"></i>
                        </div>

                        <h5 class="fw-bold mb-2">
                            Software Engineering (RPL)
                        </h5>

                        <p class="text-secondary small mb-0">
                            Fokus pada rekayasa perangkat lunak,
                            pemrograman web & mobile, arsitektur sistem
                            modern, serta algoritma tingkat lanjut.
                        </p>

                    </div>

                </div>


                <!-- Program 2 -->
                <div class="col-md-4">

                    <div class="card-feature">

                        <div class="icon-box">
                            <i class="bi bi-cpu"></i>
                        </div>

                        <h5 class="fw-bold mb-2">
                            AI & Machine Learning
                        </h5>

                        <p class="text-secondary small mb-0">
                            Pengembangan kecerdasan buatan, pemrosesan
                            bahasa alami (NLP), data science, serta
                            implementasi otomasi cerdas.
                        </p>

                    </div>

                </div>


                <!-- Program 3 -->
                <div class="col-md-4">

                    <div class="card-feature">

                        <div class="icon-box">
                            <i class="bi bi-shield-check"></i>
                        </div>

                        <h5 class="fw-bold mb-2">
                            Network & Ethical Hacking
                        </h5>

                        <p class="text-secondary small mb-0">
                            Infrastruktur cloud computing, jaringan
                            komputer, keamanan siber, enkripsi data,
                            dan analisis kerentanan sistem.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- Product Section -->
    <section id="products" class="py-5">
        <div class="container">

            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <span class="badge-soft-primary mb-2">
                        Solusi Kami
                    </span>

                    <h2 class="fw-bold mb-1 fs-2">
                        Produk Kami
                    </h2>

                    <p class="text-secondary small mb-0">
                        Kenali berbagai produk dan solusi yang kami tawarkan
                        untuk mendukung kebutuhan Anda.
                    </p>
                </div>

                <a
                    href="#contact"
                    class="text-primary-custom text-decoration-none fw-semibold small"
                >
                    Hubungi Kami
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">

                @forelse ($product as $item)

                    <div class="col-md-6 col-lg-4">
                        <div class="card-news h-100">

                            @if ($item->image)

                                <img
                                    src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->title }}"
                                >

                            @else

                                <div
                                    class="bg-light d-flex align-items-center justify-content-center"
                                    style="height: 180px;"
                                >
                                    <i class="bi bi-box-seam fs-1 text-secondary"></i>
                                </div>

                            @endif

                            <div class="p-3">

                                <div class="news-date mb-1">
                                    {{ $item->created_at->format('d M Y') }}
                                </div>

                                <h6 class="fw-bold text-dark mb-2">
                                    {{ $item->title }}
                                </h6>

                                @if ($item->description)

                                    <p class="text-secondary small mb-0">
                                        {{ Str::limit($item->description, 120) }}
                                    </p>

                                @endif

                            </div>

                        </div>
                    </div>

                @empty

                    <div class="col-12">
                        <div class="text-center py-5">

                            <i class="bi bi-box-seam fs-1 text-secondary"></i>

                            <p class="text-secondary mt-3 mb-0">
                                Produk akan segera tersedia.
                            </p>

                        </div>
                    </div>

                @endforelse

            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="news" class="py-5">

        <div class="container">

            <div class="d-flex justify-content-between align-items-end mb-4">

                <div>

                    <span class="badge-soft-primary mb-2">
                        Kabar Terbaru
                    </span>

                    <h2 class="fw-bold mb-0 fs-2">
                        Berita Terbaru
                    </h2>

                </div>

                <a
                    href="{{ route('news') }}"
                    class="text-primary-custom text-decoration-none fw-semibold small"
                >
                    Lihat Semua Berita
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>

            </div>

            <div class="row g-4">

                @forelse ($news as $item)

                    <div class="col-md-6 col-lg-4">

                        <a
                            href="{{ route('news.show', $item) }}"
                            class="text-decoration-none"
                        >

                            <div class="card-news">

                                @if ($item->image)

                                    <img
                                        src="{{ asset('storage/' . $item->image) }}"
                                        alt="{{ $item->title }}"
                                    >

                                @else

                                    <div
                                        class="bg-light d-flex align-items-center justify-content-center"
                                        style="height: 180px;"
                                    >
                                        <i class="bi bi-journal-bookmark fs-1 text-secondary"></i>
                                    </div>

                                @endif

                                <div class="p-3">

                                    <div class="news-date mb-1">
                                        {{ $item->created_at->format('d M Y') }}
                                    </div>

                                    <h6 class="fw-bold text-dark mb-2">
                                        {{ $item->title }}
                                    </h6>

                                    @if ($item->description)

                                        <p class="text-secondary small mb-0">
                                            {{ Str::limit($item->description, 120) }}
                                        </p>

                                    @endif

                                </div>

                            </div>

                        </a>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="text-center py-5">

                            <i class="bi bi-journal-x fs-1 text-secondary"></i>

                            <p class="text-secondary mt-3 mb-0">
                                Belum ada berita.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </section>


    <!-- Gallery Section -->
    <section id="gallery" class="py-5">

        <div class="container">

            <div class="d-flex justify-content-between align-items-end mb-4">

                <div>

                    <span class="badge-soft-primary mb-2">
                        Dokumentasi
                    </span>

                    <h2 class="fw-bold mb-1 fs-2">
                        Galeri Terkini
                    </h2>

                    <p class="text-secondary small mb-0">
                        Berbagai momen kebersamaan, semangat belajar,
                        dan pengalaman berharga bersama.
                    </p>

                </div>

                <a
                    href="{{ route('gallery') }}"
                    class="text-primary-custom text-decoration-none fw-semibold small"
                >
                    Galeri Lengkap
                    <i class="bi bi-grid-fill ms-1"></i>
                </a>

            </div>

            <div class="row g-3">

                @forelse ($gallery as $item)

                    <div class="col-md-6 col-lg-4">

                        <a
                            href="{{ route('gallery.show', $item) }}"
                            class="text-decoration-none"
                        >

                            <div class="card-news">

                                @if ($item->image)

                                    <img
                                        src="{{ asset('storage/' . $item->image) }}"
                                        alt="{{ $item->title }}"
                                    >

                                @else

                                    <div
                                        class="bg-light d-flex align-items-center justify-content-center"
                                        style="height: 180px;"
                                    >
                                        <i class="bi bi-image fs-1 text-secondary"></i>
                                    </div>

                                @endif

                                <div class="p-3">

                                    <div class="news-date mb-1">
                                        {{ $item->created_at->format('d M Y') }}
                                    </div>

                                    <h6 class="fw-bold text-dark mb-2">
                                        {{ $item->title }}
                                    </h6>

                                    @if ($item->description)

                                        <p class="text-secondary small mb-0">
                                            {{ Str::limit($item->description, 120) }}
                                        </p>

                                    @endif

                                </div>

                            </div>

                        </a>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="text-center py-5">

                            <i class="bi bi-images fs-1 text-secondary"></i>

                            <p class="text-secondary mt-3 mb-0">
                                Belum ada galeri.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </section>


    <!-- Rating Section -->
    <section class="rating-section py-5" id="rating">

        <div class="container">

            <!-- Header -->
            <div class="text-center mb-4">

                <span class="badge-soft-primary mb-2">
                    Pendapat Anda
                </span>

                <h2 class="fw-bold">
                    Bagikan Pengalamanmu
                </h2>

                <p class="text-secondary">
                    Berikan rating dan pesan untuk membantu kami
                    meningkatkan pengalaman di Narra.
                </p>

            </div>


            <!-- Map + Rating Form -->
            <div class="rating-layout">

                <!-- Google Maps -->
                <div class="rating-map">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252004.94111745973!2d118.28348845000001!3d9.282015849999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3235361be2c6850f%3A0xfdc231a1287f4c1c!2sNarra%2C%20Palawan%2C%20Filipina!5e0!3m2!1sid!2sid!4v1791121419585!5m2!1sid!2sid"
                        width="600"
                        height="450"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"
                    ></iframe>

                </div>


                <!-- Rating Form -->
                <div class="rating-form-wrapper">

                    <div class="rating-card h-100">

                        @if (session('rating_success'))

                            <div class="alert alert-success">
                                {{ session('rating_success') }}
                            </div>

                        @endif


                        @if ($errors->any())

                            <div class="alert alert-danger">

                                <ul class="mb-0">

                                    @foreach ($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <form
                            action="{{ route('rating.store') }}"
                            method="POST"
                        >

                            @csrf

                            <!-- Nama -->
                            <div class="mb-3">

                                <label
                                    for="name"
                                    class="form-label fw-semibold"
                                >
                                    Nama
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control"
                                    placeholder="Nama Anda"
                                    value="{{ old('name') }}"
                                >

                            </div>


                            <!-- Rating -->
                            <div class="mb-3">

                                <label
                                    for="ratingValue"
                                    class="form-label fw-semibold"
                                >
                                    Rating
                                </label>

                                <select
                                    name="rating"
                                    id="ratingValue"
                                    class="form-select"
                                    required
                                >

                                    <option value="">
                                        Pilih rating
                                    </option>

                                    <option
                                        value="1"
                                        {{ old('rating') == 1 ? 'selected' : '' }}
                                    >
                                        1 - Sangat Kurang
                                    </option>

                                    <option
                                        value="2"
                                        {{ old('rating') == 2 ? 'selected' : '' }}
                                    >
                                        2 - Kurang
                                    </option>

                                    <option
                                        value="3"
                                        {{ old('rating') == 3 ? 'selected' : '' }}
                                    >
                                        3 - Cukup
                                    </option>

                                    <option
                                        value="4"
                                        {{ old('rating') == 4 ? 'selected' : '' }}
                                    >
                                        4 - Baik
                                    </option>

                                    <option
                                        value="5"
                                        {{ old('rating') == 5 ? 'selected' : '' }}
                                    >
                                        5 - Sangat Baik
                                    </option>

                                </select>

                            </div>


                            <!-- Pesan -->
                            <div class="mb-4">

                                <label
                                    for="message"
                                    class="form-label fw-semibold"
                                >
                                    Pesan
                                </label>

                                <textarea
                                    name="message"
                                    id="message"
                                    rows="4"
                                    class="form-control"
                                    placeholder="Tuliskan pesan Anda..."
                                >{{ old('message') }}</textarea>

                            </div>


                            <!-- Submit -->
                            <button
                                type="submit"
                                class="btn btn-primary w-100"
                            >
                                <i class="bi bi-send me-2"></i>
                                Kirim Rating
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- Contact Section -->
    <footer id="contact" class="contact-section">

        <div class="container">

            <div class="row gy-5 align-items-center">

                <!-- Contact Info -->
                <div class="col-lg-6">

                    <h2 class="fw-bold display-6 mb-3 text-white">
                        Kontak Kami
                    </h2>

                    <p
                        class="text-white-50 mb-4"
                        style="max-width: 480px;"
                    >
                        Sampaikan pertanyaan atau kunjungi kami langsung
                        di kampus untuk mendapatkan informasi lengkap.
                    </p>


                    <div class="d-flex flex-column gap-3 mb-4">

                        <div class="d-flex align-items-center gap-3">

                            <i class="bi bi-geo-alt fs-5 text-white-50"></i>

                            <span>
                                Jl. Edukasi No. 12, Jakarta Selatan
                            </span>

                        </div>


                        <div class="d-flex align-items-center gap-3">

                            <i class="bi bi-envelope fs-5 text-white-50"></i>

                            <span>
                                admin@narra.sch.id
                            </span>

                        </div>


                        <div class="d-flex align-items-center gap-3">

                            <i class="bi bi-telephone fs-5 text-white-50"></i>

                            <span>
                                +62 812-3456-7890
                            </span>

                        </div>

                    </div>

                </div>


                <!-- Contact Form -->
                <div class="col-lg-6">

                    <div class="contact-card">

                        <form
                            action="{{ route('contact.store') }}"
                            method="POST"
                        >

                            @csrf

                            <div class="mb-3">

                                <label
                                    for="nama"
                                    class="form-label small fw-semibold text-secondary"
                                >
                                    Nama Lengkap
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama"
                                    name="name"
                                    placeholder="Nama Anda"
                                    value="{{ old('name') }}"
                                    required
                                >

                            </div>


                            <div class="mb-3">

                                <label
                                    for="email"
                                    class="form-label small fw-semibold text-secondary"
                                >
                                    Alamat Email
                                </label>

                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="nama@email.com"
                                    value="{{ old('email') }}"
                                    required
                                >

                            </div>


                            <div class="mb-3">

                                <label
                                    for="kategori"
                                    class="form-label small fw-semibold text-secondary"
                                >
                                    Program Keahlian
                                </label>

                                <select
                                    class="form-select"
                                    id="kategori"
                                    name="program"
                                    required
                                >

                                    <option value="" selected disabled>
                                        Pilih Program
                                    </option>

                                    <option
                                        value="Software Engineering"
                                        {{ old('program') == 'Software Engineering' ? 'selected' : '' }}
                                    >
                                        Software Engineering
                                    </option>

                                    <option
                                        value="Network Engineering"
                                        {{ old('program') == 'Network Engineering' ? 'selected' : '' }}
                                    >
                                        Network Engineering
                                    </option>

                                    <option
                                        value="Hardware Engineering"
                                        {{ old('program') == 'Hardware Engineering' ? 'selected' : '' }}
                                    >
                                        Hardware Engineering
                                    </option>

                                </select>

                            </div>


                            <div class="mb-4">

                                <label
                                    for="pesan"
                                    class="form-label small fw-semibold text-secondary"
                                >
                                    Pesan
                                </label>

                                <textarea
                                    class="form-control"
                                    id="pesan"
                                    name="message"
                                    rows="4"
                                    placeholder="Tuliskan pesan Anda..."
                                    required
                                >{{ old('message') }}</textarea>

                            </div>


                            <!-- Turnstile dinonaktifkan sementara -->

                            <button
                                type="submit"
                                class="btn btn-primary w-100 py-2 fw-semibold"
                            >
                                <i class="bi bi-send me-2"></i>
                                Kirim Pesan
                            </button>

                        </form>

                    </div>

                </div>

            </div>


            <!-- Footer Bottom -->
            <div class="footer-bottom d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">

                <div class="fw-bold fs-4 text-white">
                    Narra
                </div>

                <div class="text-white-50">
                    © {{ date('Y') }} Narra. Hak cipta dilindungi undang-undang.
                </div>

            </div>

        </div>

    </footer>

    @push('scripts')
        <!-- Smooth Scroll -->
        <script>
            document.querySelectorAll('a[href^="#"]').forEach(link => {

                link.addEventListener('click', function (e) {

                    const href = this.getAttribute('href');

                    if (!href || href === '#') {
                        return;
                    }

                    const target = document.querySelector(href);

                    if (!target) {
                        return;
                    }

                    e.preventDefault();

                    const header = document.querySelector('.navbar');

                    const headerHeight = header
                        ? header.offsetHeight + 15
                        : 0;

                    const targetPosition =
                        target.getBoundingClientRect().top +
                        window.scrollY -
                        headerHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                });

            });
        </script>
    @endpush

</x-public.layout>
