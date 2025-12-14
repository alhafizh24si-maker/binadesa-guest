<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Profil Desa - Binadesa</title>

    @extends('layouts.guest.app')
    @section('content')
        <!-- ======= Main =======-->
        <main>

            <!-- ======= Form Section =======-->
            <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Admin
                                Panel</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Tambah Profil Desa</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Form untuk menambahkan data profil desa baru ke dalam sistem.</p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                                <form action="{{ route('profildesa.store') }}" method="POST" class="p-5 rounded-4"
                                    style="background: var(--bs-body-bg); border: 1px solid var(--bs-border-color);">
                                    @csrf

                                    <!-- Informasi Dasar -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h5 class="fw-bold text-success mb-4">
                                                <i class="bi bi-info-circle me-2"></i>
                                                Informasi Dasar
                                            </h5>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="mb-2 fw-bold" for="nama_desa">Nama Desa <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('nama_desa') is-invalid @enderror"
                                                id="nama_desa" type="text" name="nama_desa"
                                                value="{{ old('nama_desa') }}"
                                                placeholder="Masukkan nama desa" maxlength="100" required>
                                            @error('nama_desa')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="mb-2 fw-bold" for="kecamatan">Kecamatan <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('kecamatan') is-invalid @enderror"
                                                id="kecamatan" type="text" name="kecamatan"
                                                value="{{ old('kecamatan') }}"
                                                placeholder="Masukkan nama kecamatan" maxlength="100" required>
                                            @error('kecamatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="mb-2 fw-bold" for="kabupaten">Kabupaten <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('kabupaten') is-invalid @enderror"
                                                id="kabupaten" type="text" name="kabupaten"
                                                value="{{ old('kabupaten') }}"
                                                placeholder="Masukkan nama kabupaten" maxlength="100" required>
                                            @error('kabupaten')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="mb-2 fw-bold" for="provinsi">Provinsi <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('provinsi') is-invalid @enderror"
                                                id="provinsi" type="text" name="provinsi"
                                                value="{{ old('provinsi') }}"
                                                placeholder="Masukkan nama provinsi" maxlength="100" required>
                                            @error('provinsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Kontak -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h5 class="fw-bold text-primary mb-4">
                                                <i class="bi bi-telephone me-2"></i>
                                                Informasi Kontak
                                            </h5>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="mb-2 fw-bold" for="email">Email <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('email') is-invalid @enderror"
                                                id="email" type="email" name="email"
                                                value="{{ old('email') }}"
                                                placeholder="Masukkan alamat email desa" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">Contoh: desa.sukamaju@mail.com</small>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="mb-2 fw-bold" for="telepon">Telepon <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('telepon') is-invalid @enderror"
                                                id="telepon" type="text" name="telepon"
                                                value="{{ old('telepon') }}"
                                                placeholder="Masukkan nomor telepon" maxlength="20" required>
                                            @error('telepon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">Contoh: 081234567890</small>
                                        </div>
                                    </div>

                                    <!-- Alamat Kantor -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h5 class="fw-bold text-info mb-4">
                                                <i class="bi bi-geo-alt me-2"></i>
                                                Alamat Kantor
                                            </h5>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="mb-2 fw-bold" for="alamat_kantor">Alamat Lengkap Kantor Desa <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control @error('alamat_kantor') is-invalid @enderror"
                                                id="alamat_kantor" name="alamat_kantor"
                                                rows="3" placeholder="Masukkan alamat lengkap kantor desa" required>{{ old('alamat_kantor') }}</textarea>
                                            @error('alamat_kantor')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Visi -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h5 class="fw-bold text-info mb-4">
                                                <i class="bi bi-eye me-2"></i>
                                                Visi Desa
                                            </h5>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="mb-2 fw-bold" for="visi">Visi Desa <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control @error('visi') is-invalid @enderror"
                                                id="visi" name="visi"
                                                rows="3" placeholder="Masukkan visi desa" required>{{ old('visi') }}</textarea>
                                            @error('visi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">Contoh: "Mewujudkan Desa yang Mandiri, Sejahtera, dan Berbudaya"</small>
                                        </div>
                                    </div>

                                    <!-- Misi -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h5 class="fw-bold text-success mb-4">
                                                <i class="bi bi-list-task me-2"></i>
                                                Misi Desa
                                            </h5>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="mb-2 fw-bold" for="misi">Misi Desa <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control @error('misi') is-invalid @enderror"
                                                id="misi" name="misi"
                                                rows="4" placeholder="Masukkan misi desa" required>{{ old('misi') }}</textarea>
                                            @error('misi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">Jelaskan langkah-langkah untuk mencapai visi desa</small>
                                        </div>
                                    </div>

                                    <div class="row gap-3">
                                        <div class="col-md-12">
                                            <div class="d-flex gap-3">
                                                <button class="btn btn-success fw-semibold" type="submit">
                                                    <i class="bi bi-save me-2"></i>Simpan Profil Desa
                                                </button>
                                                <a href="{{ route('profildesa.index') }}" class="btn btn-outline-secondary">
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

        <style>
            .form-control, .form-select {
                border: 1px solid #dee2e6;
                transition: all 0.3s ease;
            }

            .form-control:focus, .form-select:focus {
                border-color: #198754;
                box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
            }

            textarea.form-control {
                min-height: 120px;
                resize: vertical;
            }
        </style>
    @endsection
</html>
