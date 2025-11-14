<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Warga - Binadesa</title>
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
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Admin Panel</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Data Warga</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Kelola semua data warga yang terdaftar dalam sistem.</p>
                        </div>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                    <div class="row justify-content-center mb-4">
                        <div class="col-lg-10">
                            <div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="fade-up">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="row justify-content-center mb-4">
                        <div class="col-lg-10">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" data-aos="fade-up">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card-wrapper" data-aos="fade-up" data-aos-delay="300">
                                <!-- Header Card -->
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="mb-1 fw-bold">Daftar Data Warga</h5>
                                                <p class="text-muted mb-0">Total {{ $warga->count() }} warga terdaftar</p>
                                            </div>
                                            <a href="{{ route('warga.create') }}" class="btn btn-success">
                                                <i class="bi bi-plus-circle me-2"></i>Tambah Data Warga
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                @if($warga && $warga->count() > 0)
                                    <!-- Warga Cards Grid -->
                                    <div class="row g-4">
                                        @foreach($warga as $data)
                                        <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                                            <div class="card news-card border-0 shadow-sm w-100">
                                                <div class="card-body d-flex flex-column">
                                                    <!-- Header dengan avatar dan nomor -->
                                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                                        <div class="warga-avatar">
                                                            <div class="avatar-wrapper bg-primary bg-opacity-10 rounded-circle p-3">
                                                                <i class="bi bi-person-fill text-primary fs-4"></i>
                                                            </div>
                                                        </div>
                                                        <div class="warga-number">
                                                            <span class="badge bg-secondary">#{{ $loop->iteration }}</span>
                                                        </div>
                                                    </div>

                                                    <!-- Nama Warga -->
                                                    <h5 class="card-title mb-2 text-truncate" title="{{ $data->nama }}">{{ $data->nama }}</h5>

                                                    <!-- No KTP -->
                                                    <div class="mb-3">
                                                        <div class="ktp-container">
                                                            <i class="bi bi-person-badge text-muted me-2"></i>
                                                            <code class="text-muted small">{{ $data->no_ktp }}</code>
                                                        </div>
                                                    </div>

                                                    <!-- Info Demografi -->
                                                    <div class="mb-3">
                                                        <div class="demografi-container">
                                                            <div class="d-flex flex-wrap gap-2">
                                                                <span class="badge bg-{{ $data->jenis_kelamin == 'Laki-laki' ? 'primary' : 'success' }}">
                                                                    {{ $data->jenis_kelamin }}
                                                                </span>
                                                                <span class="badge bg-info text-dark">
                                                                    {{ $data->agama ?? '-' }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Pekerjaan -->
                                                    <div class="mb-3">
                                                        <div class="pekerjaan-container">
                                                            <small class="text-muted d-block mb-1">Pekerjaan</small>
                                                            <span class="fw-medium text-truncate d-block" title="{{ $data->pekerjaan ?? '-' }}">
                                                                {{ $data->pekerjaan ?? '-' }}
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <!-- Kontak Info -->
                                                    <div class="mb-3 flex-grow-1">
                                                        <div class="kontak-container h-100">
                                                            <div class="mb-2">
                                                                <small class="text-muted d-block mb-1">
                                                                    <i class="bi bi-telephone me-1"></i>Telepon
                                                                </small>
                                                                <span class="fw-medium text-truncate d-block" title="{{ $data->telp ?? '-' }}">
                                                                    {{ $data->telp ?? '-' }}
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <small class="text-muted d-block mb-1">
                                                                    <i class="bi bi-envelope me-1"></i>Email
                                                                </small>
                                                                <span class="fw-medium text-truncate d-block" title="{{ $data->email ?? '-' }}">
                                                                    {{ $data->email ?? '-' }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Action Buttons -->
                                                    <div class="mt-auto">
                                                        <div class="btn-group w-100">
                                                            <a href="{{ route('warga.edit', $data->warga_id) }}"
                                                               class="btn btn-sm btn-outline-primary flex-fill"
                                                               data-bs-toggle="tooltip"
                                                               title="Edit Data">
                                                                <i class="bi bi-pencil"></i>
                                                            </a>
                                                            <form action="{{ route('warga.destroy', $data->warga_id) }}"
                                                                  method="POST"
                                                                  class="d-inline flex-fill">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                        class="btn btn-sm btn-outline-danger w-100"
                                                                        data-bs-toggle="tooltip"
                                                                        title="Hapus Data"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data warga {{ $data->nama }}?')">
                                                                    <i class="bi bi-trash"></i>
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
                                    @if ($warga->hasPages())
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <nav aria-label="Page navigation">
                                                {{ $warga->links() }}
                                            </nav>
                                        </div>
                                    </div>
                                    @endif
                                @else
                                    <!-- Empty State -->
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body text-center py-5">
                                            <div class="mb-4">
                                                <i class="bi bi-people display-1 text-muted"></i>
                                            </div>
                                            <h4 class="text-muted mb-3">Belum ada data warga</h4>
                                            <p class="text-muted mb-4">Mulai dengan menambahkan data warga pertama Anda.</p>
                                            <a href="{{ route('warga.create') }}" class="btn btn-success">
                                                <i class="bi bi-plus-circle me-2"></i>Tambah Data Warga
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
            .news-card {
                transition: all 0.3s ease;
                border: 1px solid #e9ecef;
                min-height: 420px; /* PERBAIKAN: Set tinggi minimum yang sama */
                display: flex;
                flex-direction: column;
            }

            .news-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
                border-color: #2e7d32;
            }

            .news-card .card-body {
                flex: 1;
                display: flex;
                flex-direction: column;
                padding: 1.5rem; /* PERBAIKAN: Padding konsisten */
            }

            .news-card .card-title {
                font-size: 1.1rem;
                line-height: 1.4;
                color: #2c3e50;
                min-height: 2.8rem; /* PERBAIKAN: Tinggi konsisten untuk judul */
                display: flex;
                align-items: center;
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
                width: 60px;
                height: 60px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .news-card:hover .avatar-wrapper {
                background: linear-gradient(135deg, #2e7d32, #4caf50) !important;
            }

            .news-card:hover .avatar-wrapper i {
                color: white !important;
            }

            .ktp-container, .demografi-container, .pekerjaan-container, .kontak-container {
                background: #f8f9fa;
                padding: 0.75rem;
                border-radius: 6px;
                border: 1px solid #e9ecef;
                min-height: 3rem; /* PERBAIKAN: Tinggi konsisten untuk container */
                display: flex;
                align-items: center;
            }

            .kontak-container {
                flex-direction: column;
                align-items: flex-start;
                min-height: 6rem; /* PERBAIKAN: Tinggi khusus untuk kontak */
            }

            .pekerjaan-container {
                min-height: 4rem; /* PERBAIKAN: Tinggi khusus untuk pekerjaan */
            }

            /* PERBAIKAN: Pastikan semua card memiliki tinggi yang sama */
            .col-xl-4, .col-lg-6, .col-md-6 {
                display: flex;
            }

            .news-card .btn-group {
                margin-top: auto; /* PERBAIKAN: Tombol selalu di bawah */
            }

            /* PERBAIKAN: Text truncation untuk konsistensi */
            .text-truncate {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .news-card {
                    min-height: 380px;
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

                .col-md-4, .col-md-6 {
                    margin-bottom: 1rem;
                }

                .news-card .card-body {
                    padding: 1.25rem;
                }
            }

            @media (max-width: 576px) {
                .news-card {
                    min-height: 360px;
                }

                .news-card .card-body {
                    padding: 1rem;
                }

                .avatar-wrapper {
                    width: 50px;
                    height: 50px;
                }

                .ktp-container, .demografi-container, .pekerjaan-container, .kontak-container {
                    padding: 0.5rem;
                    min-height: 2.5rem;
                }

                .kontak-container {
                    min-height: 5rem;
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

            // PERBAIKAN: Set tinggi card yang sama secara dinamis
            document.addEventListener('DOMContentLoaded', function() {
                function setEqualCardHeights() {
                    const cards = document.querySelectorAll('.news-card');
                    let maxHeight = 0;

                    // Reset heights first
                    cards.forEach(card => {
                        card.style.height = 'auto';
                    });

                    // Find the tallest card
                    cards.forEach(card => {
                        const cardHeight = card.offsetHeight;
                        if (cardHeight > maxHeight) {
                            maxHeight = cardHeight;
                        }
                    });

                    // Set all cards to the same height
                    cards.forEach(card => {
                        card.style.height = maxHeight + 'px';
                    });
                }

                // Set equal heights on load and resize
                setEqualCardHeights();
                window.addEventListener('resize', setEqualCardHeights);
            });
        </script>
    @endsection
</body>
</html>
