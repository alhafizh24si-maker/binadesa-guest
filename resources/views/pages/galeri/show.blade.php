<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Galeri - Binadesa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    @extends('layouts.guest.app')
    @section('content')
        <!-- ======= Main =======-->
        <main>

            <!-- ======= Detail Section =======-->
            <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Detail Galeri</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">{{ $dataGaleri->judul }}</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Detail lengkap galeri foto.</p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card border-0 shadow-sm" data-aos="fade-up" data-aos-delay="300">
                                <!-- Galeri Grid -->
                                @if($dataGaleri->media && $dataGaleri->media->count() > 0)
                                    <div class="card-body p-4">
                                        <!-- Header Info -->
                                        <div class="row mb-4">
                                            <div class="col-md-8">
                                                <h3 class="mb-2">{{ $dataGaleri->judul }}</h3>
                                                @if($dataGaleri->deskripsi)
                                                    <p class="text-muted mb-0">{{ $dataGaleri->deskripsi }}</p>
                                                @endif
                                            </div>
                                            <div class="col-md-4 text-md-end">
                                                <span class="badge bg-secondary fs-6">ID: {{ $dataGaleri->galeri_id }}</span>
                                            </div>
                                        </div>

                                        <!-- Main Photo Grid -->
                                        <div class="row g-3 mb-4">
                                            @foreach($dataGaleri->media->sortBy('sort_order') as $media)
                                                <div class="col-md-4 col-lg-3">
                                                    <div class="gallery-item position-relative">
                                                        <img src="{{ Storage::url('media/galeri/' . $media->file_name) }}"
                                                             alt="Galeri {{ $loop->iteration }}"
                                                             class="w-100 h-100 object-fit-cover rounded"
                                                             style="height: 200px; cursor: pointer;"
                                                             onclick="openLightbox('{{ Storage::url('media/galeri/' . $media->file_name) }}')">

                                                        <!-- Sort Order Badge -->
                                                        <div class="position-absolute top-0 start-0 m-2">
                                                            <span class="badge bg-dark bg-opacity-75">#{{ $media->sort_order }}</span>
                                                        </div>

                                                        <!-- Delete Button -->
                                                        <form action="{{ route('galeri.deleteFile', [$dataGaleri->galeri_id, $media->media_id]) }}"
                                                              method="POST" class="position-absolute top-0 end-0 m-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="btn btn-danger btn-sm rounded-circle"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Upload More Images Form -->
                                        <div class="mt-5 pt-4 border-top">
                                            <h5 class="mb-3">Tambah Foto Baru</h5>
                                            <form action="{{ route('galeri.uploadImages', $dataGaleri->galeri_id) }}"
                                                  method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row g-3">
                                                    <div class="col-md-8">
                                                        <input type="file"
                                                               class="form-control @error('foto') is-invalid @enderror"
                                                               name="foto[]"
                                                               multiple
                                                               accept="image/*"
                                                               required>
                                                        <small class="text-muted">Pilih foto untuk diupload (maksimal 10 file, 5MB per file)</small>
                                                        @error('foto')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button type="submit" class="btn btn-success w-100">
                                                            <i class="bi bi-upload me-2"></i>Upload Foto
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Metadata -->
                                        <div class="row g-3 mt-4 pt-4 border-top">
                                            <div class="col-md-6">
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-plus me-1"></i> Dibuat:
                                                    {{ \Carbon\Carbon::parse($dataGaleri->created_at)->format('d M Y H:i') }}
                                                </small>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-check me-1"></i> Diupdate:
                                                    {{ \Carbon\Carbon::parse($dataGaleri->updated_at)->format('d M Y H:i') }}
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="d-flex gap-3 mt-5 pt-4 border-top">
                                            <a href="{{ route('galeri.edit', $dataGaleri->galeri_id) }}"
                                               class="btn btn-primary">
                                                <i class="bi bi-pencil me-2"></i>Edit Galeri
                                            </a>
                                            <form action="{{ route('galeri.destroy', $dataGaleri->galeri_id) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus galeri ini beserta semua fotonya?')">
                                                    <i class="bi bi-trash me-2"></i>Hapus Galeri
                                                </button>
                                            </form>
                                            <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary ms-auto">
                                                <i class="bi bi-arrow-left me-2"></i>Kembali
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <!-- Empty State -->
                                    <div class="card-body text-center py-5">
                                        <div class="mb-4">
                                            <i class="bi bi-images display-1 text-muted"></i>
                                        </div>
                                        <h4 class="text-muted mb-3">Belum ada foto dalam galeri ini</h4>
                                        <p class="text-muted mb-4">Mulai dengan mengupload foto pertama ke galeri.</p>

                                        <!-- Upload Form -->
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <form action="{{ route('galeri.uploadImages', $dataGaleri->galeri_id) }}"
                                                      method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <input type="file"
                                                               class="form-control @error('foto') is-invalid @enderror"
                                                               name="foto[]"
                                                               multiple
                                                               accept="image/*"
                                                               required>
                                                        <small class="text-muted">Pilih foto untuk diupload (maksimal 10 file, 5MB per file)</small>
                                                        @error('foto')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="bi bi-upload me-2"></i>Upload Foto Pertama
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Detail Section-->

        </main>

        <!-- Lightbox Modal -->
        <div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center p-0">
                        <img id="lightboxImage" src="" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <style>
            .gallery-item {
                transition: all 0.3s ease;
                overflow: hidden;
            }

            .gallery-item:hover {
                transform: translateY(-3px);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }

            .gallery-item img {
                transition: transform 0.3s ease;
            }

            .gallery-item:hover img {
                transform: scale(1.05);
            }
        </style>

        <script>
            function openLightbox(imageSrc) {
                document.getElementById('lightboxImage').src = imageSrc;
                const modal = new bootstrap.Modal(document.getElementById('lightboxModal'));
                modal.show();
            }

            // Drag and drop untuk sort order bisa ditambahkan di sini jika diperlukan
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize jika menggunakan sortable
                if (typeof Sortable !== 'undefined') {
                    new Sortable(document.querySelector('.row.g-3.mb-4'), {
                        animation: 150,
                        onEnd: function(evt) {
                            // Update sort order ke server
                            const items = evt.from.querySelectorAll('.gallery-item');
                            const sortOrder = {};
                            items.forEach((item, index) => {
                                const mediaId = item.querySelector('input[name="media_id[]"]')?.value;
                                if (mediaId) {
                                    sortOrder[mediaId] = index + 1;
                                }
                            });

                            fetch("{{ route('galeri.updateSortOrder', $dataGaleri->galeri_id) }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ sort_order: sortOrder })
                            }).then(response => response.json())
                              .then(data => {
                                  if (data.success) {
                                      // Update badge sort order
                                      items.forEach((item, index) => {
                                          const badge = item.querySelector('.badge');
                                          if (badge) {
                                              badge.textContent = '#' + (index + 1);
                                          }
                                      });
                                  }
                              });
                        }
                    });
                }
            });
        </script>
    @endsection
</body>
</html>

