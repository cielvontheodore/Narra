@props([
    'title' => 'Narra',
    'majorsLabel' => 'Majors',
    'majorsHref' => null,
    'navbarVariant' => null,
])

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }}</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- Page-specific <link> tags --}}
    @stack('head')

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

    <!-- Shared auth (royal-blue) styles -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

    {{-- Page-specific styles --}}
    @stack('styles')
</head>

<body>

    @if ($navbarVariant)
        {{-- Shared guest navbar, re-skinned for the royal-blue background. --}}
        <x-public.navbar :variant="$navbarVariant" />
    @else
        <x-public.auth-navbar :majorsLabel="$majorsLabel" :majorsHref="$majorsHref" />
    @endif

    {{ $slot }}

    <x-public.auth-footer />

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

    @stack('scripts')
</body>

</html>
