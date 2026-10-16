<x-admin.layout title="Kelola Rating - Admin NARRA" :brandHref="url('/')">

    @push('styles')
        <style>
            /* Page-specific styles. Shared admin chrome/forms live in css/admin.css. */

:root {
            --primary-blue: #2b66f6;
            --primary-blue-hover: #1e52d8;
            --light-bg: #f8f9fa;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --icon-bg-blue: #eef2ff;
            --border-color: #f1f5f9;
        }

        /* =========================
           Add Button
        ========================= */

        .btn-top-add {
            background-color: var(--primary-blue);
            color: #ffffff;
            font-weight: 600;
            padding: 0.65rem 1.35rem;
            border-radius: 0.5rem;
            border: none;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .rating-stars {
            color: #f59e0b;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .rating-number {
            color: #475569;
            font-weight: 600;
            font-size: 0.8rem;
            margin-left: 0.4rem;
        }

        .message-text {
            color: #64748b;
            display: block;
            max-width: 400px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .date-text {
            color: #64748b;
            font-weight: 500;
        }
        </style>
    @endpush


    <!-- Header -->

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

        <div>

            <h1 class="page-title">
                Kelola Rating
            </h1>

            <p class="page-subtitle m-0">
                Kelola rating dan masukan dari pengunjung website NARRA.
            </p>

        </div>

        <div>

            <a
                href="{{ route('admin-rating.create') }}"
                class="btn-top-add"
            >
                <i class="bi bi-plus-lg"></i>
                <span>Tambah Rating</span>
            </a>

        </div>

    </div>


    <!-- Search -->

    <div class="search-container">

        <i class="bi bi-search search-icon"></i>

        <input
            type="text"
            id="ratingSearch"
            class="search-input"
            placeholder="Cari nama, rating, atau pesan..."
        >

    </div>


    <!-- Table -->

    <div class="table-card">

        <div class="table-responsive">

            <table class="table custom-table mb-0">

                <thead>

                    <tr>

                        <th scope="col" style="width: 25%;">
                            PENGIRIM
                        </th>

                        <th scope="col" style="width: 15%;">
                            RATING
                        </th>

                        <th scope="col" style="width: 30%;">
                            PESAN
                        </th>

                        <th scope="col" style="width: 15%;">
                            TANGGAL
                        </th>

                        <th scope="col" style="width: 15%;">
                            AKSI
                        </th>

                    </tr>

                </thead>

                <tbody id="ratingTable">

                    @forelse ($ratings as $rating)

                        <tr class="rating-row">

                            <td>
                                <span class="sender-name">
                                    {{ $rating->name ?? 'Anonim' }}
                                </span>
                            </td>

                            <td>

                                <span class="rating-stars">

                                    @for ($i = 1; $i <= 5; $i++)

                                        <i class="bi {{ $i <= $rating->rating ? 'bi-star-fill' : 'bi-star' }}"></i>

                                    @endfor

                                </span>

                                <span class="rating-number">
                                    {{ $rating->rating }}/5
                                </span>

                            </td>

                            <td>

                                <span
                                    class="message-text"
                                    title="{{ $rating->message ?? '-' }}"
                                >
                                    {{ $rating->message ?? '-' }}
                                </span>

                            </td>

                            <td>

                                <span class="date-text">
                                    {{ $rating->created_at->format('d M Y') }}
                                </span>

                            </td>

                            <td>

                                <div class="action-btn-group">

                                    <a
                                        href="{{ route('admin-rating.edit', $rating) }}"
                                        class="action-link action-link-edit"
                                    >
                                        <i class="bi bi-pencil"></i>
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin-rating.destroy', $rating) }}"
                                        method="POST"
                                        class="d-inline"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-link action-link-delete"
                                            onclick="return confirm('Yakin ingin menghapus rating ini?')"
                                        >
                                            <i class="bi bi-trash"></i>
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        <i class="bi bi-star"></i>
                                    </div>

                                    <div class="empty-title">
                                        Belum ada rating
                                    </div>

                                    <p class="empty-text">
                                        Belum ada rating atau masukan yang ditambahkan.
                                    </p>

                                    <a
                                        href="{{ route('admin-rating.create') }}"
                                        class="btn-top-add"
                                    >
                                        <i class="bi bi-plus-lg"></i>
                                        <span>Tambah Rating</span>
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if ($ratings->hasPages())

            <div class="pagination-wrapper">
                {{ $ratings->links() }}
            </div>

        @endif

    </div>


    @push('scripts')
<script>

    document
        .getElementById('ratingSearch')
        .addEventListener('input', function () {

            const search = this.value.toLowerCase().trim();

            const rows = document.querySelectorAll('.rating-row');

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
