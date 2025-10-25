<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Profil Binadesa - Profil binadesa</title>

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
      /* Custom Styles untuk Dashboard Profil Binadesa */
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

      .dashboard-hero {
        background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
        color: white;
        padding: 4rem 0 2rem;
        position: relative;
        overflow: hidden;
      }

      .dashboard-hero:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('assets-guest/images/pattern.png');
        opacity: 0.1;
      }

      .dashboard-card {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        background: white;
        margin-bottom: 2rem;
      }

      .dashboard-card:hover {
        transform: translateY(-5px);
      }

      .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 5px solid white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        object-fit: cover;
      }

      .info-card {
        border-radius: 12px;
        padding: 1.5rem;
        background: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        height: 100%;
        transition: all 0.3s ease;
      }

      .info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
      }

      .info-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        font-size: 1.5rem;
      }

      .stats-card {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
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

      .section-title {
        position: relative;
        margin-bottom: 2rem;
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

      .news-card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        background: white;
        height: 100%;
      }

      .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      }

      .news-img {
        height: 200px;
        object-fit: cover;
        width: 100%;
      }

      .news-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        z-index: 2;
      }

      .agenda-card {
        border-radius: 12px;
        padding: 1.5rem;
        background: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        border-left: 4px solid var(--primary);
      }

      .agenda-card:hover {
        transform: translateX(5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
      }

      .gallery-card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        position: relative;
      }

      .gallery-card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      }

      .gallery-img {
        height: 200px;
        object-fit: cover;
        width: 100%;
      }

      .gallery-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0,0,0,0.7));
        color: white;
        padding: 1rem;
        transform: translateY(100%);
        transition: transform 0.3s ease;
      }

      .gallery-card:hover .gallery-overlay {
        transform: translateY(0);
      }

      .category-badge {
        font-size: 0.75rem;
        padding: 0.35em 0.65em;
        font-weight: 600;
      }

      .badge-finance {
        background-color: var(--primary);
        color: white;
      }

      .badge-tech {
        background-color: var(--success);
        color: white;
      }

      .badge-community {
        background-color: var(--warning);
        color: white;
      }

      .badge-education {
        background-color: var(--info);
        color: white;
      }

      .rating {
        color: #ffc107;
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

      .profile-header {
        background: linear-gradient(135deg, rgba(67, 97, 238, 0.1) 0%, rgba(58, 12, 163, 0.1) 100%);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
      }

      .feature-icon {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        font-size: 1.75rem;
      }

      .category-card {
        border-radius: 12px;
        padding: 1.5rem;
        background: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        text-align: center;
        height: 100%;
      }

      .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      }

      .category-icon {
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin: 0 auto 1rem;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        font-size: 2rem;
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
          <a class="navbar-brand w-auto" href="index.html">
            <img class="logo dark img-fluid" src="assets-guest/images/logo-dark.svg" alt="Binadesa Logo">
            <img class="logo light img-fluid" src="assets-guest/images/logo-light.svg" alt="Binadesa Logo">
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
                <li class="nav-item"><a class="nav-link" href="index.html">Beranda</a></li>
                <li class="nav-item"><a class="nav-link active" href="dashboard.html">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="layanan.html">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="kontak.html">Kontak</a></li>
              </ul>
            </div>
          </div>
          <!-- End offcanvas-->

          <div class="ms-auto w-auto">
            <div class="header-social d-flex align-items-center gap-1">
              <a class="btn btn-custom py-2" href="#">Mulai Sekarang</a>
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
        <!-- ======= Dashboard Hero =======-->
        <section class="dashboard-hero" id="dashboard">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-8 mx-auto text-center">
                <div class="profile-avatar-container mb-4">
                  <img class="profile-avatar" src="assets-guest/images/logo-dark.svg" alt="Logo Binadesa" data-aos="zoom-in" data-aos-delay="100">
                </div>
                <h1 class="display-4 fw-bold mb-3" data-aos="fade-up" data-aos-delay="200">Dashboard Profil Binadesa</h1>
                <p class="lead mb-4" data-aos="fade-up" data-aos-delay="300">Portal Informasi Terpadu untuk Masyarakat Desa</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap" data-aos="fade-up" data-aos-delay="400">
                  <span class="badge bg-light text-dark px-3 py-2">
                    <i class="bi bi-geo-alt me-1"></i> Desa Digital
                  </span>
                  <span class="badge bg-light text-dark px-3 py-2">
                    <i class="bi bi-award me-1"></i> Terpercaya
                  </span>
                  <span class="badge bg-light text-dark px-3 py-2">
                    <i class="bi bi-shield-check me-1"></i> Aman
                  </span>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Dashboard Hero-->

        <!-- ======= Dashboard Navigation =======-->
        <section class="section bg-light py-3" id="dashboard-nav">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <ul class="nav nav-pills nav-pills-custom justify-content-center" id="dashboardTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profile-tab" data-bs-toggle="pill" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">
                      <i class="bi bi-person-circle me-2"></i>Profil
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="news-tab" data-bs-toggle="pill" data-bs-target="#news" type="button" role="tab" aria-controls="news" aria-selected="false">
                      <i class="bi bi-newspaper me-2"></i>Berita
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="agenda-tab" data-bs-toggle="pill" data-bs-target="#agenda" type="button" role="tab" aria-controls="agenda" aria-selected="false">
                      <i class="bi bi-calendar-event me-2"></i>Agenda
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="gallery-tab" data-bs-toggle="pill" data-bs-target="#gallery" type="button" role="tab" aria-controls="gallery" aria-selected="false">
                      <i class="bi bi-images me-2"></i>Galeri
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <!-- End Dashboard Navigation-->

        <!-- ======= Dashboard Content =======-->
        <section class="section" id="dashboard-content">
          <div class="container">
            <div class="tab-content" id="dashboardTabContent">

              <!-- ======= Profile Tab =======-->
              <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row mb-5">
                  <div class="col-md-8 mx-auto text-center">
                    <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="0">Profil Binadesa</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Portal informasi terpadu yang berkomitmen untuk memberdayakan masyarakat desa melalui penyediaan informasi yang akurat dan terpercaya</p>
                  </div>
                </div>

                <div class="profile-header mb-5" data-aos="fade-up" data-aos-delay="0">
                  <div class="row align-items-center">
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                      <img src="assets-guest/images/logo-dark.svg" alt="Logo Binadesa" class="img-fluid" style="max-height: 150px;">
                    </div>
                    <div class="col-md-8">
                      <h3 class="mb-3">Selamat Datang di Portal Binadesa</h3>
                      <p class="mb-4">Binadesa adalah platform informasi terpadu yang menyediakan beragam layanan untuk masyarakat desa. Kami berkomitmen untuk meningkatkan kualitas hidup masyarakat melalui penyediaan informasi yang akurat, terpercaya, dan mudah diakses.</p>
                      <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-primary">Terpercaya</span>
                        <span class="badge bg-success">Inovatif</span>
                        <span class="badge bg-info">Ramah Pengguna</span>
                        <span class="badge bg-warning">Terintegrasi</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row g-4 mb-5">
                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="info-card">
                      <div class="info-icon mx-auto">
                        <i class="bi bi-geo-alt"></i>
                      </div>
                      <h3 class="h5 text-center mb-3">Lokasi</h3>
                      <div class="text-center">
                        <p class="mb-1"><strong>Desa:</strong> Binadesa</p>
                        <p class="mb-1"><strong>Kecamatan:</strong> Kecamatan Digital</p>
                        <p class="mb-1"><strong>Kabupaten:</strong> Kabupaten Inovasi</p>
                        <p class="mb-0"><strong>Provinsi:</strong> Jawa Tengah</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-card">
                      <div class="info-icon mx-auto">
                        <i class="bi bi-building"></i>
                      </div>
                      <h3 class="h5 text-center mb-3">Kantor</h3>
                      <div class="text-center">
                        <p class="mb-3">Jl. Teknologi No. 123, RT 01/RW 02</p>
                        <div class="d-flex justify-content-center gap-2">
                          <a href="#" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-map me-1"></i> Lihat Peta
                          </a>
                          <a href="#" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-share me-1"></i> Bagikan
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-card">
                      <div class="info-icon mx-auto">
                        <i class="bi bi-telephone"></i>
                      </div>
                      <h3 class="h5 text-center mb-3">Kontak</h3>
                      <div class="text-center">
                        <p class="mb-2">
                          <i class="bi bi-envelope me-2"></i>
                          <a href="mailto:info@binadesa.com">info@binadesa.com</a>
                        </p>
                        <p class="mb-2">
                          <i class="bi bi-phone me-2"></i>
                          <a href="tel:+622112345678">(021) 1234-5678</a>
                        </p>
                        <p class="mb-0">
                          <i class="bi bi-whatsapp me-2"></i>
                          <a href="https://wa.me/6281234567890">0812-3456-7890</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mb-5">
                  <div class="col-12">
                    <h3 class="section-title mb-4" data-aos="fade-up" data-aos-delay="0">Fitur Unggulan</h3>
                  </div>
                  <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                    <div class="category-card">
                      <div class="feature-icon mx-auto">
                        <i class="bi bi-newspaper"></i>
                      </div>
                      <h4 class="h5 mb-3">Portal Berita</h4>
                      <p class="mb-0">Informasi terkini seputar kegiatan desa dan perkembangan terkini</p>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="category-card">
                      <div class="feature-icon mx-auto">
                        <i class="bi bi-calendar-check"></i>
                      </div>
                      <h4 class="h5 mb-3">Agenda Kegiatan</h4>
                      <p class="mb-0">Jadwal kegiatan dan event terbaru dari pemerintah desa</p>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="category-card">
                      <div class="feature-icon mx-auto">
                        <i class="bi bi-images"></i>
                      </div>
                      <h4 class="h5 mb-3">Galeri Dokumentasi</h4>
                      <p class="mb-0">Koleksi foto dan video kegiatan desa dalam satu tempat</p>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="category-card">
                      <div class="feature-icon mx-auto">
                        <i class="bi bi-info-circle"></i>
                      </div>
                      <h4 class="h5 mb-3">Informasi Publik</h4>
                      <p class="mb-0">Data dan informasi penting seputar pemerintahan desa</p>
                    </div>
                  </div>
                </div>

                <div class="row g-4">
                  <div class="col-md-3" data-aos="fade-up" data-aos-delay="0">
                    <div class="stats-card">
                      <div class="stat-icon mb-3">
                        <i class="bi bi-people fs-1"></i>
                      </div>
                      <h3 class="fs-1 fw-bold">
                        <span class="purecounter" data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="2">0</span>
                        <span>K+</span>
                      </h3>
                      <p class="mb-0">Pengunjung Bulanan</p>
                    </div>
                  </div>
                  <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="stats-card">
                      <div class="stat-icon mb-3">
                        <i class="bi bi-building fs-1"></i>
                      </div>
                      <h3 class="fs-1 fw-bold">
                        <span class="purecounter" data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="2">0</span>
                        <span>+</span>
                      </h3>
                      <p class="mb-0">Artikel Terbit</p>
                    </div>
                  </div>
                  <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="stats-card">
                      <div class="stat-icon mb-3">
                        <i class="bi bi-graph-up-arrow fs-1"></i>
                      </div>
                      <h3 class="fs-1 fw-bold">
                        <span class="purecounter" data-purecounter-start="0" data-purecounter-end="300" data-purecounter-duration="2">0</span>
                        <span>%+</span>
                      </h3>
                      <p class="mb-0">Peningkatan Pengunjung</p>
                    </div>
                  </div>
                  <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="stats-card">
                      <div class="stat-icon mb-3">
                        <i class="bi bi-award fs-1"></i>
                      </div>
                      <h3 class="fs-1 fw-bold">
                        <span class="purecounter" data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="2">0</span>
                        <span>+</span>
                      </h3>
                      <p class="mb-0">Penghargaan</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Profile Tab-->

              <!-- ======= News Tab =======-->
              <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="news-tab">
                <div class="row mb-5">
                  <div class="col-md-8 mx-auto text-center">
                    <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="0">Berita Terkini</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Informasi terbaru seputar kegiatan dan perkembangan di Desa Binadesa</p>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col-12">
                    <h3 class="section-title mb-4" data-aos="fade-up" data-aos-delay="0">Kategori Berita</h3>
                  </div>
                  <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                    <div class="category-card">
                      <div class="category-icon">
                        <i class="bi bi-megaphone"></i>
                      </div>
                      <h4 class="h5 mb-3">Pengumuman</h4>
                      <p class="mb-0">Informasi resmi dari pemerintah desa</p>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="category-card">
                      <div class="category-icon">
                        <i class="bi bi-calendar-event"></i>
                      </div>
                      <h4 class="h5 mb-3">Kegiatan</h4>
                      <p class="mb-0">Laporan kegiatan dan event desa</p>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="category-card">
                      <div class="category-icon">
                        <i class="bi bi-lightbulb"></i>
                      </div>
                      <h4 class="h5 mb-3">Inovasi</h4>
                      <p class="mb-0">Program dan terobosan baru desa</p>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="category-card">
                      <div class="category-icon">
                        <i class="bi bi-heart"></i>
                      </div>
                      <h4 class="h5 mb-3">Sosial</h4>
                      <p class="mb-0">Kegiatan sosial dan kemasyarakatan</p>
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col-12">
                    <ul class="nav nav-pills nav-pills-custom justify-content-center mb-4" id="newsTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-news-tab" data-bs-toggle="pill" data-bs-target="#all-news" type="button" role="tab" aria-controls="all-news" aria-selected="true">Semua</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pengumuman-news-tab" data-bs-toggle="pill" data-bs-target="#pengumuman-news" type="button" role="tab" aria-controls="pengumuman-news" aria-selected="false">Pengumuman</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="kegiatan-news-tab" data-bs-toggle="pill" data-bs-target="#kegiatan-news" type="button" role="tab" aria-controls="kegiatan-news" aria-selected="false">Kegiatan</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="inovasi-news-tab" data-bs-toggle="pill" data-bs-target="#inovasi-news" type="button" role="tab" aria-controls="inovasi-news" aria-selected="false">Inovasi</button>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="tab-content" id="newsTabContent">
                  <div class="tab-pane fade show active" id="all-news" role="tabpanel" aria-labelledby="all-news-tab">
                    <div class="row g-4">
                      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                        <div class="news-card">
                          <div class="position-relative">
                            <img class="news-img" src="assets-guest/images/portal.jpg" alt="Binadesa Luncurkan Portal Baru">
                            <span class="news-badge badge category-badge badge-tech">Inovasi</span>
                          </div>
                          <div class="p-3">
                            <h4 class="h5 mb-2">Binadesa Luncurkan Portal Informasi Terpadu</h4>
                            <p class="small text-muted mb-3">
                              <i class="bi bi-calendar me-1"></i> 15 Nov 2023
                              <i class="bi bi-eye ms-2 me-1"></i> 1.2K
                            </p>
                            <p class="mb-3">Desa Binadesa meluncurkan portal informasi terpadu untuk memudahkan akses informasi bagi masyarakat.</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <a href="#" class="btn btn-sm btn-custom">Baca Selengkapnya</a>
                              <div class="rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="news-card">
                          <div class="position-relative">
                            <img class="news-img" src="assets-guest/images/literasi.jpeg" alt="Workshop Literasi Digital">
                            <span class="news-badge badge category-badge badge-education">Kegiatan</span>
                          </div>
                          <div class="p-3">
                            <h4 class="h5 mb-2">Workshop Literasi Digital untuk Warga</h4>
                            <p class="small text-muted mb-3">
                              <i class="bi bi-calendar me-1"></i> 10 Nov 2023
                              <i class="bi bi-eye ms-2 me-1"></i> 856
                            </p>
                            <p class="mb-3">Binadesa menyelenggarakan workshop literasi digital untuk meningkatkan kemampuan warga dalam menggunakan teknologi.</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <a href="#" class="btn btn-sm btn-custom">Baca Selengkapnya</a>
                              <div class="rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="news-card">
                          <div class="position-relative">
                            <img class="news-img" src="assets-guest/images/bansos.jpg" alt="Pengumuman Bantuan Sosial">
                            <span class="news-badge badge category-badge badge-finance">Pengumuman</span>
                          </div>
                          <div class="p-3">
                            <h4 class="h5 mb-2">Pengumuman Bantuan Sosial Tahap II</h4>
                            <p class="small text-muted mb-3">
                              <i class="bi bi-calendar me-1"></i> 5 Nov 2023
                              <i class="bi bi-eye ms-2 me-1"></i> 1.5K
                            </p>
                            <p class="mb-3">Pemerintah Desa Binadesa mengumumkan penerima bantuan sosial tahap II tahun 2023.</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <a href="#" class="btn btn-sm btn-custom">Baca Selengkapnya</a>
                              <div class="rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Other news category tabs would go here -->
                </div>
              </div>
              <!-- End News Tab-->

              <!-- ======= Agenda Tab =======-->
              <div class="tab-pane fade" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
                <div class="row mb-5">
                  <div class="col-md-8 mx-auto text-center">
                    <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="0">Agenda Kegiatan</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Jadwal kegiatan dan event terbaru dari Desa Binadesa</p>
                  </div>
                </div>

                <div class="row g-4">
                  <div class="col-lg-6" data-aos="fade-up" data-aos-delay="0">
                    <div class="agenda-card">
                      <div class="d-flex align-items-start">
                        <div class="bg-primary text-white text-center p-3 rounded-3 me-3">
                          <h4 class="mb-0 fw-bold">25</h4>
                          <small>NOV</small>
                        </div>
                        <div>
                          <h4 class="h5 mb-2">Rapat Koordinasi Desa</h4>
                          <p class="mb-2"><i class="bi bi-clock me-2"></i> 09.00 - 15.00 WIB</p>
                          <p class="mb-2"><i class="bi bi-geo-alt me-2"></i> Aula Kantor Desa</p>
                          <p class="mb-3">Rapat koordinasi bulanan membahas program kerja desa.</p>
                          <div class="d-flex gap-2">
                            <span class="badge bg-primary">Terbuka untuk Umum</span>
                            <span class="badge bg-success">Gratis</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="agenda-card">
                      <div class="d-flex align-items-start">
                        <div class="bg-success text-white text-center p-3 rounded-3 me-3">
                          <h4 class="mb-0 fw-bold">30</h4>
                          <small>NOV</small>
                        </div>
                        <div>
                          <h4 class="h5 mb-2">Pelatihan UMKM Digital</h4>
                          <p class="mb-2"><i class="bi bi-clock me-2"></i> 13.00 - 16.00 WIB</p>
                          <p class="mb-2"><i class="bi bi-geo-alt me-2"></i> Balai Desa</p>
                          <p class="mb-3">Pelatihan pemanfaatan platform digital untuk pengusaha UMKM lokal.</p>
                          <div class="d-flex gap-2">
                            <span class="badge bg-primary">Terbuka untuk Umum</span>
                            <span class="badge bg-warning">Pendaftaran Dibutuhkan</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="agenda-card">
                      <div class="d-flex align-items-start">
                        <div class="bg-warning text-white text-center p-3 rounded-3 me-3">
                          <h4 class="mb-0 fw-bold">5</h4>
                          <small>DES</small>
                        </div>
                        <div>
                          <h4 class="h5 mb-2">Gotong Royong Bersih Desa</h4>
                          <p class="mb-2"><i class="bi bi-clock me-2"></i> 07.00 - 12.00 WIB</p>
                          <p class="mb-2"><i class="bi bi-geo-alt me-2"></i> Seluruh Wilayah Desa</p>
                          <p class="mb-3">Kegiatan gotong royong membersihkan lingkungan desa.</p>
                          <div class="d-flex gap-2">
                            <span class="badge bg-primary">Wajib Hadir</span>
                            <span class="badge bg-info">Kegiatan Rutin</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="agenda-card">
                      <div class="d-flex align-items-start">
                        <div class="bg-info text-white text-center p-3 rounded-3 me-3">
                          <h4 class="mb-0 fw-bold">12</h4>
                          <small>DES</small>
                        </div>
                        <div>
                          <h4 class="h5 mb-2">Pameran Produk UMKM Lokal</h4>
                          <p class="mb-2"><i class="bi bi-clock me-2"></i> 08.00 - 16.00 WIB</p>
                          <p class="mb-2"><i class="bi bi-geo-alt me-2"></i> Lapangan Desa</p>
                          <p class="mb-3">Pameran produk unggulan UMKM Desa Binadesa.</p>
                          <div class="d-flex gap-2">
                            <span class="badge bg-primary">Terbuka untuk Umum</span>
                            <span class="badge bg-success">Gratis</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Agenda Tab-->

              <!-- ======= Gallery Tab =======-->
              <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                <div class="row mb-5">
                  <div class="col-md-8 mx-auto text-center">
                    <h2 class="section-title text-center mb-3" data-aos="fade-up" data-aos-delay="0">Galeri Kegiatan</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Dokumentasi visual dari berbagai kegiatan dan event Desa Binadesa</p>
                  </div>
                </div>

                <div class="row g-4">
                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="gallery-card">
                      <img class="gallery-img" src="assets-guest/images/gallery-1.jpg" alt="Workshop Digital">
                      <div class="gallery-overlay">
                        <h5 class="mb-1">Workshop Digital</h5>
                        <p class="mb-0 small">Pelatihan penggunaan platform digital untuk warga</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="gallery-card">
                      <img class="gallery-img" src="assets-guest/images/gallery-2.jpg" alt="Rapat Desa">
                      <div class="gallery-overlay">
                        <h5 class="mb-1">Rapat Desa</h5>
                        <p class="mb-0 small">Sidang paripurna membahas program desa</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="gallery-card">
                      <img class="gallery-img" src="assets-guest/images/gallery-3.jpg" alt="Kunjungan Komunitas">
                      <div class="gallery-overlay">
                        <h5 class="mb-1">Kunjungan Komunitas</h5>
                        <p class="mb-0 small">Interaksi dengan komunitas warga Binadesa</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="gallery-card">
                      <img class="gallery-img" src="assets-guest/images/gallery-4.jpg" alt="Peluncuran Portal">
                      <div class="gallery-overlay">
                        <h5 class="mb-1">Peluncuran Portal</h5>
                        <p class="mb-0 small">Launching portal informasi Desa Binadesa</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="gallery-card">
                      <img class="gallery-img" src="assets-guest/images/gallery-5.jpg" alt="Edukasi Masyarakat">
                      <div class="gallery-overlay">
                        <h5 class="mb-1">Edukasi Masyarakat</h5>
                        <p class="mb-0 small">Sosialisasi program desa untuk masyarakat</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="gallery-card">
                      <img class="gallery-img" src="assets-guest/images/gallery-6.jpg" alt="Gotong Royong">
                      <div class="gallery-overlay">
                        <h5 class="mb-1">Gotong Royong</h5>
                        <p class="mb-0 small">Kegiatan bersih-bersih lingkungan desa</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Gallery Tab-->
            </div>
          </div>
        </section>
        <!-- End Dashboard Content-->

        <!-- ======= CTA =======-->
        <section class="section bg-primary text-white" id="cta">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-8" data-aos="fade-up" data-aos-delay="0">
                <h2 class="h2 mb-3">Butuh Informasi Lebih Lanjut?</h2>
                <p class="mb-0">Hubungi kami untuk mendapatkan informasi terbaru seputar kegiatan dan program Desa Binadesa.</p>
              </div>
              <div class="col-lg-4 text-lg-end" data-aos="fade-up" data-aos-delay="100">
                <a href="#" class="btn btn-light btn-lg me-2">
                  <i class="bi bi-telephone me-1"></i> Hubungi Kami
                </a>
                <a href="#" class="btn btn-outline-light btn-lg">
                  <i class="bi bi-envelope me-1"></i> Email
                </a>
              </div>
            </div>
          </div>
        </section>
        <!-- End CTA-->
      </main>

      <!-- ======= Footer =======-->
      <footer class="footer pt-5 pb-5 bg-dark text-white">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-4 mb-4 mb-md-0">
              <h3 class="h5 mb-3">Binadesa</h3>
              <p class="mb-4">Portal informasi terpadu yang menyediakan beragam layanan untuk masyarakat desa dengan informasi yang akurat dan terpercaya.</p>
              <div class="d-flex gap-3">
                <a href="#" class="text-white"><i class="bi bi-facebook fs-5"></i></a>
                <a href="#" class="text-white"><i class="bi bi-instagram fs-5"></i></a>
                <a href="#" class="text-white"><i class="bi bi-twitter fs-5"></i></a>
                <a href="#" class="text-white"><i class="bi bi-linkedin fs-5"></i></a>
              </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
              <h3 class="h5 mb-3">Tautan Cepat</h3>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="index.html" class="text-white-50 text-decoration-none">Beranda</a></li>
                <li class="mb-2"><a href="dashboard.html" class="text-white-50 text-decoration-none">Dashboard</a></li>
                <li class="mb-2"><a href="layanan.html" class="text-white-50 text-decoration-none">Layanan</a></li>
                <li class="mb-2"><a href="kontak.html" class="text-white-50 text-decoration-none">Kontak</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h3 class="h5 mb-3">Kontak</h3>
              <p class="d-flex mb-3">
                <i class="bi bi-geo-alt-fill me-3"></i>
                <span>Jl. Teknologi No. 123, Desa Binadesa<br>Kecamatan Digital, Pekanbaru</span>
              </p>
              <p class="d-flex mb-3">
                <i class="bi bi-envelope-fill me-3"></i>
                <span>info@binadesa.com</span>
              </p>
              <p class="d-flex mb-3">
                <i class="bi bi-telephone-fill me-3"></i>
                <span>(021) 1234-5678</span>
              </p>
            </div>
          </div>
          <div class="row pt-3 border-top border-secondary">
            <div class="col-md-6 text-center text-md-start">
              <p class="mb-0">&copy; 2023 Binadesa. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
              <p class="mb-0">Designed with <i class="bi bi-heart-fill text-danger"></i> for community empowerment</p>
            </div>
          </div>
        </div>
      </footer>
      <!-- End Footer-->
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
    <!-- End JavaScripts-->
  </body>
</html>
