@props(['user' => null])

@php
    $user = $user ?? auth()->user();
@endphp

<div {{ $attributes->merge(['class' => 'd-flex align-items-center justify-content-between gap-3']) }}>
    <div class="d-flex align-items-center gap-3 flex-grow-1 overflow-hidden">
        <div class="admin-avatar">
            <i class="bi bi-person-fill"></i>
        </div>

        <div class="overflow-hidden">
            <div class="admin-name text-truncate">
                {{ $user->name }}
            </div>

            <div class="admin-role">
                {{ $user->role === 'super_admin' ? 'Super Admin' : 'Admin' }}
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('logout') }}" class="flex-shrink-0">
        @csrf

        <button
            type="submit"
            class="logout-btn"
            title="Keluar"
            aria-label="Keluar"
        >
            <i class="bi bi-box-arrow-right"></i>
        </button>
    </form>
</div>
