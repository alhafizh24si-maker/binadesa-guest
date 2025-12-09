<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Berita - Binadesa</title>
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
            --border-radius: 8px;
            --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-color);
            color: var(--dark-color);
            margin: 0;
            padding: 0;
        }

        /* Content Wrapper */
        .content-wrapper-full {
            min-height: 100vh;
            background-color: var(--light-color);
        }

        .container-full {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Styles */
        .page-header-primary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 24px;
        }

        .page-header-primary h1 {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--dark-color);
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .page-header-primary p {
            color: var(--secondary-color);
            margin: 0;
        }

        .btn-group-custom {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .btn-light-universal {
            background-color: var(--light-color);
            color: var(--dark-color);
            border: 1px solid var(--border-color);
            padding: 10px 16px;
            border-radius: var(--border-radius);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-light-universal:hover {
            background-color: #e2e8f0;
            transform: translateY(-1px);
            color: var(--dark-color);
        }

        /* Alert Styles */
        .alert-universal {
            padding: 12px 16px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            border-left: 4px solid;
        }

        .alert-success {
            background-color: #d1fae5;
            border-color: var(--success-color);
            color: #065f46;
        }

        .alert-danger {
            background-color: #fee2e2;
            border-color: var(--danger-color);
            color: #991b1b;
        }

        /* Card Styles */
        .card-universal {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            margin-bottom: 24px;
            height: 100%;
        }

        .card-header-universal {
            padding: 16px 20px;
            background-color: #f8fafc;
            border-bottom: 1px solid var(--border-color);
        }

        .card-title-universal {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark-color);
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0;
        }

        .card-body-universal {
            padding: 20px;
        }

        /* Berita Image */
        .berita-img-detail {
            width: 100%;
            max-width: 400px;
            height: 250px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            display: block;
        }

        .no-image-detail {
            width: 100%;
            max-width: 400px;
            height: 250px;
            background-color: var(--light-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary-color);
            border: 2px dashed var(--border-color);
            margin: 0 auto;
            border-radius: 12px;
        }

        /* Photo Action Buttons */
        .photo-action-bottom {
            display: flex;
            gap: 8px;
            align-items: center;
            justify-content: center;
            margin-top: 16px;
            width: 100%;
        }

        .btn-edit-bottom, .btn-delete-bottom {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.2s ease;
            white-space: nowrap;
            cursor: pointer;
        }

        .btn-edit-bottom {
            background-color: var(--warning-color);
            color: white;
        }

        .btn-edit-bottom:hover {
            background-color: #e0a800;
            transform: translateY(-1px);
            color: white;
        }

        .btn-delete-bottom {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-delete-bottom:hover {
            background-color: #dc2626;
            transform: translateY(-1px);
        }

        /* Info List */
        .info-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            padding: 12px 0;
            border-bottom: 1px solid var(--light-color);
        }

        .info-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 4px;
            font-size: 0.9rem;
        }

        .info-value {
            color: var(--secondary-color);
            font-size: 1rem;
        }

        /* Content Box */
        .content-box {
            background-color: var(--light-color);
            padding: 20px;
            border-radius: var(--border-radius);
            border-left: 4px solid var(--primary-color);
            white-space: pre-line;
            line-height: 1.6;
            min-height: 200px;
            max-height: 400px;
            overflow-y: auto;
        }

        .content-box::-webkit-scrollbar {
            width: 6px;
        }

        .content-box::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .content-box::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        .content-box::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Badge Styles */
        .universal-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-success {
            background-color: #d1fae5;
            color: #065f46;
        }

        .badge-secondary {
            background-color: #e5e7eb;
            color: #374151;
        }

        .badge-warning {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge-primary {
            background-color: #dbeafe;
            color: #1e40af;
        }

        /* Upload Form */
        .field-group {
            margin-bottom: 16px;
        }

        .form-label-universal {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
            display: block;
        }

        .input-universal {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: border-color 0.2s;
        }

        .input-universal:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }

        .btn-success-universal {
            background-color: var(--success-color);
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: var(--border-radius);
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
            width: 100%;
            justify-content: center;
        }

        .btn-success-universal:hover {
            background-color: #218838;
            transform: translateY(-1px);
            color: white;
        }

        /* File List Table */
        .table-responsive-universal {
            border-radius: var(--border-radius);
            overflow: hidden;
        }

        .universal-table {
            width: 100%;
            border-collapse: collapse;
        }

        .universal-table th {
            background-color: #f8fafc;
            padding: 12px 16px;
            text-align: left;
            font-weight: 600;
            color: var(--dark-color);
            border-bottom: 1px solid var(--border-color);
        }

        .universal-table td {
            padding: 16px;
            border-bottom: 1px solid var(--light-color);
            vertical-align: middle;
        }

        .universal-table tr:last-child td {
            border-bottom: none;
        }

        .file-thumbnail-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .file-thumbnail {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid var(--border-color);
        }

        .file-icon {
            display: inline-flex;
            align-items: center;
            color: var(--secondary-color);
        }

        /* Action Buttons */
        .action-buttons-near {
            display: flex;
            gap: 8px;
            justify-content: flex-start;
            align-items: center;
            height: 100%;
            flex-wrap: nowrap;
            margin: 0;
            padding: 0;
        }

        .action-buttons-near form {
            display: flex;
            margin: 0;
            align-items: center;
        }

        .btn-primary-near, .btn-delete-near {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            padding: 0;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
            flex-shrink: 0;
        }

        .btn-primary-near {
            background-color: var(--primary-color);
            color: #fff;
        }

        .btn-primary-near:hover {
            background-color: #388E3C;
            transform: translateY(-1px);
        }

        .btn-delete-near {
            background-color: var(--danger-color);
            color: #fff;
        }

        .btn-delete-near:hover {
            background-color: #dc2626;
            transform: translateY(-1px);
        }

        /* Empty State */
        .empty-state-universal {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            padding: 40px !important;
            color: var(--secondary-color);
            text-align: center;
        }

        /* Gallery Grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 16px;
        }

        .gallery-item {
            position: relative;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: translateY(-4px);
        }

        .gallery-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            padding: 12px;
            color: white;
        }

        .gallery-actions {
            position: absolute;
            top: 8px;
            right: 8px;
            display: flex;
            gap: 4px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-actions {
            opacity: 1;
        }

        .btn-gallery-action {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-gallery-action:hover {
            background: white;
            transform: scale(1.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header-primary {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .btn-group-custom {
                width: 100%;
                justify-content: flex-start;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }

            .action-buttons-near {
                flex-direction: row;
                gap: 6px;
                justify-content: flex-start;
            }

            .btn-primary-near, .btn-delete-near {
                width: 32px;
                height: 32px;
            }

            .photo-action-bottom {
                flex-direction: column;
                gap: 6px;
            }

            .btn-edit-bottom, .btn-delete-bottom {
                padding: 6px 10px;
                font-size: 0.8rem;
            }

            .universal-table th,
            .universal-table td {
                padding: 12px 8px;
            }

            .file-thumbnail {
                width: 40px;
                height: 40px;
            }
        }

        @media (min-width: 992px) {
            .info-list {
                grid-template-columns: 1fr 1fr;
                gap: 16px;
            }

            .info-item {
                padding: 8px 0;
            }
        }
    </style>
</head>

<body>
    @extends('layouts.guest.app')

    @section('content')
    <div class="content-wrapper-full">
        <div class="container-full py-4">
            {{-- Header --}}
            <div class="page-header-primary">
                <div>
                    <h1>
                        <span class="icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                            </svg>
                        </span>
                        Detail Berita - {{ Str::limit($berita->judul, 50) }}
                    </h1>
                    <p>Informasi detail berita dan gambar pendukung</p>
                </div>
                <div class="btn-group-custom">
                    <a href="{{ route('berita.index') }}" class="btn-light-universal">
                        <span class="icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                            </svg>
                        </span>
                        Kembali ke Daftar
                    </a>
                </div>
            </div>

            {{-- Notifikasi --}}
            @if (session('success'))
                <div class="alert alert-success alert-universal">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-universal">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                <!-- Informasi Berita -->
                <div class="col-lg-6 mb-4">
                    <div class="card-universal">
                        <div class="card-header-universal">
                            <h5 class="card-title-universal">
                                <span class="icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                                    </svg>
                                </span>
                                Informasi Berita
                            </h5>
                        </div>
                        <div class="card-body-universal">
                            <!-- Cover Foto -->
                            @php
                                $coverFoto = $berita->media->where('sort_order', 1)->first();
                                $status = $berita->status;
                                $badgeClass = $status == 'terbit' ? 'badge-success' : 'badge-warning';
                            @endphp
                            <div class="text-center mb-4">
                                <div class="position-relative d-inline-block">
                                    @if($coverFoto)
                                        @php
                                            // Generate URL untuk gambar cover
                                            $coverUrl = asset('storage/media/berita/' . $coverFoto->file_name);
                                        @endphp
                                        <img src="{{ $coverUrl }}"
                                             alt="Cover {{ $berita->judul }}"
                                             class="berita-img-detail"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="no-image-detail" style="display: none;">
                                            <svg width="60" height="60" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                                            </svg>
                                        </div>
                                    @else
                                        <div class="no-image-detail">
                                            <svg width="60" height="60" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <!-- Tombol Aksi -->
                                <div class="photo-action-bottom">
                                    <a href="{{ route('berita.edit', $berita->berita_id) }}"
                                       class="btn-edit-bottom"
                                       title="Edit Berita">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                        </svg>
                                        Edit Berita
                                    </a>
                                    @if($coverFoto)
                                    <form action="{{ route('berita.deleteFile', ['berita' => $berita->berita_id, 'file' => $coverFoto->media_id]) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn-delete-bottom"
                                                onclick="return confirm('Hapus cover foto?')"
                                                title="Hapus Cover Foto">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                            </svg>
                                            Hapus Cover
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </div>

                            <div class="info-list">
                                <div class="info-item">
                                    <span class="info-label">Judul Berita</span>
                                    <span class="info-value">{{ $berita->judul }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Kategori</span>
                                    <span class="info-value">
                                        <span class="universal-badge badge-primary">
                                            {{ $berita->kategori->nama_kategori ?? $berita->kategori->nama ?? 'Tanpa Kategori' }}
                                        </span>
                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Penulis</span>
                                    <span class="info-value">{{ $berita->penulis }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Slug URL</span>
                                    <span class="info-value">
                                        <code>{{ $berita->slug }}</code>
                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Status</span>
                                    <span class="info-value">
                                        <span class="universal-badge {{ $badgeClass }}">
                                            {{ $status == 'terbit' ? 'Terbit' : 'Draft' }}
                                        </span>
                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Tanggal Terbit</span>
                                    <span class="info-value">
                                        @if ($berita->terbit_at)
                                            {{ \Carbon\Carbon::parse($berita->terbit_at)->format('d M Y H:i') }}
                                        @else
                                            Belum ditentukan
                                        @endif
                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Total Media</span>
                                    <span class="info-value">{{ $berita->media->count() }} file</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Dibuat Pada</span>
                                    <span class="info-value">{{ $berita->created_at->format('d M Y H:i') }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Diupdate Pada</span>
                                    <span class="info-value">{{ $berita->updated_at->format('d M Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Konten Berita -->
                <div class="col-lg-6 mb-4">
                    <div class="card-universal h-100">
                        <div class="card-header-universal">
                            <h5 class="card-title-universal">
                                <span class="icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h10v2zm0-4H7V7h10v2z"/>
                                    </svg>
                                </span>
                                Konten Berita
                            </h5>
                        </div>
                        <div class="card-body-universal">
                            <div class="content-box">
                                @if($berita->isi_html)
                                    {!! $berita->isi_html !!}
                                @else
                                    <div class="text-center text-muted py-4">
                                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor" class="mb-3">
                                            <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                                        </svg>
                                        <p>Belum ada konten berita</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upload Gambar Galeri -->
<div class="row">
    <div class="col-12 mb-4">
        <div class="card-universal">
            <div class="card-header-universal">
                <h5 class="card-title-universal">
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM14 13v4h-4v-4H7l5-5 5 5h-3z"/>
                        </svg>
                    </span>
                    Tambah Gambar Galeri
                </h5>
            </div>
            <div class="card-body-universal">

                <form action="{{ route('berita.uploadGallery', $berita->berita_id) }}" method="POST" enctype="multipart/form-data" id="uploadGalleryForm">
                    @csrf
         
                    <div class="row">
                        <div class="col-md-8">
                            <div class="field-group">
                                <label class="form-label-universal">Pilih Gambar</label>
                                <div class="control">
                                    <input class="input-universal @error('gambar_pendukung') is-danger @enderror"
                                           type="file"
                                           name="gambar_pendukung[]"
                                           id="gambar_pendukung"
                                           multiple
                                           accept="image/*"
                                           required>
                                </div>
                                <small class="form-text text-muted">
                                    Format: JPG, JPEG, PNG, GIF. Maksimal 2MB per file. Minimal 1 file.
                                </small>
                                @error('gambar_pendukung')
                                    <p class="help is-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <button type="submit" class="btn-success-universal w-100" id="uploadBtn">
                                <span class="icon">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM14 13v4h-4v-4H7l5-5 5 5h-3z"/>
                                    </svg>
                                </span>
                                Upload Gambar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

            <!-- Daftar Gambar Galeri -->
            <div class="row">
                <div class="col-12">
                    <div class="card-universal">
                        <div class="card-header-universal">
                            <h5 class="card-title-universal">
                                <span class="icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M19 5v14H5V5h14m0-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-4.86 8.86l-3 3.87L9 13.14 6 17h12l-3.86-5.14z"/>
                                    </svg>
                                </span>
                                Galeri Gambar ({{ $berita->media->where('sort_order', '>', 1)->count() }})
                            </h5>
                        </div>
                        <div class="card-body-universal">
                            @php
                                $gallery = $berita->media->where('sort_order', '>', 1);
                            @endphp

                            @if($gallery->count() > 0)
                                <!-- Tampilan Grid untuk Galeri -->
                                <div class="gallery-grid">
                                    @foreach($gallery as $image)
                                        @php
                                            // Generate URL untuk gambar galeri
                                            $imageUrl = asset('storage/media/berita/gallery/' . $image->file_name);
                                        @endphp
                                        <div class="gallery-item">
                                            <img src="{{ $imageUrl }}"
                                                 alt="{{ $image->caption ?? 'Gambar galeri' }}"
                                                 class="gallery-img"
                                                 onerror="this.style.display='none'; this.parentElement.innerHTML='<div style=\'width:100%;height:180px;background:#f8f9fa;display:flex;align-items:center;justify-content:center;color:#6c757d;border:1px dashed #dee2e6;border-radius:8px;\'><svg width=\'48\' height=\'48\' viewBox=\'0 0 24 24\' fill=\'currentColor\'><path d=\'M19 5v14H5V5h14m0-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-4.86 8.86l-3 3.87L9 13.14 6 17h12l-3.86-5.14z\'/></svg></div>';">
                                            <div class="gallery-overlay">
                                                <small>{{ $image->file_name }}</small>
                                            </div>
                                            <div class="gallery-actions">
                                                <a href="{{ $imageUrl }}"
                                                   target="_blank"
                                                   class="btn-gallery-action"
                                                   title="Lihat Gambar">
                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                                    </svg>
                                                </a>
                                                <form action="{{ route('berita.deleteFile', ['berita' => $berita->berita_id, 'file' => $image->media_id]) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn-gallery-action"
                                                            onclick="return confirm('Hapus gambar {{ $image->file_name }}?')"
                                                            title="Hapus Gambar">
                                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Alternatif: Tampilan Tabel -->
                                <div class="mt-4">
                                    <h6 class="mb-3">Detail File</h6>
                                    <div class="table-responsive table-responsive-universal">
                                        <table class="table universal-table">
                                            <thead>
                                                <tr>
                                                    <th width="50%">Nama File</th>
                                                    <th width="20%">Tipe File</th>
                                                    <th width="30%" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($gallery as $image)
                                                    @php
                                                        $imageUrl = asset('storage/media/berita/gallery/' . $image->file_name);
                                                    @endphp
                                                    <tr>
                                                        <td class="align-middle">
                                                            <div class="d-flex align-items-center">
                                                                <div class="file-thumbnail-container me-3">
                                                                    <img src="{{ $imageUrl }}"
                                                                         alt="Thumbnail {{ $image->file_name }}"
                                                                         class="file-thumbnail"
                                                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                                    <div class="file-icon" style="display: none;">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                                                            <path d="M19 5v14H5V5h14m0-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-4.86 8.86l-3 3.87L9 13.14 6 17h12l-3.86-5.14z"/>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="fw-semibold">{{ $image->file_name }}</div>
                                                                    <small class="text-muted">Uploaded: {{ $image->created_at->format('d/m/Y H:i') }}</small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <span class="universal-badge badge-info">
                                                                {{ strtoupper($image->extension ?? pathinfo($image->file_name, PATHINFO_EXTENSION)) }}
                                                            </span>
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="action-buttons-near">
                                                                <a href="{{ $imageUrl }}"
                                                                   target="_blank"
                                                                   class="btn-primary-near"
                                                                   title="Lihat Gambar">
                                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                                                    </svg>
                                                                </a>
                                                                <form action="{{ route('berita.deleteFile', ['berita' => $berita->berita_id, 'file' => $image->media_id]) }}"
                                                                      method="POST"
                                                                      class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                            class="btn-delete-near"
                                                                            onclick="return confirm('Hapus gambar {{ $image->file_name }}?')"
                                                                            title="Hapus Gambar">
                                                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div class="empty-state-universal">
                                    <span class="icon">
                                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M19 5v14H5V5h14m0-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-4.86 8.86l-3 3.87L9 13.14 6 17h12l-3.86-5.14z"/>
                                        </svg>
                                    </span>
                                    Belum ada gambar galeri
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Validasi file size untuk gambar galeri
        const mediaInput = document.querySelector('input[name="gambar_pendukung[]"]');
        if (mediaInput) {
            mediaInput.addEventListener('change', function() {
                const files = this.files;
                const maxSize = 2 * 1024 * 1024; // 2MB per file (sesuai controller)

                for (let file of files) {
                    if (file.size > maxSize) {
                        alert(`Gambar ${file.name} melebihi ukuran maksimal 2MB`);
                        this.value = '';
                        break;
                    }

                    // Validasi tipe file harus gambar
                    if (!file.type.startsWith('image/')) {
                        alert(`File ${file.name} bukan gambar. Hanya file gambar yang diperbolehkan`);
                        this.value = '';
                        break;
                    }
                }
            });
        }

        // Smooth scroll untuk content box
        const contentBoxes = document.querySelectorAll('.content-box');
        contentBoxes.forEach(box => {
            box.style.scrollBehavior = 'smooth';
        });

        // Konfirmasi sebelum menghapus
        const deleteButtons = document.querySelectorAll('.btn-delete-bottom, .btn-delete-near, .btn-gallery-action[type="submit"]');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                if (!confirm('Apakah Anda yakin ingin menghapus?')) {
                    e.preventDefault();
                }
            });
        });
    });
    </script>
    @endsection
</body>
</html>
