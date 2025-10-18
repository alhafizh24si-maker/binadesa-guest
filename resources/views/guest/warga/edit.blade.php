<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Warga - Binadesa</title>

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
              <a class="btn btn-primary py-2" href="{{ route('warga.index') }}">Kembali</a>
            </div>
          </div>
        </div>
      </header>
      <!-- End Header-->

      <!-- ======= Main =======-->
      <main>

        <!-- ======= Form Section =======-->
        <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
          <div class="container">
            <div class="row mb-5">
              <div class="col-md-8 mx-auto text-center">
                <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Admin Panel</span>
                <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Edit Data Warga</h2>
                <p data-aos="fade-up" data-aos-delay="200">Form untuk mengedit data warga.</p>
              </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                  <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST" class="p-5 rounded-4" style="background: var(--bs-body-bg); border: 1px solid var(--bs-border-color);">
                    @csrf
                    @method('PUT')

                    <div class="row gap-3 mb-4">
                      <div class="col-md-12">
                        <label class="mb-2 fw-bold" for="no_ktp">No. KTP <span class="text-danger">*</span></label>
                        <input class="form-control @error('no_ktp') is-invalid @enderror"
                               id="no_ktp"
                               type="text"
                               name="no_ktp"
                               value="{{ old('no_ktp', $warga->no_ktp) }}"
                               placeholder="Masukkan nomor KTP"
                               maxlength="20"
                               required>
                        @error('no_ktp')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row gap-3 mb-4">
                      <div class="col-md-12">
                        <label class="mb-2 fw-bold" for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                        <input class="form-control @error('nama') is-invalid @enderror"
                               id="nama"
                               type="text"
                               name="nama"
                               value="{{ old('nama', $warga->nama) }}"
                               placeholder="Masukkan nama lengkap"
                               maxlength="100"
                               required>
                        @error('nama')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row gap-3 mb-4">
                      <div class="col-md-6">
                        <label class="mb-2 fw-bold" for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                id="jenis_kelamin"
                                name="jenis_kelamin"
                                required>
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="Laki-laki" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                          <option value="Perempuan" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-6">
                        <label class="mb-2 fw-bold" for="agama">Agama</label>
                        <input class="form-control @error('agama') is-invalid @enderror"
                               id="agama"
                               type="text"
                               name="agama"
                               value="{{ old('agama', $warga->agama) }}"
                               placeholder="Masukkan agama"
                               maxlength="50">
                        @error('agama')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row gap-3 mb-4">
                      <div class="col-md-6">
                        <label class="mb-2 fw-bold" for="pekerjaan">Pekerjaan</label>
                        <input class="form-control @error('pekerjaan') is-invalid @enderror"
                               id="pekerjaan"
                               type="text"
                               name="pekerjaan"
                               value="{{ old('pekerjaan', $warga->pekerjaan) }}"
                               placeholder="Masukkan pekerjaan"
                               maxlength="100">
                        @error('pekerjaan')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-6">
                        <label class="mb-2 fw-bold" for="telp">No. Telepon</label>
                        <input class="form-control @error('telp') is-invalid @enderror"
                               id="telp"
                               type="text"
                               name="telp"
                               value="{{ old('telp', $warga->telp) }}"
                               placeholder="Masukkan nomor telepon"
                               maxlength="20">
                        @error('telp')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row gap-3 mb-4">
                      <div class="col-md-12">
                        <label class="mb-2 fw-bold" for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror"
                               id="email"
                               type="email"
                               name="email"
                               value="{{ old('email', $warga->email) }}"
                               placeholder="Masukkan alamat email"
                               maxlength="100">
                        @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row gap-3">
                      <div class="col-md-12">
                        <div class="d-flex gap-3">
                          <button class="btn btn-primary fw-semibold" type="submit">
                            <i class="bi bi-save me-2"></i>Update Data
                          </button>
                          <a href="{{ route('warga.index') }}" class="btn btn-outline-secondary">
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
  </body>
</html>
