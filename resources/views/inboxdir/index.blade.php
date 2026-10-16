<x-admin.layout title="Kelola Inbox - Admin NARRA" :brandHref="url('/')">

    @push('styles')
        <style>
            /* Page-specific styles. Shared admin chrome/forms live in css/admin.css. */

:root {
            --primary-blue: #2b66f6;
            --primary-blue-hover: #1e52d8;
            --light-bg: #f8fafd;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        /* =========================
           Add Button
        ========================= */

        .btn-top-add {
            background-color: var(--primary-blue);
            color: #ffffff;
            font-weight: 600;
            padding: 0.65rem 1.35rem;
            border-radius: 0.5rem;
            border: none;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }
        </style>
    @endpush


    <!-- Header -->

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

        <div>

            <h1 class="page-title">
                Kelola Inbox
            </h1>

            <p class="page-subtitle m-0">
                Kelola pesan dan pertanyaan dari pengunjung website NARRA.
            </p>

        </div>

        <div>

            <a
                href="{{ route('admin-inbox.create') }}"
                class="btn-top-add"
            >
                <i class="bi bi-plus-lg"></i>
                <span>Tambah Inbox</span>
            </a>

        </div>

    </div>


    <!-- Search -->

    <div class="search-container">

        <i class="bi bi-search search-icon"></i>

        <input
            type="text"
            id="inboxSearch"
            class="search-input"
            placeholder="Cari nama, email, program, atau pesan..."
        >

    </div>


    <!-- Table -->

    <div class="table-card">

        <div class="table-responsive">

            <table class="table custom-table mb-0">

                <thead>

                    <tr>

                        <th scope="col" style="width: 18%;">
                            PENGIRIM
                        </th>

                        <th scope="col" style="width: 20%;">
                            EMAIL
                        </th>

                        <th scope="col" style="width: 15%;">
                            PROGRAM
                        </th>

                        <th scope="col" style="width: 27%;">
                            PESAN
                        </th>

                        <th scope="col" style="width: 10%;">
                            TANGGAL
                        </th>

                        <th scope="col" style="width: 10%;">
                            AKSI
                        </th>

                    </tr>

                </thead>

                <tbody id="inboxTable">

                    @forelse ($inbox as $item)

                        <tr class="inbox-row">

                            <td>
                                <span class="sender-name">
                                    {{ $item->name ?? 'Anonim' }}
                                </span>
                            </td>

                            <td>
                                <span
                                    class="email-text"
                                    title="{{ $item->email }}"
                                >
                                    {{ $item->email ?? '-' }}
                                </span>
                            </td>

                            <td>
                                <span class="program-text">
                                    {{ $item->program ?? '-' }}
                                </span>
                            </td>

                            <td>
                                <span
                                    class="message-text"
                                    title="{{ $item->message ?? '-' }}"
                                >
                                    {{ $item->message ?? '-' }}
                                </span>
                            </td>

                            <td>
                                <span class="date-text">
                                    {{ $item->created_at->format('d M Y') }}
                                </span>
                            </td>

                            <td>

                                <div class="action-btn-group">

                                    <a
                                        href="{{ route('admin-inbox.edit', $item->id) }}"
                                        class="action-link action-link-edit"
                                    >
                                        <i class="bi bi-pencil"></i>
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin-inbox.destroy', $item->id) }}"
                                        method="POST"
                                        class="d-inline"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-link action-link-delete"
                                            onclick="return confirm('Yakin ingin menghapus pesan ini?')"
                                        >
                                            <i class="bi bi-trash"></i>
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>

                                    <div class="empty-title">
                                        Belum ada inbox
                                    </div>

                                    <p class="empty-text">
                                        Belum ada pesan yang masuk melalui website.
                                    </p>

                                    <a
                                        href="{{ route('admin-inbox.create') }}"
                                        class="btn-top-add"
                                    >
                                        <i class="bi bi-plus-lg"></i>
                                        <span>Tambah Inbox</span>
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if ($inbox->hasPages())

            <div class="pagination-wrapper">
                {{ $inbox->links() }}
            </div>

        @endif

    </div>


    @push('scripts')
<script>

    document
        .getElementById('inboxSearch')
        .addEventListener('input', function () {

            const search = this.value.toLowerCase().trim();

            const rows = document.querySelectorAll('.inbox-row');

            rows.forEach(function (row) {

                const text = row.textContent.toLowerCase();

                row.style.display = text.includes(search)
                    ? ''
                    : 'none';

            });

        });

</script>
    @endpush

</x-admin.layout>
