<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kategori Berita - Binadesa</title>

    <!-- ======= Google Font =======-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet">
    <!-- End Google Font-->

    <!-- ======= Styles =======-->
    <link href="{{ asset('assets-guest/vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendors/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendors/glightbox/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendors/aos/aos.css') }}" rel="stylesheet">
    <!-- End Styles-->

    <!-- ======= Theme Style =======-->
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">
    <!-- End Theme Style-->

    <!-- ======= Apply theme =======-->
    <script>
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

          <!-- Navigation -->
          <div class="ms-auto w-auto">
            <div class="header-social d-flex align-items-center gap-1">
              <a class="btn btn-primary py-2" href="{{ route('kategoriberita.create') }}">
                <i class="bi bi-plus-circle me-2"></i>Tambah Kategori
              </a>
            </div>
          </div>
        </div>
      </header>
      <!-- End Header-->

      <!-- ======= Main =======-->
      <main>

        <!-- ======= Data Section =======-->
        <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
          <div class="container">
            <div class="row mb-5">
              <div class="col-md-8 mx-auto text-center">
                <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Admin Panel</span>
                <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Data Kategori Berita</h2>
                <p data-aos="fade-up" data-aos-delay="200">Kelola semua kategori berita yang tersedia dalam sistem.</p>
              </div>
            </div>

            <!-- Success Message -->
            @if(session('success'))
            <div class="row justify-content-center mb-4">
              <div class="col-lg-10">
                <div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="fade-up">
                  <i class="bi bi-check-circle-fill me-2"></i>
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            </div>
            @endif

            <div class="row justify-content-center">
              <div class="col-lg-10">
                <div class="card-wrapper" data-aos="fade-up" data-aos-delay="300">
                  <!-- Table Container -->
                  <div class="p-4 rounded-4" style="background: var(--bs-body-bg); border: 1px solid var(--bs-border-color);">

                    @if($kategoriBerita && $kategoriBerita->count() > 0)
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col" class="fw-bold">#</th>
                            <th scope="col" class="fw-bold">Nama Kategori</th>
                            <th scope="col" class="fw-bold">Slug</th>
                            <th scope="col" class="fw-bold">Deskripsi</th>
                            <th scope="col" class="fw-bold">Dibuat</th>
                            <th scope="col" class="fw-bold text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($kategoriBerita as $kategori)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                              <strong>{{ $kategori->name }}</strong>
                            </td>
                            <td>
                              <code>{{ $kategori->slug }}</code>
                            </td>
                            <td>
                              @if($kategori->deskripsi)
                                {{ Str::limit($kategori->deskripsi, 50) }}
                              @else
                                <span class="text-muted">-</span>
                              @endif
                            </td>
                            <td>
                              <small class="text-muted">
                                {{ $kategori->created_at->format('d M Y') }}
                              </small>
                            </td>
                            <td>
                              <div class="d-flex justify-content-center gap-2">
                                <!-- Edit Button -->
                                <a href="{{ route('kategoriberita.edit', $kategori->kategori_id) }}"
                                   class="btn btn-sm btn-outline-primary"
                                   data-bs-toggle="tooltip"
                                   title="Edit Kategori">
                                  <i class="bi bi-pencil"></i>
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('kategoriberita.destroy', $kategori->kategori_id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit"
                                          class="btn btn-sm btn-outline-danger"
                                          data-bs-toggle="tooltip"
                                          title="Hapus Kategori">
                                    <i class="bi bi-trash"></i>
                                  </button>
                                </form>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                    <!-- Pagination -->
                    <div class="row mt-4">
                      <div class="col-md-12">
                        <nav aria-label="Page navigation">
                          {{ $kategoriBerita->links() }}
                        </nav>
                      </div>
                    </div>

                    @else
                    <!-- Empty State -->
                    <div class="text-center py-5">
                      <div class="mb-4">
                        <i class="bi bi-inbox display-1 text-muted"></i>
                      </div>
                      <h4 class="text-muted mb-3">Belum ada data kategori berita</h4>
                      <p class="text-muted mb-4">Mulai dengan menambahkan kategori berita pertama Anda.</p>
                      <a href="{{ route('kategoriberita.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Kategori Pertama
                      </a>
                    </div>
                    @endif

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Data Section-->

      </main>

      <!-- ======= Footer =======-->
      <footer class="footer pt-5 pb-5">
        <div class="container">
          <div class="row credits pt-3">
            <div class="col-xl-12 text-center">
              &copy;
              <script>document.write(new Date().getFullYear());</script> Binadesa.
              All rights reserved. Designed with <i class="bi bi-heart-fill text-danger"></i> by <a href="https://freebootstrap.net">FreeBootstrap.net</a>
            </div>
          </div>
        </div>
      </footer>
      <!-- End Footer-->

    </div>

    <!-- ======= Back to Top =======-->
    <button id="back-to-top"><i class="bi bi-arrow-up-short"></i></button>
    <!-- End Back to top-->

    <!-- ======= Javascripts =======-->
    <script src="{{ asset('assets-guest/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('assets-guest/js/custom.js') }}"></script>

    <script>
      // Initialize tooltips
      document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        });
      });
    </script>
  </body>
</html>
