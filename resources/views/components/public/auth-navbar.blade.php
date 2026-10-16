@props([
    'majorsLabel' => 'Majors',
    'majorsHref' => null,
])

@php
    // The royal-blue navbar links to in-page anchors on the homepage.
    // The Majors entry is configurable because the login page historically
    // used a different label/href ("Major" => /#progrms); preserved as-is.
    $majorsHref = $majorsHref ?? url('/#programs');

    $links = [
        ['label' => 'Home',       'href' => url('/')],
        ['label' => 'About',      'href' => url('/#about')],
        ['label' => $majorsLabel, 'href' => $majorsHref],
        ['label' => 'News',       'href' => url('/#news')],
        ['label' => 'Gallery',    'href' => route('gallery')],
        ['label' => 'Rating',     'href' => url('/#rating')],
        ['label' => 'Contact',    'href' => url('/#contact')],
    ];
@endphp

<nav class="navbar navbar-expand-md">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Narra
        </a>

        <button
            class="navbar-toggler border-0 text-white"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="bi bi-list fs-2"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                @foreach ($links as $link)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $link['href'] }}">
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
