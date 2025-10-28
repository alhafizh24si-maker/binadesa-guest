<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binadesa - Platform Desa Digital</title>

    <!-- ======= Google Font =======-->
    @include('layouts.guest.googlefont')
    <!-- End Google Font-->

    <!-- ======= Styles =======-->
    @include('layouts.guest.styles')
    <!-- End Styles-->

    <!-- ======= Theme Style =======-->
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">
    <!-- End Theme Style-->

    <style>
        :root {
            --primary: #2e7d32;
            --secondary: #4caf50;
            --success: #66bb6a;
            --info: #29b6f6;
            --warning: #ffa726;
            --danger: #ef5350;
            --light: #f8f9fa;
            --dark: #212529;
        }

        /* Navbar Custom Styles */
        .topbar {
            background-color: #f8f9fa !important;
            border-bottom: 1px solid #e9ecef;
        }

        .topbar a {
            color: #6c757d !important;
        }

        .navbar-brand h1 {
            color: #2e7d32 !important;
        }

        .navbar-nav .nav-link {
            color: #495057 !important;
            font-weight: 500;
        }

        .navbar-nav .nav-link.active {
            color: #2e7d32 !important;
            font-weight: 600;
        }

        .navbar-nav .nav-link:hover {
            color: #2e7d32 !important;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #2e7d32;
        }

        .hero-section {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            color: #333;
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('assets-guest/images/pattern.png');
            opacity: 0.05;
        }

        .feature-card {
            border-radius: 12px;
            padding: 2rem;
            height: 100%;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .stats-card {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            color: #495057;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            border: 1px solid #e9ecef;
        }

        .btn-custom {
            background: linear-gradient(135deg, #2e7d32, #4caf50);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46, 125, 50, 0.4);
            color: white;
        }

        .section-title {
            position: relative;
            margin-bottom: 3rem;
        }

        .section-title:after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, #2e7d32, #4caf50);
        }

        .section-title.text-center:after {
            left: 50%;
            transform: translateX(-50%);
        }

        .news-card {
            border: 1px solid #e9ecef;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .program-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }

        .program-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .floating-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid #e9ecef;
        }

        .bg-primary {
            background-color: #2e7d32 !important;
        }

        .bg-secondary {
            background-color: #4caf50 !important;
        }

        .text-primary {
            color: #2e7d32 !important;
        }

        .text-secondary {
            color: #4caf50 !important;
        }

        .btn-primary {
            background-color: #2e7d32 !important;
            border-color: #2e7d32 !important;
        }

        .btn-secondary {
            background-color: #4caf50 !important;
            border-color: #4caf50 !important;
        }

        .border-primary {
            border-color: #2e7d32 !important;
        }

        .border-secondary {
            border-color: #4caf50 !important;
        }

        /* Custom Navbar Styles */
        .navbar-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1030;
            background: #fff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        }

        .topbar {
            background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
            color: white;
            padding: 8px 0;
            font-size: 0.85rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .topbar a {
            color: rgba(255, 255, 255, 0.9) !important;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .topbar a:hover {
            color: white !important;
        }

        .navbar-main {
            background: white;
            padding: 0.8rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand h1 {
            font-weight: 700;
            font-size: 1.8rem;
            background: linear-gradient(135deg, #2e7d32, #4caf50);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0;
        }

        .nav-item .nav-link {
            font-weight: 500;
            color: #495057;
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
            border-radius: 6px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-item .nav-link:hover {
            color: #2e7d32;
            background: rgba(46, 125, 50, 0.05);
        }

        .nav-item .nav-link.active {
            color: #2e7d32;
            font-weight: 600;
        }

        .nav-item .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 1rem;
            right: 1rem;
            height: 2px;
            background: linear-gradient(135deg, #2e7d32, #4caf50);
            border-radius: 2px;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 0.5rem 0;
            margin-top: 0.5rem;
        }

        .dropdown-item {
            padding: 0.6rem 1.2rem;
            color: #495057;
            transition: all 0.2s ease;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background: rgba(46, 125, 50, 0.08);
            color: #2e7d32;
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .action-btn {
            background: none;
            border: none;
            color: #6c757d;
            font-size: 1.2rem;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            position: relative;
        }

        .action-btn:hover {
            background: rgba(46, 125, 50, 0.1);
            color: #2e7d32;
        }

        .notification-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            background: #ff6b6b;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2e7d32, #4caf50);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .user-avatar:hover {
            transform: scale(1.05);
            border-color: rgba(46, 125, 50, 0.2);
        }

        .user-dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 0.5rem 0;
            min-width: 200px;
        }

        .user-dropdown-item {
            padding: 0.7rem 1.2rem;
            color: #495057;
            transition: all 0.2s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .user-dropdown-item:hover {
            background: rgba(46, 125, 50, 0.08);
            color: #2e7d32;
        }

        .user-dropdown-divider {
            margin: 0.3rem 0;
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
            font-size: 1.2rem;
            color: #2e7d32;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        /* Responsive adjustments */
        @media (max-width: 1199.98px) {
            .nav-item .nav-link {
                padding: 0.5rem 0.8rem;
                margin: 0 0.1rem;
            }
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: white;
                padding: 1rem;
                border-radius: 0 0 10px 10px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                margin-top: 0.5rem;
            }

            .nav-item .nav-link {
                margin: 0.2rem 0;
            }

            .navbar-actions {
                justify-content: center;
                margin-top: 1rem;
                padding-top: 1rem;
                border-top: 1px solid #e9ecef;
            }
        }

        /* Adjust main content for fixed navbar */
        main {
            margin-top: 120px;
        }

        @media (max-width: 991.98px) {
            main {
                margin-top: 80px;
            }
        }
    </style>
    <style>

    </style>
</head>

<body>


    <!-- ======= Apply theme =======-->
    @include('layouts.guest.apllytheme')
    <!-- ======= End Apply theme =======-->

    <!-- Navbar Start -->
    @include('layouts.guest.navbar')
    <!-- Navbar End -->

    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cari informasi...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="Ketik kata kunci..."
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    <!-- ======= Site Wrap =======-->
    <div class="site-wrap" style="margin-top: 100px;">
        <!-- ======= Main =======-->
        <main>
            <!-- ======= Hero Section =======-->
            <section class="hero-section" id="home">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <div class="row">
                                <div class="col-lg-11">
                                    <span class="hero-subtitle text-uppercase d-block mb-2" data-aos="fade-up"
                                        data-aos-delay="0">Platform Desa Digital</span>
                                    <h1 class="hero-title mb-3 display-4 fw-bold" data-aos="fade-up"
                                        data-aos-delay="100">Selamat Datang di Binadesa!</h1>
                                    <p class="hero-description mb-4 mb-lg-5 fs-5" data-aos="fade-up"
                                        data-aos-delay="200">Platform digital terdepan yang menghubungkan warga dengan
                                        informasi dan layanan desa secara modern dan efisien.</p>
                                    <div class="cta d-flex gap-2 mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="300">
                                        <a class="btn btn-custom" href="{{ url('/login') }}">Mulai Jelajahi</a>
                                        <a class="btn btn-outline-dark" href="#about">
                                            Pelajari Lebih Lanjut
                                            <svg class="lucide lucide-arrow-up-right" xmlns="http://www.w3.org/2000/svg"
                                                width="18" height="18" viewbox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M7 7h10v10"></path>
                                                <path d="M7 17 17 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="logos mb-4" data-aos="fade-up" data-aos-delay="400">
                                        <span class="logos-title text-uppercase mb-4 d-block">Dipercaya oleh
                                            desa-desa</span>
                                        <div class="logos-images d-flex gap-4 align-items-center flex-wrap">
                                            <div class="bg-light p-3 rounded-3 text-center">
                                                <small class="fw-bold">Desa Makmur</small>
                                            </div>
                                            <div class="bg-light p-3 rounded-3 text-center">
                                                <small class="fw-bold">Desa Sejahtera</small>
                                            </div>
                                            <div class="bg-light p-3 rounded-3 text-center">
                                                <small class="fw-bold">Desa Mandiri</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-img position-relative">
                                <img class="img-main img-fluid rounded-4 shadow-lg"
                                    src="{{ asset('assets-guest/images/hero-img-desa.jpg') }}" alt="Hero Image"
                                    data-aos="fade-in" data-aos-delay="500">
                                <div class="position-absolute top-0 start-0 w-100 h-100" data-aos="fade-down"
                                    data-aos-delay="600">
                                    <div class="floating-card position-absolute top-0 end-0">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary rounded-circle p-2 me-2">
                                                <i class="bi bi-people text-white"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-bold">1,250+ Warga</p>
                                                <small class="text-muted">Terkoneksi</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="floating-card position-absolute bottom-0 start-0">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-success rounded-circle p-2 me-2">
                                                <i class="bi bi-shield-check text-white"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-bold">Informasi Terpercaya</p>
                                                <small class="text-muted">Update real-time</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Hero-->

            <!-- ======= Stats Section =======-->
            <section class="stats__v3 section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                                    <div class="stats-card">
                                        <div class="stat-icon mb-3">
                                            <i class="bi bi-people fs-1 text-primary"></i>
                                        </div>
                                        <h3 class="fs-1 fw-bold">
                                            <span class="purecounter" data-purecounter-start="0"
                                                data-purecounter-end="1250" data-purecounter-duration="2">0</span>
                                            <span>+</span>
                                        </h3>
                                        <p class="mb-0">Warga Terdaftar</p>
                                    </div>
                                </div>
                                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                                    <div class="stats-card">
                                        <div class="stat-icon mb-3">
                                            <i class="bi bi-newspaper fs-1 text-primary"></i>
                                        </div>
                                        <h3 class="fs-1 fw-bold">
                                            <span class="purecounter" data-purecounter-start="0"
                                                data-purecounter-end="156" data-purecounter-duration="2">0</span>
                                            <span>+</span>
                                        </h3>
                                        <p class="mb-0">Berita Terbit</p>
                                    </div>
                                </div>
                                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                                    <div class="stats-card">
                                        <div class="stat-icon mb-3">
                                            <i class="bi bi-calendar-check fs-1 text-primary"></i>
                                        </div>
                                        <h3 class="fs-1 fw-bold">
                                            <span class="purecounter" data-purecounter-start="0"
                                                data-purecounter-end="24" data-purecounter-duration="2">0</span>
                                            <span>+</span>
                                        </h3>
                                        <p class="mb-0">Program Aktif</p>
                                    </div>
                                </div>
                                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                                    <div class="stats-card">
                                        <div class="stat-icon mb-3">
                                            <i class="bi bi-building fs-1 text-primary"></i>
                                        </div>
                                        <h3 class="fs-1 fw-bold">
                                            <span class="purecounter" data-purecounter-start="0"
                                                data-purecounter-end="15" data-purecounter-duration="2">0</span>
                                            <span>+</span>
                                        </h3>
                                        <p class="mb-0">Desa Bergabung</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Stats-->

            <!-- ======= About Section =======-->
            <section class="section bg-light" id="about">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Tentang
                                Kami</span>
                            <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="100">
                                Mengenal Binadesa Lebih Dekat</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Platform digital inovatif yang didedikasikan
                                untuk memajukan desa melalui teknologi.</p>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="0">
                            <div class="feature-card">
                                <div class="icon text-center mb-4 bg-primary rounded-circle d-inline-flex align-items-center justify-content-center text-white"
                                    style="width: 70px; height: 70px;">
                                    <i class="bi bi-eye fs-4"></i>
                                </div>
                                <h3 class="fs-5 fw-bold mb-3">Visi Kami</h3>
                                <p class="mb-0">Menjadi platform digital terdepan dalam menghubungkan warga dengan
                                    informasi dan layanan desa, menciptakan masyarakat desa yang modern, transparan, dan
                                    sejahtera.</p>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="feature-card">
                                <div class="icon text-center mb-4 bg-success rounded-circle d-inline-flex align-items-center justify-content-center text-white"
                                    style="width: 70px; height: 70px;">
                                    <i class="bi bi-bullseye fs-4"></i>
                                </div>
                                <h3 class="fs-5 fw-bold mb-3">Misi Kami</h3>
                                <p class="mb-0">Menyediakan platform yang mudah digunakan, aman, dan efisien untuk
                                    mengelola informasi desa, meningkatkan partisipasi warga, dan mendukung pembangunan
                                    desa yang berkelanjutan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End About-->

            <!-- ======= Features Section =======-->
            <section class="section features__v2" id="features">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Fitur
                                Unggulan</span>
                            <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="100">Apa
                                yang Bisa Anda Temukan di Binadesa</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Berbagai fitur menarik yang membuat pengelolaan
                                desa menjadi lebih mudah dan modern.</p>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                            <div class="feature-card">
                                <div class="icon text-center mb-4 bg-primary rounded-circle d-inline-flex align-items-center justify-content-center text-white"
                                    style="width: 70px; height: 70px;">
                                    <i class="bi bi-newspaper fs-4"></i>
                                </div>
                                <h3 class="fs-5 fw-bold mb-3">Berita & Informasi</h3>
                                <p class="mb-0">Akses informasi terbaru seputar kegiatan, pengumuman, dan
                                    perkembangan desa secara real-time.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="feature-card">
                                <div class="icon text-center mb-4 bg-success rounded-circle d-inline-flex align-items-center justify-content-center text-white"
                                    style="width: 70px; height: 70px;">
                                    <i class="bi bi-calendar-event fs-4"></i>
                                </div>
                                <h3 class="fs-5 fw-bold mb-3">Kalender Kegiatan</h3>
                                <p class="mb-0">Pantau jadwal kegiatan desa, acara masyarakat, dan agenda penting
                                    lainnya dengan mudah.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-card">
                                <div class="icon text-center mb-4 bg-info rounded-circle d-inline-flex align-items-center justify-content-center text-white"
                                    style="width: 70px; height: 70px;">
                                    <i class="bi bi-file-text fs-4"></i>
                                </div>
                                <h3 class="fs-5 fw-bold mb-3">Layanan Administrasi</h3>
                                <p class="mb-0">Permohonan surat dan layanan administrasi desa dapat dilakukan secara
                                    online.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="feature-card">
                                <div class="icon text-center mb-4 bg-warning rounded-circle d-inline-flex align-items-center justify-content-center text-white"
                                    style="width: 70px; height: 70px;">
                                    <i class="bi bi-graph-up fs-4"></i>
                                </div>
                                <h3 class="fs-5 fw-bold mb-3">Program Pembangunan</h3>
                                <p class="mb-0">Pantau perkembangan program pembangunan desa dan kontribusi Anda
                                    dalam memajukan desa.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                            <div class="feature-card">
                                <div class="icon text-center mb-4 bg-danger rounded-circle d-inline-flex align-items-center justify-content-center text-white"
                                    style="width: 70px; height: 70px;">
                                    <i class="bi bi-chat-dots fs-4"></i>
                                </div>
                                <h3 class="fs-5 fw-bold mb-3">Forum Komunitas</h3>
                                <p class="mb-0">Berdiskusi dan berbagi informasi dengan sesama warga dalam forum
                                    komunitas yang aman.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                            <div class="feature-card">
                                <div class="icon text-center mb-4 bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center text-white"
                                    style="width: 70px; height: 70px;">
                                    <i class="bi bi-phone fs-4"></i>
                                </div>
                                <h3 class="fs-5 fw-bold mb-3">Akses Mobile</h3>
                                <p class="mb-0">Akses semua fitur melalui perangkat mobile kapan saja dan di mana
                                    saja.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Features-->

            <!-- ======= News Section =======-->
            <section class="section bg-light" id="news">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Berita
                                Terkini</span>
                            <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="100">
                                Informasi Terbaru dari Desa</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Update terbaru seputar kegiatan dan
                                perkembangan desa.</p>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                            <div class="news-card">
                                <img src="{{ asset('assets-guest/images/bansos.jpg') }}" class="card-img-top"
                                    alt="Berita 1" style="height: 200px; object-fit: cover;">
                                <div class="card-body p-4">
                                    <span class="badge bg-primary mb-2">Pengumuman</span>
                                    <h5 class="card-title">Program Bantuan Sosial Tahap II</h5>
                                    <p class="card-text text-muted">Pendaftaran program bantuan sosial tahap II akan
                                        dibuka mulai tanggal 15 Desember 2024.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">2 hari yang lalu</small>
                                        <a href="#" class="btn btn-sm btn-custom">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="news-card">
                                <img src="{{ asset('assets-guest/images/goro.jpg') }}" class="card-img-top"
                                    alt="Berita 2" style="height: 200px; object-fit: cover;">
                                <div class="card-body p-4">
                                    <span class="badge bg-success mb-2">Kegiatan</span>
                                    <h5 class="card-title">Gotong Royong Bersih Desa</h5>
                                    <p class="card-text text-muted">Ayo ramaikan kegiatan gotong royong bersih desa
                                        pada hari Minggu depan.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">5 hari yang lalu</small>
                                        <a href="#" class="btn btn-sm btn-custom">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="news-card">
                                <img src="{{ asset('assets-guest/images/portal.jpg') }}" class="card-img-top"
                                    alt="Berita 3" style="height: 200px; object-fit: cover;">
                                <div class="card-body p-4">
                                    <span class="badge bg-warning mb-2">Pembangunan</span>
                                    <h5 class="card-title">Progress Pembangunan Jalan Desa</h5>
                                    <p class="card-text text-muted">Pembangunan jalan desa sektor timur telah mencapai
                                        75% dan diperkirakan selesai bulan depan.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">1 minggu yang lalu</small>
                                        <a href="#" class="btn btn-sm btn-custom">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="300">
                        <a href="#" class="btn btn-custom">Lihat Semua Berita</a>
                    </div>
                </div>
            </section>
            <!-- End News-->

            <!-- ======= Programs Section =======-->
            <section class="section" id="programs">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Program
                                Desa</span>
                            <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="100">
                                Program Unggulan untuk Kemajuan Desa</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Berbagai program yang sedang berjalan untuk
                                memajukan desa kita.</p>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="0">
                            <div class="program-card">
                                <div class="d-flex align-items-start mb-4">
                                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                        <i class="bi bi-tree text-primary fs-4"></i>
                                    </div>
                                    <div>
                                        <h4 class="fw-bold mb-2">Desa Hijau</h4>
                                        <p class="text-muted mb-0">Program penghijauan dan pelestarian lingkungan desa.
                                        </p>
                                    </div>
                                </div>
                                <div class="progress mb-3" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between text-muted">
                                    <small>Progress: 75%</small>
                                    <small>Target: 1000 pohon</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="program-card">
                                <div class="d-flex align-items-start mb-4">
                                    <div class="bg-warning bg-opacity-10 p-3 rounded-circle me-3">
                                        <i class="bi bi-lightbulb text-warning fs-4"></i>
                                    </div>
                                    <div>
                                        <h4 class="fw-bold mb-2">Desa Digital</h4>
                                        <p class="text-muted mb-0">Program peningkatan literasi digital bagi warga
                                            desa.</p>
                                    </div>
                                </div>
                                <div class="progress mb-3" style="height: 8px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%"
                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex justify-content-between text-muted">
                                    <small>Progress: 60%</small>
                                    <small>Target: 500 warga</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Programs-->

            <!-- ======= Contact Section =======-->
            <section class="section contact__v2 bg-light" id="contact">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-7 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up"
                                data-aos-delay="0">Kontak</span>
                            <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="0">Hubungi
                                Kami</h2>
                            <p data-aos="fade-up" data-aos-delay="100">Butuh bantuan atau memiliki pertanyaan? Tim
                                kami siap membantu Anda.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex gap-5 flex-column">
                                <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="0">
                                    <div class="icon d-block bg-primary rounded-circle p-3 text-white">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <span>
                                        <span class="d-block">Telepon</span>
                                        <strong>+(021) 1234 5678</strong>
                                    </span>
                                </div>
                                <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="100">
                                    <div class="icon d-block bg-primary rounded-circle p-3 text-white">
                                        <i class="bi bi-send"></i>
                                    </div>
                                    <span>
                                        <span class="d-block">Email</span>
                                        <strong>info@binadesa.com</strong>
                                    </span>
                                </div>
                                <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon d-block bg-primary rounded-circle p-3 text-white">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <span>
                                        <span class="d-block">Alamat</span>
                                        <address class="fw-bold">
                                            Jl. Desa Maju No. 123 <br>
                                            Kecamatan Cerdas, Kota Modern
                                        </address>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrapper bg-white p-4 rounded-4 shadow-sm" data-aos="fade-up"
                                data-aos-delay="300">
                                <form id="contactForm">
                                    <div class="row gap-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="mb-2" for="name">Nama</label>
                                            <input class="form-control" id="name" type="text" name="name"
                                                required="">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-2" for="email">Email</label>
                                            <input class="form-control" id="email" type="email" name="email"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="row gap-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="mb-2" for="subject">Subjek</label>
                                            <input class="form-control" id="subject" type="text"
                                                name="subject">
                                        </div>
                                    </div>
                                    <div class="row gap-3 gap-md-0 mb-3">
                                        <div class="col-md-12">
                                            <label class="mb-2" for="message">Pesan</label>
                                            <textarea class="form-control" id="message" name="message" rows="5" required=""></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-custom fw-semibold w-100" type="submit">Kirim
                                        Pesan</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contact-->
        </main>
    </div>

    
    <div class="social-login">
        <a href="https://accounts.google.com/v3/signin/identifier?hl=id&ifkv=ATuJsjxtOBeZDuRmB7aXp-t7SKJXmJLQ0gwLtISqhsxIyjcD8f26SWZ9gxRQXTnexAOh2jbXHugR&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S1628295783%3A1709606966038322&theme=mn"
            class="social-btn">
            <i class="bi bi-google"></i>
            <span>Google</span>
        </a>
        <a href="https://www.facebook.com/?locale=id_ID" class="social-btn">
            <i class="bi bi-facebook"></i>
            <span>Facebook</span>
            <div class="social-login">
                <a href="https://www.whatsapp.com/?lang=id"
                    class="social-btn">
                    <i class="bi bi-whatsapp"></i>
                    <span>Whatsapp</span>

                    <!-- ======= Back to Top =======-->
                    <button id="back-to-top" class="btn btn-custom rounded-circle">
                        <i class="bi bi-arrow-up-short"></i>
                    </button>
                    <!-- End Back to top-->

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
