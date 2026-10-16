@props([
    'code',
    'title',
    'description',
])

<main class="container d-flex flex-column justify-content-center flex-grow-1">
    <div class="error-container">
        <div class="error-code">
            {{ $code }}
        </div>

        <h1 class="error-title">
            {{ $title }}
        </h1>

        <p class="error-description">
            {{ $description }}
        </p>

        <a href="{{ url('/') }}" class="btn-home">
            <i class="bi bi-house-fill"></i>
            Kembali ke Beranda
        </a>
    </div>
</main>
