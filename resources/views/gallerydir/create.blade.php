<x-admin.layout title="Tambah Gallery - Admin NARRA" :brandHref="url('/')">

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

        @media (max-width: 575.98px) {

            .form-card-body {
                padding: 1.25rem;
            }
        }
        </style>
    @endpush


    <!-- Page Header -->

    <div class="mb-4">

        <h1 class="page-title">
            Tambah Gallery
        </h1>

        <p class="page-subtitle m-0">
            Tambahkan dokumentasi dan gambar baru ke galeri sekolah NARRA.
        </p>

    </div>


    <!-- Form Card -->

    <div class="form-card">

        <div class="form-card-header">

            <h2 class="form-card-title">
                Informasi Gallery
            </h2>

            <p class="form-card-subtitle">
                Isi informasi gallery yang ingin ditampilkan di website.
            </p>

        </div>


        <div class="form-card-body">

            <form
                action="{{ route('admin-gallery.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                <!-- Title -->

                <div class="mb-4">

                    <label for="title" class="form-label">
                        Judul Gallery
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        placeholder="Masukkan judul gallery"
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
                        placeholder="Tulis deskripsi gallery..."
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Image -->

                <div class="mb-4">

                    <label for="image" class="form-label">
                        Gambar
                    </label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        class="form-control @error('image') is-invalid @enderror"
                    >

                    <div class="image-help">
                        Upload gambar untuk gallery ini.
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
                        Simpan Gallery
                    </button>

                    <a
                        href="{{ route('admin-gallery.index') }}"
                        class="btn-cancel"
                    >
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>


</x-admin.layout>
