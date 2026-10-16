<x-admin.layout title="Edit Product - Admin NARRA" :brandHref="url('/')">

    @push('styles')
        <style>
            /* Page-specific styles. Shared admin chrome/forms live in css/admin.css. */

:root {
            --primary-blue: #2b66f6;
            --primary-blue-hover: #1e52d8;
            --light-bg: #f8f9fa;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
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

        /* =========================
           Responsive
           ========================= */

        @media (max-width: 991.98px) {

            .mobile-menu {
                padding: 0.75rem 1.25rem 1min;
            }
        }

        @media (max-width: 575.98px) {

            .form-card-body {
                padding: 1.25rem;
            }

            .current-image {
                width: 100%;
                max-width: 240px;
            }
        }
        </style>
    @endpush


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


</x-admin.layout>
