<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Agenda - Binadesa</title>

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
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Edit Agenda</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Form untuk mengedit data agenda dalam sistem.</p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                                <form action="{{ route('agenda.update', $dataAgenda->agenda_id) }}" method="POST"
                                    class="p-5 rounded-4" style="background: var(--bs-body-bg); border: 1px solid var(--bs-border-color);"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="judul">Judul Agenda <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('judul') is-invalid @enderror" id="judul"
                                                type="text" name="judul" value="{{ old('judul', $dataAgenda->judul) }}"
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
                                                type="text" name="lokasi" value="{{ old('lokasi', $dataAgenda->lokasi) }}"
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
                                                value="{{ old('tanggal_mulai', \Carbon\Carbon::parse($dataAgenda->tanggal_mulai)->format('Y-m-d\TH:i')) }}"
                                                required>
                                            @error('tanggal_mulai')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2 fw-bold" for="tanggal_selesai">Tanggal Selesai <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                                id="tanggal_selesai" type="datetime-local" name="tanggal_selesai"
                                                value="{{ old('tanggal_selesai', \Carbon\Carbon::parse($dataAgenda->tanggal_selesai)->format('Y-m-d\TH:i')) }}"
                                                required>
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
                                                value="{{ old('penyelenggara', $dataAgenda->penyelenggara) }}"
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
                                                placeholder="Masukkan deskripsi agenda (opsional)">{{ old('deskripsi', $dataAgenda->deskripsi) }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="poster">Poster Agenda</label>

                                            <!-- Tampilkan poster saat ini jika ada -->
                                            @php
                                                $poster = $dataAgenda->media->firstWhere('sort_order', 1);
                                            @endphp

                                            @if ($poster)
                                                <div class="mb-3">
                                                    <img src="{{ Storage::url('media/agenda/' . $poster->file_name) }}"
                                                         alt="Poster {{ $dataAgenda->judul }}"
                                                         style="max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 8px;">
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox"
                                                               id="hapus_poster" name="hapus_poster" value="1">
                                                        <label class="form-check-label text-danger" for="hapus_poster">
                                                            Hapus poster saat ini
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif

                                            <input class="form-control @error('poster') is-invalid @enderror"
                                                id="poster" type="file" name="poster"
                                                accept="image/*">
                                            <small class="text-muted">Unggah poster agenda baru (opsional, akan mengganti yang lama). Format: jpeg, png, jpg, gif, webp. Maksimal 2MB</small>
                                            @error('poster')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Gambar Pendukung -->
                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold">Gambar Pendukung Saat Ini</label>

                                            @php
                                                $gambarPendukung = $dataAgenda->media->where('sort_order', '>', 1);
                                            @endphp

                                            @if ($gambarPendukung->count() > 0)
                                                <div class="row g-3 mb-3">
                                                    @foreach ($gambarPendukung as $gambar)
                                                    <div class="col-md-3">
                                                        <div class="card">
                                                            <img src="{{ Storage::url('media/agenda/' . $gambar->file_name) }}"
                                                                 class="card-img-top"
                                                                 alt="Gambar pendukung"
                                                                 style="height: 150px; object-fit: cover;">
                                                            <div class="card-body p-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                           name="delete_files[]"
                                                                           value="{{ $gambar->media_id }}"
                                                                           id="delete_file_{{ $gambar->media_id }}">
                                                                    <label class="form-check-label small text-danger"
                                                                           for="delete_file_{{ $gambar->media_id }}">
                                                                        Hapus
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <p class="text-muted">Belum ada gambar pendukung.</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="gambar_pendukung">Tambah Gambar Pendukung Baru</label>
                                            <input class="form-control @error('gambar_pendukung') is-invalid @enderror"
                                                id="gambar_pendukung" type="file" name="gambar_pendukung[]"
                                                accept="image/*" multiple>
                                            <small class="text-muted">Unggah gambar pendukung tambahan (opsional, maksimal 5 file). Format: jpeg, png, jpg, gif, webp. Maksimal 2MB per file</small>
                                            @error('gambar_pendukung')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            @error('gambar_pendukung.*')
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
