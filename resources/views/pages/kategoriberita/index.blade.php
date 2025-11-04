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
                        <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Data Kategori Berita</h2>
                        <p data-aos="fade-up" data-aos-delay="200">Kelola semua kategori berita yang tersedia dalam sistem.</p>
                    </div>
                </div>

                <!-- Success Message -->
                @if (session('success'))
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

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card-wrapper" data-aos="fade-up" data-aos-delay="300">
                            <!-- Header Card -->
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="mb-1 fw-bold">Daftar Kategori Berita</h5>
                                            <p class="text-muted mb-0">Total {{ $kategoriBerita->count() }} kategori berita</p>
                                        </div>
                                        <a href="{{ route('kategoriberita.create') }}" class="btn btn-primary">
                                            <i class="bi bi-plus-circle me-2"></i>Tambah Kategori Berita
                                        </a>
                                    </div>
                                </div>
                            </div>

                            @if ($kategoriBerita && $kategoriBerita->count() > 0)
                                <!-- Kategori List -->
                                <div class="row g-4">
                                    @foreach ($kategoriBerita as $kategori)
                                        <div class="col-12">
                                            <div class="card category-card border-0 shadow-sm h-100">
                                                <div class="card-body p-4">
                                                    <div class="row align-items-center">
                                                        <!-- Kolom 1: Nomor dan Nama -->
                                                        <div class="col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="category-number me-3">
                                                                    <span class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center">
                                                                        {{ $loop->iteration }}
                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-bold text-primary">{{ $kategori->name }}</h6>
                                                                    <small class="text-muted">
                                                                        <code>{{ $kategori->slug }}</code>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Kolom 2: Deskripsi -->
                                                        <div class="col-md-5">
                                                            @if ($kategori->deskripsi)
                                                                <p class="mb-0 text-muted small">
                                                                    {{ Str::limit($kategori->deskripsi, 120) }}
                                                                </p>
                                                            @else
                                                                <p class="mb-0 text-muted small fst-italic">
                                                                    Tidak ada deskripsi
                                                                </p>
                                                            @endif
                                                        </div>

                                                        <!-- Kolom 3: Tanggal -->
                                                        <div class="col-md-2">
                                                            <small class="text-muted">
                                                                <i class="bi bi-calendar me-1"></i>
                                                                {{ $kategori->created_at->format('d M Y') }}
                                                            </small>
                                                        </div>

                                                        <!-- Kolom 4: Aksi -->
                                                        <div class="col-md-2">
                                                            <div class="d-flex justify-content-end gap-2">
                                                                <a href="{{ route('kategoriberita.edit', $kategori->kategori_id) }}"
                                                                   class="btn btn-sm btn-outline-primary"
                                                                   data-bs-toggle="tooltip" title="Edit Kategori">
                                                                    <i class="bi bi-pencil"></i>
                                                                </a>
                                                                <form action="{{ route('kategoriberita.destroy', $kategori->kategori_id) }}"
                                                                      method="POST" class="d-inline"
                                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                            class="btn btn-sm btn-outline-danger"
                                                                            data-bs-toggle="tooltip" title="Hapus Kategori">
                                                                        <i class="bi bi-trash"></i>
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

                                <!-- Pagination -->
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <nav aria-label="Page navigation">
                                            {{ $kategoriBerita->links() }}
                                        </nav>
                                    </div>
                                </div>
                            @else
                                <!-- Empty State -->
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body text-center py-5">
                                        <div class="mb-4">
                                            <i class="bi bi-inbox display-1 text-muted"></i>
                                        </div>
                                        <h4 class="text-muted mb-3">Belum ada data kategori berita</h4>
                                        <p class="text-muted mb-4">Mulai dengan menambahkan kategori berita pertama Anda.</p>
                                        <a href="{{ route('kategoriberita.create') }}" class="btn btn-primary">
                                            <i class="bi bi-plus-circle me-2"></i>Tambah Kategori Pertama
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
    <!-- ======= End Main =======-->

    <style>
        .category-card {
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }

        .category-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
            border-color: #2e7d32;
        }

        .category-number .badge {
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .category-actions .btn {
            padding: 0.3rem 0.6rem;
            border-radius: 6px;
            font-size: 0.8rem;
        }

        .card-title {
            font-weight: 600;
        }

        .dropdown-toggle::after {
            display: none;
        }

        .border-top {
            border-color: #f8f9fa !important;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem !important;
            }

            .row.align-items-center {
                gap: 1rem;
            }

            .col-md-3,
            .col-md-5,
            .col-md-2 {
                margin-bottom: 0.5rem;
            }

            .d-flex.justify-content-end {
                justify-content: start !important;
            }

            .category-number .badge {
                width: 30px;
                height: 30px;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 576px) {
            .card-body {
                padding: 1.25rem !important;
            }

            .d-flex.align-items-center {
                flex-direction: column;
                align-items: start !important;
                gap: 0.5rem;
            }

            .category-number {
                align-self: start;
            }
        }

        /* Ensure consistent spacing */
        .col-md-3 h6 {
            font-size: 1rem;
        }

        .col-md-5 p {
            line-height: 1.4;
        }

        .col-md-2 small {
            font-size: 0.85rem;
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
    </script>
@endsection
