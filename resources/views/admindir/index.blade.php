<x-admin.layout title="Kelola Akun - Admin NARRA" :brandHref="url('/')">

    @push('styles')
        <style>
            /* Page-specific styles. Shared admin chrome/forms live in css/admin.css. */

:root {
            --primary-blue: #2b66f6;
            --primary-blue-hover: #1e52d8;
            --light-bg: #f8f9fa;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --danger-red: #ef4444;
            --danger-red-hover: #dc2626;
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

        .admin-name-table {
            font-weight: 700;
            color: #0f172a;
        }

        .email-text {
            color: #64748b;
        }

        /* =========================
           Role Badge
        ========================= */

        .role-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.35rem 0.7rem;
            border-radius: 0.4rem;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .role-super-admin {
            background-color: #eff4fe;
            color: var(--primary-blue);
        }

        .role-admin {
            background-color: #f1f5f9;
            color: #475569;
        }

        /* =========================
           Actions
        ========================= */

        .action-btn-group {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 1.25rem;
        }

        .action-link {
            font-weight: 600;
            font-size: 0.825rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            transition: all 0.2s ease;
            border: none;
            background: none;
            padding: 0;
        }

        .action-link-edit {
            color: var(--primary-blue);
        }

        .action-link-edit:hover {
            color: var(--primary-blue-hover);
            text-decoration: underline;
        }

        .action-link-delete {
            color: var(--danger-red);
        }

        .action-link-delete:hover {
            color: var(--danger-red-hover);
            text-decoration: underline;
        }
        </style>
    @endpush


    <!-- Header -->

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

        <div>

            <h1 class="page-title">
                Kelola Akun
            </h1>

            <p class="page-subtitle m-0">
                Kelola akun administrator yang memiliki akses ke sistem NARRA.
            </p>

        </div>

        <div>

            <a
                href="{{ route('admin-admins.create') }}"
                class="btn-top-add"
            >
                <i class="bi bi-plus-lg"></i>
                <span>Tambah Admin</span>
            </a>

        </div>

    </div>


    <!-- Search -->

    <div class="search-container">

        <i class="bi bi-search search-icon"></i>

        <input
            type="text"
            id="adminSearch"
            class="search-input"
            placeholder="Cari nama, email, atau role..."
        >

    </div>


    <!-- Table -->

    <div class="table-card">

        <div class="table-responsive">

            <table class="table custom-table mb-0">

                <thead>

                    <tr>

                        <th scope="col" style="width: 25%;">
                            NAMA
                        </th>

                        <th scope="col" style="width: 30%;">
                            EMAIL
                        </th>

                        <th scope="col" style="width: 20%;">
                            ROLE
                        </th>

                        <th scope="col" style="width: 25%;" class="text-end">
                            AKSI
                        </th>

                    </tr>

                </thead>

                <tbody id="adminTable">

                    @forelse ($admin as $admins)

                        <tr class="admin-row">

                            <td>
                                <span class="admin-name-table">
                                    {{ $admins->name }}
                                </span>
                            </td>

                            <td>
                                <span class="email-text">
                                    {{ $admins->email }}
                                </span>
                            </td>

                            <td>

                                @if ($admins->role === 'super_admin')

                                    <span class="role-badge role-super-admin">
                                        Super Admin
                                    </span>

                                @else

                                    <span class="role-badge role-admin">
                                        Admin
                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="action-btn-group">

                                    <a
                                        href="{{ route('admin-admins.edit', $admins) }}"
                                        class="action-link action-link-edit"
                                    >
                                        <i class="bi bi-pencil"></i>
                                        Edit
                                    </a>

                                    @if ($admins->id !== auth()->id())

                                        <form
                                            action="{{ route('admin-admins.destroy', $admins) }}"
                                            method="POST"
                                            class="d-inline"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-link action-link-delete"
                                                onclick="return confirm('Yakin ingin menghapus akun admin ini?')"
                                            >
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        <i class="bi bi-people"></i>
                                    </div>

                                    <div class="empty-title">
                                        Belum ada administrator
                                    </div>

                                    <p class="empty-text">
                                        Belum ada akun administrator yang tersedia.
                                    </p>

                                    <a
                                        href="{{ route('admin-admins.create') }}"
                                        class="btn-top-add"
                                    >
                                        <i class="bi bi-plus-lg"></i>
                                        <span>Tambah Admin</span>
                                    </a>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    @push('scripts')
<script>

    document
        .getElementById('adminSearch')
        .addEventListener('input', function () {

            const search = this.value.toLowerCase().trim();

            const rows = document.querySelectorAll('.admin-row');

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
