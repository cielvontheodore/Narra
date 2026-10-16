@props([
    'title' => 'Narra',
    'active' => null,
    'navbarVariant' => 'inner',
    'container' => true,
    'footer' => true,
])

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }}</title>

    {{-- Page-specific <link> tags (fonts, etc.) --}}
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

    <!-- Shared public styles -->
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">

    {{-- Page-specific styles --}}
    @stack('styles')
</head>

<body>

    <x-public.navbar :active="$active" :variant="$navbarVariant" />

    @if ($container)
        <main {{ $attributes->merge(['class' => 'container mb-5']) }}>
            {{ $slot }}

            @if ($footer)
                <x-public.footer />
            @endif
        </main>
    @else
        {{ $slot }}

        @if ($footer)
            <x-public.footer />
        @endif
    @endif

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

    @stack('scripts')
</body>

</html>
