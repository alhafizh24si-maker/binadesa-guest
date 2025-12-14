<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Agenda - Binadesa</title>

    @extends('layouts.guest.app')
    @section('content')
        <!-- ======= Main =======-->
        <main>

            <!-- ======= Form Section =======-->
            <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Agenda</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Tambah Agenda</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Form untuk menambahkan agenda baru ke dalam sistem.</p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                                <form action="{{ route('agenda.store') }}" method="POST" class="p-5 rounded-4"
                                    style="background: var(--bs-body-bg); border: 1px solid var(--bs-border-color);"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="judul">Judul Agenda <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('judul') is-invalid @enderror" id="judul"
                                                type="text" name="judul" value="{{ old('judul') }}"
                                                placeholder="Masukkan judul agenda" maxlength="255" required>
                                            @error('judul')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="lokasi">Lokasi <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                                                type="text" name="lokasi" value="{{ old('lokasi') }}"
                                                placeholder="Masukkan lokasi agenda" maxlength="255" required>
                                            @error('lokasi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-6">
                                            <label class="mb-2 fw-bold" for="tanggal_mulai">Tanggal Mulai <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                                id="tanggal_mulai" type="datetime-local" name="tanggal_mulai"
                                                value="{{ old('tanggal_mulai') }}" required>
                                            @error('tanggal_mulai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2 fw-bold" for="tanggal_selesai">Tanggal Selesai <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                                id="tanggal_selesai" type="datetime-local" name="tanggal_selesai"
                                                value="{{ old('tanggal_selesai') }}" required>
                                            @error('tanggal_selesai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="penyelenggara">Penyelenggara <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('penyelenggara') is-invalid @enderror"
                                                id="penyelenggara" type="text" name="penyelenggara"
                                                value="{{ old('penyelenggara') }}"
                                                placeholder="Masukkan nama penyelenggara" maxlength="255" required>
                                            @error('penyelenggara')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4"
                                                placeholder="Masukkan deskripsi agenda (opsional)">{{ old('deskripsi') }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="poster_dokumen">Poster/Dokumen</label>
                                            <input class="form-control @error('poster_dokumen') is-invalid @enderror"
                                                id="poster_dokumen" type="file" name="poster_dokumen"
                                                accept="image/*">
                                            <small class="text-muted">Unggah poster agenda (opsional, maksimal 2MB, format: jpeg, png, jpg, gif, svg)</small>
                                            @error('poster_dokumen')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row gap-3">
                                        <div class="col-md-12">
                                            <div class="d-flex gap-3">
                                                <button class="btn btn-primary fw-semibold" type="submit">
                                                    <i class="bi bi-save me-2"></i>Simpan Data
                                                </button>
                                                <a href="{{ route('agenda.index') }}" class="btn btn-outline-secondary">
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
