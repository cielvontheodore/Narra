<x-admin.layout title="Create Rating - Admin NARRA">

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


<div class="mb-4">

    <h1 class="page-title">
        Create Rating
    </h1>

    <p class="page-subtitle m-0">
        Tambahkan rating dan masukan baru untuk website NARRA.
    </p>

</div>


<div class="form-card">

    <div class="form-card-header">

        <h2 class="form-card-title">
            Informasi Rating
        </h2>

        <p class="form-card-subtitle">
            Isi informasi rating yang ingin ditambahkan.
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
            action="{{ route('admin-rating.store') }}"
            method="POST"
        >

            @csrf


            {{-- Name --}}

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


            {{-- Rating --}}

            <div class="mb-4">

                <label for="rating" class="form-label">
                    Rating
                </label>

                <select
                    name="rating"
                    id="rating"
                    class="form-select @error('rating') is-invalid @enderror"
                    required
                >

                    <option value="">
                        Pilih rating
                    </option>

                    @for ($i = 1; $i <= 5; $i++)

                        <option
                            value="{{ $i }}"
                            {{ old('rating') == $i ? 'selected' : '' }}
                        >
                            {{ $i }} ⭐
                        </option>

                    @endfor

                </select>


                @error('rating')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- Message --}}

            <div class="mb-4">

                <label for="message" class="form-label">
                    Pesan
                </label>

                <textarea
                    name="message"
                    id="message"
                    rows="6"
                    class="form-control @error('message') is-invalid @enderror"
                    placeholder="Tulis pesan atau masukan..."
                >{{ old('message') }}</textarea>

                @error('message')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- Actions --}}

            <div class="d-flex gap-2">

                <button
                    type="submit"
                    class="btn-primary-custom"
                >
                    <i class="bi bi-check-lg me-1"></i>
                    Simpan Rating
                </button>

                <a
                    href="{{ route('admin-rating.index') }}"
                    class="btn-cancel"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>


</x-admin.layout>
