<x-admin.layout title="Create Inbox - Admin NARRA" :brandHref="url('/')">

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
            Create Inbox
        </h1>

        <p class="page-subtitle m-0">
            Tambahkan pesan inbox baru ke sistem NARRA.
        </p>

    </div>


    <!-- Form Card -->

    <div class="form-card">

        <div class="form-card-header">

            <h2 class="form-card-title">
                Informasi Inbox
            </h2>

            <p class="form-card-subtitle">
                Isi informasi pesan inbox yang ingin ditambahkan.
            </p>

        </div>


        <div class="form-card-body">

            <form
                action="{{ route('admin-inbox.store') }}"
                method="POST"
            >

                @csrf


                <!-- Name -->

                <div class="mb-4">

                    <label for="name" class="form-label">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama"
                    >

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Email -->

                <div class="mb-4">

                    <label for="email" class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="Masukkan alamat email"
                    >

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Program -->

                <div class="mb-4">

                    <label for="program" class="form-label">
                        Program
                    </label>

                    <input
                        type="text"
                        name="program"
                        id="program"
                        class="form-control @error('program') is-invalid @enderror"
                        value="{{ old('program') }}"
                        placeholder="Masukkan program"
                    >

                    @error('program')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Message -->

                <div class="mb-4">

                    <label for="message" class="form-label">
                        Pesan
                    </label>

                    <textarea
                        name="message"
                        id="message"
                        rows="6"
                        class="form-control @error('message') is-invalid @enderror"
                        placeholder="Tulis pesan inbox..."
                    >{{ old('message') }}</textarea>

                    @error('message')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Actions -->

                <div class="d-flex gap-2">

                    <button
                        type="submit"
                        class="btn-primary-custom"
                    >
                        <i class="bi bi-check-lg me-1"></i>
                        Simpan Inbox
                    </button>

                    <a
                        href="{{ route('admin-inbox.index') }}"
                        class="btn-cancel"
                    >
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>


</x-admin.layout>
