<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data User - Binadesa</title>

    @extends('layouts.guest.app')
    @section('content')
        <!-- ======= Main =======-->
        <main>

            <!-- ======= Data Section =======-->
            <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Admin Panel</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Data User</h2>
                            <p data-aos="fade-up" data-aos-delay="200">List data seluruh user dalam sistem.</p>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="row justify-content-center mb-4">
                            <div class="col-lg-8">
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    {!! session('success') !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="row justify-content-center mb-4">
                            <div class="col-lg-8">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {!! session('error') !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div data-aos="fade-up" data-aos-delay="300">
                                <!-- Header Card -->
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="mb-1 fw-bold">Daftar User</h5>
                                                <p class="text-muted mb-0">Total {{ $dataUser->count() }} user terdaftar</p>
                                            </div>
                                            <a href="{{ route('user.create') }}" class="btn btn-success">
                                                <i class="bi bi-plus-circle me-2"></i>Tambah User
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                @if ($dataUser && $dataUser->count() > 0)
                                    <!-- User List -->
                                    <div class="row g-4">
                                        @foreach ($dataUser as $item)
                                            <div class="col-12">
                                                <div class="card user-card border-0 shadow-sm h-100">
                                                    <div class="card-body p-4">
                                                        <div class="row align-items-center">
                                                            <!-- Kolom 1: Nomor dan Avatar -->
                                                            <div class="col-md-2">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="user-avatar me-3">
                                                                        <span class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center">
                                                                            {{ $loop->iteration }}
                                                                        </span>
                                                                    </div>
                                                                    <div>
                                                                        <h6 class="mb-1 fw-bold text-dark">{{ $item->name }}</h6>
                                                                        <small class="text-muted">User ID: {{ $item->id }}</small>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Kolom 2: Email -->
                                                            <div class="col-md-3">
                                                                <div class="user-email">
                                                                    <small class="text-muted d-block mb-1">Email</small>
                                                                    <span class="fw-medium">{{ $item->email }}</span>
                                                                </div>
                                                            </div>

                                                            <!-- Kolom 3: Password -->
                                                            <div class="col-md-3">
                                                                <div class="user-password">
                                                                    <small class="text-muted d-block mb-1">Password</small>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="text-muted me-2 password-dots">••••••••</span>
                                                                        <button type="button"
                                                                                class="btn btn-outline-secondary btn-sm password-toggle"
                                                                                onclick="togglePassword({{ $item->id }})"
                                                                                data-bs-toggle="tooltip"
                                                                                title="Tampilkan Password">
                                                                            <i class="bi bi-eye"></i>
                                                                        </button>
                                                                        <span id="password-{{ $item->id }}"
                                                                              class="password-text d-none fw-medium text-success">
                                                                            {{ $item->plain_password ?? 'Tidak tersedia' }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Kolom 4: Aksi -->
                                                            <div class="col-md-4">
                                                                <div class="d-flex justify-content-end gap-2">
                                                                    <a href="{{ route('user.edit', $item->id) }}"
                                                                       class="btn btn-info btn-sm d-flex align-items-center">
                                                                        <i class="bi bi-pencil me-1"></i>Edit
                                                                    </a>
                                                                    <form action="{{ route('user.destroy', $item->id) }}"
                                                                          method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                                class="btn btn-danger btn-sm d-flex align-items-center"
                                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                                            <i class="bi bi-trash me-1"></i>Hapus
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <!-- Empty State -->
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body text-center py-5">
                                            <div class="mb-4">
                                                <i class="bi bi-person-x display-1 text-muted"></i>
                                            </div>
                                            <h4 class="text-muted mb-3">Tidak ada data user</h4>
                                            <p class="text-muted mb-4">Mulai dengan menambahkan user pertama ke sistem.</p>
                                            <a href="{{ route('user.create') }}" class="btn btn-success">
                                                <i class="bi bi-plus-circle me-2"></i>Tambah User Pertama
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Data Section-->

        </main>

        <style>
            .user-card {
                transition: all 0.3s ease;
                border: 1px solid #e9ecef;
            }

            .user-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
                border-color: #198754;
            }

            .user-avatar .badge {
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.9rem;
                font-weight: 600;
            }

            .user-email span {
                font-size: 0.95rem;
                word-break: break-all;
            }

            .password-toggle {
                padding: 0.2rem 0.4rem;
                font-size: 0.75rem;
            }

            .password-dots {
                font-size: 0.9rem;
                letter-spacing: 1px;
            }

            .password-text {
                font-size: 0.9rem;
            }

            .btn-sm {
                padding: 0.4rem 0.8rem;
                font-size: 0.85rem;
                border-radius: 6px;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .card-body {
                    padding: 1.5rem !important;
                }

                .row.align-items-center {
                    gap: 1rem;
                }

                .col-md-2,
                .col-md-3,
                .col-md-4 {
                    margin-bottom: 1rem;
                }

                .d-flex.justify-content-end {
                    justify-content: start !important;
                }

                .user-avatar .badge {
                    width: 35px;
                    height: 35px;
                }

                .d-flex.align-items-center {
                    flex-direction: column;
                    align-items: start !important;
                    gap: 0.5rem;
                }
            }

            @media (max-width: 576px) {
                .card-body {
                    padding: 1.25rem !important;
                }

                .user-email,
                .user-password {
                    text-align: left;
                }

                .d-flex.justify-content-end {
                    flex-wrap: wrap;
                }

                .btn-sm {
                    flex: 1;
                    min-width: 80px;
                }
            }
        </style>

        <script>
            function togglePassword(userId) {
                const passwordDots = document.querySelector(`#password-${userId}`).previousElementSibling.previousElementSibling;
                const passwordText = document.querySelector(`#password-${userId}`);
                const toggleButton = document.querySelector(`[onclick="togglePassword(${userId})"]`);
                const icon = toggleButton.querySelector('i');

                if (passwordText.classList.contains('d-none')) {
                    // Show password
                    passwordDots.classList.add('d-none');
                    passwordText.classList.remove('d-none');
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                    toggleButton.setAttribute('title', 'Sembunyikan Password');
                } else {
                    // Hide password
                    passwordDots.classList.remove('d-none');
                    passwordText.classList.add('d-none');
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                    toggleButton.setAttribute('title', 'Tampilkan Password');
                }

                // Update tooltip
                const tooltip = bootstrap.Tooltip.getInstance(toggleButton);
                if (tooltip) {
                    tooltip.hide();
                    tooltip.setContent({ '.tooltip-inner': toggleButton.getAttribute('title') });
                }
            }

            // Initialize tooltips
            document.addEventListener('DOMContentLoaded', function() {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });
        </script>
    @endsection
