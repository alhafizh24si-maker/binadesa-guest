<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Berita - Binadesa</title>
</head>

<body>
    @extends('layouts.guest.app')
    @section('content')
        <!-- ======= Main Content =======-->
        <main>

            <!-- ======= List Section =======-->
            <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Berita</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Daftar Berita</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Kelola semua berita yang telah dipublikasikan dalam sistem.</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('berita.create') }}" class="btn btn-primary fw-semibold">
                                        <i class="bi bi-plus-circle me-2"></i>Tambah Berita
                                    </a>
                                    <a href="{{ route('kategoriberita.index') }}" class="btn btn-outline-secondary">
                                        <i class="bi bi-tags me-2"></i>Kelola Kategori
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('berita.index') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search"
                                                   placeholder="Cari berita..." value="{{ request('search') }}">
                                            <button class="btn btn-outline-primary" type="submit">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="row justify-content-center mb-4">
                            <div class="col-lg-10">
                                <div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="fade-up">
                                    <i class="bi bi-check-circle me-2"></i>
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Header Info -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm" data-aos="fade-up">
                                <div class="card-body py-3">
                                    <div class="row text-center">
                                        <div class="col-md-3">
                                            <h4 class="text-primary mb-1">{{ $berita->total() }}</h4>
                                            <small class="text-muted">Total Berita</small>
                                        </div>
                                        <div class="col-md-3">
                                            <h4 class="text-success mb-1">{{ $berita->where('status', 'terbit')->count() }}</h4>
                                            <small class="text-muted">Berita Terbit</small>
                                        </div>
                                        <div class="col-md-3">
                                            <h4 class="text-warning mb-1">{{ $berita->where('status', 'draft')->count() }}</h4>
                                            <small class="text-muted">Berita Draft</small>
                                        </div>
                                        <div class="col-md-3">
                                            <h4 class="text-info mb-1">{{ $berita->unique('kategori_id')->count() }}</h4>
                                            <small class="text-muted">Kategori Aktif</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            @if($berita->count() > 0)
                                <div class="row g-4">
                                    @foreach($berita as $item)
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="card news-card border-0 shadow-sm h-100" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                            <!-- Cover Image -->
                                            <div class="position-relative">
                                                @if($item->cover_foto)
                                                    <img src="{{ asset('storage/' . $item->cover_foto) }}"
                                                         class="card-img-top"
                                                         alt="{{ $item->judul }}"
                                                         style="height: 200px; object-fit: cover;">
                                                @else
                                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                                         style="height: 200px;">
                                                        <i class="bi bi-image text-muted display-4"></i>
                                                    </div>
                                                @endif

                                                <!-- Status Badge -->
                                                <div class="position-absolute top-0 end-0 m-3">
                                                    @if($item->status == 'terbit')
                                                        <span class="badge bg-success">
                                                            <i class="bi bi-check-circle me-1"></i>Terbit
                                                        </span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">
                                                            <i class="bi bi-pencil me-1"></i>Draft
                                                        </span>
                                                    @endif
                                                </div>

                                                <!-- Category Badge -->
                                                <div class="position-absolute top-0 start-0 m-3">
                                                    <span class="badge bg-primary">
                                                        {{ $item->kategori->nama }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <!-- Title -->
                                                <h5 class="card-title fw-bold mb-2 text-truncate" title="{{ $item->judul }}">
                                                    {{ Str::limit($item->judul, 60) }}
                                                </h5>

                                                <!-- Author and Date -->
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <small class="text-muted">
                                                        <i class="bi bi-person me-1"></i>{{ $item->penulis }}
                                                    </small>
                                                    <small class="text-muted">
                                                        <i class="bi bi-calendar me-1"></i>
                                                        @if($item->terbit_at)
                                                            {{ $item->terbit_at->format('d M Y') }}
                                                        @else
                                                            Belum terbit
                                                        @endif
                                                    </small>
                                                </div>

                                                <!-- Content Excerpt -->
                                                <p class="card-text text-muted small mb-3">
                                                    {{ Str::limit(strip_tags($item->isi_html), 120) }}
                                                </p>

                                                <!-- Slug -->
                                                <div class="mb-3">
                                                    <small class="text-muted">
                                                        <code>{{ $item->slug }}</code>
                                                    </small>
                                                </div>
                                            </div>

                                            <!-- Card Footer with Actions -->
                                            <div class="card-footer bg-transparent border-0 pt-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('berita.edit', $item->berita_id) }}"
                                                           class="btn btn-sm btn-outline-primary"
                                                           data-bs-toggle="tooltip"
                                                           title="Edit Berita">
                                                            <i class="bi bi-pencil"></i> Edit
                                                        </a>
                                                        <form action="{{ route('berita.destroy', $item->berita_id) }}"
                                                              method="POST"
                                                              class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger"
                                                                    data-bs-toggle="tooltip"
                                                                    title="Hapus Berita"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                                                <i class="bi bi-trash"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <small class="text-muted">
                                                        #{{ ($berita->currentPage() - 1) * $berita->perPage() + $loop->iteration }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <!-- Pagination -->
                                @if($berita->hasPages())
                                <div class="row mt-5">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center" data-aos="fade-up">
                                            <div class="text-muted">
                                                Menampilkan {{ $berita->firstItem() }} - {{ $berita->lastItem() }} dari {{ $berita->total() }} berita
                                            </div>
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination mb-0">
                                                    {{-- Previous Page Link --}}
                                                    @if($berita->onFirstPage())
                                                        <li class="page-item disabled">
                                                            <span class="page-link"><i class="bi bi-chevron-left"></i></span>
                                                        </li>
                                                    @else
                                                        <li class="page-item">
                                                            <a class="page-link" href="{{ $berita->previousPageUrl() }}" rel="prev">
                                                                <i class="bi bi-chevron-left"></i>
                                                            </a>
                                                        </li>
                                                    @endif

                                                    {{-- Pagination Elements --}}
                                                    @foreach($berita->getUrlRange(1, $berita->lastPage()) as $page => $url)
                                                        @if($page == $berita->currentPage())
                                                            <li class="page-item active">
                                                                <span class="page-link">{{ $page }}</span>
                                                            </li>
                                                        @else
                                                            <li class="page-item">
                                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach

                                                    {{-- Next Page Link --}}
                                                    @if($berita->hasMorePages())
                                                        <li class="page-item">
                                                            <a class="page-link" href="{{ $berita->nextPageUrl() }}" rel="next">
                                                                <i class="bi bi-chevron-right"></i>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li class="page-item disabled">
                                                            <span class="page-link"><i class="bi bi-chevron-right"></i></span>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @else
                                <!-- Empty State -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-0 shadow-sm">
                                            <div class="card-body text-center py-5">
                                                <div class="mb-4">
                                                    <i class="bi bi-newspaper display-1 text-muted"></i>
                                                </div>
                                                <h4 class="text-muted mb-3">Belum ada berita</h4>
                                                <p class="text-muted mb-4">Mulai dengan menambahkan berita pertama Anda untuk ditampilkan di sini.</p>
                                                <a href="{{ route('berita.create') }}" class="btn btn-primary">
                                                    <i class="bi bi-plus-circle me-2"></i>Tambah Berita Pertama
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <!-- End List Section-->

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

            .card-img-top {
                border-radius: 8px 8px 0 0;
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

                .card-img-top {
                    height: 180px !important;
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
        </script>
    @endsection
</body>
</html>
