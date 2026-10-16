@props(['user' => null, 'brandHref' => null])

@php
    $user = $user ?? auth()->user();
    $brandHref = $brandHref ?? route('dashboard');
@endphp

<aside class="sidebar">

    <div>

        <a href="{{ $brandHref }}" class="brand-logo">
            Narra
        </a>

        <x-admin.nav />

    </div>

    <!-- Desktop Admin Profile -->

    <div class="admin-profile">
        <x-admin.profile :user="$user" />
    </div>

</aside>
