<x-admin.layout title="Kelola Berita - Admin NARRA">

    @push('styles')
        <style>
            /* Page-specific: shared admin styles live in css/admin.css */
            :root {
                --text-main: #1e293b;
            }

            /* News Card */
            .news-card {
                background-color: #ffffff;
                border-radius: 1rem;
                border: 1px solid #f1f5f9;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
                overflow: hidden;
            }

            .news-item {
                padding: 1.25rem 1.75rem;
                border-bottom: 1px solid #f1f5f9;
            }

            .news-item:last-child {
                border-bottom: none;
            }

            .news-image {
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

            .news-title {
                font-size: 1rem;
                font-weight: 800;
                color: #0f172a;
                margin-bottom: 0.4rem;
            }

            .news-description {
                color: var(--text-muted);
                font-size: 0.85rem;
                line-height: 1.6;
                margin-bottom: 0;
            }

            .news-date {
                color: var(--text-muted);
                font-size: 0.8rem;
                font-weight: 500;
            }

            /* Page-specific empty-state spacing */
            .empty-state {
                padding: 3.5rem 1.75rem;
            }

            /* Page-specific pagination spacing */
            .pagination-wrapper {
                padding: 1.25rem 1.75rem;
            }

            @media (max-width: 991.98px) {

                .news-item {
                    padding: 1.25rem;
                }
            }

            @media (max-width: 575.98px) {

                .news-image,
                .no-image {
                    width: 100%;
                    height: 180px;
                }

                .news-item .row {
                    gap: 1rem;
                }

                .pagination-wrapper {
                    padding: 1.25rem;
                }
            }
        </style>
    @endpush

    <!-- Page Header -->

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

        <div>

            <h1 class="page-title">
                Kelola News
            </h1>

            <p class="page-subtitle m-0">
                Berita dan informasi terbaru sekolah NARRA.
            </p>

        </div>

        <div>

            <a
                href="{{ route('admin-news.create') }}"
                class="btn-add-news"
            >
                <i class="bi bi-plus-lg"></i>
                <span>Tambah News</span>
            </a>

        </div>

    </div>

    <!-- Search -->

    <div class="search-container">

        <i class="bi bi-search search-icon"></i>

        <input
            type="text"
            id="newsSearch"
            class="search-input"
            placeholder="Cari judul atau deskripsi berita..."
            aria-label="Cari berita"
        >

    </div>


    <!-- News Card -->

    <div class="news-card">

        @forelse ($news as $item)

            <div class="news-item news-row">

                <div class="row align-items-center g-4">

                    <!-- Image -->

                    <div class="col-md-3">

                        @if ($item->image)

                            <img
                                src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->title }}"
                                class="news-image"
                            >

                        @else

                            <div class="no-image">
                                No Image
                            </div>

                        @endif

                    </div>


                    <!-- Content -->

                    <div class="col-md-6">

                        <div class="news-title">
                            {{ $item->title }}
                        </div>

                        @if ($item->description)

                            <p class="news-description">
                                {{ Str::limit($item->description, 120) }}
                            </p>

                        @endif

                    </div>


                    <!-- Date + Actions -->

                    <div class="col-md-3">

                        <div class="d-flex flex-column align-items-md-end gap-2">

                            <div class="news-date">
                                {{ $item->created_at->format('d M Y') }}
                            </div>

                            <div class="d-flex gap-3 align-items-center">

                                <a
                                    href="{{ route('admin-news.edit', $item->id) }}"
                                    class="action-btn-edit"
                                >
                                    <i class="bi bi-pencil"></i>
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin-news.destroy', $item->id) }}"
                                    method="POST"
                                    class="d-inline"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-btn-delete border-0 bg-transparent p-0"
                                        onclick="return confirm('Yakin ingin menghapus berita ini?')"
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
                    <i class="bi bi-newspaper"></i>
                </div>

                <div class="empty-title">
                    Belum ada news
                </div>

                <p class="empty-text">
                    Belum ada berita yang ditambahkan ke website.
                </p>

                <a
                    href="{{ route('admin-news.create') }}"
                    class="btn-add-news"
                >
                    <i class="bi bi-plus-lg"></i>
                    <span>Tambah News</span>
                </a>

            </div>

        @endforelse


        <!-- Pagination -->

        @if ($news->hasPages())

            <div class="pagination-wrapper">
                {{ $news->links() }}
            </div>

        @endif

    </div>

    @push('scripts')
        <script>
            document
                .getElementById('newsSearch')
                .addEventListener('input', function () {

                    const search = this.value.toLowerCase().trim();
                    const rows = document.querySelectorAll('.news-row');

                    rows.forEach(function (row) {

                        const text = row.textContent.toLowerCase();

                        row.style.display = text.includes(search)
                            ? ''
                            : 'none';

                    });

                });
        </script>
    @endpush

</x-admin.layout>
