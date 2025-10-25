<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Binadesa - Platform Fintech Inovatif</title>

    <!-- ======= Google Font =======-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet">
    <!-- End Google Font-->

    <!-- ======= Styles =======-->
    <link href="assets-guest/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="assets-guest/vendors/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="assets-guest/vendors/glightbox/glightbox.min.css" rel="stylesheet">
    <link href="assets-guest/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets-guest/vendors/aos/aos.css" rel="stylesheet">
    <!-- End Styles-->

    <!-- ======= Theme Style =======-->
    <link href="assets-guest/css/style.css" rel="stylesheet">
    <!-- End Theme Style-->

    <style>
      /* Custom Styles untuk Binadesa */
      :root {
        --primary: #4361ee;
        --secondary: #3f37c9;
        --success: #4cc9f0;
        --info: #4895ef;
        --warning: #f72585;
        --danger: #e63946;
        --light: #f8f9fa;
        --dark: #212529;
      }

      .badge-category {
        font-size: 0.75rem;
        padding: 0.35em 0.65em;
        font-weight: 600;
      }

      .badge-payment {
        background-color: var(--primary);
        color: white;
      }

      .badge-investment {
        background-color: var(--success);
        color: white;
      }

      .badge-lending {
        background-color: var(--info);
        color: white;
      }

      .badge-crypto {
        background-color: var(--warning);
        color: white;
      }

      .badge-insurance {
        background-color: var(--danger);
        color: white;
      }

      .badge-management {
        background-color: #7209b7;
        color: white;
      }

      .service-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        overflow: hidden;
      }

      .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      }

      .service-icon {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin-bottom: 1.5rem;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        font-size: 1.75rem;
      }

      .feature-card {
        border-radius: 12px;
        padding: 2rem;
        height: 100%;
        background: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
      }

      .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      }

      .testimonial-card {
        border-radius: 12px;
        padding: 2rem;
        background: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        position: relative;
      }

      .testimonial-card:before {
        content: """;
        position: absolute;
        top: 10px;
        left: 20px;
        font-size: 4rem;
        color: rgba(67, 97, 238, 0.1);
        font-family: Georgia, serif;
      }

      .stats-card {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
      }

      .hero-section {
        background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
        color: white;
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
        opacity: 0.1;
      }

      .btn-custom {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border: none;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
      }

      .btn-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        color: white;
      }

      .nav-pills-custom .nav-link {
        border-radius: 8px;
        margin: 0.25rem;
        font-weight: 500;
        transition: all 0.3s ease;
      }

      .nav-pills-custom .nav-link.active {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
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
        background: linear-gradient(135deg, var(--primary), var(--secondary));
      }

      .section-title.text-center:after {
        left: 50%;
        transform: translateX(-50%);
      }
    </style>

    <!-- ======= Apply theme =======-->
    <script>
      // Apply the theme as early as possible to avoid flicker
      (function() {
      const storedTheme = localStorage.getItem('theme') || 'light';
      document.documentElement.setAttribute('data-bs-theme', storedTheme);
      })();
    </script>
  </head>
  <body>
    <!-- ======= Site Wrap =======-->
    <div class="site-wrap">
      <!-- ======= Header =======-->
      <header class="fbs__net-navbar navbar navbar-expand-lg dark" aria-label="freebootstrap.net navbar">
        <div class="container d-flex align-items-center justify-content-between">
          <!-- Start Logo-->
          <a class="navbar-brand w-auto" href="{{ url('/') }}">
            <img class="logo dark img-fluid" src="{{ asset('assets-guest/images/logo-dark.svg') }}" alt="Binadesa">
            <img class="logo light img-fluid" src="{{ asset('assets-guest/images/logo-light.svg') }}" alt="Binadesa">
          </a>
          <!-- End Logo-->

          <!-- Start offcanvas-->
          <div class="offcanvas offcanvas-start w-75" id="fbs__net-navbars" tabindex="-1" aria-labelledby="fbs__net-navbarsLabel">
            <div class="offcanvas-header">
              <div class="offcanvas-header-logo">
                <a class="logo-link" id="fbs__net-navbarsLabel" href="index.html">
                  <img class="logo dark img-fluid" src="assets-guest/images/logo-dark.svg" alt="Binadesa Logo">
                  <img class="logo light img-fluid" src="assets-guest/images/logo-light.svg" alt="Binadesa Logo">
                </a>
              </div>
              <button class="btn-close btn-close-black" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body align-items-lg-center">
              <ul class="navbar-nav nav me-auto ps-lg-5 mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link scroll-link active" aria-current="page" href="guest.login-form">Beranda</a></li>
                <li class="nav-item"><a class="nav-link scroll-link" href="#about">Tentang</a></li>
                <li class="nav-item"><a class="nav-link scroll-link" href="#services">Layanan</a></li>
                <li class="nav-item"><a class="nav-link scroll-link" href="#features">Fitur</a></li>
                <li class="nav-item"><a class="nav-link scroll-link" href="#pricing">Harga</a></li>
                <li class="nav-item"><a class="nav-link scroll-link" href="#testimonials">Testimoni</a></li>
                <li class="nav-item"><a class="nav-link scroll-link" href="#contact">Kontak</a></li>
              </ul>
            </div>
          </div>
          <!-- End offcanvas-->

          <div class="ms-auto w-auto">
            <div class="header-social d-flex align-items-center gap-1">
              <a class="btn btn-custom py-2" href="guest-form">Mulai Sekarang</a>
              <button class="fbs__net-navbar-toggler justify-content-center align-items-center ms-auto" data-bs-toggle="offcanvas" data-bs-target="#fbs__net-navbars" aria-controls="fbs__net-navbars" aria-label="Toggle navigation" aria-expanded="false">
                <svg class="fbs__net-icon-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="21" x2="3" y1="6" y2="6"></line>
                  <line x1="15" x2="3" y1="12" y2="12"></line>
                  <line x1="17" x2="3" y1="18" y2="18"></line>
                </svg>
                <svg class="fbs__net-icon-close" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M18 6 6 18"></path>
                  <path d="m6 6 12 12"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </header>
      <!-- End Header-->

      <!-- ======= Main =======-->
      <main>
        <!-- ======= Hero =======-->
        <section class="hero-section" id="home">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="row">
                  <div class="col-lg-11">
                    <span class="hero-subtitle text-uppercase d-block mb-2" data-aos="fade-up" data-aos-delay="0">Solusi Fintech Inovatif</span>
                    <h1 class="hero-title mb-3 display-4 fw-bold" data-aos="fade-up" data-aos-delay="100">Selamat Datang di Binadesa!</h1>
                    <p class="hero-description mb-4 mb-lg-5 fs-5" data-aos="fade-up" data-aos-delay="200">Platform keuangan terdepan yang aman, efisien, dan ramah pengguna untuk mengelola keuangan Anda dengan percaya diri.</p>
                    <div class="cta d-flex gap-2 mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="300">
                      <a class="btn btn-custom" href="guest.login-form">Mulai Sekarang</a>
                      <a class="btn btn-outline-light" href="#">
                        Pelajari Lebih Lanjut
                        <svg class="lucide lucide-arrow-up-right" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M7 7h10v10"></path>
                          <path d="M7 17 17 7"></path>
                        </svg>
                      </a>
                    </div>
                    <div class="logos mb-4" data-aos="fade-up" data-aos-delay="400">
                      <span class="logos-title text-uppercase mb-4 d-block">Dipercaya perusahaan ternama</span>
                      <div class="logos-images d-flex gap-4 align-items-center flex-wrap">
                        <img class="img-fluid js-img-to-inline-svg" src="assets-guest/images/logo/actual-size/logo-air-bnb__black.svg" alt="Company 1" style="width: 110px;">
                        <img class="img-fluid js-img-to-inline-svg" src="assets-guest/images/logo/actual-size/logo-ibm__black.svg" alt="Company 2" style="width: 80px;">
                        <img class="img-fluid js-img-to-inline-svg" src="assets-guest/images/logo/actual-size/logo-google__black.svg" alt="Company 3" style="width: 110px;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="hero-img position-relative">
                  <img class="img-main img-fluid rounded-4 shadow-lg" src="assets-guest/images/hero-img-1-min.jpg" alt="Hero Image" data-aos="fade-in" data-aos-delay="500">
                  <div class="position-absolute top-0 start-0 w-100 h-100" data-aos="fade-down" data-aos-delay="600">
                    <div class="floating-card position-absolute top-0 end-0 bg-white p-3 rounded-3 shadow">
                      <div class="d-flex align-items-center">
                        <div class="bg-primary rounded-circle p-2 me-2">
                          <i class="bi bi-graph-up text-white"></i>
                        </div>
                        <div>
                          <p class="mb-0 fw-bold">Pertumbuhan 200%</p>
                          <small class="text-muted">Dalam 6 bulan</small>
                        </div>
                      </div>
                    </div>
                    <div class="floating-card position-absolute bottom-0 start-0 bg-white p-3 rounded-3 shadow">
                      <div class="d-flex align-items-center">
                        <div class="bg-success rounded-circle p-2 me-2">
                          <i class="bi bi-shield-check text-white"></i>
                        </div>
                        <div>
                          <p class="mb-0 fw-bold">Keamanan Terjamin</p>
                          <small class="text-muted">Enkripsi tingkat tinggi</small>
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

        <!-- ======= About =======-->
        <section class="about__v4 section bg-light" id="about">
          <div class="container">
            <div class="row">
              <div class="col-md-6 order-md-2">
                <div class="row justify-content-end">
                  <div class="col-md-11 mb-4 mb-md-0">
                    <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Tentang Kami</span>
                    <h2 class="section-title mb-4" data-aos="fade-up" data-aos-delay="100">Mengalami Masa Depan Keuangan dengan Layanan Kami</h2>
                    <div data-aos="fade-up" data-aos-delay="200">
                      <p>Didirikan dengan visi merevolusi industri keuangan, kami adalah perusahaan fintech terkemuka yang berdedikasi untuk memberikan solusi keuangan yang inovatif dan aman.</p>
                      <p>Platform mutakhir kami memastikan transaksi Anda aman, terstruktur, dan mudah dikelola, memberdayakan Anda untuk mengendalikan perjalanan keuangan Anda dengan percaya diri dan kenyamanan.</p>
                    </div>
                    <h4 class="small fw-bold mt-4 mb-3" data-aos="fade-up" data-aos-delay="300">Nilai dan Visi Utama</h4>
                    <ul class="d-flex flex-row flex-wrap list-unstyled gap-3 features" data-aos="fade-up" data-aos-delay="400">
                      <li class="d-flex align-items-center gap-2"><span class="icon rounded-circle text-center bg-primary text-white"><i class="bi bi-lightning"></i></span><span class="text">Inovasi</span></li>
                      <li class="d-flex align-items-center gap-2"><span class="icon rounded-circle text-center bg-success text-white"><i class="bi bi-shield-check"></i></span><span class="text">Keamanan</span></li>
                      <li class="d-flex align-items-center gap-2"><span class="icon rounded-circle text-center bg-info text-white"><i class="bi bi-person-check"></i></span><span class="text">Desain Berpusat pada Pengguna</span></li>
                      <li class="d-flex align-items-center gap-2"><span class="icon rounded-circle text-center bg-warning text-white"><i class="bi bi-eye"></i></span><span class="text">Transparansi</span></li>
                      <li class="d-flex align-items-center gap-2"><span class="icon rounded-circle text-center bg-danger text-white"><i class="bi bi-rocket"></i></span><span class="text">Pemberdayaan</span></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="img-wrap position-relative">
                  <img class="img-fluid rounded-4 shadow" src="assets-guest/images/about_2-min.jpg" alt="Tentang Binadesa" data-aos="fade-up" data-aos-delay="0">
                  <div class="mission-statement p-4 rounded-4 d-flex gap-4 bg-white shadow position-absolute bottom-0 end-0 m-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="mission-icon text-center rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                      <i class="bi bi-lightbulb fs-4"></i>
                    </div>
                    <div>
                      <h3 class="text-uppercase fw-bold h5">Misi Kami</h3>
                      <p class="mb-0">Memberdayakan individu dan bisnis dengan menyediakan layanan keuangan yang aman, efisien, dan ramah pengguna.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End About-->

        <!-- ======= Features =======-->
        <section class="section features__v2" id="features">
          <div class="container">
            <div class="row mb-5">
              <div class="col-md-8 mx-auto text-center">
                <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Fitur Unggulan</span>
                <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="100">Mengapa Memilih Binadesa</h2>
                <p data-aos="fade-up" data-aos-delay="200">Platform kami dirancang untuk membuat pengelolaan keuangan Anda sederhana dan efisien.</p>
              </div>
            </div>
            <div class="row g-4">
              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-card">
                  <div class="icon text-center mb-4 bg-primary rounded-circle d-inline-flex align-items-center justify-content-center text-white" style="width: 70px; height: 70px;">
                    <i class="bi bi-person-check fs-4"></i>
                  </div>
                  <h3 class="fs-5 fw-bold mb-3">Antarmuka Ramah Pengguna</h3>
                  <p class="mb-0">Navigasi mudah dengan desain responsif untuk berbagai perangkat. Pengalaman pengguna yang intuitif dan menyenangkan.</p>
                </div>
              </div>
              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                  <div class="icon text-center mb-4 bg-success rounded-circle d-inline-flex align-items-center justify-content-center text-white" style="width: 70px; height: 70px;">
                    <i class="bi bi-graph-up fs-4"></i>
                  </div>
                  <h3 class="fs-5 fw-bold mb-3">Analisis Keuangan</h3>
                  <p class="mb-0">Pelacakan anggaran, kategorisasi pengeluaran, dan wawasan yang dipersonalisasi untuk pengambilan keputusan yang lebih baik.</p>
                </div>
              </div>
              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                  <div class="icon text-center mb-4 bg-info rounded-circle d-inline-flex align-items-center justify-content-center text-white" style="width: 70px; height: 70px;">
                    <i class="bi bi-headset fs-4"></i>
                  </div>
                  <h3 class="fs-5 fw-bold mb-3">Dukungan Pelanggan</h3>
                  <p class="mb-0">Layanan 24/7 melalui chat, email, telepon, dan pusat bantuan yang lengkap untuk menjawab semua pertanyaan Anda.</p>
                </div>
              </div>
              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card">
                  <div class="icon text-center mb-4 bg-warning rounded-circle d-inline-flex align-items-center justify-content-center text-white" style="width: 70px; height: 70px;">
                    <i class="bi bi-shield-lock fs-4"></i>
                  </div>
                  <h3 class="fs-5 fw-bold mb-3">Fitur Keamanan</h3>
                  <p class="mb-0">Enkripsi data, deteksi penipuan, dan mekanisme pencegahan untuk melindungi informasi keuangan Anda.</p>
                </div>
              </div>
              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                <div class="feature-card">
                  <div class="icon text-center mb-4 bg-danger rounded-circle d-inline-flex align-items-center justify-content-center text-white" style="width: 70px; height: 70px;">
                    <i class="bi bi-lightning-charge fs-4"></i>
                  </div>
                  <h3 class="fs-5 fw-bold mb-3">Transaksi Cepat</h3>
                  <p class="mb-0">Proses transaksi yang cepat dan efisien dengan waktu pemrosesan minimal untuk semua jenis pembayaran.</p>
                </div>
              </div>
              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                <div class="feature-card">
                  <div class="icon text-center mb-4 bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center text-white" style="width: 70px; height: 70px;">
                    <i class="bi bi-pie-chart fs-4"></i>
                  </div>
                  <h3 class="fs-5 fw-bold mb-3">Laporan Terperinci</h3>
                  <p class="mb-0">Laporan keuangan yang komprehensif dan mudah dipahami untuk membantu Anda menganalisis performa keuangan.</p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Features-->

        <!-- ======= Services =======-->
        <section class="section services__v3 bg-light" id="services">
          <div class="container">
            <div class="row mb-5">
              <div class="col-md-8 mx-auto text-center">
                <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Layanan Kami</span>
                <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="100">Memberdayakan Inovasi Keuangan Melalui Layanan Terdepan</h2>
                <p data-aos="fade-up" data-aos-delay="200">Temukan berbagai layanan keuangan inovatif yang dirancang untuk memenuhi kebutuhan Anda</p>
              </div>
            </div>

            <div class="row mb-4">
              <div class="col-12">
                <ul class="nav nav-pills nav-pills-custom justify-content-center mb-4" id="servicesTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="payment-tab" data-bs-toggle="pill" data-bs-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="true">
                      <i class="bi bi-credit-card me-2"></i>Pembayaran Digital
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="investment-tab" data-bs-toggle="pill" data-bs-target="#investment" type="button" role="tab" aria-controls="investment" aria-selected="false">
                      <i class="bi bi-graph-up me-2"></i>Investasi
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="lending-tab" data-bs-toggle="pill" data-bs-target="#lending" type="button" role="tab" aria-controls="lending" aria-selected="false">
                      <i class="bi bi-cash-coin me-2"></i>Pinjaman Online
                    </button>
                  </li>
                </ul>
              </div>
            </div>

            <div class="tab-content" id="servicesTabContent">
              <div class="tab-pane fade show active" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                <div class="row g-4">
                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="service-card p-4 rounded-4 h-100 bg-white">
                      <div class="service-icon mx-auto">
                        <i class="bi bi-credit-card"></i>
                      </div>
                      <span class="badge badge-category badge-payment mb-2">Pembayaran Digital</span>
                      <h3 class="fs-5 mb-3">Pembayaran Digital</h3>
                      <p class="mb-4">Transaksi yang mulus dan aman melalui berbagai platform digital, memungkinkan pembayaran cepat dan nyaman untuk bisnis dan konsumen.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none" href="#">
                          <span class="icons">
                            <i class="icon-1 bi bi-arrow-right-short"></i>
                            <i class="icon-2 bi bi-arrow-right-short"></i>
                          </span>
                          <span>Baca selengkapnya</span>
                        </a>
                        <div class="rating">
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-half text-warning"></i>
                          <span class="ms-1 small text-muted">4.5</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card p-4 rounded-4 h-100 bg-white">
                      <div class="service-icon mx-auto">
                        <i class="bi bi-wallet2"></i>
                      </div>
                      <span class="badge badge-category badge-management mb-2">Manajemen Keuangan</span>
                      <h3 class="fs-5 mb-3">Manajemen Keuangan Pribadi</h3>
                      <p class="mb-4">Alat yang membantu Anda melacak pengeluaran, membuat anggaran, dan merencanakan tujuan keuangan dengan antarmuka yang intuitif.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none" href="#">
                          <span class="icons">
                            <i class="icon-1 bi bi-arrow-right-short"></i>
                            <i class="icon-2 bi bi-arrow-right-short"></i>
                          </span>
                          <span>Baca selengkapnya</span>
                        </a>
                        <div class="rating">
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star text-warning"></i>
                          <span class="ms-1 small text-muted">4.0</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card p-4 rounded-4 h-100 bg-white">
                      <div class="service-icon mx-auto">
                        <i class="bi bi-shield-check"></i>
                      </div>
                      <span class="badge badge-category badge-insurance mb-2">Asuransi</span>
                      <h3 class="fs-5 mb-3">Solusi Insurtech</h3>
                      <p class="mb-4">Layanan asuransi inovatif yang memanfaatkan teknologi untuk menawarkan kebijakan yang dipersonalisasi, pemrosesan klaim yang lebih cepat.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none" href="#">
                          <span class="icons">
                            <i class="icon-1 bi bi-arrow-right-short"></i>
                            <i class="icon-2 bi bi-arrow-right-short"></i>
                          </span>
                          <span>Baca selengkapnya</span>
                        </a>
                        <div class="rating">
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <span class="ms-1 small text-muted">5.0</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="investment" role="tabpanel" aria-labelledby="investment-tab">
                <div class="row g-4">
                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="service-card p-4 rounded-4 h-100 bg-white">
                      <div class="service-icon mx-auto">
                        <i class="bi bi-graph-up-arrow"></i>
                      </div>
                      <span class="badge badge-category badge-investment mb-2">Platform Investasi</span>
                      <h3 class="fs-5 mb-3">Platform Investasi</h3>
                      <p class="mb-4">Platform yang ramah pengguna yang memungkinkan individu berinvestasi dalam saham, obligasi, dan aset lainnya dengan hambatan minimal.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none" href="#">
                          <span class="icons">
                            <i class="icon-1 bi bi-arrow-right-short"></i>
                            <i class="icon-2 bi bi-arrow-right-short"></i>
                          </span>
                          <span>Baca selengkapnya</span>
                        </a>
                        <div class="rating">
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-half text-warning"></i>
                          <span class="ms-1 small text-muted">4.5</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card p-4 rounded-4 h-100 bg-white">
                      <div class="service-icon mx-auto">
                        <i class="bi bi-currency-bitcoin"></i>
                      </div>
                      <span class="badge badge-category badge-crypto mb-2">Kripto</span>
                      <h3 class="fs-5 mb-3">Trading Kripto</h3>
                      <p class="mb-4">Layanan yang memfasilitasi pembelian, penjualan, dan perdagangan cryptocurrency, menawarkan pengguna pintu gerbang ke pasar mata uang digital.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none" href="#">
                          <span class="icons">
                            <i class="icon-1 bi bi-arrow-right-short"></i>
                            <i class="icon-2 bi bi-arrow-right-short"></i>
                          </span>
                          <span>Baca selengkapnya</span>
                        </a>
                        <div class="rating">
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star text-warning"></i>
                          <span class="ms-1 small text-muted">4.0</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card p-4 rounded-4 h-100 bg-white">
                      <div class="service-icon mx-auto">
                        <i class="bi bi-piggy-bank"></i>
                      </div>
                      <span class="badge badge-category badge-investment mb-2">Investasi</span>
                      <h3 class="fs-5 mb-3">Reksadana Digital</h3>
                      <p class="mb-4">Akses mudah ke berbagai pilihan reksadana dengan analisis performa yang mendalam dan rekomendasi yang dipersonalisasi.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none" href="#">
                          <span class="icons">
                            <i class="icon-1 bi bi-arrow-right-short"></i>
                            <i class="icon-2 bi bi-arrow-right-short"></i>
                          </span>
                          <span>Baca selengkapnya</span>
                        </a>
                        <div class="rating">
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <span class="ms-1 small text-muted">5.0</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="lending" role="tabpanel" aria-labelledby="lending-tab">
                <div class="row g-4">
                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="service-card p-4 rounded-4 h-100 bg-white">
                      <div class="service-icon mx-auto">
                        <i class="bi bi-cash-stack"></i>
                      </div>
                      <span class="badge badge-category badge-lending mb-2">Pinjaman</span>
                      <h3 class="fs-5 mb-3">Pinjaman Online</h3>
                      <p class="mb-4">Layanan pinjaman cepat dan mudah diakses yang menyediakan pinjaman pribadi dan bisnis melalui platform online, menyederhanakan proses peminjaman.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none" href="#">
                          <span class="icons">
                            <i class="icon-1 bi bi-arrow-right-short"></i>
                            <i class="icon-2 bi bi-arrow-right-short"></i>
                          </span>
                          <span>Baca selengkapnya</span>
                        </a>
                        <div class="rating">
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-half text-warning"></i>
                          <span class="ms-1 small text-muted">4.5</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card p-4 rounded-4 h-100 bg-white">
                      <div class="service-icon mx-auto">
                        <i class="bi bi-building"></i>
                      </div>
                      <span class="badge badge-category badge-lending mb-2">Pinjaman</span>
                      <h3 class="fs-5 mb-3">Pinjaman Usaha</h3>
                      <p class="mb-4">Solusi pembiayaan khusus untuk pengusaha dan UMKM dengan proses persetujuan yang cepat dan persyaratan yang fleksibel.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none" href="#">
                          <span class="icons">
                            <i class="icon-1 bi bi-arrow-right-short"></i>
                            <i class="icon-2 bi bi-arrow-right-short"></i>
                          </span>
                          <span>Baca selengkapnya</span>
                        </a>
                        <div class="rating">
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star text-warning"></i>
                          <span class="ms-1 small text-muted">4.0</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card p-4 rounded-4 h-100 bg-white">
                      <div class="service-icon mx-auto">
                        <i class="bi bi-arrow-repeat"></i>
                      </div>
                      <span class="badge badge-category badge-lending mb-2">Pinjaman</span>
                      <h3 class="fs-5 mb-3">Kredit Cepat</h3>
                      <p class="mb-4">Fasilitas kredit dengan persetujuan instan untuk kebutuhan mendesak, dengan proses yang sederhana dan persyaratan minimal.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none" href="#">
                          <span class="icons">
                            <i class="icon-1 bi bi-arrow-right-short"></i>
                            <i class="icon-2 bi bi-arrow-right-short"></i>
                          </span>
                          <span>Baca selengkapnya</span>
                        </a>
                        <div class="rating">
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <i class="bi bi-star-fill text-warning"></i>
                          <span class="ms-1 small text-muted">5.0</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Services-->

        <!-- ======= Stats =======-->
        <section class="stats__v3 section">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="row g-4">
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="stats-card">
                      <div class="stat-icon mb-3">
                        <i class="bi bi-people fs-1"></i>
                      </div>
                      <h3 class="fs-1 fw-bold">
                        <span class="purecounter" data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="2">0</span>
                        <span>K+</span>
                      </h3>
                      <p class="mb-0">Pengguna Aktif</p>
                    </div>
                  </div>
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="stats-card">
                      <div class="stat-icon mb-3">
                        <i class="bi bi-graph-up-arrow fs-1"></i>
                      </div>
                      <h3 class="fs-1 fw-bold">
                        <span class="purecounter" data-purecounter-start="0" data-purecounter-end="200" data-purecounter-duration="2">0</span>
                        <span>%+</span>
                      </h3>
                      <p class="mb-0">Peningkatan Pendapatan</p>
                    </div>
                  </div>
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="stats-card">
                      <div class="stat-icon mb-3">
                        <i class="bi bi-award fs-1"></i>
                      </div>
                      <h3 class="fs-1 fw-bold">
                        <span class="purecounter" data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="2">0</span>
                        <span>x</span>
                      </h3>
                      <p class="mb-0">Pertumbuhan Bisnis</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Stats-->

        <!-- ======= Testimonials =======-->
        <section class="section testimonials__v2 bg-light" id="testimonials">
          <div class="container">
            <div class="row mb-5">
              <div class="col-lg-5 mx-auto text-center">
                <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Testimoni</span>
                <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="100">Apa Kata Pengguna Kami</h2>
                <p data-aos="fade-up" data-aos-delay="200">Cerita Nyata Kesuksesan dan Kepuasan dari Komunitas Beragam Kami</p>
              </div>
            </div>
            <div class="row g-4">
              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                <div class="testimonial-card h-100">
                  <div class="rating mb-3">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <blockquote class="mb-3">
                    "Platform ini benar-benar mengubah cara saya mengelola keuangan bisnis. Pelacakan transaksi real-time dan opsi pembayaran yang mulus telah menghemat banyak waktu dan usaha saya!"
                  </blockquote>
                  <div class="testimonial-author d-flex gap-3 align-items-center">
                    <div class="author-img">
                      <img class="rounded-circle img-fluid" src="assets-guest/images/person-sq-2-min.jpg" alt="John Davis">
                    </div>
                    <div class="lh-base">
                      <strong class="d-block">John Davis</strong>
                      <span>Pemilik Bisnis Kecil</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-card h-100">
                  <div class="rating mb-3">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-half text-warning"></i>
                  </div>
                  <blockquote class="mb-3">
                    "Sebagai freelancer, mengelola keuangan bisa sangat membebani. Alat anggaran dan wawasan yang dipersonalisasi telah membuatnya jauh lebih mudah untuk mengatur pengeluaran dan merencanakan masa depan."
                  </blockquote>
                  <div class="testimonial-author d-flex gap-3 align-items-center">
                    <div class="author-img">
                      <img class="rounded-circle img-fluid" src="assets-guest/images/person-sq-1-min.jpg" alt="Emily Smith">
                    </div>
                    <div class="lh-base">
                      <strong class="d-block">Emily Smith</strong>
                      <span>Freelancer</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-card h-100">
                  <div class="rating mb-3">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <blockquote class="mb-3">
                    "Opsi investasi dan alat manajemen portofolio di platform ini sangat bagus. Saya sangat menghargai bagaimana rekomendasi yang disesuaikan selaras sempurna dengan tujuan keuangan saya."
                  </blockquote>
                  <div class="testimonial-author d-flex gap-3 align-items-center">
                    <div class="author-img">
                      <img class="rounded-circle img-fluid" src="assets-guest/images/person-sq-5-min.jpg" alt="Michael Rodriguez">
                    </div>
                    <div class="lh-base">
                      <strong class="d-block">Michael Rodriguez</strong>
                      <span>Investor</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Testimonials-->

        <!-- ======= Pricing =======-->
        <section class="section pricing__v2" id="pricing">
          <div class="container">
            <div class="row mb-5">
              <div class="col-md-5 mx-auto text-center">
                <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Harga</span>
                <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="100">Paket untuk Setiap Anggaran</h2>
                <p data-aos="fade-up" data-aos-delay="200">Nikmati masa depan keuangan dengan layanan keuangan kami yang aman, efisien, dan ramah pengguna</p>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                <div class="p-5 rounded-4 price-table h-100 bg-white shadow-sm">
                  <h3 class="fw-bold">Personal</h3>
                  <p>Pilih paket yang sesuai dengan kebutuhan keuangan pribadi Anda dan mulai kelola keuangan Anda dengan lebih efektif.</p>
                  <div class="price mb-4">
                    <strong class="display-4 fw-bold">$7</strong>
                    <span>/ bulan</span>
                  </div>
                  <ul class="list-unstyled mb-4">
                    <li class="d-flex gap-2 align-items-start mb-2">
                      <span class="icon rounded-circle position-relative mt-1 text-success">
                        <i class="bi bi-check"></i>
                      </span>
                      <span>Manajemen keuangan dasar</span>
                    </li>
                    <li class="d-flex gap-2 align-items-start mb-2">
                      <span class="icon rounded-circle position-relative mt-1 text-success">
                        <i class="bi bi-check"></i>
                      </span>
                      <span>Pembayaran digital</span>
                    </li>
                    <li class="d-flex gap-2 align-items-start mb-2">
                      <span class="icon rounded-circle position-relative mt-1 text-success">
                        <i class="bi bi-check"></i>
                      </span>
                      <span>Laporan keuangan bulanan</span>
                    </li>
                  </ul>
                  <div>
                    <a class="btn btn-custom w-100" href="guest.login-form">Mulai Sekarang</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                <div class="p-5 rounded-4 price-table popular h-100 bg-primary text-white position-relative">
                  <span class="badge bg-warning text-dark position-absolute top-0 start-50 translate-middle px-3 py-2">POPULAR</span>
                  <h3 class="fw-bold mb-3">Bisnis</h3>
                  <p>Optimalkan operasi keuangan bisnis Anda dengan paket bisnis yang disesuaikan.</p>
                  <div class="price mb-4">
                    <strong class="display-4 fw-bold me-1">$29</strong>
                    <span>/ bulan</span>
                  </div>
                  <ul class="list-unstyled mb-4">
                    <li class="d-flex gap-2 align-items-start mb-2">
                      <span class="icon rounded-circle position-relative mt-1">
                        <i class="bi bi-check"></i>
                      </span>
                      <span>Wawasan dan laporan keuangan yang dipersonalisasi</span>
                    </li>
                    <li class="d-flex gap-2 align-items-start mb-2">
                      <span class="icon rounded-circle position-relative mt-1">
                        <i class="bi bi-check"></i>
                      </span>
                      <span>Dukungan pelanggan prioritas</span>
                    </li>
                    <li class="d-flex gap-2 align-items-start mb-2">
                      <span class="icon rounded-circle position-relative mt-1">
                        <i class="bi bi-check"></i>
                      </span>
                      <span>Akses ke peluang investasi eksklusif</span>
                    </li>
                    <li class="d-flex gap-2 align-items-start mb-2">
                      <span class="icon rounded-circle position-relative mt-1">
                        <i class="bi bi-check"></i>
                      </span>
                      <span>Rekomendasi keuangan berbasis AI</span>
                    </li>
                  </ul>
                  <div>
                    <a class="btn btn-light w-100 fw-bold" href="#">Mulai Sekarang</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Pricing-->

        <!-- ======= Contact =======-->
        <section class="section contact__v2 bg-light" id="contact">
          <div class="container">
            <div class="row mb-5">
              <div class="col-md-6 col-lg-7 mx-auto text-center">
                <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Kontak</span>
                <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="0">Hubungi Kami</h2>
                <p data-aos="fade-up" data-aos-delay="100">Gunakan alat kami untuk mengembangkan konsep Anda dan mewujudkan visi Anda. Setelah selesai, bagikan kreasi Anda dengan mudah.</p>
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
                      <strong>+(01 234 567 890)</strong>
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
                        123 Main Street Apt 4B Springfield, <br>
                        IL 62701 United States
                      </address>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-wrapper bg-white p-4 rounded-4 shadow-sm" data-aos="fade-up" data-aos-delay="300">
                  <form id="contactForm">
                    <div class="row gap-3 mb-3">
                      <div class="col-md-12">
                        <label class="mb-2" for="name">Nama</label>
                        <input class="form-control" id="name" type="text" name="name" required="">
                      </div>
                      <div class="col-md-12">
                        <label class="mb-2" for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" required="">
                      </div>
                    </div>
                    <div class="row gap-3 mb-3">
                      <div class="col-md-12">
                        <label class="mb-2" for="subject">Subjek</label>
                        <input class="form-control" id="subject" type="text" name="subject">
                      </div>
                    </div>
                    <div class="row gap-3 gap-md-0 mb-3">
                      <div class="col-md-12">
                        <label class="mb-2" for="message">Pesan</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required=""></textarea>
                      </div>
                    </div>
                    <button class="btn btn-custom fw-semibold w-100" type="submit">Kirim Pesan</button>
                  </form>
                  <div class="mt-3 d-none alert alert-success" id="successMessage">Pesan berhasil dikirim!</div>
                  <div class="mt-3 d-none alert alert-danger" id="errorMessage">Pengiriman pesan gagal. Silakan coba lagi nanti.</div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Contact-->
      </main>
    </div>

    <!-- ======= Back to Top =======-->
    <button id="back-to-top" class="btn btn-custom rounded-circle">
      <i class="bi bi-arrow-up-short"></i>
    </button>
    <!-- End Back to top-->

    <!-- ======= Javascripts =======-->
    <script src="assets-guest/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="assets-guest/vendors/gsap/gsap.min.js"></script>
    <script src="assets-guest/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets-guest/vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="assets-guest/vendors/glightbox/glightbox.min.js"></script>
    <script src="assets-guest/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="assets-guest/vendors/aos/aos.js"></script>
    <script src="assets-guest/vendors/purecounter/purecounter.js"></script>
    <script src="assets-guest/js/custom.js"></script>
    <script src="assets-guest/js/send_email.js"></script>
    <!-- End JavaScripts-->
  </body>
</html>
