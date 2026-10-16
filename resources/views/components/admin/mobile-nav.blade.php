@props(['user' => null, 'brandHref' => null])

@php
    $user = $user ?? auth()->user();
    $brandHref = $brandHref ?? route('dashboard');
@endphp

<nav class="mobile-navbar navbar">

    <div class="container-fluid mobile-navbar-inner">

        <div class="d-flex align-items-center justify-content-between w-100">

            <a href="{{ $brandHref }}" class="brand-logo">
                Narra
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#adminNavbar"
                aria-controls="adminNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>

    </div>

    <!-- Collapsed Menu -->

    <div class="collapse mobile-menu" id="adminNavbar">

        <x-admin.nav />

        <!-- Mobile Profile -->

        <div class="mobile-profile">
            <x-admin.profile :user="$user" />
        </div>

    </div>

</nav>
