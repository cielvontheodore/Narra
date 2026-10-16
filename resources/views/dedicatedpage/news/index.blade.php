<x-public.layout title="Narra - Berita Terbaru" active="news">

    @push('head')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        >
    @endpush

    @push('styles')
        <style>
            /* Page-specific: shared public styles live in css/public.css */
            :root {
                --narra-font-sans: 'Plus Jakarta Sans', sans-serif;
                --narra-body-color: #0f172a;
                --narra-body-bg: var(--narra-bg);
            }

            body {
                -webkit-font-smoothing: antialiased;
            }

            /* News Card */
            .news-card {
                background-color: var(--narra-card-bg);
                border-radius: 1rem;
                overflow: hidden;
                border: 1px solid rgba(226, 232, 240, 0.6);
                height: 100%;
                display: flex;
                flex-direction: column;
                transition:
                    transform 0.25s ease,
                    box-shadow 0.25s ease;
            }

            .news-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 12px 24px -10px rgba(15, 23, 42, 0.08);
            }

            /* Image */
            .news-img-wrapper {
                position: relative;
                width: 100%;
                padding-top: 62.5%;
                overflow: hidden;
                background-color: #e2e8f0;
            }

            .news-img-wrapper img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.3s ease;
            }

            .news-card:hover .news-img-wrapper img {
                transform: scale(1.03);
            }

            /* Card Content */
            .news-card-body {
                padding: 1.5rem 1.25rem 1.75rem;
                display: flex;
                flex-direction: column;
                flex-grow: 1;
            }

            .news-date {
                font-size: 0.78rem;
                font-weight: 500;
                color: var(--narra-text-subtle);
                margin-bottom: 0.6rem;
                letter-spacing: 0.02em;
            }

            .news-title {
                font-size: 1.05rem;
                font-weight: 700;
                color: var(--narra-text-dark);
                line-height: 1.35;
                margin-bottom: 0.65rem;
                letter-spacing: -0.01em;
            }

            .news-excerpt {
                font-size: 0.85rem;
                color: var(--narra-text-muted);
                line-height: 1.5;
                margin-bottom: 0;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            /* Card Link */
            .news-link {
                text-decoration: none;
                color: inherit;
                display: block;
                height: 100%;
            }

            .news-link:hover {
                color: inherit;
            }
        </style>
    @endpush

    <!-- Page Header -->
    <header class="page-header">

        <span class="category-label">
            KABAR KAMPUS
        </span>

        <h1 class="page-title">
            Berita Terbaru
        </h1>

    </header>


    <!-- News Grid -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

        @forelse ($news as $item)

            <div class="col">

                <a
                    href="{{ route('news.show', $item) }}"
                    class="news-link"
                >

                    <article class="news-card">

                        <!-- Image -->
                        <div class="news-img-wrapper">

                            @if ($item->image)

                                <img
                                    src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->title }}"
                                    loading="lazy"
                                >

                            @else

                                <div class="w-100 h-100 position-absolute top-0 start-0 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-journal-bookmark fs-1 text-secondary"></i>
                                </div>

                            @endif

                        </div>


                        <!-- Content -->
                        <div class="news-card-body">

                            <time class="news-date">

                                {{ $item->created_at->format('d M Y') }}

                            </time>


                            <h2 class="news-title">

                                {{ $item->title }}

                            </h2>


                            @if ($item->description)

                                <p class="news-excerpt">

                                    {{ $item->description }}

                                </p>

                            @endif

                        </div>

                    </article>

                </a>

            </div>

        @empty

            <!-- Empty -->
            <div class="col-12">

                <div class="empty-state text-center">

                    <i class="bi bi-journal-x"></i>

                    <h5 class="fw-bold mt-3">
                        Belum Ada Berita
                    </h5>

                    <p class="text-secondary small mb-0">
                        Belum ada berita yang tersedia saat ini.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

</x-public.layout>
