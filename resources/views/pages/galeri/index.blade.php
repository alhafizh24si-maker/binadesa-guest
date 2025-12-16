<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Galeri - Binadesa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Galeri</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Data Galeri</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Kelola semua galeri foto dalam sistem.</p>
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
                                        <form method="GET" action="{{ route('galeri.index') }}" id="searchForm">
                                            <div class="row g-3 align-items-center">
                                                <!-- Search Box -->
                                                <div class="col-md-8">
                                                    <label class="form-label fw-medium">Search</label>
                                                    <div class="input-group">
                                                        <input type="text" name="search" class="form-control"
                                                            value="{{ request('search') }}"
                                                            placeholder="Cari judul atau deskripsi galeri...">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="bi bi-search"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="col-md-4">
                                                    <label class="form-label">&nbsp;</label>
                                                    <div class="d-flex gap-2">
                                                        @if (request('search'))
                                                            <a href="{{ route('galeri.index') }}"
                                                                class="btn btn-outline-secondary flex-fill">
                                                                <i class="bi bi-arrow-clockwise me-1"></i>Reset
                                                            </a>
                                                        @endif
                                                        <a href="{{ route('galeri.create') }}"
                                                            class="btn btn-success flex-fill">
                                                            <i class="bi bi-plus-circle me-1"></i>Tambah
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Active Filters Info -->
                                            @if (request('search'))
                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <div class="d-flex flex-wrap gap-2 align-items-center">
                                                            <small class="text-muted">Filter aktif:</small>
                                                            <span class="badge bg-primary">
                                                                Search: "{{ request('search') }}"
                                                                <a href="{{ route('galeri.index') }}"
                                                                    class="text-white ms-1"
                                                                    style="text-decoration: none;">×</a>
                                                            </span>
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
                                                <h5 class="mb-1 fw-bold">Daftar Galeri</h5>
                                                <p class="text-muted mb-0">
                                                    Total {{ $dataGaleri->total() }} galeri terdaftar
                                                    @if (request('search'))
                                                        ({{ $dataGaleri->count() }} ditemukan)
                                                    @endif
                                                </p>
                                            </div>
                                            <a href="{{ route('galeri.create') }}" class="btn btn-success">
                                                <i class="bi bi-plus-circle me-2"></i>Tambah Galeri
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                @if ($dataGaleri->count() > 0)
                                    <!-- Galeri Cards Grid -->
                                    <div class="row g-4">
                                        @foreach ($dataGaleri as $item)
                                            <div class="col-xl-4 col-lg-6 col-md-6">
                                                <div class="card galeri-card border-0 shadow-sm h-100" data-aos="fade-up"
                                                    data-aos-delay="{{ $loop->index * 100 }}">

                                                    <!-- Tampilkan foto pertama sebagai cover -->
                                                    @php
                                                        $firstImage = $item->media->sortBy('sort_order')->first();
                                                        $totalImages = $item->media->count();
                                                    @endphp

                                                    <!-- Cover Image -->
                                                    @if ($firstImage)
                                                        <div class="card-img-top position-relative"
                                                            style="height: 200px; overflow: hidden; border-radius: 8px 8px 0 0;">
                                                            <img src="{{ Storage::url('media/galeri/' . $firstImage->file_name) }}"
                                                                alt="{{ $item->judul }}"
                                                                class="w-100 h-100 object-fit-cover">
                                                            <!-- Badge untuk jumlah gambar -->
                                                            @if ($totalImages > 0)
                                                                <div class="position-absolute top-0 end-0 m-2">
                                                                    <span class="badge bg-dark bg-opacity-75">
                                                                        <i class="bi bi-images me-1"></i>
                                                                        {{ $totalImages }}
                                                                    </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @else
                                                        <!-- Default placeholder jika tidak ada foto -->
                                                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center position-relative"
                                                            style="height: 200px; overflow: hidden; border-radius: 8px 8px 0 0;">
                                                            <i class="bi bi-images text-muted" style="font-size: 3rem;"></i>
                                                        </div>
                                                    @endif

                                                    <div class="card-body">
                                                        <!-- Header dengan judul -->
                                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                                            <h5 class="card-title mb-0">
                                                                @if (request('search'))
                                                                    @php
                                                                        $judul = $item->judul;
                                                                        $searchTerm = request('search');
                                                                        $highlightedJudul = preg_replace(
                                                                            '/(' . preg_quote($searchTerm, '/') . ')/i',
                                                                            '<mark class="bg-warning">$1</mark>',
                                                                            $judul,
                                                                        );
                                                                    @endphp
                                                                    {!! $highlightedJudul !!}
                                                                @else
                                                                    {{ $item->judul }}
                                                                @endif
                                                            </h5>
                                                            <div class="galeri-number">
                                                                <span
                                                                    class="badge bg-secondary">#{{ ($dataGaleri->currentPage() - 1) * $dataGaleri->perPage() + $loop->iteration }}</span>
                                                            </div>
                                                        </div>

                                                        <!-- Deskripsi -->
                                                        @if ($item->deskripsi)
                                                            <div class="mb-3">
                                                                <p class="text-muted small mb-1">Deskripsi:</p>
                                                                <p class="small text-muted mb-0">
                                                                    {{ Str::limit($item->deskripsi, 100) }}
                                                                    @if (strlen($item->deskripsi) > 100)
                                                                        <a href="{{ route('galeri.show', $item->galeri_id) }}"
                                                                            class="text-primary text-decoration-none">
                                                                            [selengkapnya]
                                                                        </a>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        @endif

                                                        <!-- Thumbnail Grid -->
                                                        @if ($item->media->count() > 0)
                                                            <div class="mb-3">
                                                                <div class="gallery-preview-container">
                                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                                        <small class="text-muted fw-medium">
                                                                            <i class="bi bi-images me-1"></i>
                                                                            Galeri ({{ $totalImages }})
                                                                        </small>
                                                                        @if ($totalImages > 3)
                                                                            <small>
                                                                                <a href="{{ route('galeri.show', $item->galeri_id) }}"
                                                                                   class="text-primary text-decoration-none">
                                                                                    Lihat semua
                                                                                </a>
                                                                            </small>
                                                                        @endif
                                                                    </div>

                                                                    <div class="row g-1">
                                                                        @foreach ($item->media->sortBy('sort_order')->take(3) as $index => $media)
                                                                            <div class="col-4">
                                                                                <div class="gallery-item">
                                                                                    <img src="{{ Storage::url('media/galeri/' . $media->file_name) }}"
                                                                                         alt="Gambar {{ $index + 1 }}"
                                                                                         class="w-100 h-100 object-fit-cover rounded"
                                                                                         style="height: 80px;">
                                                                                </div>
                                                                            </div>
                                                                        @endforeach

                                                                        <!-- Placeholder untuk sisa slot -->
                                                                        @php
                                                                            $usedSlots = $item->media->count() >= 3 ? 3 : $item->media->count();
                                                                            $emptySlots = 3 - $usedSlots;
                                                                        @endphp

                                                                        @for ($i = 0; $i < $emptySlots; $i++)
                                                                            <div class="col-4">
                                                                                <div class="gallery-item bg-light d-flex align-items-center justify-content-center rounded"
                                                                                     style="height: 80px;">
                                                                                    <i class="bi bi-image text-muted"></i>
                                                                                </div>
                                                                            </div>
                                                                        @endfor
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <!-- Galeri ID dan Metadata -->
                                                        <div class="mb-3">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <code class="text-muted small">ID: {{ $item->galeri_id }}</code>
                                                                <small class="text-muted">
                                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Action Buttons -->
                                                    <div class="card-footer bg-transparent border-0 pt-0">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group w-100">
                                                                <a href="{{ route('galeri.show', $item->galeri_id) }}"
                                                                    class="btn btn-sm btn-outline-info flex-fill"
                                                                    data-bs-toggle="tooltip" title="Detail Galeri">
                                                                    <i class="bi bi-eye"></i> Detail
                                                                </a>
                                                                <a href="{{ route('galeri.edit', $item->galeri_id) }}"
                                                                    class="btn btn-sm btn-outline-primary flex-fill"
                                                                    data-bs-toggle="tooltip" title="Edit Galeri">
                                                                    <i class="bi bi-pencil"></i> Edit
                                                                </a>
                                                                <form action="{{ route('galeri.destroy', $item->galeri_id) }}"
                                                                    method="POST" class="d-inline flex-fill">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-outline-danger w-100"
                                                                        data-bs-toggle="tooltip" title="Hapus Galeri"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus galeri {{ $item->judul }} beserta semua fotonya?')">
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
                                        {{ $dataGaleri->links('pagination::bootstrap-5') }}
                                    </div>
                                @else
                                    <!-- Empty State -->
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body text-center py-5">
                                            <div class="mb-4">
                                                <i class="bi bi-images display-1 text-muted"></i>
                                            </div>
                                            <h4 class="text-muted mb-3">
                                                @if (request('search'))
                                                    Tidak ada galeri yang ditemukan
                                                @else
                                                    Belum ada data galeri
                                                @endif
                                            </h4>
                                            <p class="text-muted mb-4">
                                                @if (request('search'))
                                                    Coba ubah kata kunci pencarian Anda.
                                                @else
                                                    Mulai dengan membuat galeri pertama.
                                                @endif
                                            </p>
                                            <div class="d-flex gap-2 justify-content-center">
                                                @if (request('search'))
                                                    <a href="{{ route('galeri.index') }}"
                                                        class="btn btn-outline-secondary">
                                                        <i class="bi bi-arrow-clockwise me-1"></i>Reset Pencarian
                                                    </a>
                                                @endif
                                                <a href="{{ route('galeri.create') }}" class="btn btn-success">
                                                    <i class="bi bi-plus-circle me-2"></i>Tambah Galeri
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
            .galeri-card {
                transition: all 0.3s ease;
                border: 1px solid #e9ecef;
            }

            .galeri-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
                border-color: #2e7d32;
            }

            .galeri-card .card-title {
                font-size: 1.1rem;
                line-height: 1.4;
                color: #2c3e50;
            }

            .galeri-card .btn-group .btn {
                padding: 0.25rem 0.75rem;
                font-size: 0.875rem;
                border-radius: 6px;
            }

            .gallery-preview-container {
                background: #f8f9fa;
                padding: 0.75rem;
                border-radius: 6px;
                border: 1px solid #e9ecef;
            }

            .gallery-item {
                position: relative;
                overflow: hidden;
                border-radius: 4px;
                transition: transform 0.2s ease;
            }

            .gallery-item:hover {
                transform: scale(1.03);
            }

            .gallery-item img {
                transition: transform 0.3s ease;
            }

            .gallery-item:hover img {
                transform: scale(1.05);
            }

            mark {
                padding: 0.1em 0.2em;
                border-radius: 3px;
            }

            .card-img-top img {
                transition: transform 0.3s ease;
            }

            .galeri-card:hover .card-img-top img {
                transform: scale(1.05);
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .galeri-card {
                    margin-bottom: 1.5rem;
                }

                .btn-group {
                    width: 100%;
                    justify-content: center;
                }

                .gallery-item {
                    height: 70px !important;
                }
            }

            @media (max-width: 576px) {
                .galeri-card .card-body {
                    padding: 1.25rem;
                }

                .galeri-card .card-footer {
                    padding: 1rem 1.25rem;
                }

                .gallery-item {
                    height: 60px !important;
                }
            }

            .object-fit-cover {
                object-fit: cover;
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
            document.querySelectorAll('.galeri-card').forEach(card => {
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
