<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Galeri - Binadesa</title>

    @extends('layouts.guest.app')
    @section('content')
        <!-- ======= Main =======-->
        <main>

            <!-- ======= Form Section =======-->
            <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Galeri</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Edit Galeri</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Form untuk mengedit data galeri dalam sistem.</p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                                <form action="{{ route('galeri.update', $dataGaleri->galeri_id) }}" method="POST"
                                    class="p-5 rounded-4" style="background: var(--bs-body-bg); border: 1px solid var(--bs-border-color);"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="judul">Judul Galeri <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('judul') is-invalid @enderror" id="judul"
                                                type="text" name="judul" value="{{ old('judul', $dataGaleri->judul) }}"
                                                placeholder="Masukkan judul galeri" maxlength="255" required>
                                            @error('judul')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4"
                                                placeholder="Masukkan deskripsi galeri (opsional)">{{ old('deskripsi', $dataGaleri->deskripsi) }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Foto Saat Ini -->
                                    @if($dataGaleri->media && $dataGaleri->media->count() > 0)
                                        <div class="row gap-3 mb-4">
                                            <div class="col-md-12">
                                                <label class="mb-2 fw-bold">Foto Saat Ini</label>
                                                <div class="row g-3">
                                                    @foreach($dataGaleri->media->sortBy('sort_order') as $media)
                                                    <div class="col-md-3">
                                                        <div class="card">
                                                            <img src="{{ Storage::url('media/galeri/' . $media->file_name) }}"
                                                                 class="card-img-top"
                                                                 alt="Foto galeri"
                                                                 style="height: 150px; object-fit: cover;">
                                                            <div class="card-body p-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                           name="delete_files[]"
                                                                           value="{{ $media->media_id }}"
                                                                           id="delete_file_{{ $media->media_id }}">
                                                                    <label class="form-check-label small text-danger"
                                                                           for="delete_file_{{ $media->media_id }}">
                                                                        Hapus
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="foto">Tambah Foto Baru</label>
                                            <input class="form-control @error('foto') is-invalid @enderror"
                                                id="foto" type="file" name="foto[]"
                                                accept="image/*" multiple>
                                            <small class="text-muted">Unggah foto tambahan (opsional, maksimal 10 file). Format: jpeg, png, jpg, gif, webp. Maksimal 5MB per file</small>
                                            @error('foto')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            @error('foto.*')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row gap-3">
                                        <div class="col-md-12">
                                            <div class="d-flex gap-3">
                                                <button class="btn btn-primary fw-semibold" type="submit">
                                                    <i class="bi bi-save me-2"></i>Simpan Perubahan
                                                </button>
                                                <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary">
                                                    <i class="bi bi-arrow-left me-2"></i>Kembali
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

        </main>
    @endsection
</html>
