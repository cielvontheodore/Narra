@push('styles')
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
@endpush

<x-public.auth-layout title="Terjadi Kesalahan - Narra" navbarVariant="on-blue">
    <x-public.error-content
        code="500"
        title="Terjadi Kesalahan"
        description="Maaf, terjadi kesalahan pada sistem kami. Tim kami mungkin sedang menangani masalah ini. Silakan coba kembali beberapa saat lagi."
    />
</x-public.auth-layout>
