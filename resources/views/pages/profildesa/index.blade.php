<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Profil Desa - Binadesa</title>
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
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Data Profil Desa</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Kelola informasi profil desa.</p>
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
                                        <form method="GET" action="{{ route('profildesa.index') }}" id="searchForm">
                                            <div class="row g-3 align-items-center">
                                                <!-- Search Box -->
                                                <div class="col-md-5">
                                                    <label class="form-label fw-medium">Search</label>
                                                    <div class="input-group">
                                                        <input type="text" name="search" class="form-control"
                                                            value="{{ request('search') }}"
                                                            placeholder="Cari nama desa, kecamatan, atau kabupaten...">
                                                        <button type="submit" class="btn btn-primary">
                                                            <svg width="16" height="16" fill="currentColor"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Filter Provinsi -->
                                                <div class="col-md-5">
                                                    <label class="form-label fw-medium">Filter Provinsi</label>
                                                    <div class="input-group">
                                                        <input type="text" name="filter_provinsi" class="form-control"
                                                            value="{{ request('filter_provinsi') }}"
                                                            placeholder="Filter berdasarkan provinsi...">
                                                        <button type="submit" class="btn btn-outline-primary">
                                                            <i class="bi bi-funnel"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="col-md-2">
                                                    <label class="form-label">&nbsp;</label>
                                                    <div class="d-flex gap-2">
                                                        @if (request('search') || request('filter_provinsi'))
                                                            <a href="{{ route('profildesa.index') }}"
                                                                class="btn btn-outline-secondary flex-fill">
                                                                <i class="bi bi-arrow-clockwise me-1"></i>Reset
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Active Filters Info -->
                                            @if (request('search') || request('filter_provinsi'))
                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <div class="d-flex flex-wrap gap-2 align-items-center">
                                                            <small class="text-muted">Filter aktif:</small>
                                                            @if (request('search'))
                                                                <span class="badge bg-primary">
                                                                    Search: "{{ request('search') }}"
                                                                    <a href="{{ route('profildesa.index', ['filter_provinsi' => request('filter_provinsi')]) }}"
                                                                        class="text-white ms-1"
                                                                        style="text-decoration: none;">×</a>
                                                                </span>
                                                            @endif
                                                            @if (request('filter_provinsi'))
                                                                <span class="badge bg-info text-dark">
                                                                    Provinsi: "{{ request('filter_provinsi') }}"
                                                                    <a href="{{ route('profildesa.index', ['search' => request('search')]) }}"
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
                                                <h5 class="mb-1 fw-bold">Daftar Profil Desa</h5>
                                                <p class="text-muted mb-0">
                                                    Total {{ $profil->total() }} profil desa terdaftar
                                                    @if (request('search') || request('filter_provinsi'))
                                                        ({{ $profil->count() }} ditemukan)
                                                    @endif
                                                </p>
                                            </div>
                                            @if($profil->isEmpty())
                                                <a href="{{ route('profildesa.create') }}" class="btn btn-success">
                                                    <i class="bi bi-plus-circle me-2"></i>Tambah Profil
                                                </a>
                                            @else
                                                <span class="badge bg-warning text-dark">
                                                    <i class="bi bi-info-circle me-1"></i>Hanya 1 profil yang aktif
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @if ($profil->count() > 0)
                                    <!-- Profil Cards Grid -->
                                    <div class="row">
                                        @foreach ($profil as $item)
                                            <div class="col-lg-6 col-md-8 mx-auto">
                                                <div class="card news-card border-0 shadow-sm h-100" data-aos="fade-up"
                                                    data-aos-delay="{{ $loop->index * 100 }}">
                                                    <div class="card-body">
                                                        <!-- Header dengan icon desa -->
                                                        <div class="d-flex justify-content-between align-items-start mb-4">
                                                            <div class="desa-icon">
                                                                <div
                                                                    class="icon-wrapper bg-success bg-opacity-10 rounded-circle p-3">
                                                                    <i class="bi bi-house-door-fill text-success fs-4"></i>
                                                                </div>
                                                            </div>
                                                            <div class="profil-status">
                                                                <span class="badge bg-primary">
                                                                    <i class="bi bi-check-circle me-1"></i>Aktif
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <!-- Nama Desa dengan highlight jika filter aktif -->
                                                        <h3 class="card-title mb-3 text-success">
                                                            @if (request('search'))
                                                                @php
                                                                    $namaDesa = $item->nama_desa;
                                                                    $searchTerm = request('search');
                                                                    $highlighted = preg_replace(
                                                                        '/(' . preg_quote($searchTerm, '/') . ')/i',
                                                                        '<mark class="bg-warning">$1</mark>',
                                                                        $namaDesa,
                                                                    );
                                                                @endphp
                                                                {!! $highlighted !!}
                                                            @else
                                                                {{ $item->nama_desa }}
                                                            @endif
                                                        </h3>

                                                        <!-- Lokasi -->
                                                        <div class="mb-4">
                                                            <div class="location-container bg-light p-3 rounded">
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <i class="bi bi-geo-alt text-muted me-2"></i>
                                                                    <strong>Lokasi:</strong>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <small class="text-muted d-block">Kecamatan</small>
                                                                        <span class="fw-medium">{{ $item->kecamatan }}</span>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <small class="text-muted d-block">Kabupaten</small>
                                                                        <span class="fw-medium">{{ $item->kabupaten }}</span>
                                                                    </div>
                                                                    <div class="col-md-6 mt-2">
                                                                        <small class="text-muted d-block">Provinsi</small>
                                                                        <span class="fw-medium">
                                                                            @if (request('filter_provinsi'))
                                                                                @php
                                                                                    $provinsi = $item->provinsi;
                                                                                    $filterProvinsi = request('filter_provinsi');
                                                                                    $highlightedProvinsi = preg_replace(
                                                                                        '/(' . preg_quote($filterProvinsi, '/') . ')/i',
                                                                                        '<mark class="bg-warning">$1</mark>',
                                                                                        $provinsi,
                                                                                    );
                                                                                @endphp
                                                                                {!! $highlightedProvinsi !!}
                                                                            @else
                                                                                {{ $item->provinsi }}
                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Kontak -->
                                                        <div class="mb-4">
                                                            <div class="contact-container">
                                                                <h6 class="fw-bold mb-3">
                                                                    <i class="bi bi-telephone text-primary me-2"></i>
                                                                    Kontak
                                                                </h6>
                                                                <div class="row g-3">
                                                                    <div class="col-md-6">
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="bi bi-envelope text-muted me-2"></i>
                                                                            <div>
                                                                                <small class="text-muted d-block">Email</small>
                                                                                <span class="fw-medium">{{ $item->email }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="bi bi-phone text-muted me-2"></i>
                                                                            <div>
                                                                                <small class="text-muted d-block">Telepon</small>
                                                                                <span class="fw-medium">{{ $item->telepon }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Visi -->
                                                        <div class="mb-4">
                                                            <h6 class="fw-bold mb-2">
                                                                <i class="bi bi-eye text-info me-2"></i>
                                                                Visi
                                                            </h6>
                                                            <div class="visi-container bg-info bg-opacity-10 p-3 rounded">
                                                                <p class="mb-0 text-dark">{{ $item->visi }}</p>
                                                            </div>
                                                        </div>

                                                        <!-- Misi -->
                                                        <div class="mb-4">
                                                            <h6 class="fw-bold mb-2">
                                                                <i class="bi bi-list-task text-success me-2"></i>
                                                                Misi
                                                            </h6>
                                                            <div class="misi-container bg-success bg-opacity-10 p-3 rounded">
                                                                <p class="mb-0 text-dark">{{ $item->misi }}</p>
                                                            </div>
                                                        </div>

                                                        <!-- Alamat Kantor -->
                                                        <div class="mb-4">
                                                            <h6 class="fw-bold mb-2">
                                                                <i class="bi bi-building text-primary me-2"></i>
                                                                Alamat Kantor
                                                            </h6>
                                                            <div class="address-container bg-light p-3 rounded">
                                                                <p class="mb-0">{{ $item->alamat_kantor }}</p>
                                                            </div>
                                                        </div>

                                                        <!-- Info Tambahan -->
                                                        <div class="mt-4 pt-4 border-top">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Dibuat:</small>
                                                                    <p class="mb-0 fw-medium">{{ $item->created_at->format('d M Y') }}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted">Diperbarui:</small>
                                                                    <p class="mb-0 fw-medium">{{ $item->updated_at->format('d M Y') }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Action Buttons -->
                                                    <div class="card-footer bg-transparent border-0 pt-0 pb-4">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group w-100">
                                                                <a href="{{ route('profildesa.edit', $item->profil_id) }}"
                                                                    class="btn btn-outline-primary flex-fill"
                                                                    data-bs-toggle="tooltip" title="Edit Profil">
                                                                    <i class="bi bi-pencil"></i> Edit
                                                                </a>
                                                                @if($profil->count() > 1)
                                                                <form action="{{ route('profildesa.destroy', $item->profil_id) }}"
                                                                    method="POST" class="d-inline flex-fill">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-outline-danger w-100"
                                                                        data-bs-toggle="tooltip" title="Hapus Profil"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus profil desa {{ $item->nama_desa }}?')">
                                                                        <i class="bi bi-trash"></i> Hapus
                                                                    </button>
                                                                </form>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @if($profil->count() > 1)
                                                        <div class="mt-2 text-center">
                                                            <small class="text-muted">
                                                                <i class="bi bi-exclamation-triangle text-warning me-1"></i>
                                                                Hanya boleh ada 1 profil aktif. Hapus yang tidak digunakan.
                                                            </small>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Pagination -->
                                    <div class="mt-4">
                                        {{ $profil->links('pagination::bootstrap-5') }}
                                    </div>
                                @else
                                    <!-- Empty State -->
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body text-center py-5">
                                            <div class="mb-4">
                                                <i class="bi bi-house display-1 text-muted"></i>
                                            </div>
                                            <h4 class="text-muted mb-3">
                                                @if (request('search') || request('filter_provinsi'))
                                                    Tidak ada profil desa yang ditemukan
                                                @else
                                                    Belum ada profil desa
                                                @endif
                                            </h4>
                                            <p class="text-muted mb-4">
                                                @if (request('search') || request('filter_provinsi'))
                                                    Coba ubah kata kunci pencarian atau filter provinsi Anda.
                                                @else
                                                    Mulai dengan menambahkan profil desa pertama.
                                                @endif
                                            </p>
                                            <div class="d-flex gap-2 justify-content-center">
                                                @if (request('search') || request('filter_provinsi'))
                                                    <a href="{{ route('profildesa.index') }}"
                                                        class="btn btn-outline-secondary">
                                                        <i class="bi bi-arrow-clockwise me-1"></i>Reset Pencarian
                                                    </a>
                                                @endif
                                                <a href="{{ route('profildesa.create') }}" class="btn btn-success">
                                                    <i class="bi bi-plus-circle me-2"></i>Tambah Profil Desa
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
                border-color: #198754;
            }

            .news-card .card-title {
                font-size: 1.5rem;
                line-height: 1.4;
                color: #198754;
            }

            .news-card .icon-wrapper {
                transition: all 0.3s ease;
            }

            .news-card:hover .icon-wrapper {
                background: linear-gradient(135deg, #198754, #20c997) !important;
            }

            .news-card:hover .icon-wrapper i {
                color: white !important;
            }

            .location-container,
            .contact-container,
            .visi-container,
            .misi-container,
            .address-container {
                transition: all 0.3s ease;
            }

            .news-card:hover .location-container,
            .news-card:hover .contact-container {
                background-color: #f8f9fa !important;
                border-left: 4px solid #198754;
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

                .col-md-5 {
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

            // Auto submit form when filter provinsi changes (optional)
            document.querySelector('input[name="filter_provinsi"]').addEventListener('input', function(e) {
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
