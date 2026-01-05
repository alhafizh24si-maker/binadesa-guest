<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Binadesa</title>

    <!-- ======= Google Font =======-->
    @include('layouts.guest.googlefont')
    <!-- End Google Font-->

    <!-- ======= Styles =======-->
    @include('layouts.guest.styles')
    <!-- End Styles-->

    <!-- ======= Theme Style =======-->
    @include('layouts.guest.css')
    <!-- End Theme Style-->

    <!-- ======= Apply theme =======-->
    @include('layouts.guest.apllytheme')
    <!-- ======= End Apply theme =======-->

    <!-- ======= register css =======-->
    @include('layouts.guest.register')
    <!-- ======= end register css =======-->

    <style>
        /* Tambahkan styling untuk logo */
        .register-logo {
            text-align: center;
            margin-bottom: 15px;
        }

        .register-logo img {
            max-width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        .register-brand {
            color: var(--primary-color, #007bff);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .register-tagline {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        /* Styling untuk radio button role */
        .role-selection {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .role-selection label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 10px;
            display: block;
        }

        .role-options {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .role-option {
            flex: 1;
            min-width: 120px;
        }

        .role-option input[type="radio"] {
            display: none;
        }

        .role-option label {
            display: block;
            padding: 12px 15px;
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .role-option input[type="radio"]:checked+label {
            background: var(--primary-color, #007bff);
            color: white;
            border-color: var(--primary-color, #007bff);
        }

        .role-option label:hover {
            border-color: var(--primary-color, #007bff);
        }

        .role-icon {
            display: block;
            font-size: 24px;
            margin-bottom: 5px;
        }

        .role-description {
            font-size: 11px;
            opacity: 0.8;
            margin-top: 3px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="register-container">
                    <div class="row g-0">
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="register-left">
                                <h2 class="mb-4">Bergabung dengan Binadesa!</h2>
                                <p class="mb-4">Daftar sekarang untuk mengakses semua fitur platform desa digital
                                    kami.</p>

                                <div class="register-feature">
                                    <div class="register-feature-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="register-feature-text">
                                        <h5>Informasi Desa Real-time</h5>
                                        <p>Akses informasi terbaru seputar perkembangan desa</p>
                                    </div>
                                </div>

                                <div class="register-feature">
                                    <div class="register-feature-icon">
                                        <i class="bi bi-file-text"></i>
                                    </div>
                                    <div class="register-feature-text">
                                        <h5>Layanan Administrasi</h5>
                                        <p>Permohonan surat dan layanan administrasi secara online</p>
                                    </div>
                                </div>

                                <div class="register-feature">
                                    <div class="register-feature-icon">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="register-feature-text">
                                        <h5>Komunitas Digital</h5>
                                        <p>Terhubung dengan warga dan perangkat desa lainnya</p>
                                    </div>
                                </div>

                                <div class="register-feature">
                                    <div class="register-feature-icon">
                                        <i class="bi bi-shield-check"></i>
                                    </div>
                                    <div class="register-feature-text">
                                        <h5>Data Terlindungi</h5>
                                        <p>Keamanan data pribadi Anda menjadi prioritas kami</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="register-right">
                                <!-- Tambahkan logo di sini -->
                                <div class="register-logo">
                                    <!-- Ganti 'logo-binadesa.png' dengan path logo Anda -->
                                    <img src="{{ asset('assets-guest/images/logobinadesa.png') }}" alt="Logo Binadesa">
                                </div>

                                <div class="text-center mb-4">
                                    <!-- Tampilkan teks Binadesa di bawah logo -->
                                    <h1 class="register-brand">Portal Platform</h1>
                                    <p class="register-tagline">Platform Desa Digital</p>
                                </div>

                                <h2 class="register-title">Buat Akun Baru</h2>
                                <p class="register-subtitle">Isi data diri Anda untuk mulai menggunakan Binadesa</p>

                                <!-- Menampilkan pesan error -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('register.submit') }}" id="registerForm">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="role" class="form-label">Peran</label>
                                        <select class="form-control @error('role') is-invalid @enderror" id="role"
                                            name="role" required>
                                            <option value="" disabled selected>Pilih role Anda</option>
                                            <option value="Guest" {{ old('role') == 'Guest' ? 'selected' : '' }}>Guest
                                            </option>
                                            <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="Super Admin"
                                                {{ old('role') == 'Super Admin' ? 'selected' : '' }}>Super Admin
                                            </option>
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                            <input type="text"
                                                class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                                                required autocomplete="name" autofocus
                                                placeholder="Masukkan nama lengkap">
                                            @error('nama_lengkap')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Alamat Email</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" value="{{ old('email') }}" required
                                                autocomplete="email" placeholder="Masukkan email">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="telepon" class="form-label">Nomor Telepon</label>
                                            <input type="tel"
                                                class="form-control @error('telepon') is-invalid @enderror"
                                                id="telepon" name="telepon" value="{{ old('telepon') }}" required
                                                placeholder="Contoh: 08123456789">
                                            @error('telepon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input type="text"
                                                class="form-control @error('nik') is-invalid @enderror" id="nik"
                                                name="nik" value="{{ old('nik') }}" required maxlength="16"
                                                minlength="16" placeholder="16 digit NIK">
                                            @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="2"
                                            required placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="password" class="form-label">Kata Sandi</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password" required autocomplete="new-password"
                                                placeholder="Minimal 8 karakter">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <div class="password-strength">
                                                <div class="password-strength-bar">
                                                    <div class="password-strength-fill" id="passwordStrengthFill">
                                                    </div>
                                                </div>
                                                <div class="password-strength-text" id="passwordStrengthText">Kekuatan
                                                    kata sandi</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="password_confirmation" class="form-label">Konfirmasi Kata
                                                Sandi</label>
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Ketik ulang kata sandi">
                                            <div class="form-text" id="passwordMatchText"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox"
                                            class="form-check-input @error('terms') is-invalid @enderror"
                                            name="terms" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            Saya menyetujui <a href="#" class="text-primary">Syarat &
                                                Ketentuan</a> dan <a href="#" class="text-primary">Kebijakan
                                                Privasi</a>
                                        </label>
                                        @error('terms')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-custom mb-3" id="submitBtn">Daftar
                                        Sekarang</button>
                                </form>

                                <div class="register-divider">
                                    <span>Atau daftar dengan</span>
                                </div>

                                <div class="social-register">
                                    <a href="https://accounts.google.com/v3/signin/identifier?hl=id&ifkv=ATuJsjxtOBeZDuRmB7aXp-t7SKJXmJLQ0gwLtISqhsxIyjcD8f26SWZ9gxRQXTnexAOh2jbXHugR&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S1628295783%3A1709606966038322&theme=mn"
                                        class="social-btn">
                                        <i class="bi bi-google"></i>
                                        <span>Google</span>
                                    </a>
                                    <a href="https://www.facebook.com/r.php?entry_point=login" class="social-btn">
                                        <i class="bi bi-facebook"></i>
                                        <span>Facebook</span>
                                    </a>
                                </div>

                                <div class="login-link">
                                    <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Javascripts =======-->
    @include('layouts.guest.javascripts')
    <!-- End JavaScripts-->

    <!-- ======= register scripts =======-->
    @include('layouts.guest.registerscripts')
    <!-- ======= End register scripts =======-->

    <script>
        // Script untuk interaksi pemilihan role
        document.addEventListener('DOMContentLoaded', function() {
            const roleRadios = document.querySelectorAll('input[name="role"]');
            const roleDescription = document.getElementById('roleDescription');

            // Deskripsi untuk setiap role
            const roleDescriptions = {
                'guest': '• Warga: Dapat mengakses informasi dan layanan dasar<br>• Admin: Dapat mengelola konten dan data desa<br>• Super Admin: Akses penuh ke semua fitur sistem',
                'admin': '• Warga: Dapat mengakses informasi dan layanan dasar<br>• <strong>Admin: Dapat mengelola konten dan data desa</strong><br>• Super Admin: Akses penuh ke semua fitur sistem',
                'super_admin': '• Warga: Dapat mengakses informasi dan layanan dasar<br>• Admin: Dapat mengelola konten dan data desa<br>• <strong>Super Admin: Akses penuh ke semua fitur sistem</strong>'
            };

            // Tambahkan event listener untuk setiap radio button
            roleRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.checked) {
                        roleDescription.innerHTML = roleDescriptions[this.value];
                    }
                });
            });

            // Set deskripsi awal berdasarkan role yang terpilih
            const selectedRole = document.querySelector('input[name="role"]:checked');
            if (selectedRole) {
                roleDescription.innerHTML = roleDescriptions[selectedRole.value];
            }
        });
    </script>
</body>

</html>
