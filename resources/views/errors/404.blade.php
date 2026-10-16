@push('styles')
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
@endpush

<x-public.auth-layout title="Halaman Tidak Ditemukan - Narra" navbarVariant="on-blue">
    <x-public.error-content
        code="404"
        title="Halaman Tidak Ditemukan"
        description="Maaf, halaman yang kamu cari tidak ditemukan. Mungkin halaman tersebut sudah dipindahkan, dihapus, atau alamat yang kamu masukkan tidak benar."
    />
</x-public.auth-layout>
