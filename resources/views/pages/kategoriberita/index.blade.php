@extends('layouts.guest.app')
@section('content')
    <!-- ======= Main =======-->
    <main>

        <!-- ======= Data Section =======-->
        <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-8 mx-auto text-center">
                        <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0"></span>
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

                <!-- Error Message -->
                @if (session('error'))
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
                             <!-- Search Form -->
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body">
                                    <form method="GET" action="{{ route('kategoriberita.index') }}" id="searchForm">
                                        <div class="row g-3 align-items-center">
                                            <!-- Search Box -->
                                            <div class="col-md-4">
                                                <label class="form-label fw-medium">Search</label>
                                                <div class="input-group">
                                                    <input type="text" name="search" class="form-control"
                                                        value="{{ request('search') }}" placeholder="Cari nama kategori atau deskripsi...">
                                                    <button type="submit" class="btn btn-primary">
                                                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path
                                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Filter Slug -->
                                            <div class="col-md-4">
                                                <label class="form-label fw-medium">Filter Slug</label>
                                                <div class="input-group">
                                                    <input type="text" name="filter_slug" class="form-control"
                                                        value="{{ request('filter_slug') }}" placeholder="Filter berdasarkan slug...">
                                                    <button type="submit" class="btn btn-outline-primary">
                                                        <i class="bi bi-funnel"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Action Buttons -->
                                            <div class="col-md-4">
                                                <label class="form-label">&nbsp;</label>
                                                <div class="d-flex gap-2">
                                                    @if (request('search') || request('filter_slug'))
                                                        <a href="{{ route('kategoriberita.index') }}"
                                                            class="btn btn-outline-secondary flex-fill">
                                                            <i class="bi bi-arrow-clockwise me-1"></i>Reset
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('kategoriberita.create') }}" class="btn btn-primary flex-fill">
                                                        <i class="bi bi-plus-circle me-1"></i>Tambah
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Active Filters Info -->
                                        @if (request('search') || request('filter_slug'))
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <div class="d-flex flex-wrap gap-2 align-items-center">
                                                    <small class="text-muted">Filter aktif:</small>
                                                    @if (request('search'))
                                                    <span class="badge bg-primary">
                                                        Search: "{{ request('search') }}"
                                                        <a href="{{ route('kategoriberita.index', ['filter_slug' => request('filter_slug')]) }}"
                                                           class="text-white ms-1" style="text-decoration: none;">×</a>
                                                    </span>
                                                    @endif
                                                    @if (request('filter_slug'))
                                                    <span class="badge bg-info text-dark">
                                                        Slug: "{{ request('filter_slug') }}"
                                                        <a href="{{ route('kategoriberita.index', ['search' => request('search')]) }}"
                                                           class="text-dark ms-1" style="text-decoration: none;">×</a>
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
                                            <h5 class="mb-1 fw-bold">Daftar Kategori Berita</h5>
                                            <p class="text-muted mb-0">
                                                Total {{ $kategoriberita->total() }} kategori berita
                                                @if(request('search') || request('filter_slug'))
                                                    ({{ $kategoriberita->count() }} ditemukan)
                                                @endif
                                            </p>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">
                                                <i class="bi bi-newspaper me-1"></i>Kelola Berita
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($kategoriberita->count() > 0)
                                <!-- Kategori Cards Grid -->
                                <div class="row g-4">
                                    @foreach ($kategoriberita as $item)
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="card news-card border-0 shadow-sm h-100" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                                <div class="card-body">
                                                    <!-- Header dengan icon dan nomor -->
                                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                                        <div class="category-icon">
                                                            <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle p-3">
                                                                <i class="bi bi-tag-fill text-primary fs-4"></i>
                                                            </div>
                                                        </div>
                                                        <div class="category-number">
                                                            <span class="badge bg-secondary">#{{ ($kategoriberita->currentPage() - 1) * $kategoriberita->perPage() + $loop->iteration }}</span>
                                                        </div>
                                                    </div>

                                                    <!-- Nama Kategori -->
                                                    <h5 class="card-title mb-2">{{ $item->nama }}</h5>

                                                    <!-- Slug dengan highlight jika filter aktif -->
                                                    <div class="mb-3">
                                                        @if(request('filter_slug'))
                                                            @php
                                                                $slug = $item->slug;
                                                                $filterSlug = request('filter_slug');
                                                                $highlightedSlug = preg_replace('/(' . preg_quote($filterSlug, '/') . ')/i', '<mark class="bg-warning">$1</mark>', $slug);
                                                            @endphp
                                                            <code class="text-muted small">{!! $highlightedSlug !!}</code>
                                                        @else
                                                            <code class="text-muted small">{{ $item->slug }}</code>
                                                        @endif
                                                    </div>

                                                    <!-- Deskripsi -->
                                                    <div class="mb-4">
                                                        @if ($item->deskripsi)
                                                            <p class="card-text text-muted">
                                                                {{ Str::limit($item->deskripsi, 100) }}
                                                            </p>
                                                        @else
                                                            <p class="card-text text-muted fst-italic">
                                                                Tidak ada deskripsi
                                                            </p>
                                                        @endif
                                                    </div>

                                                    <!-- Info Footer -->
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <small class="text-muted">
                                                            <i class="bi bi-newspaper me-1"></i>
                                                            {{ $item->berita_count ?? 0 }} Berita
                                                        </small>
                                                        <small class="text-muted">
                                                            <i class="bi bi-calendar me-1"></i>
                                                            {{ $item->created_at->format('d M Y') }}
                                                        </small>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="card-footer bg-transparent border-0 pt-0">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group w-100">
                                                            <a href="{{ route('kategoriberita.edit', $item->kategori_id) }}"
                                                               class="btn btn-sm btn-outline-primary flex-fill"
                                                               data-bs-toggle="tooltip"
                                                               title="Edit Kategori">
                                                                <i class="bi bi-pencil"></i> Edit
                                                            </a>
                                                            <form action="{{ route('kategoriberita.destroy', $item->kategori_id) }}"
                                                                  method="POST"
                                                                  class="d-inline flex-fill">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                        class="btn btn-sm btn-outline-danger w-100"
                                                                        data-bs-toggle="tooltip"
                                                                        title="Hapus Kategori"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kategori {{ $item->nama }}?')">
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
                                    {{ $kategoriberita->links('pagination::bootstrap-5') }}
                                </div>
                            @else
                                <!-- Empty State -->
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body text-center py-5">
                                        <div class="mb-4">
                                            <i class="bi bi-tags display-1 text-muted"></i>
                                        </div>
                                        <h4 class="text-muted mb-3">
                                            @if(request('search') || request('filter_slug'))
                                                Tidak ada kategori yang ditemukan
                                            @else
                                                Belum ada data kategori berita
                                            @endif
                                        </h4>
                                        <p class="text-muted mb-4">
                                            @if(request('search') || request('filter_slug'))
                                                Coba ubah kata kunci pencarian atau filter slug Anda.
                                            @else
                                                Mulai dengan menambahkan kategori berita pertama Anda.
                                            @endif
                                        </p>
                                        <div class="d-flex gap-2 justify-content-center">
                                            @if(request('search') || request('filter_slug'))
                                                <a href="{{ route('kategoriberita.index') }}" class="btn btn-outline-secondary">
                                                    <i class="bi bi-arrow-clockwise me-1"></i>Reset Pencarian
                                                </a>
                                            @endif
                                            <a href="{{ route('kategoriberita.create') }}" class="btn btn-primary">
                                                <i class="bi bi-plus-circle me-2"></i>Tambah Kategori
                                            </a>
                                        </div>
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

        .icon-wrapper {
            transition: all 0.3s ease;
        }

        .news-card:hover .icon-wrapper {
            background: linear-gradient(135deg, #2e7d32, #4caf50) !important;
        }

        .news-card:hover .icon-wrapper i {
            color: white !important;
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

        // Auto submit form when filter slug changes (optional)
        document.querySelector('input[name="filter_slug"]').addEventListener('input', function(e) {
            if (e.target.value.length >= 3 || e.target.value.length === 0) {
                setTimeout(() => {
                    document.getElementById('searchForm').submit();
                }, 500);
            }
        });
    </script>
@endsection
