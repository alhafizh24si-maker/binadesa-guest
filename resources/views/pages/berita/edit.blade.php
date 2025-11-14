<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Berita - Binadesa</title>

    @extends('layouts.guest.app')
    @section('content')
        <!-- ======= Form Section =======-->
        <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-8 mx-auto text-center">
                        <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0"></span>
                        <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Edit Berita</h2>
                        <p data-aos="fade-up" data-aos-delay="200">Form untuk mengedit berita.</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                            <form action="{{ route('berita.update', $berita->berita_id) }}" method="POST"
                                  class="p-5 rounded-4"
                                  style="background: var(--bs-body-bg); border: 1px solid var(--bs-border-color);"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row gap-3 mb-4">
                                    <div class="col-md-6">
                                        <label class="mb-2 fw-bold" for="kategori_id">Kategori Berita <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select @error('kategori_id') is-invalid @enderror"
                                                id="kategori_id" name="kategori_id" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach($kategori as $kat)
                                                <option value="{{ $kat->kategori_id }}"
                                                    {{ old('kategori_id', $berita->kategori_id) == $kat->kategori_id ? 'selected' : '' }}>
                                                    {{ $kat->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="mb-2 fw-bold" for="penulis">Penulis <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control @error('penulis') is-invalid @enderror"
                                               id="penulis" type="text" name="penulis"
                                               value="{{ old('penulis', $berita->penulis) }}"
                                               placeholder="Masukkan nama penulis" required>
                                        @error('penulis')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gap-3 mb-4">
                                    <div class="col-md-12">
                                        <label class="mb-2 fw-bold" for="judul">Judul Berita <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control @error('judul') is-invalid @enderror"
                                               id="judul" type="text" name="judul"
                                               value="{{ old('judul', $berita->judul) }}"
                                               placeholder="Masukkan judul berita" required>
                                        @error('judul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gap-3 mb-4">
                                    <div class="col-md-12">
                                        <label class="mb-2 fw-bold" for="isi_html">Isi Berita <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control @error('isi_html') is-invalid @enderror"
                                                  id="isi_html" name="isi_html" rows="10"
                                                  placeholder="Masukkan isi berita" required>{{ old('isi_html', $berita->isi_html) }}</textarea>
                                        @error('isi_html')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gap-3 mb-4">
                                    <div class="col-md-6">
                                        <label class="mb-2 fw-bold" for="cover_foto">Cover/Foto Berita</label>

                                        @if($berita->cover_foto)
                                            <div class="mb-3">
                                                <img src="{{ asset('storage/' . $berita->cover_foto) }}"
                                                     alt="Cover saat ini"
                                                     class="img-thumbnail rounded"
                                                     style="max-width: 200px; max-height: 150px; object-fit: cover;">
                                                <div class="form-text mt-1">Cover saat ini</div>
                                            </div>
                                        @endif

                                        <input class="form-control @error('cover_foto') is-invalid @enderror"
                                               id="cover_foto" type="file" name="cover_foto"
                                               accept="image/*">
                                        @error('cover_foto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text mt-2">
                                            Biarkan kosong jika tidak ingin mengubah cover. Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="mb-2 fw-bold" for="status">Status <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select @error('status') is-invalid @enderror"
                                                id="status" name="status" required>
                                            <option value="draft" {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                            <option value="terbit" {{ old('status', $berita->status) == 'terbit' ? 'selected' : '' }}>Terbit</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <div class="mt-4">
                                            <label class="mb-2 fw-bold" for="terbit_at">Tanggal Terbit</label>
                                            <input class="form-control @error('terbit_at') is-invalid @enderror"
                                                   id="terbit_at" type="datetime-local" name="terbit_at"
                                                   value="{{ old('terbit_at', $berita->terbit_at ? $berita->terbit_at->format('Y-m-d\TH:i') : '') }}">
                                            @error('terbit_at')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-text mt-2">
                                                Kosongkan untuk menggunakan tanggal saat ini
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gap-3 mb-4">
                                    <div class="col-md-12">
                                        <div class="card bg-light border-0">
                                            <div class="card-body">
                                                <h6 class="card-title fw-bold">Informasi Berita</h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <small class="text-muted">Slug:</small>
                                                        <p class="mb-1">{{ $berita->slug }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <small class="text-muted">Dibuat pada:</small>
                                                        <p class="mb-1">{{ $berita->created_at->format('d/m/Y H:i') }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <small class="text-muted">Diupdate pada:</small>
                                                        <p class="mb-1">{{ $berita->updated_at->format('d/m/Y H:i') }}</p>
                                                    </div>
                                                    @if($berita->terbit_at)
                                                    <div class="col-md-6">
                                                        <small class="text-muted">Terbit pada:</small>
                                                        <p class="mb-1">{{ $berita->terbit_at->format('d/m/Y H:i') }}</p>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gap-3">
                                    <div class="col-md-12">
                                        <div class="d-flex gap-3">
                                            <button class="btn btn-primary fw-semibold" type="submit">
                                                <i class="bi bi-save me-2"></i>Update Berita
                                            </button>
                                            <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">
                                                <i class="bi bi-arrow-left me-2"></i>Kembali
                                            </a>
                                            <a href="{{ route('berita.create') }}" class="btn btn-outline-primary">
                                                <i class="bi bi-plus-circle me-2"></i>Tambah Baru
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Form Section-->

        @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Auto update slug when judul changes
                const judulInput = document.getElementById('judul');
                const slugInput = document.getElementById('slug');

                if (judulInput && slugInput) {
                    judulInput.addEventListener('input', function() {
                        // Simple slug generation (you might want to use a more robust solution)
                        const slug = judulInput.value
                            .toLowerCase()
                            .replace(/[^\w ]+/g, '')
                            .replace(/ +/g, '-');
                        slugInput.value = slug;
                    });
                }
            });
        </script>
        @endpush
    @endsection
</html>
