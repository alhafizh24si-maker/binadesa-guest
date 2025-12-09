<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Berita - Binadesa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #6c757d;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            --danger-color: #dc3545;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --border-color: #dee2e6;
            --shadow-light: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: var(--dark-color);
        }

        /* Header Section */
        .page-header {
            background: white;
            color: var(--dark-color);
            padding: 60px 0 40px;
            margin-bottom: 30px;
            border-bottom: 1px solid var(--border-color);
        }

        .page-header .subtitle {
            font-size: 0.9rem;
            letter-spacing: 2px;
            color: var(--secondary-color);
            margin-bottom: 10px;
            display: inline-block;
            padding: 5px 15px;
            background: var(--light-color);
            border-radius: 20px;
            font-weight: 500;
        }

        .page-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--dark-color);
        }

        .page-header p {
            font-size: 1.1rem;
            color: var(--secondary-color);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.5;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: var(--shadow-light);
            border: none;
            transition: all 0.3s ease;
            text-align: center;
            border-left: 4px solid var(--primary-color);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-medium);
        }

        .stat-card h4 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--primary-color);
        }

        .stat-card small {
            font-size: 0.9rem;
            color: var(--secondary-color);
            font-weight: 500;
        }

        /* Action Bar */
        .action-bar {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: var(--shadow-light);
            border: 1px solid var(--border-color);
        }

        .btn-primary-custom {
            background: var(--primary-color);
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary-custom:hover {
            background: #388E3C;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
            color: white;
        }

        .btn-outline-secondary-custom {
            border: 2px solid var(--border-color);
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            color: var(--dark-color);
            background: white;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-outline-secondary-custom:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            background: rgba(76, 175, 80, 0.05);
        }

        /* Filter Section */
        .filter-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: var(--shadow-light);
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
        }

        .form-select, .form-control {
            padding: 10px 15px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-select:focus, .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }

        .input-group .btn {
            padding: 10px 20px;
        }

        /* News Cards */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        @media (max-width: 768px) {
            .news-grid {
                grid-template-columns: 1fr;
            }
        }

        .news-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-light);
            border: none;
            transition: all 0.4s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-medium);
            border-color: var(--primary-color);
        }

        .news-image-container {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .news-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .news-card:hover .news-image {
            transform: scale(1.05);
        }

        .badge-container {
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            display: flex;
            justify-content: space-between;
            z-index: 10;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .status-badge.success {
            background: rgba(76, 175, 80, 0.9);
            color: white;
        }

        .status-badge.warning {
            background: rgba(255, 152, 0, 0.9);
            color: white;
        }

        .category-badge {
            background: rgba(33, 150, 243, 0.9);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .news-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .news-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 15px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .news-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            color: var(--secondary-color);
        }

        .news-excerpt {
            color: var(--secondary-color);
            line-height: 1.6;
            margin-bottom: 20px;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .gallery-preview {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid var(--border-color);
        }

        .gallery-title {
            font-size: 0.9rem;
            color: var(--secondary-color);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .thumbnails-grid {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .thumbnail {
            width: 60px;
            height: 60px;
            border-radius: 6px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .thumbnail:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumbnail-cover {
            position: absolute;
            top: 0;
            left: 0;
            background: rgba(76, 175, 80, 0.8);
            color: white;
            padding: 2px 6px;
            font-size: 0.7rem;
            border-radius: 0 0 4px 0;
        }

        .thumbnail-count {
            width: 60px;
            height: 60px;
            border-radius: 6px;
            background: var(--light-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary-color);
            font-weight: 600;
        }

        .news-footer {
            padding: 20px 25px;
            background: rgba(248, 249, 250, 0.8);
            border-top: 1px solid var(--border-color);
            border-radius: 0 0 12px 12px;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-sm-custom {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: all 0.3s ease;
            text-decoration: none;
            border: 1px solid transparent;
            cursor: pointer;
        }

        .btn-outline-primary-custom {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }

        .btn-outline-primary-custom:hover {
            background: var(--primary-color);
            color: white;
        }

        .btn-outline-danger-custom {
            border: 1px solid var(--danger-color);
            color: var(--danger-color);
            background: transparent;
        }

        .btn-outline-danger-custom:hover {
            background: var(--danger-color);
            color: white;
        }

        .btn-outline-info-custom {
            border: 1px solid var(--info-color);
            color: var(--info-color);
            background: transparent;
        }

        .btn-outline-info-custom:hover {
            background: var(--info-color);
            color: white;
        }

        /* NEW: Button for show page */
        .btn-outline-success-custom {
            border: 1px solid var(--success-color);
            color: var(--success-color);
            background: transparent;
        }

        .btn-outline-success-custom:hover {
            background: var(--success-color);
            color: white;
        }

        /* Modal Styling */
        .modal-content {
            border-radius: 12px;
            border: none;
        }

        .modal-header {
            background: var(--primary-color);
            color: white;
            border-radius: 12px 12px 0 0;
            padding: 20px;
        }

        .modal-title {
            font-weight: 600;
        }

        .btn-close {
            filter: brightness(0) invert(1);
        }

        .media-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 15px;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-light);
        }

        .empty-state-icon {
            font-size: 4rem;
            color: var(--border-color);
            margin-bottom: 20px;
        }

        /* Pagination */
        .pagination-container {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: var(--shadow-light);
            margin-top: 30px;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .news-card {
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
        }

        /* Success Alert */
        .alert-success-custom {
            background: rgba(40, 167, 69, 0.1);
            border: 1px solid var(--success-color);
            color: var(--success-color);
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 20px;
        }

        /* Responsive adjustments for action buttons */
        @media (max-width: 576px) {
            .action-buttons {
                justify-content: center;
            }

            .btn-sm-custom {
                flex: 1;
                justify-content: center;
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    @extends('layouts.guest.app')
    @section('content')

    <!-- ======= Header Section ======= -->
    <div class="page-header" style="padding-top: 150px; padding-bottom: 100px;">
        <div class="container">
            <div class="text-center">
                <h2 data-aos="fade-up" data-aos-delay="100">Daftar Berita</h2>
                <p data-aos="fade-up" data-aos-delay="200">Kelola semua berita yang telah dipublikasikan dalam sistem.</p>
            </div>
        </div>
    </div>



    <!-- ======= Main Content ======= -->
    <main class="container">

        <!-- Success Message -->
        @if (session('success'))
        <div class="alert alert-success-custom alert-dismissible fade show" role="alert" data-aos="fade-up">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-3"></i>
                <div>
                    <strong>Sukses!</strong> {{ session('success') }}
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif



        <!-- Action Bar -->
        <div class="action-bar" data-aos="fade-up">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('berita.create') }}" class="btn btn-primary-custom">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Berita
                    </a>
                    <a href="{{ route('kategoriberita.index') }}" class="btn btn-outline-secondary-custom">
                        <i class="bi bi-tags me-2"></i>Kelola Kategori
                    </a>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-card" data-aos="fade-up">
            <form method="GET" action="{{ route('berita.index') }}" id="filterForm">
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label">Status Berita</label>
                        <select name="status" class="form-select" onchange="document.getElementById('filterForm').submit()">
                            <option value="">Semua Status</option>
                            <option value="terbit" {{ request('status') == 'terbit' ? 'selected' : '' }}>Terbit</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Cari Berita</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="search"
                                placeholder="Cari berdasarkan judul atau penulis..."
                                value="{{ request('search') }}">
                            <button class="btn btn-outline-primary" type="submit">
                                <i class="bi bi-search me-2"></i>Cari
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        @if(request('search') || request('status'))
                        <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary w-100">
                            <i class="bi bi-arrow-clockwise me-2"></i>Reset Filter
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <!-- Berita List -->
        @if ($dataBerita->count() > 0)
            <div class="news-grid">
                @foreach ($dataBerita as $item)
                <div class="news-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                    <!-- Cover Image -->
                    <div class="news-image-container">
                        @php
                            $coverMedia = $item->media->where('sort_order', 1)->first();
                            $firstGalleryMedia = $item->media->where('sort_order', '>', 1)->first();
                            $displayImage = null;
                            $displayAlt = $item->judul;

                            if ($coverMedia && $coverMedia->is_image) {
                                $displayImage = $coverMedia;
                                $displayAlt = $coverMedia->caption ?? $item->judul;
                            } elseif ($firstGalleryMedia && $firstGalleryMedia->is_image) {
                                $displayImage = $firstGalleryMedia;
                                $displayAlt = $firstGalleryMedia->caption ?? $item->judul;
                            }
                        @endphp

                        @if ($displayImage)
                            @if ($displayImage->file_exists)
                                <img src="{{ $displayImage->url }}"
                                     class="news-image"
                                     alt="{{ $displayAlt }}">
                            @else
                                <div class="news-image d-flex flex-column align-items-center justify-content-center bg-light">
                                    <i class="bi bi-image text-muted display-4"></i>
                                    <small class="text-muted mt-2">File tidak ditemukan</small>
                                </div>
                            @endif
                        @elseif ($item->cover_foto)
                            <img src="{{ asset('storage/' . $item->cover_foto) }}"
                                 class="news-image"
                                 alt="{{ $item->judul }}">
                        @else
                            <div class="news-image d-flex align-items-center justify-content-center bg-light">
                                <i class="bi bi-image text-muted display-4"></i>
                            </div>
                        @endif

                        <!-- Badges -->
                        <div class="badge-container">
                            <div>
                                <span class="category-badge">
                                    {{ $item->kategori->nama_kategori ?? $item->kategori->nama ?? 'Tanpa Kategori' }}
                                </span>
                            </div>
                            <div>
                                @if ($item->status == 'terbit')
                                    <span class="status-badge success">
                                        <i class="bi bi-check-circle me-1"></i>Terbit
                                    </span>
                                @else
                                    <span class="status-badge warning">
                                        <i class="bi bi-pencil me-1"></i>Draft
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="news-content">
                        <h5 class="news-title">{{ Str::limit($item->judul, 70) }}</h5>

                        <div class="news-meta">
                            <div class="meta-item">
                                <i class="bi bi-person"></i>
                                <span>{{ $item->penulis }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="bi bi-calendar"></i>
                                <span>
                                    @if ($item->terbit_at)
                                        {{ $item->terbit_at->format('d M Y') }}
                                    @else
                                        Belum terbit
                                    @endif
                                </span>
                            </div>
                        </div>

                        <p class="news-excerpt">
                            {{ Str::limit(strip_tags($item->isi_html), 150) }}
                        </p>

                        <!-- Slug -->
                        <div class="mb-3">
                            <small class="text-muted">
                                <code>{{ $item->slug }}</code>
                            </small>
                        </div>

                        <!-- Media Gallery Preview -->
                        @if($item->media->count() > 0)
                        <div class="gallery-preview">
                            <div class="gallery-title">
                                <i class="bi bi-images"></i>
                                <span>Galeri Media ({{ $item->media->count() }})</span>
                            </div>
                            <div class="thumbnails-grid">
                                @foreach($item->media->take(3) as $media)
                                <div class="thumbnail"
                                     data-bs-toggle="tooltip"
                                     title="{{ $media->caption ?? ($media->sort_order == 1 ? 'Cover' : 'Gambar ' . ($media->sort_order - 1)) }}"
                                     onclick="openMediaModal('{{ $item->berita_id }}')">
                                    @if($media->is_image && $media->file_exists)
                                        <img src="{{ $media->url }}"
                                             alt="{{ $media->caption }}">
                                        @if($media->sort_order == 1)
                                            <div class="thumbnail-cover">Cover</div>
                                        @endif
                                    @else
                                        <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-earmark text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                @endforeach
                                @if($item->media->count() > 3)
                                <div class="thumbnail-count">
                                    +{{ $item->media->count() - 3 }}
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Footer Actions -->
                    <div class="news-footer">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="action-buttons">
                                <!-- TAMBAHKAN TOMBOL DETAIL (SHOW) DI SINI -->
                                <a href="{{ route('berita.show', $item->berita_id) }}"
                                   class="btn-sm-custom btn-outline-success-custom"
                                   data-bs-toggle="tooltip"
                                   title="Lihat Detail Berita">
                                    <i class="bi bi-eye"></i> Detail
                                </a>

                                <a href="{{ route('berita.edit', $item->berita_id) }}"
                                   class="btn-sm-custom btn-outline-primary-custom"
                                   data-bs-toggle="tooltip"
                                   title="Edit Berita">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>

                                <form action="{{ route('berita.destroy', $item->berita_id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn-sm-custom btn-outline-danger-custom"
                                            data-bs-toggle="tooltip"
                                            title="Hapus Berita">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>

                                @if($item->media->count() > 0)
                                <button type="button"
                                        class="btn-sm-custom btn-outline-info-custom"
                                        data-bs-toggle="modal"
                                        data-bs-target="#mediaModal{{ $item->berita_id }}"
                                        title="Lihat Media">
                                    <i class="bi bi-images"></i> Media
                                </button>
                                @endif
                            </div>
                            <small class="text-muted">
                                #{{ ($dataBerita->currentPage() - 1) * $dataBerita->perPage() + $loop->iteration }}
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Media Modal -->
                @if($item->media->count() > 0)
                <div class="modal fade" id="mediaModal{{ $item->berita_id }}" tabindex="-1">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <i class="bi bi-images me-2"></i>
                                    Media - {{ Str::limit($item->judul, 50) }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="media-grid">
                                    @foreach($item->media as $media)
                                    <div class="card border-0 shadow-sm">
                                        @if($media->is_image && $media->file_exists)
                                            <img src="{{ $media->url }}"
                                                 class="card-img-top"
                                                 alt="{{ $media->caption }}"
                                                 style="height: 150px; object-fit: cover;">
                                        @else
                                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                                 style="height: 150px;">
                                                <i class="bi bi-file-earmark display-4 text-muted"></i>
                                            </div>
                                        @endif
                                        <div class="card-body p-3">
                                            @if($media->sort_order == 1)
                                                <span class="badge bg-primary mb-2">Cover</span>
                                            @else
                                                <span class="badge bg-secondary mb-2">Galeri {{ $media->sort_order - 1 }}</span>
                                            @endif
                                            @if($media->caption)
                                                <p class="card-text small mb-2">{{ $media->caption }}</p>
                                            @endif
                                            <p class="card-text small text-muted mb-0">
                                                {{ $media->mime_type }}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a href="{{ route('berita.edit', $item->berita_id) }}?tab=media"
                                   class="btn btn-primary">
                                    <i class="bi bi-pencil me-1"></i>Kelola Media
                                </a>
                                <!-- TAMBAHKAN LINK KE SHOW PAGE DARI MODAL JUGA -->
                                <a href="{{ route('berita.show', $item->berita_id) }}"
                                   class="btn btn-success">
                                    <i class="bi bi-eye me-1"></i>Detail Berita
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>

            <!-- Pagination -->
            @if ($dataBerita->hasPages())
            <div class="pagination-container" data-aos="fade-up">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div class="text-muted">
                        Menampilkan {{ $dataBerita->firstItem() }} - {{ $dataBerita->lastItem() }}
                        dari {{ $dataBerita->total() }} berita
                    </div>
                    {{ $dataBerita->links('pagination::simple-bootstrap-5') }}
                </div>
            </div>
            @endif

        @else
            <!-- Empty State -->
            <div class="empty-state" data-aos="fade-up">
                <div class="empty-state-icon">
                    <i class="bi bi-newspaper"></i>
                </div>
                <h3 class="mb-3">Belum ada berita</h3>
                <p class="text-muted mb-4">Mulai dengan menambahkan berita pertama Anda untuk ditampilkan di sini.</p>
                <a href="{{ route('berita.create') }}" class="btn btn-primary-custom">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Berita Pertama
                </a>
            </div>
        @endif
    </main>

    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            // Add animation delays to news cards
            document.querySelectorAll('.news-card').forEach((card, index) => {
                card.style.animationDelay = `${index * 100}ms`;
            });
        });

        // Card hover effects
        document.querySelectorAll('.news-card').forEach(card => {
            const image = card.querySelector('.news-image');

            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
                this.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.15)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.08)';
            });
        });

        // Thumbnail hover effects
        document.querySelectorAll('.thumbnail').forEach(thumb => {
            thumb.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.1)';
                this.style.zIndex = '100';
            });

            thumb.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.zIndex = '10';
            });
        });

        // Open media modal function
        function openMediaModal(beritaId) {
            const modal = new bootstrap.Modal(document.getElementById(`mediaModal${beritaId}`));
            modal.show();
        }

        // Lazy loading for images
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                    }
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    </script>
    @endsection
</body>
</html>
