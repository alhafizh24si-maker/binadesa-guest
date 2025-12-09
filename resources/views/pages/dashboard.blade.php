<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binadesa - Platform Desa Digital</title>

 @extends('layouts.guest.app')
    @section('content')

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
               <section class="hero-section" id="home" style="padding-top: 40px;">
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
                    <!-- Carousel/Slideshow -->
                    <div id="heroCarousel" class="carousel slide rounded-4 shadow-lg" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
                        </div>

                        <div class="carousel-inner rounded-4">
                            <!-- Slide 1 -->
                            <div class="carousel-item active">
                                <img src="{{ asset('assets-guest/images/teknologi desa.png') }}"
                                     class="d-block w-100 img-fluid"
                                     alt="Platform Desa Digital"
                                     style="height: 400px; object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>

                            <!-- Slide 2 -->
                            <div class="carousel-item">
                                <img src="{{ asset('assets-guest/images/komunitas.jpg') }}"
                                     class="d-block w-100 img-fluid"
                                     alt="Komunitas Desa"
                                     style="height: 400px; object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>

                            <!-- Slide 3 -->
                            <div class="carousel-item">
                                <img src="{{ asset('assets-guest/images/administrasi.png') }}"
                                     class="d-block w-100 img-fluid"
                                     alt="Teknologi Desa"
                                     style="height: 400px; object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>
                        </div>

                        <!-- Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <!-- Floating cards tetap di atas carousel -->
                    <div class="position-absolute top-0 start-0 w-100 h-100" data-aos="fade-down" data-aos-delay="600">
                        <!-- Kartu floating "Informasi Terpercaya" -->
                        <div class="floating-card position-absolute bottom-0 start-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-success rounded-circle p-2 me-2 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assets-guest/images/shield.png') }}"
                                         alt="Verified"
                                         style="width: 24px; height: 24px; filter: brightness(0) invert(1);">
                                </div>
                                <div>
                                    <p class="mb-0 fw-bold">Informasi Terpercaya</p>
                                    <small class="text-muted">Update real-time</small>
                                </div>
                            </div>
                        </div>

                        <!-- Kartu floating "Warga Terkoneksi" -->
                        <div class="floating-card position-absolute top-0 end-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary rounded-circle p-2 me-2 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assets-guest/images/warga (2).png') }}"
                                         alt="People"
                                         style="width: 24px; height: 24px; filter: brightness(0) invert(1);">
                                </div>
                                <div>
                                    <p class="mb-0 fw-bold">1,250+ Warga</p>
                                    <small class="text-muted">Terkoneksi</small>
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
                                                data-purecounter-end="1250" data-purecounter-duration="2">100</span>
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
                                                data-purecounter-end="156" data-purecounter-duration="2">45</span>
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
                                                data-purecounter-end="24" data-purecounter-duration="2">43</span>
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
                                                data-purecounter-end="15" data-purecounter-duration="2">15</span>
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
                            <p data-aos="fade-up" data-aos-delay="200" class="lead">Platform digital inovatif yang didedikasikan untuk memajukan desa melalui teknologi dan kolaborasi.</p>
                        </div>
                    </div>

                    <div class="row g-5 align-items-center">
                        <!-- Gambar di sebelah kiri -->
                        <div class="col-md-6" data-aos="fade-right" data-aos-delay="300">
                            <div class="about-image position-relative">
                                <img src="{{ asset('assets-guest/images/desa(1).jpg') }}"
                                     class="img-fluid rounded-4 shadow-lg"
                                     alt="Binadesa Platform Desa Digital"
                                     style="width: 100%; height: 400px; object-fit: cover;">
                                <div class="overlay-text position-absolute bottom-0 start-0 p-4 text-white">
                                    <h4 class="mb-2">Transformasi Digital Desa</h4>
                                    <p class="mb-0">Membawa desa ke era digital</p>
                                </div>
                            </div>
                        </div>

                        <!-- Konten di sebelah kanan -->
                        <div class="col-md-6" data-aos="fade-left" data-aos-delay="400">
                            <div class="about-content">
                                <h3 class="mb-4 fw-bold">Apa Itu Binadesa?</h3>
                                <p class="mb-4">
                                    <strong>Binadesa</strong> adalah Platform Desa Digital yang bertujuan untuk mengubah cara pengelolaan
                                    dan komunikasi di tingkat desa melalui teknologi informasi. Kami hadir sebagai solusi
                                    untuk mengintegrasikan berbagai aspek kehidupan desa dalam satu platform yang mudah
                                    diakses dan digunakan.
                                </p>

                                <div class="about-features mb-4">
                                    <div class="d-flex align-items-start mb-3">
                                        <div class="me-3">
                                            <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                        </div>
                                        <div>
                                            <p class="mb-1 fw-semibold">Terintegrasi</p>
                                            <p class="mb-0 text-muted">Semua layanan desa dalam satu platform</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start mb-3">
                                        <div class="me-3">
                                            <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                        </div>
                                        <div>
                                            <p class="mb-1 fw-semibold">Mudah Diakses</p>
                                            <p class="mb-0 text-muted">Dapat diakses melalui berbagai perangkat</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start mb-3">
                                        <div class="me-3">
                                            <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                        </div>
                                        <div>
                                            <p class="mb-1 fw-semibold">Real-time</p>
                                            <p class="mb-0 text-muted">Informasi terupdate secara langsung</p>
                                        </div>
                                    </div>
                                </div>

                                <p class="mb-0">
                                    Dengan Binadesa, kami berkomitmen untuk menciptakan desa yang lebih transparan,
                                    efisien, dan terkoneksi dengan baik antara pemerintah desa dan masyarakat.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Visi dan Misi -->
                    <div class="row g-4 mt-5">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="vision-mission-card p-4 rounded-4 h-100">
                                <div class="d-flex align-items-start mb-4">
                                    <div class="icon-wrapper me-3">
                                        <div class="icon bg-primary bg-opacity-10 p-3 rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-eye fs-3 text-primary"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="fw-bold mb-3">Visi Kami</h3>
                                        <p class="mb-0">
                                            Menjadi platform digital terdepan dalam menghubungkan warga dengan
                                            informasi dan layanan desa, menciptakan masyarakat desa yang modern, transparan, dan
                                            sejahtera melalui teknologi inovatif.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
                            <div class="vision-mission-card p-4 rounded-4 h-100">
                                <div class="d-flex align-items-start mb-4">
                                    <div class="icon-wrapper me-3">
                                        <div class="icon bg-success bg-opacity-10 p-3 rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-bullseye fs-3 text-success"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="fw-bold mb-3">Misi Kami</h3>
                                        <ul class="mb-0 ps-3">
                                            <li class="mb-2">Menyediakan platform yang mudah digunakan, aman, dan efisien</li>
                                            <li class="mb-2">Meningkatkan partisipasi warga dalam pembangunan desa</li>
                                            <li class="mb-2">Mendukung transparansi pengelolaan desa</li>
                                            <li class="mb-0">Mendorong pembangunan desa yang berkelanjutan</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Nilai-nilai -->
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="text-center" data-aos="fade-up" data-aos-delay="700">
                                <h3 class="mb-4 fw-bold">Nilai-Nilai Kami</h3>
                                <div class="row g-4">
                                    <div class="col-md-3">
                                        <div class="value-card p-4 rounded-4 text-center h-100">
                                            <div class="value-icon mb-3">
                                                <i class="bi bi-shield-check fs-1 text-primary"></i>
                                            </div>
                                            <h5 class="fw-bold mb-2">Transparansi</h5>
                                            <p class="mb-0 text-muted">Informasi terbuka dan dapat dipertanggungjawabkan</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="value-card p-4 rounded-4 text-center h-100">
                                            <div class="value-icon mb-3">
                                                <i class="bi bi-people fs-1 text-success"></i>
                                            </div>
                                            <h5 class="fw-bold mb-2">Kolaborasi</h5>
                                            <p class="mb-0 text-muted">Kerjasama antara pemerintah dan masyarakat</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="value-card p-4 rounded-4 text-center h-100">
                                            <div class="value-icon mb-3">
                                                <i class="bi bi-lightning fs-1 text-warning"></i>
                                            </div>
                                            <h5 class="fw-bold mb-2">Inovasi</h5>
                                            <p class="mb-0 text-muted">Terus berkembang dengan teknologi terbaru</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="value-card p-4 rounded-4 text-center h-100">
                                            <div class="value-icon mb-3">
                                                <i class="bi bi-heart fs-1 text-danger"></i>
                                            </div>
                                            <h5 class="fw-bold mb-2">Peduli</h5>
                                            <p class="mb-0 text-muted">Prioritaskan kebutuhan masyarakat desa</p>
                                        </div>
                                    </div>
                                </div>
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

            <!-- ======= Developers Section =======-->
            <section class="section developers-section" id="developers" style="background-color: #f8f9fa;">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="100">
                                Identitas Pengembang Platform portal desa</h2>
                            <p class="mb-0" data-aos="fade-up" data-aos-delay="200">
                                Platform ini dikembangkan oleh mahasiswa yang berdedikasi untuk memajukan desa melalui teknologi.
                            </p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-7">
                            <div class="developer-card" data-aos="fade-up" data-aos-delay="300">
                                <div class="row align-items-center g-4">
                                    <div class="col-md-4 text-center">
                                        <!-- Ganti dengan foto asli Anda -->
                                        <div class="developer-photo mb-3">
                                            <img src="{{ asset('assets-guest/images/hafizh.jpeg') }}"
                                                 alt="Foto Pengembang"
                                                 class="img-fluid rounded-circle border border-4 border-white shadow"
                                                 style="width: 200px; height: 200px; object-fit: cover;">
                                        </div>
                                        <div class="developer-social mb-3">
                                            <a href="https://linkedin.com/in/alhafizh" target="_blank" class="social-icon linkedin"
                                               data-bs-toggle="tooltip" title="LinkedIn">
                                                <i class="bi bi-linkedin"></i>
                                            </a>
                                            <a href="https://github.com/alhafizh24si-maker" target="_blank" class="social-icon github"
                                               data-bs-toggle="tooltip" title="GitHub">
                                                <i class="bi bi-github"></i>
                                            </a>
                                            <a href="https://instagram.com/_anugrah.alhfzh" target="_blank" class="social-icon instagram"
                                               data-bs-toggle="tooltip" title="Instagram">
                                                <i class="bi bi-instagram"></i>
                                            </a>
                                            <a href="https://twitter.com/alhafizh" target="_blank" class="social-icon twitter"
                                               data-bs-toggle="tooltip" title="Twitter/X">
                                                <i class="bi bi-twitter-x"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="developer-info">
                                            <h3 class="developer-name mb-2">Muhammad Anugrah Alhafizh</h3>
                                            <p class="developer-nim text-muted mb-3">
                                                <i class="bi bi-person-badge me-2"></i>
                                                NIM: 2457301087
                                            </p>
                                            <p class="developer-program text-muted mb-4">
                                                <i class="bi bi-mortarboard me-2"></i>
                                                Program Studi: Sistem Informasi
                                            </p>

                                            <div class="developer-details">
                                                <div class="detail-item mb-3">
                                                    <h5 class="detail-title">
                                                        <i class="bi bi-building me-2"></i>
                                                        Institusi
                                                    </h5>
                                                    <p class="detail-content mb-0">POLITEKNIK CALTEX RIAU</p>
                                                </div>

                                                <div class="detail-item mb-3">
                                                    <h5 class="detail-title">
                                                        <i class="bi bi-envelope me-2"></i>
                                                        Email
                                                    </h5>
                                                    <p class="detail-content mb-0">anugrahalhafizh@gmail.com</p>
                                                </div>

                                                <div class="detail-item">
                                                    <h5 class="detail-title">
                                                        <i class="bi bi-info-circle me-2"></i>
                                                        Tentang Pengembang
                                                    </h5>
                                                    <p class="detail-content mb-0">
                                                        Mahasiswa yang passionate tentang teknologi dan pembangunan desa.
                                                        Mengembangkan Platform ini sebagai wujud kontribusi dalam memajukan
                                                        desa melalui digitalisasi.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Developers Section-->
        </main>
    </div>

    <!-- Custom CSS untuk About Section yang diperbarui -->
    <style>
        /* Styling untuk About Section */
        .about-image {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
        }

        .about-image img {
            transition: transform 0.5s ease;
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        .overlay-text {
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
            width: 100%;
        }

        .vision-mission-card {
            background: white;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .vision-mission-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-color: #007bff;
        }

        .vision-mission-card .icon-wrapper .icon {
            width: 60px;
            height: 60px;
        }

        .value-card {
            background: white;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .value-card .value-icon i {
            transition: transform 0.3s ease;
        }

        .value-card:hover .value-icon i {
            transform: scale(1.2);
        }

        .about-features .d-flex {
            padding: 10px;
            border-radius: 10px;
            background-color: #f8f9fa;
            transition: background-color 0.3s ease;
        }

        .about-features .d-flex:hover {
            background-color: #e9ecef;
        }

        /* Responsif untuk About Section */
        @media (max-width: 768px) {
            .about-content {
                text-align: center;
            }

            .vision-mission-card {
                margin-bottom: 20px;
            }

            .value-card {
                margin-bottom: 20px;
            }
        }
    </style>

    <!-- Custom CSS untuk Developers Section -->
    <style>
        .developers-section {
            padding: 80px 0;
        }

        .developer-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .developer-card:hover {
            transform: translateY(-5px);
        }

        .developer-photo img {
            transition: transform 0.3s ease;
        }

        .developer-photo img:hover {
            transform: scale(1.05);
        }

        .developer-social {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-icon:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .social-icon.linkedin {
            background-color: #0077b5;
        }

        .social-icon.github {
            background-color: #333;
        }

        .social-icon.instagram {
            background: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #E1306C, #FD1D1D);
        }

        .social-icon.twitter {
            background-color: #000000;
        }

        .developer-name {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
        }

        .developer-nim, .developer-program {
            font-size: 1.1rem;
        }

        .detail-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .detail-content {
            color: #666;
            line-height: 1.6;
        }

        .detail-item {
            padding-left: 10px;
            border-left: 3px solid #007bff;
        }
    </style>

    <!-- JavaScript untuk tooltips -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Animasi counter untuk developers section
            const developerSection = document.getElementById('developers');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Tambahkan animasi jika diperlukan
                        entry.target.classList.add('animated');
                    }
                });
            }, { threshold: 0.3 });

            if (developerSection) {
                observer.observe(developerSection);
            }
        });
    </script>
@endsection
