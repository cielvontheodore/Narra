@props([
    'brandHref' => url('/'),
    'copyright' => '&copy; ' . date('Y') . ' Narra. Hak cipta dilindungi undang-undang.',
])

<hr class="footer-divider">

<footer class="d-flex flex-column flex-sm-row justify-content-between align-items-center pb-4">
    <a href="{{ $brandHref }}" class="footer-brand text-decoration-none">
        Narra
    </a>

    <div class="copyright-text mt-3 mt-sm-0">
        {!! $copyright !!}
    </div>
</footer>
