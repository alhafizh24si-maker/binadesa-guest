<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User - Binadesa</title>

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
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Edit User</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Form untuk mengedit data user dalam sistem.</p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                                <form action="{{ route('user.update', $user->id) }}" method="POST"
      class="p-5 rounded-4"
      style="background: var(--bs-body-bg); border: 1px solid var(--bs-border-color);"
      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-12">
                                            <label class="mb-2 fw-bold" for="name">Nama Lengkap <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('name') is-invalid @enderror" id="name"
                                                type="text" name="name" value="{{ old('name', $user->name) }}"
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
                                                type="email" name="email" value="{{ old('email', $user->email) }}"
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
                                                <option value="" disabled>Pilih role user</option>
                                                <option value="Super Admin"
                                                    {{ old('role', $user->role) == 'Super Admin' ? 'selected' : '' }}>Super
                                                    Admin</option>
                                                <option value="Admin"
                                                    {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin
                                                </option>
                                                <option value="Guest"
                                                    {{ old('role', $user->role) == 'Guest' ? 'selected' : '' }}>Guest
                                                </option>
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">Hak akses user dalam sistem</small>
                                        </div>
                                    </div>

                                    <!-- Tambahkan setelah bagian role -->
<div class="row gap-3 mb-4">
    <div class="col-md-12">
        <label class="mb-2 fw-bold" for="profile_picture">Foto Profil</label>

        <!-- Current profile picture -->
        @if($user->profile_picture)
        <div class="mb-3">
            <p class="small text-muted mb-2">Foto saat ini:</p>
            <img src="{{ $user->profile_picture_url }}"
                 class="rounded-circle border"
                 style="width: 120px; height: 120px; object-fit: cover;">
            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox"
                       id="remove_profile_picture" name="remove_profile_picture" value="1">
                <label class="form-check-label text-danger small" for="remove_profile_picture">
                    Hapus foto profil
                </label>
            </div>
        </div>
        @endif

        <!-- Upload new picture -->
        <input class="form-control @error('profile_picture') is-invalid @enderror"
               id="profile_picture"
               type="file"
               name="profile_picture"
               accept="image/*">
        @error('profile_picture')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small class="text-muted">Kosongkan jika tidak ingin mengubah. Ukuran maksimal 2MB.</small>

        <!-- Image preview -->
        <div class="mt-3" id="imagePreviewContainer" style="display: none;">
            <p class="small text-muted mb-2">Preview foto baru:</p>
            <img id="imagePreview" class="rounded-circle border"
                 style="width: 120px; height: 120px; object-fit: cover;">
        </div>
    </div>
</div>

                                    <div class="row gap-3 mb-4">
                                        <div class="col-md-6">
                                            <label class="mb-2 fw-bold" for="password">Password</label>
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                id="password" type="password" name="password"
                                                placeholder="Kosongkan jika tidak ingin mengubah">
                                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah
                                                password</small>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2 fw-bold" for="password_confirmation">Konfirmasi
                                                Password</label>
                                            <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="password_confirmation" type="password" name="password_confirmation"
                                                placeholder="Konfirmasi password">
                                            @error('password_confirmation')
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
                                                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
                                                    <i class="bi bi-arrow-left me-2"></i>Kembali
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
    // Image preview for profile picture
    document.getElementById('profile_picture').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');
        const previewContainer = document.getElementById('imagePreviewContainer');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';
        }
    });
</script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Form Section-->

        </main>
    @endsection
