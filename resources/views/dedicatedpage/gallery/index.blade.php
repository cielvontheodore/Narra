<x-public.layout title="Narra - Gallery" active="gallery">

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
                --narra-body-color: var(--narra-text-dark);
                --narra-body-bg: var(--narra-bg);
            }

            body {
                -webkit-font-smoothing: antialiased;
            }

        /* Gallery Card */
        .gallery-card {
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

        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px -10px rgba(15, 23, 42, 0.08);
        }

        /* Image */
        .gallery-img-wrapper {
            position: relative;
            width: 100%;
            padding-top: 62.5%;
            overflow: hidden;
            background-color: #e2e8f0;
        }

        .gallery-img-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-card:hover .gallery-img-wrapper img {
            transform: scale(1.03);
        }

        /* Card Content */
        .gallery-card-body {
            padding: 1.5rem 1.25rem 1.75rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .gallery-date {
            font-size: 0.78rem;
            font-weight: 500;
            color: var(--narra-text-subtle);
            margin-bottom: 0.6rem;
            letter-spacing: 0.02em;
        }

        .gallery-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--narra-text-dark);
            line-height: 1.35;
            margin-bottom: 0.65rem;
            letter-spacing: -0.01em;
        }

        .gallery-excerpt {
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
        .gallery-link {
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
        }

        .gallery-link:hover {
            color: inherit;
        }
        </style>
    @endpush

<!-- Page Header -->
        <header class="page-header">

            <span class="category-label">
                GALERI SEKOLAH
            </span>

            <h1 class="page-title">
                Galeri Kegiatan
            </h1>

        </header>


        <!-- Gallery Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

            @forelse ($gallery as $item)

                <div class="col">

                    <a
                        href="{{ route('gallery.show', $item) }}"
                        class="gallery-link"
                    >

                        <article class="gallery-card">

                            <!-- Image -->
                            <div class="gallery-img-wrapper">

                                @if ($item->image)

                                    <img
                                        src="{{ asset('storage/' . $item->image) }}"
                                        alt="{{ $item->title }}"
                                        loading="lazy"
                                    >

                                @else

                                    <div class="w-100 h-100 position-absolute top-0 start-0 d-flex align-items-center justify-content-center">
                                        <i class="bi bi-images fs-1 text-secondary"></i>
                                    </div>

                                @endif

                            </div>


                            <!-- Content -->
                            <div class="gallery-card-body">

                                <time class="gallery-date">

                                    {{ $item->created_at->format('d M Y') }}

                                </time>


                                <h2 class="gallery-title">

                                    {{ $item->title }}

                                </h2>


                                @if ($item->description)

                                    <p class="gallery-excerpt">

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

                        <i class="bi bi-images"></i>

                        <h5 class="fw-bold mt-3">
                            Belum Ada Galeri
                        </h5>

                        <p class="text-secondary small mb-0">
                            Belum ada foto atau kegiatan yang tersedia saat ini.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

</x-public.layout>
