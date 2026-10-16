@php
    // Single source of truth for the admin navigation.
    // Each item matches the route name used for the active state.
    $items = [
        ['label' => 'Dashboard', 'icon' => 'bi-grid-fill', 'route' => 'dashboard',          'pattern' => 'dashboard'],
        ['label' => 'News',      'icon' => 'bi-newspaper', 'route' => 'admin-news.index',    'pattern' => 'admin-news.*'],
        ['label' => 'Gallery',   'icon' => 'bi-images',    'route' => 'admin-gallery.index', 'pattern' => 'admin-gallery.*'],
        ['label' => 'Inbox',     'icon' => 'bi-envelope',  'route' => 'admin-inbox.index',   'pattern' => 'admin-inbox.*'],
        ['label' => 'Rating',    'icon' => 'bi-star',      'route' => 'admin-rating.index',  'pattern' => 'admin-rating.*'],
        ['label' => 'Product',   'icon' => 'bi-box',       'route' => 'admin-product.index', 'pattern' => 'admin-product.*'],
    ];
@endphp

<nav {{ $attributes->merge(['class' => 'nav flex-column']) }}>
    @foreach ($items as $item)
        <a
            href="{{ route($item['route']) }}"
            class="nav-link-custom{{ request()->routeIs($item['pattern']) ? ' active' : '' }}"
        >
            <i class="bi {{ $item['icon'] }}"></i>
            <span>{{ $item['label'] }}</span>
        </a>
    @endforeach

    @can('manage-admins')
        <a
            href="{{ route('admin-admins.index') }}"
            class="nav-link-custom{{ request()->routeIs('admin-admins.*') ? ' active' : '' }}"
        >
            <i class="bi bi-gear"></i>
            <span>Akun</span>
        </a>
    @endcan
</nav>
