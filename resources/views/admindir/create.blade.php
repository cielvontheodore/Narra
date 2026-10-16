<x-admin.layout title="Add Admin - Admin NARRA" :brandHref="url('/')">

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

            .form-card-header {
                padding: 1.25rem;
            }

        }
        </style>
    @endpush


    <!-- Page Header -->

    <div class="mb-4">

        <h1 class="page-title">
            Add Admin
        </h1>

        <p class="page-subtitle m-0">
            Buat akun administrator baru untuk NARRA.
        </p>

    </div>


    <!-- Form Card -->

    <div class="form-card">

        <div class="form-card-header">

            <h2 class="form-card-title">
                Informasi Admin
            </h2>

            <p class="form-card-subtitle">
                Lengkapi informasi berikut untuk membuat akun administrator baru.
            </p>

        </div>

        <div class="form-card-body">

            @if ($errors->any())

                <div class="alert alert-danger mb-4">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('admin-admins.store') }}"
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
                        placeholder="Masukkan nama admin"
                        required
                        autofocus
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
                        placeholder="Masukkan email admin"
                        required
                    >

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Password -->

                <div class="mb-4">

                    <label for="password" class="form-label">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Buat password admin"
                        autocomplete="new-password"
                        required
                    >

                    <div class="form-text mt-2">
                        Gunakan password yang kuat dan tidak mudah ditebak.
                    </div>

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- Confirm Password -->

                <div class="mb-4">

                    <label for="password_confirmation" class="form-label">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="form-control"
                        placeholder="Masukkan ulang password"
                        autocomplete="new-password"
                        required
                    >

                </div>


                <!-- Actions -->

                <div class="d-flex flex-wrap gap-2">

                    <button
                        type="submit"
                        class="btn-primary-custom"
                    >
                        <i class="bi bi-person-plus me-1"></i>
                        Buat Admin
                    </button>

                    <a
                        href="{{ route('admin-admins.index') }}"
                        class="btn-cancel"
                    >
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>


</x-admin.layout>
