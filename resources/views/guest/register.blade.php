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

    <style>
        :root {
            --primary: #2e7d32;
            --secondary: #4caf50;
            --success: #66bb6a;
            --light: #f8f9fa;
            --dark: #212529;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .register-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 1000px;
            margin: 2rem auto;
        }

        .register-left {
            background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
            color: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-right {
            padding: 3rem;
        }

        .register-title {
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #2e7d32;
        }

        .register-subtitle {
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #2e7d32;
            box-shadow: 0 0 0 0.2rem rgba(46, 125, 50, 0.25);
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #495057;
        }

        .btn-custom {
            background: linear-gradient(135deg, #2e7d32, #4caf50);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46, 125, 50, 0.4);
            color: white;
        }

        .btn-outline-custom {
            background: transparent;
            border: 2px solid #2e7d32;
            color: #2e7d32;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-outline-custom:hover {
            background: #2e7d32;
            color: white;
        }

        .register-feature {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .register-feature-icon {
            background: rgba(255, 255, 255, 0.2);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.2rem;
        }

        .register-feature-text h5 {
            margin-bottom: 0.25rem;
            font-weight: 600;
        }

        .register-feature-text p {
            margin-bottom: 0;
            opacity: 0.9;
        }

        .register-divider {
            position: relative;
            text-align: center;
            margin: 1.5rem 0;
        }

        .register-divider::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e9ecef;
        }

        .register-divider span {
            background: white;
            padding: 0 1rem;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .social-register {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .social-btn {
            flex: 1;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 0.75rem;
            text-align: center;
            background: white;
            color: #495057;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .social-btn:hover {
            background: #f8f9fa;
            border-color: #2e7d32;
            color: #2e7d32;
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #6c757d;
        }

        .login-link a {
            color: #2e7d32;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 8px;
            border: none;
        }

        .alert-danger {
            background: rgba(239, 83, 80, 0.1);
            color: #dc3545;
        }

        .alert-success {
            background: rgba(102, 187, 106, 0.1);
            color: #198754;
        }

        .password-strength {
            margin-top: 0.5rem;
        }

        .password-strength-bar {
            height: 5px;
            border-radius: 3px;
            background: #e9ecef;
            margin-bottom: 0.5rem;
            overflow: hidden;
        }

        .password-strength-fill {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
        }

        .password-strength-text {
            font-size: 0.8rem;
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .register-left {
                padding: 2rem;
            }

            .register-right {
                padding: 2rem;
            }

            .social-register {
                flex-direction: column;
            }

            body {
                padding: 1rem;
            }
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
                                <p class="mb-4">Daftar sekarang untuk mengakses semua fitur platform desa digital kami.</p>

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
                                <div class="text-center mb-4">
                                    <h1 class="text-primary">Binadesa</h1>
                                    <p class="text-muted">Platform Desa Digital</p>
                                </div>

                                <h2 class="register-title">Buat Akun Baru</h2>
                                <p class="register-subtitle">Isi data diri Anda untuk mulai menggunakan Binadesa</p>

                                <!-- Menampilkan pesan error -->
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('register.submit') }}" id="registerForm">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
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
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                   id="email" name="email" value="{{ old('email') }}"
                                                   required autocomplete="email"
                                                   placeholder="Masukkan email">
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
                                            <input type="tel" class="form-control @error('telepon') is-invalid @enderror"
                                                   id="telepon" name="telepon" value="{{ old('telepon') }}"
                                                   required placeholder="Contoh: 08123456789">
                                            @error('telepon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                                   id="nik" name="nik" value="{{ old('nik') }}"
                                                   required maxlength="16" minlength="16"
                                                   placeholder="16 digit NIK">
                                            @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror"
                                                  id="alamat" name="alamat" rows="2" required
                                                  placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="password" class="form-label">Kata Sandi</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                   id="password" name="password" required
                                                   autocomplete="new-password"
                                                   placeholder="Minimal 8 karakter">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <div class="password-strength">
                                                <div class="password-strength-bar">
                                                    <div class="password-strength-fill" id="passwordStrengthFill"></div>
                                                </div>
                                                <div class="password-strength-text" id="passwordStrengthText">Kekuatan kata sandi</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                                            <input type="password" class="form-control"
                                                   id="password_confirmation" name="password_confirmation" required
                                                   autocomplete="new-password"
                                                   placeholder="Ketik ulang kata sandi">
                                            <div class="form-text" id="passwordMatchText"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror"
                                               name="terms" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            Saya menyetujui <a href="#" class="text-primary">Syarat & Ketentuan</a> dan <a href="#" class="text-primary">Kebijakan Privasi</a>
                                        </label>
                                        @error('terms')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-custom mb-3" id="submitBtn">Daftar Sekarang</button>
                                </form>

                                <div class="register-divider">
                                    <span>Atau daftar dengan</span>
                                </div>

                                <div class="social-register">
                                    <a href="#" class="social-btn">
                                        <i class="bi bi-google"></i>
                                        <span>Google</span>
                                    </a>
                                    <a href="#" class="social-btn">
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
    <script src="{{ asset('assets-guest/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendors/gsap/gsap.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendors/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendors/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('assets-guest/vendors/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('assets-guest/js/custom.js') }}"></script>
    <!-- End JavaScripts-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS jika diperlukan
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-in-out',
                    once: true
                });
            }

            // Password strength indicator
            const passwordInput = document.getElementById('password');
            const passwordStrengthFill = document.getElementById('passwordStrengthFill');
            const passwordStrengthText = document.getElementById('passwordStrengthText');
            const passwordConfirmation = document.getElementById('password_confirmation');
            const passwordMatchText = document.getElementById('passwordMatchText');

            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                let text = '';
                let color = '';

                // Check password strength
                if (password.length >= 8) strength++;
                if (password.match(/[a-z]+/)) strength++;
                if (password.match(/[A-Z]+/)) strength++;
                if (password.match(/[0-9]+/)) strength++;
                if (password.match(/[!@#$%^&*(),.?":{}|<>]+/)) strength++;

                switch(strength) {
                    case 0:
                    case 1:
                        text = 'Sangat Lemah';
                        color = '#dc3545';
                        break;
                    case 2:
                        text = 'Lemah';
                        color = '#fd7e14';
                        break;
                    case 3:
                        text = 'Cukup';
                        color = '#ffc107';
                        break;
                    case 4:
                        text = 'Kuat';
                        color = '#20c997';
                        break;
                    case 5:
                        text = 'Sangat Kuat';
                        color = '#198754';
                        break;
                }

                const width = (strength / 5) * 100;
                passwordStrengthFill.style.width = width + '%';
                passwordStrengthFill.style.backgroundColor = color;
                passwordStrengthText.textContent = text;
                passwordStrengthText.style.color = color;
            });

            // Password confirmation check
            function checkPasswordMatch() {
                const password = passwordInput.value;
                const confirmPassword = passwordConfirmation.value;

                if (confirmPassword === '') {
                    passwordMatchText.textContent = '';
                    passwordMatchText.style.color = '';
                } else if (password === confirmPassword) {
                    passwordMatchText.textContent = 'Kata sandi cocok';
                    passwordMatchText.style.color = '#198754';
                } else {
                    passwordMatchText.textContent = 'Kata sandi tidak cocok';
                    passwordMatchText.style.color = '#dc3545';
                }
            }

            passwordInput.addEventListener('input', checkPasswordMatch);
            passwordConfirmation.addEventListener('input', checkPasswordMatch);

            // NIK validation (16 digits)
            const nikInput = document.getElementById('nik');
            nikInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 16);
            });

            // Telepon validation
            const teleponInput = document.getElementById('telepon');
            teleponInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 13);
            });
        });
    </script>
</body>
</html>
