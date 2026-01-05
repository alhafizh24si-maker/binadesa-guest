<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data User - Binadesa</title>
</head>

<body>
    @extends('layouts.guest.app')
    @section('content')
        <!-- ======= Main =======-->
        <main>

            <!-- ======= Data Section =======-->
            <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Admin
                                Panel</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Data User</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Kelola semua user yang terdaftar dalam sistem.</p>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="row justify-content-center mb-4">
                            <div class="col-lg-10">
                                <div class="alert alert-success alert-dismissible fade show" role="alert"
                                    data-aos="fade-up">
                                    <i class="bi bi-check-circle-fill me-2"></i>
                                    {!! session('success') !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="row justify-content-center mb-4">
                            <div class="col-lg-10">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                    data-aos="fade-up">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    {!! session('error') !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card-wrapper" data-aos="fade-up" data-aos-delay="300">

                                <!-- Search & Filter Form -->
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-body">
                                        <form method="GET" action="{{ route('user.index') }}" id="searchForm">
                                            <div class="row g-3 align-items-center">
                                                <!-- Search Box -->
                                                <div class="col-md-4">
                                                    <label class="form-label fw-medium">Search</label>
                                                    <div class="input-group">
                                                        <input type="text" name="search" class="form-control"
                                                            value="{{ request('search') }}"
                                                            placeholder="Cari nama atau email...">
                                                        <button type="submit" class="btn btn-primary">
                                                            <svg width="16" height="16" fill="currentColor"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Filter Name -->
                                                <div class="col-md-4">
                                                    <label class="form-label fw-medium">Filter Nama</label>
                                                    <div class="input-group">
                                                        <input type="text" name="filter_name" class="form-control"
                                                            value="{{ request('filter_name') }}"
                                                            placeholder="Filter berdasarkan nama...">
                                                        <button type="submit" class="btn btn-outline-primary">
                                                            <i class="bi bi-funnel"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="col-md-4">
                                                    <label class="form-label">&nbsp;</label>
                                                    <div class="d-flex gap-2">
                                                        @if (request('search') || request('filter_name'))
                                                            <a href="{{ route('user.index') }}"
                                                                class="btn btn-outline-secondary flex-fill">
                                                                <i class="bi bi-arrow-clockwise me-1"></i>Reset
                                                            </a>
                                                        @endif
                                                        <a href="{{ route('user.create') }}"
                                                            class="btn btn-success flex-fill">
                                                            <i class="bi bi-plus-circle me-1"></i>Tambah
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Active Filters Info -->
                                            @if (request('search') || request('filter_name'))
                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <div class="d-flex flex-wrap gap-2 align-items-center">
                                                            <small class="text-muted">Filter aktif:</small>
                                                            @if (request('search'))
                                                                <span class="badge bg-primary">
                                                                    Search: "{{ request('search') }}"
                                                                    <a href="{{ route('user.index', ['filter_name' => request('filter_name')]) }}"
                                                                        class="text-white ms-1"
                                                                        style="text-decoration: none;">×</a>
                                                                </span>
                                                            @endif
                                                            @if (request('filter_name'))
                                                                <span class="badge bg-info text-dark">
                                                                    Nama: "{{ request('filter_name') }}"
                                                                    <a href="{{ route('user.index', ['search' => request('search')]) }}"
                                                                        class="text-dark ms-1"
                                                                        style="text-decoration: none;">×</a>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>

                                <!-- Header Card -->
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="mb-1 fw-bold">Daftar User</h5>
                                                <p class="text-muted mb-0">
                                                    Total {{ $dataUser->total() }} user terdaftar
                                                    @if (request('search') || request('filter_name'))
                                                        ({{ $dataUser->count() }} ditemukan)
                                                    @endif
                                                </p>
                                            </div>
                                            <a href="{{ route('user.create') }}" class="btn btn-success">
                                                <i class="bi bi-plus-circle me-2"></i>Tambah User
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                @if ($dataUser->count() > 0)
                                    <!-- User Cards Grid -->
                                    <div class="row g-4">
                                        @foreach ($dataUser as $item)
                                            <div class="col-xl-4 col-lg-6 col-md-6">
                                                <div class="card news-card border-0 shadow-sm h-100" data-aos="fade-up"
                                                    data-aos-delay="{{ $loop->index * 100 }}">
                                                    <div class="card-body">
                                                        <!-- Header dengan avatar dan nomor -->
                                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                                            <div class="user-avatar">
                                                                @if ($item->profile_picture)
                                                                    <img src="{{ $item->profile_picture_url }}"
                                                                        class="rounded-circle border"
                                                                        style="width: 60px; height: 60px; object-fit: cover;">
                                                                @else
                                                                    <div
                                                                        class="avatar-wrapper bg-primary bg-opacity-10 rounded-circle p-3">
                                                                        <i class="bi bi-person-fill text-primary fs-4"></i>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="user-number">
                                                                <span
                                                                    class="badge bg-secondary">#{{ ($dataUser->currentPage() - 1) * $dataUser->perPage() + $loop->iteration }}</span>
                                                            </div>
                                                        </div>

                                                        <!-- Nama User dengan highlight jika filter aktif -->
                                                        <h5 class="card-title mb-2">
                                                            @if (request('filter_name'))
                                                                @php
                                                                    $name = $item->name;
                                                                    $filterName = request('filter_name');
                                                                    $highlightedName = preg_replace(
                                                                        '/(' . preg_quote($filterName, '/') . ')/i',
                                                                        '<mark class="bg-warning">$1</mark>',
                                                                        $name,
                                                                    );
                                                                @endphp
                                                                {!! $highlightedName !!}
                                                            @else
                                                                {{ $item->name }}
                                                            @endif
                                                        </h5>

                                                        <!-- Email -->
                                                        <div class="mb-3">
                                                            <div class="email-container">
                                                                <i class="bi bi-envelope text-muted me-2"></i>
                                                                <span class="text-muted small">
                                                                    @if (request('search'))
                                                                        @php
                                                                            $email = $item->email;
                                                                            $searchTerm = request('search');
                                                                            $highlightedEmail = preg_replace(
                                                                                '/(' .
                                                                                    preg_quote($searchTerm, '/') .
                                                                                    ')/i',
                                                                                '<mark class="bg-warning">$1</mark>',
                                                                                $email,
                                                                            );
                                                                        @endphp
                                                                        {!! $highlightedEmail !!}
                                                                    @else
                                                                        {{ $item->email }}
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <!-- Tambahkan setelah bagian User ID (sebelum Password Toggle) -->
                                                        <div class="mb-3">
                                                            <div class="role-container">
                                                                <i class="bi bi-person-gear text-muted me-2"></i>
                                                                <span class="text-muted small">
                                                                    Role:
                                                                    @php
                                                                        $roleColors = [
                                                                            'Super Admin' => 'danger',
                                                                            'Admin' => 'primary',
                                                                            'Guest' => 'secondary',
                                                                        ];
                                                                        $color =
                                                                            $roleColors[$item->role] ?? 'secondary';
                                                                    @endphp
                                                                    <span class="badge bg-{{ $color }}">
                                                                        {{ $item->role }}
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <!-- User ID -->
                                                        <div class="mb-3">
                                                            <div class="user-id-container">
                                                                <i class="bi bi-person-badge text-muted me-2"></i>
                                                                <code class="text-muted small">ID:
                                                                    {{ $item->id }}</code>
                                                            </div>
                                                        </div>

                                                        <!-- Password Toggle -->
                                                        <div class="mb-4">
                                                            <div class="password-container">
                                                                <small class="text-muted d-block mb-2">Password</small>
                                                                <div class="d-flex align-items-center">
                                                                    <span
                                                                        class="text-muted me-2 password-dots">••••••••</span>
                                                                    <button type="button"
                                                                        class="btn btn-outline-secondary btn-sm password-toggle"
                                                                        onclick="togglePassword({{ $item->id }})"
                                                                        data-bs-toggle="tooltip"
                                                                        title="Tampilkan Password">
                                                                        <i class="bi bi-eye"></i>
                                                                    </button>
                                                                    <span id="password-{{ $item->id }}"
                                                                        class="password-text d-none fw-medium text-success ms-2">
                                                                        {{ $item->plain_password ?? 'Tidak tersedia' }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Action Buttons -->
                                                    <div class="card-footer bg-transparent border-0 pt-0">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group w-100">
                                                                <a href="{{ route('user.edit', $item->id) }}"
                                                                    class="btn btn-sm btn-outline-primary flex-fill"
                                                                    data-bs-toggle="tooltip" title="Edit User">
                                                                    <i class="bi bi-pencil"></i> Edit
                                                                </a>
                                                                <form action="{{ route('user.destroy', $item->id) }}"
                                                                    method="POST" class="d-inline flex-fill">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-outline-danger w-100"
                                                                        data-bs-toggle="tooltip" title="Hapus User"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus user {{ $item->name }}?')">
                                                                        <i class="bi bi-trash"></i> Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Pagination -->
                                    <div class="mt-4">
                                        {{ $dataUser->links('pagination::bootstrap-5') }}
                                    </div>
                                @else
                                    <!-- Empty State -->
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body text-center py-5">
                                            <div class="mb-4">
                                                <i class="bi bi-person-x display-1 text-muted"></i>
                                            </div>
                                            <h4 class="text-muted mb-3">
                                                @if (request('search') || request('filter_name'))
                                                    Tidak ada user yang ditemukan
                                                @else
                                                    Belum ada data user
                                                @endif
                                            </h4>
                                            <p class="text-muted mb-4">
                                                @if (request('search') || request('filter_name'))
                                                    Coba ubah kata kunci pencarian atau filter nama Anda.
                                                @else
                                                    Mulai dengan menambahkan user pertama ke sistem.
                                                @endif
                                            </p>
                                            <div class="d-flex gap-2 justify-content-center">
                                                @if (request('search') || request('filter_name'))
                                                    <a href="{{ route('user.index') }}"
                                                        class="btn btn-outline-secondary">
                                                        <i class="bi bi-arrow-clockwise me-1"></i>Reset Pencarian
                                                    </a>
                                                @endif
                                                <a href="{{ route('user.create') }}" class="btn btn-success">
                                                    <i class="bi bi-plus-circle me-2"></i>Tambah User
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
            </section>
            <!-- End Data Section-->

        </main>

        <style>
            .news-card {
                transition: all 0.3s ease;
                border: 1px solid #e9ecef;
            }

            .news-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
                border-color: #2e7d32;
            }

            .news-card .card-title {
                font-size: 1.1rem;
                line-height: 1.4;
                color: #2c3e50;
            }

            .news-card .card-text {
                line-height: 1.5;
            }

            .news-card .badge {
                font-size: 0.75rem;
                padding: 0.35em 0.65em;
            }

            .news-card .btn-group .btn {
                padding: 0.25rem 0.75rem;
                font-size: 0.875rem;
                border-radius: 6px;
            }

            .avatar-wrapper {
                transition: all 0.3s ease;
            }

            .news-card:hover .avatar-wrapper {
                background: linear-gradient(135deg, #2e7d32, #4caf50) !important;
            }

            .news-card:hover .avatar-wrapper i {
                color: white !important;
            }

            .email-container,
            .user-id-container,
            .password-container {
                background: #f8f9fa;
                padding: 0.5rem;
                border-radius: 6px;
                border: 1px solid #e9ecef;
            }

            mark {
                padding: 0.1em 0.2em;
                border-radius: 3px;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .news-card {
                    margin-bottom: 1.5rem;
                }

                .d-flex.justify-content-between.align-items-center {
                    flex-direction: column;
                    gap: 1rem;
                }

                .btn-group {
                    width: 100%;
                    justify-content: center;
                }

                .col-md-4 {
                    margin-bottom: 1rem;
                }
            }

            @media (max-width: 576px) {
                .news-card .card-body {
                    padding: 1.25rem;
                }

                .news-card .card-footer {
                    padding: 1rem 1.25rem;
                }
            }
        </style>

        <script>
            // Initialize tooltips
            document.addEventListener('DOMContentLoaded', function() {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });
            });

            // Add hover effects
            document.querySelectorAll('.news-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Password toggle function
            function togglePassword(userId) {
                const passwordDots = document.querySelector(`#password-${userId}`).previousElementSibling
                    .previousElementSibling;
                const passwordText = document.querySelector(`#password-${userId}`);
                const toggleButton = document.querySelector(`[onclick="togglePassword(${userId})"]`);

                if (passwordText.classList.contains('d-none')) {
                    passwordDots.classList.add('d-none');
                    passwordText.classList.remove('d-none');
                    toggleButton.innerHTML = '<i class="bi bi-eye-slash"></i>';
                    toggleButton.setAttribute('title', 'Sembunyikan Password');
                } else {
                    passwordDots.classList.remove('d-none');
                    passwordText.classList.add('d-none');
                    toggleButton.innerHTML = '<i class="bi bi-eye"></i>';
                    toggleButton.setAttribute('title', 'Tampilkan Password');
                }

                // Update tooltip
                const tooltip = bootstrap.Tooltip.getInstance(toggleButton);
                if (tooltip) {
                    tooltip.hide();
                    toggleButton.setAttribute('data-bs-original-title', toggleButton.getAttribute('title'));
                }
            }

            // Auto submit form when filter name changes (optional)
            document.querySelector('input[name="filter_name"]').addEventListener('input', function(e) {
                if (e.target.value.length >= 3 || e.target.value.length === 0) {
                    setTimeout(() => {
                        document.getElementById('searchForm').submit();
                    }, 500);
                }
            });
        </script>
    @endsection
</body>

</html>
