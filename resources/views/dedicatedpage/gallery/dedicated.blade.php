@php
    $copyright = '&copy; ' . date('Y') . ' Narra. Hak cipta dilindungi undang-undang';
@endphp

<x-public.layout title="Narra - {{ $gallery->title }}" active="gallery" :container="false" :footer="false">

    @push('head')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
        >
    @endpush

    @push('styles')
        <style>
            /* Page-specific: shared public styles live in css/public.css */
:root {
                --bs-primary-dark: #1d4ed8;
                --narra-font-sans: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                --narra-text-muted: #475569;
                --narra-text-subtle: #64748b;
                --narra-body-color: var(--narra-text-dark);
                --narra-body-bg: var(--narra-bg);
            }

            body {
                -webkit-font-smoothing: antialiased;
            }

html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        /* ========================================
           BACK LINK
        ======================================== */

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;

            color: var(--bs-primary);
            font-size: 0.85rem;
            font-weight: 600;

            text-decoration: none;

            transition: opacity 0.2s ease;

            margin-bottom: 2rem;
        }

        .back-link:hover {
            opacity: 0.8;
            color: var(--bs-primary-dark);
        }

        /* ========================================
           GALLERY
        ======================================== */

        .gallery-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .gallery-date {
            font-size: 0.825rem;
            font-weight: 600;
            color: var(--narra-text-subtle);

            display: flex;
            align-items: center;
            gap: 0.4rem;

            margin-bottom: 0.75rem;
        }

        .gallery-title {
            font-family: 'Playfair Display', Georgia, serif;

            font-size: 2.35rem;
            font-weight: 800;

            color: #1e293b;

            line-height: 1.22;
            letter-spacing: -0.02em;

            margin-bottom: 2.25rem;
        }

        @media (min-width: 992px) {
            .gallery-title {
                font-size: 2.75rem;
            }
        }

        /* ========================================
           HERO IMAGE
        ======================================== */

        .hero-img-container {
            width: 100%;

            border-radius: 1.25rem;
            overflow: hidden;

            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);

            margin-bottom: 2.5rem;
        }

        .hero-img-container img {
            width: 100%;
            height: auto;

            max-height: 560px;

            object-fit: cover;
            display: block;
        }

        /* ========================================
           GALLERY BODY
        ======================================== */

        .gallery-body {
            max-width: 820px;
        }

        .gallery-body p {
            font-size: 0.95rem;
            line-height: 1.7;

            color: var(--narra-text-muted);

            margin-bottom: 1.5rem;

            letter-spacing: -0.005em;
        }

        .gallery-body p:last-child {
            margin-bottom: 0;
        }

        /* ========================================
           FOOTER
        ======================================== */

        .footer-divider {
            border-top: 1px solid #cbd5e1;

            margin-top: 4.5rem;
            margin-bottom: 2rem;

            opacity: 0.6;
        }
        </style>
    @endpush

<main class="container my-3 my-md-4">

        <!-- Back -->

        <a
            href="{{ route('gallery') }}"
            class="back-link"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali ke Galeri
        </a>


        <article class="gallery-container">


            <!-- Date -->

            <div class="gallery-date">

                <i class="bi bi-calendar4"></i>

                {{ $gallery->created_at->format('F d, Y') }}

            </div>


            <!-- Title -->

            <h1 class="gallery-title">
                {{ $gallery->title }}
            </h1>


            <!-- Image
                 Tidak ada placeholder.
                 Kalau image kosong, bagian ini tidak dirender.
            -->

            @if ($gallery->image)

                <div class="hero-img-container">

                    <img
                        src="{{ asset('storage/' . $gallery->image) }}"
                        alt="{{ $gallery->title }}"
                    >

                </div>

            @endif


            <!-- Description -->

            @if ($gallery->description)

                <div class="gallery-body">

                    <p>
                        {!! nl2br(e($gallery->description)) !!}
                    </p>

                </div>

            @endif


        </article>


        <!-- ==========================================
             FOOTER
        =========================================== -->

        <x-public.footer :copyright="$copyright" />

    </main>

</x-public.layout>
