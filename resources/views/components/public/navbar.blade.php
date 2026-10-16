@props([
    'active' => null,
    'variant' => 'inner',
])

@php
    // 'landing' mirrors the welcome page (in-page hash anchors).
    // 'inner' is used by the public sub-pages and links across routes.
    // 'on-blue' keeps the 'inner' destinations but adds the light-on-blue
    // colour treatment used on the royal-blue error pages (css/error.css).
    $isLanding = $variant === 'landing';
    $isOnBlue = $variant === 'on-blue';

    $links = [
        ['key' => 'home',     'label' => 'Home',    'href' => $isLanding ? '#home' : url('/')],
        ['key' => 'about',    'label' => 'About',   'href' => $isLanding ? '#about' : url('/#about')],
        ['key' => 'programs', 'label' => 'Majors',  'href' => $isLanding ? '#programs' : url('/#programs')],
        ['key' => 'news',     'label' => 'News',    'href' => $isLanding ? '#news' : route('news')],
        ['key' => 'gallery',  'label' => 'Gallery', 'href' => $isLanding ? '#gallery' : route('gallery')],
        ['key' => 'rating',   'label' => 'Rating',  'href' => $isLanding ? '#rating' : url('/#rating')],
        ['key' => 'contact',  'label' => 'Contact', 'href' => $isLanding ? '#contact' : url('/#contact')],
    ];

    $activeKey = $active ?? ($isLanding ? 'home' : null);
@endphp

<nav class="navbar navbar-expand-lg sticky-top{{ $isOnBlue ? ' navbar-on-blue' : '' }}">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Narra
        </a>

        <button
            class="navbar-toggler border-0"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @foreach ($links as $link)
                    <li class="nav-item">
                        <a
                            class="nav-link{{ $activeKey === $link['key'] ? ' active' : '' }}"
                            href="{{ $link['href'] }}"
                        >
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
