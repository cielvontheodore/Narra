@props([
    'title' => 'Admin NARRA',
    'brandHref' => null,
])

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }}</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- Google Fonts -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    >

    <!-- Shared admin styles -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    {{-- Page-specific styles --}}
    @stack('styles')
</head>

<body>

    <x-admin.sidebar :brandHref="$brandHref" />

    <x-admin.mobile-nav :brandHref="$brandHref" />

    <!-- Main Content -->

    <main {{ $attributes->merge(['class' => 'main-wrapper']) }}>
        {{ $slot }}
    </main>

    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

    @stack('scripts')

</body>

</html>
