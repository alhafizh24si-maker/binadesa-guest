<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Binadesa</title>

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

    <!-- ======= Login CSS =======-->
    @include('layouts.guest.logincss')
    <!-- End Login CSS-->

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="login-container">
                    <div class="row g-0">
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="login-left">
                                <h2 class="mb-4">Selamat Datang Kembali!</h2>
                                <p class="mb-4">Masuk ke akun Anda untuk mengakses semua fitur Binadesa.</p>

                                <div class="login-feature">
                                    <div class="login-feature-icon">
                                        <i class="bi bi-shield-check"></i>
                                    </div>
                                    <div class="login-feature-text">
                                        <h5>Aman & Terpercaya</h5>
                                        <p>Data Anda terlindungi dengan sistem keamanan terbaik</p>
                                    </div>
                                </div>

                                <div class="login-feature">
                                    <div class="login-feature-icon">
                                        <i class="bi bi-speedometer2"></i>
                                    </div>
                                    <div class="login-feature-text">
                                        <h5>Akses Cepat</h5>
                                        <p>Kelola data desa dengan antarmuka yang responsif</p>
                                    </div>
                                </div>

                                <div class="login-feature">
                                    <div class="login-feature-icon">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="login-feature-text">
                                        <h5>Kolaborasi Mudah</h5>
                                        <p>Bekerja sama dengan perangkat desa secara efisien</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="login-right">
                                <div class="text-center mb-4">
                                    <h1 class="text-primary">Binadesa</h1>
                                    <p class="text-muted">Platform Desa Digital</p>
                                </div>

                                <h2 class="login-title">Masuk ke Akun</h2>
                                <p class="login-subtitle">Silakan masuk dengan akun Anda</p>

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

                                <form method="POST" action="{{ route('login.submit') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Alamat Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}" required
                                            autocomplete="email" autofocus placeholder="Masukkan email Anda">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Kata Sandi</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            name="password" required autocomplete="current-password"
                                            placeholder="Masukkan kata sandi">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Ingat Saya</label>
                                    </div>

                                    <button type="submit" class="btn btn-custom mb-3">Masuk</button>
                                </form>

                               <div class="login-divider">
                                    <span>Atau masuk dengan</span>
                                </div>

                                <div class="social-register">
                                    <a href="https://accounts.google.com/v3/signin/identifier?hl=id&ifkv=ATuJsjxtOBeZDuRmB7aXp-t7SKJXmJLQ0gwLtISqhsxIyjcD8f26SWZ9gxRQXTnexAOh2jbXHugR&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S1628295783%3A1709606966038322&theme=mn" class="social-btn">
                                        <i class="bi bi-google"></i>
                                        <span>Google</span>
                                    </a>
                                    <a href="https://www.facebook.com/r.php?entry_point=login" class="social-btn">
                                        <i class="bi bi-facebook"></i>
                                        <span>Facebook</span>
                                    </a>
                                </div>

                                <div class="login-link">
                                    <p>belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                                </div>
                                    </a>
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

    <!-- ======= login scripts =======-->
    @include('layouts.guest.loginscripts')

