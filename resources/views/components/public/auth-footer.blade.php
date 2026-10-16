@props([
    'brandHref' => url('/'),
    'copyright' => '&copy; ' . date('Y') . ' Narra. Hak cipta dilindungi undang-undang.',
])

<footer>
    <div class="container">
        <hr class="footer-divider mb-4">

        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
            <a href="{{ $brandHref }}" class="footer-brand">
                Narra
            </a>

            <div class="copyright-text mt-3 mt-sm-0">
                {!! $copyright !!}
            </div>
        </div>
    </div>
</footer>
