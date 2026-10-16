<x-public.layout title="Narra - {{ $news->title }}" active="news" :container="false" :footer="false">

    @push('head')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
        >
        <script
        src="https://challenges.cloudflare.com/turnstile/v0/api.js"
        async
        defer
        ></script>
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
           ARTICLE
        ======================================== */

        .article-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .article-date {
            font-size: 0.825rem;
            font-weight: 600;
            color: var(--narra-text-subtle);

            display: flex;
            align-items: center;
            gap: 0.4rem;

            margin-bottom: 0.75rem;
        }

        .article-title {
            font-family: 'Playfair Display', Georgia, serif;

            font-size: 2.35rem;
            font-weight: 800;

            color: #1e293b;

            line-height: 1.22;
            letter-spacing: -0.02em;

            margin-bottom: 2.25rem;
        }

        @media (min-width: 992px) {
            .article-title {
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
           ARTICLE BODY
        ======================================== */

        .article-body {
            max-width: 820px;
        }

        .article-body p {
            font-size: 0.95rem;
            line-height: 1.7;

            color: var(--narra-text-muted);

            margin-bottom: 1.5rem;

            letter-spacing: -0.005em;
        }

        .article-body p:last-child {
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
            href="{{ route('news') }}"
            class="back-link"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali ke Berita
        </a>


        <article class="article-container">


            <!-- Date -->

            <div class="article-date">

                <i class="bi bi-calendar4"></i>

                {{ $news->created_at->format('d F Y') }}

            </div>


            <!-- Title -->

            <h1 class="article-title">
                {{ $news->title }}
            </h1>


            <!-- Image
                 Tidak ada placeholder.
                 Kalau image kosong, bagian ini tidak dirender.
            -->

            @if ($news->image)

                <div class="hero-img-container">

                    <img
                        src="{{ asset('storage/' . $news->image) }}"
                        alt="{{ $news->title }}"
                    >

                </div>

            @endif


            <!-- Description -->

            @if ($news->description)

                <div class="article-body">

                    {!! nl2br(e($news->description)) !!}

                </div>

            @endif


        </article>


        <!-- ==========================================
             FOOTER
        =========================================== -->

        <x-public.footer />

    </main>

</x-public.layout>
