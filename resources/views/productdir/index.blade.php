<x-admin.layout title="Kelola Product - Admin NARRA" :brandHref="url('/')">

    @push('styles')
        <style>
            /* Page-specific styles. Shared admin chrome/forms live in css/admin.css. */

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
           Empty State
           ========================= */

        .empty-state {
            padding: 3.5rem 1.75rem;
            text-align: center;
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

            .product-item {
                padding: 1.25rem;
            }
        }

        @media (max-width: 575.98px) {

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
        </style>
    @endpush


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


    @push('scripts')
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
    @endpush

</x-admin.layout>
