<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Agenda - Binadesa</title>
    <!-- Tambahkan CSS Bootstrap Icons -->
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
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Agenda</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Data Agenda</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Kelola semua agenda kegiatan dalam sistem.</p>
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
                                        <form method="GET" action="{{ route('agenda.index') }}" id="searchForm">
                                            <div class="row g-3 align-items-center">
                                                <!-- Search Box -->
                                                <div class="col-md-4">
                                                    <label class="form-label fw-medium">Search</label>
                                                    <div class="input-group">
                                                        <input type="text" name="search" class="form-control"
                                                            value="{{ request('search') }}"
                                                            placeholder="Cari judul, lokasi, atau penyelenggara...">
                                                        <button type="submit" class="btn btn-primary">
                                                            <svg width="16" height="16" fill="currentColor"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Filter Penyelenggara -->
                                                <div class="col-md-4">
                                                    <label class="form-label fw-medium">Filter Penyelenggara</label>
                                                    <div class="input-group">
                                                        <input type="text" name="filter_penyelenggara" class="form-control"
                                                            value="{{ request('filter_penyelenggara') }}"
                                                            placeholder="Filter berdasarkan penyelenggara...">
                                                        <button type="submit" class="btn btn-outline-primary">
                                                            <i class="bi bi-funnel"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="col-md-4">
                                                    <label class="form-label">&nbsp;</label>
                                                    <div class="d-flex gap-2">
                                                        @if (request('search') || request('filter_penyelenggara'))
                                                            <a href="{{ route('agenda.index') }}"
                                                                class="btn btn-outline-secondary flex-fill">
                                                                <i class="bi bi-arrow-clockwise me-1"></i>Reset
                                                            </a>
                                                        @endif
                                                        <a href="{{ route('agenda.create') }}"
                                                            class="btn btn-success flex-fill">
                                                            <i class="bi bi-plus-circle me-1"></i>Tambah
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Active Filters Info -->
                                            @if (request('search') || request('filter_penyelenggara'))
                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <div class="d-flex flex-wrap gap-2 align-items-center">
                                                            <small class="text-muted">Filter aktif:</small>
                                                            @if (request('search'))
                                                                <span class="badge bg-primary">
                                                                    Search: "{{ request('search') }}"
                                                                    <a href="{{ route('agenda.index', ['filter_penyelenggara' => request('filter_penyelenggara')]) }}"
                                                                        class="text-white ms-1"
                                                                        style="text-decoration: none;">×</a>
                                                                </span>
                                                            @endif
                                                            @if (request('filter_penyelenggara'))
                                                                <span class="badge bg-info text-dark">
                                                                    Penyelenggara: "{{ request('filter_penyelenggara') }}"
                                                                    <a href="{{ route('agenda.index', ['search' => request('search')]) }}"
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
                                                <h5 class="mb-1 fw-bold">Daftar Agenda</h5>
                                                <p class="text-muted mb-0">
                                                    Total {{ $dataAgenda->total() }} agenda terdaftar
                                                    @if (request('search') || request('filter_penyelenggara'))
                                                        ({{ $dataAgenda->count() }} ditemukan)
                                                    @endif
                                                </p>
                                            </div>
                                            <a href="{{ route('agenda.create') }}" class="btn btn-success">
                                                <i class="bi bi-plus-circle me-2"></i>Tambah Agenda
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                @if ($dataAgenda->count() > 0)
                                    <!-- Agenda Cards Grid -->
                                    <div class="row g-4">
                                        @foreach ($dataAgenda as $item)
                                            <div class="col-xl-4 col-lg-6 col-md-6">
                                                <div class="card agenda-card border-0 shadow-sm h-100" data-aos="fade-up"
                                                    data-aos-delay="{{ $loop->index * 100 }}">
                                                    <!-- Tampilkan poster dari tabel Media (sort_order = 1) -->
                                                    @php
                                                        $poster = $item->media->firstWhere('sort_order', 1);
                                                        $gambarPendukung = $item->media->where('sort_order', '>', 1)->take(3);
                                                        $totalGambar = $item->media->where('sort_order', '>', 1)->count();
                                                        $semuaGambar = $item->media->sortBy('sort_order');
                                                    @endphp

                                                    <!-- Poster Utama -->
                                                    @if ($poster)
                                                        <div class="card-img-top position-relative"
                                                            style="height: 200px; overflow: hidden; border-radius: 8px 8px 0 0;">
                                                            <img src="{{ Storage::url('media/agenda/' . $poster->file_name) }}"
                                                                alt="{{ $item->judul }}"
                                                                class="w-100 h-100 object-fit-cover">
                                                            <!-- Badge untuk jumlah gambar -->
                                                            @if ($totalGambar > 0)
                                                                <div class="position-absolute top-0 end-0 m-2">
                                                                    <span class="badge bg-dark bg-opacity-75">
                                                                        <i class="bi bi-images me-1"></i>
                                                                        {{ $totalGambar }}
                                                                    </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @else
                                                        <!-- Default placeholder jika tidak ada poster -->
                                                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center position-relative"
                                                            style="height: 200px; overflow: hidden; border-radius: 8px 8px 0 0;">
                                                            <i class="bi bi-calendar-event text-muted" style="font-size: 3rem;"></i>
                                                            @if ($totalGambar > 0)
                                                                <div class="position-absolute top-0 end-0 m-2">
                                                                    <span class="badge bg-dark bg-opacity-75">
                                                                        <i class="bi bi-images me-1"></i>
                                                                        {{ $totalGambar }}
                                                                    </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endif

                                                    <div class="card-body">
                                                        <!-- Header dengan tanggal -->
                                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                                            <div class="agenda-date">
                                                                <div class="date-wrapper bg-primary bg-opacity-10 rounded p-3">
                                                                    <div class="text-center">
                                                                        <div class="fs-4 fw-bold text-primary">
                                                                            {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d') }}
                                                                        </div>
                                                                        <div class="small text-muted">
                                                                            {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('M') }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="agenda-number">
                                                                <span
                                                                    class="badge bg-secondary">#{{ ($dataAgenda->currentPage() - 1) * $dataAgenda->perPage() + $loop->iteration }}</span>
                                                            </div>
                                                        </div>

                                                        <!-- Judul Agenda dengan highlight jika filter aktif -->
                                                        <h5 class="card-title mb-2">
                                                            @if (request('search') || request('filter_penyelenggara'))
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

                                                        <!-- Lokasi -->
                                                        <div class="mb-2">
                                                            <div class="location-container">
                                                                <i class="bi bi-geo-alt text-muted me-2"></i>
                                                                <span class="text-muted small">
                                                                    @if (request('search'))
                                                                        @php
                                                                            $lokasi = $item->lokasi;
                                                                            $searchTerm = request('search');
                                                                            $highlightedLokasi = preg_replace(
                                                                                '/(' . preg_quote($searchTerm, '/') . ')/i',
                                                                                '<mark class="bg-warning">$1</mark>',
                                                                                $lokasi,
                                                                            );
                                                                        @endphp
                                                                        {!! $highlightedLokasi !!}
                                                                    @else
                                                                        {{ $item->lokasi }}
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <!-- Penyelenggara -->
                                                        <div class="mb-3">
                                                            <div class="organizer-container">
                                                                <i class="bi bi-building text-muted me-2"></i>
                                                                <span class="text-muted small">
                                                                    @if (request('filter_penyelenggara'))
                                                                        @php
                                                                            $penyelenggara = $item->penyelenggara;
                                                                            $filterPenyelenggara = request('filter_penyelenggara');
                                                                            $highlightedPenyelenggara = preg_replace(
                                                                                '/(' . preg_quote($filterPenyelenggara, '/') . ')/i',
                                                                                '<mark class="bg-warning">$1</mark>',
                                                                                $penyelenggara,
                                                                            );
                                                                        @endphp
                                                                        {!! $highlightedPenyelenggara !!}
                                                                    @else
                                                                        {{ $item->penyelenggara }}
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <!-- Waktu -->
                                                        <div class="mb-3">
                                                            <div class="time-container">
                                                                <i class="bi bi-clock text-muted me-2"></i>
                                                                <span class="text-muted small">
                                                                    {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('H:i') }} -
                                                                    {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('H:i') }}
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <!-- Deskripsi Singkat -->
                                                        @if ($item->deskripsi)
                                                            <div class="mb-3">
                                                                <p class="text-muted small mb-1">Deskripsi:</p>
                                                                <p class="small text-muted mb-0">
                                                                    {{ Str::limit($item->deskripsi, 100) }}
                                                                    @if (strlen($item->deskripsi) > 100)
                                                                        <a href="{{ route('agenda.show', $item->agenda_id) }}"
                                                                            class="text-primary text-decoration-none">
                                                                            [selengkapnya]
                                                                        </a>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        @endif

                                                        <!-- Gallery Preview - Grid 3x1 -->
                                                        @if ($gambarPendukung->count() > 0)
                                                            <div class="mb-3">
                                                                <div class="gallery-preview-container">
                                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                                        <small class="text-muted fw-medium">
                                                                            <i class="bi bi-images me-1"></i>
                                                                            Galeri Media ({{ $totalGambar }})
                                                                        </small>
                                                                        @if ($totalGambar > 3)
                                                                            <small>
                                                                                <a href="{{ route('agenda.show', $item->agenda_id) }}"
                                                                                   class="text-primary text-decoration-none">
                                                                                    Lihat semua
                                                                                </a>
                                                                            </small>
                                                                        @endif
                                                                    </div>

                                                                    <div class="row g-1">
                                                                        <!-- Label Cover untuk poster -->
                                                                        @if ($poster)
                                                                            <div class="col-4">
                                                                                <div class="gallery-item position-relative">
                                                                                    <img src="{{ Storage::url('media/agenda/' . $poster->file_name) }}"
                                                                                         alt="Cover"
                                                                                         class="w-100 h-100 object-fit-cover rounded"
                                                                                         style="height: 80px;">
                                                                                    <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-50 text-white text-center py-1">
                                                                                        <small>Cover</small>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif

                                                                        <!-- Gambar pendukung -->
                                                                        @foreach ($gambarPendukung as $index => $gambar)
                                                                            <div class="col-4">
                                                                                <div class="gallery-item">
                                                                                    <img src="{{ Storage::url('media/agenda/' . $gambar->file_name) }}"
                                                                                         alt="Gambar {{ $index + 1 }}"
                                                                                         class="w-100 h-100 object-fit-cover rounded"
                                                                                         style="height: 80px;">
                                                                                    @if (!$poster && $loop->first)
                                                                                        <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-50 text-white text-center py-1">
                                                                                            <small>#{{ $loop->iteration }}</small>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        @endforeach

                                                                        <!-- Placeholder untuk sisa slot -->
                                                                        @php
                                                                            $totalSlots = $poster ? 4 : 3;
                                                                            $usedSlots = ($poster ? 1 : 0) + $gambarPendukung->count();
                                                                            $emptySlots = $totalSlots - $usedSlots;
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

                                                        <!-- Agenda ID -->
                                                        <div class="mb-3">
                                                            <div class="agenda-id-container">
                                                                <i class="bi bi-calendar-event text-muted me-2"></i>
                                                                <code class="text-muted small">ID:
                                                                    {{ $item->agenda_id }}</code>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Action Buttons -->
                                                    <div class="card-footer bg-transparent border-0 pt-0">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group w-100">
                                                                <a href="{{ route('agenda.show', $item->agenda_id) }}"
                                                                    class="btn btn-sm btn-outline-info flex-fill"
                                                                    data-bs-toggle="tooltip" title="Detail Agenda">
                                                                    <i class="bi bi-eye"></i> Detail
                                                                </a>
                                                                <a href="{{ route('agenda.edit', $item->agenda_id) }}"
                                                                    class="btn btn-sm btn-outline-primary flex-fill"
                                                                    data-bs-toggle="tooltip" title="Edit Agenda">
                                                                    <i class="bi bi-pencil"></i> Edit
                                                                </a>
                                                                <form action="{{ route('agenda.destroy', $item->agenda_id) }}"
                                                                    method="POST" class="d-inline flex-fill">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-outline-danger w-100"
                                                                        data-bs-toggle="tooltip" title="Hapus Agenda"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus agenda {{ $item->judul }}?')">
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
                                        {{ $dataAgenda->links('pagination::bootstrap-5') }}
                                    </div>
                                @else
                                    <!-- Empty State -->
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body text-center py-5">
                                            <div class="mb-4">
                                                <i class="bi bi-calendar-x display-1 text-muted"></i>
                                            </div>
                                            <h4 class="text-muted mb-3">
                                                @if (request('search') || request('filter_penyelenggara'))
                                                    Tidak ada agenda yang ditemukan
                                                @else
                                                    Belum ada data agenda
                                                @endif
                                            </h4>
                                            <p class="text-muted mb-4">
                                                @if (request('search') || request('filter_penyelenggara'))
                                                    Coba ubah kata kunci pencarian atau filter penyelenggara Anda.
                                                @else
                                                    Mulai dengan menambahkan agenda pertama ke sistem.
                                                @endif
                                            </p>
                                            <div class="d-flex gap-2 justify-content-center">
                                                @if (request('search') || request('filter_penyelenggara'))
                                                    <a href="{{ route('agenda.index') }}"
                                                        class="btn btn-outline-secondary">
                                                        <i class="bi bi-arrow-clockwise me-1"></i>Reset Pencarian
                                                    </a>
                                                @endif
                                                <a href="{{ route('agenda.create') }}" class="btn btn-success">
                                                    <i class="bi bi-plus-circle me-2"></i>Tambah Agenda
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
            .agenda-card {
                transition: all 0.3s ease;
                border: 1px solid #e9ecef;
            }

            .agenda-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
                border-color: #2e7d32;
            }

            .agenda-card .card-title {
                font-size: 1.1rem;
                line-height: 1.4;
                color: #2c3e50;
            }

            .agenda-card .card-text {
                line-height: 1.5;
            }

            .agenda-card .badge {
                font-size: 0.75rem;
                padding: 0.35em 0.65em;
            }

            .agenda-card .btn-group .btn {
                padding: 0.25rem 0.75rem;
                font-size: 0.875rem;
                border-radius: 6px;
            }

            .date-wrapper {
                transition: all 0.3s ease;
                min-width: 60px;
            }

            .agenda-card:hover .date-wrapper {
                background: linear-gradient(135deg, #2e7d32, #4caf50) !important;
            }

            .agenda-card:hover .date-wrapper div {
                color: white !important;
            }

            .location-container,
            .organizer-container,
            .time-container,
            .agenda-id-container {
                background: #f8f9fa;
                padding: 0.5rem;
                border-radius: 6px;
                border: 1px solid #e9ecef;
                margin-bottom: 0.5rem;
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

            .agenda-card:hover .card-img-top img {
                transform: scale(1.05);
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .agenda-card {
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

                .gallery-item {
                    height: 70px !important;
                }
            }

            @media (max-width: 576px) {
                .agenda-card .card-body {
                    padding: 1.25rem;
                }

                .agenda-card .card-footer {
                    padding: 1rem 1.25rem;
                }

                .gallery-item {
                    height: 60px !important;
                }
            }

            .object-fit-cover {
                object-fit: cover;
            }

            .object-fit-contain {
                object-fit: contain;
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
            document.querySelectorAll('.agenda-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Auto submit form when filter penyelenggara changes (optional)
            document.querySelector('input[name="filter_penyelenggara"]')?.addEventListener('input', function(e) {
                if (e.target.value.length >= 3 || e.target.value.length === 0) {
                    setTimeout(() => {
                        document.getElementById('searchForm').submit();
                    }, 500);
                }
            });

            // Gallery item click to view larger
            document.querySelectorAll('.gallery-item img').forEach(img => {
                img.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Create modal for larger image view
                    const modalHtml = `
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center p-0">
                                        <img src="${this.src}" alt="Preview" class="img-fluid" style="max-height: 70vh;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    // Remove existing modal if any
                    const existingModal = document.getElementById('imageModal');
                    if (existingModal) {
                        existingModal.remove();
                    }

                    // Add new modal to body
                    document.body.insertAdjacentHTML('beforeend', modalHtml);

                    // Show modal
                    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
                    modal.show();
                });
            });
        </script>
    @endsection
</body>

</html>
