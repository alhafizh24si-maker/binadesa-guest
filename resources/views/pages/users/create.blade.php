<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah User - Binadesa</title>

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
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Tambah User</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Form untuk menambahkan data user baru ke dalam
                                sistem.</p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                                <form action="{{ route('user.store') }}" method="POST" class="p-5 rounded-4"
                                    style="background: var(--bs-body-bg); border: 1px solid var(--bs-border-color);">
                                    @csrf

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="name">Nama Lengkap <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('name') is-invalid @enderror" id="name"
                                                type="text" name="name" value="{{ old('name') }}"
                                                placeholder="Masukkan nama lengkap" maxlength="100" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="email">Email <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('email') is-invalid @enderror" id="email"
                                                type="email" name="email" value="{{ old('email') }}"
                                                placeholder="Masukkan alamat email" maxlength="100" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Tambahkan setelah bagian email -->
                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="role">Role <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select @error('role') is-invalid @enderror" id="role"
                                                name="role" required>
                                                <option value="" disabled selected>Pilih role user</option>
                                                <option value="Super Admin"
                                                    {{ old('role') == 'Super Admin' ? 'selected' : '' }}>Super Admin
                                                </option>
                                                <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin
                                                </option>
                                                <option value="Guest" {{ old('role') == 'Guest' ? 'selected' : '' }}>Guest
                                                </option>
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">Tentukan hak akses user dalam sistem</small>
                                        </div>
                                    </div>

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-6">
                                            <label class="mb-2 fw-bold" for="password">Password <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                id="password" type="password" name="password"
                                                placeholder="Masukkan password" required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2 fw-bold" for="password_confirmation">Konfirmasi Password
                                                <span class="text-danger">*</span></label>
                                            <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="password_confirmation" type="password" name="password_confirmation"
                                                placeholder="Konfirmasi password" required>
                                            @error('password_confirmation')
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
                                                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
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
