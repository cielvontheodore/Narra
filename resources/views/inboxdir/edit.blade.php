<x-admin.layout title="Edit Inbox - Admin NARRA" :brandHref="url('/')">

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
            Edit Inbox
        </h1>

        <p class="page-subtitle m-0">
            Perbarui informasi dan pesan yang masuk melalui website NARRA.
        </p>

    </div>


    <!-- Form Card -->

    <div class="form-card">

        <div class="form-card-header">

            <div class="form-card-title">
                Informasi Inbox
            </div>

            <p class="form-card-subtitle">
                Ubah informasi pesan yang ingin diperbarui.
            </p>

        </div>


        <div class="form-card-body">

            <form
                action="{{ route('admin-inbox.update', $inbox->id) }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                <!-- Name -->

                <div class="mb-4">

                    <label for="name" class="form-label">
                        Nama Pengirim
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $inbox->name) }}"
                        placeholder="Masukkan nama pengirim"
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
                        Email Pengirim
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $inbox->email) }}"
                        placeholder="Masukkan email pengirim"
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
                        value="{{ old('program', $inbox->program) }}"
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
                        placeholder="Tulis pesan dari pengirim..."
                    >{{ old('message', $inbox->message) }}</textarea>

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
                        Simpan Perubahan
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
