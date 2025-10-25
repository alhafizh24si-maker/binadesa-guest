<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Kategori Berita - Binadesa</title>

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
  </head>
  <body>

    <!-- ======= Site Wrap =======-->
    <div class="site-wrap">

      <!-- ======= Header =======-->
      @include('layouts.guest.header')
      <!-- End Header-->

      <!-- ======= Main =======-->
      <main>

        <!-- ======= Form Section =======-->
        <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
          <div class="container">
            <div class="row mb-5">
              <div class="col-md-8 mx-auto text-center">
                <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Admin Panel</span>
                <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Edit Kategori Berita</h2>
                <p data-aos="fade-up" data-aos-delay="200">Form untuk mengedit kategori berita.</p>
              </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                  <form action="{{ route('kategoriberita.update', $kategori->kategori_id) }}" method="POST" class="p-5 rounded-4" style="background: var(--bs-body-bg); border: 1px solid var(--bs-border-color);">
                    @csrf
                    @method('PUT')

                    <div class="row gap-3 mb-4">
                      <div class="col-md-12">
                        <label class="mb-2 fw-bold" for="name">Nama Kategori <span class="text-danger">*</span></label>
                        <input class="form-control @error('name') is-invalid @enderror"
                               id="name"
                               type="text"
                               name="name"
                               value="{{ old('name', $kategori->name) }}"
                               placeholder="Masukkan nama kategori"
                               required>
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row gap-3 mb-4">
                      <div class="col-md-12">
                        <label class="mb-2 fw-bold" for="slug">Slug <span class="text-danger">*</span></label>
                        <input class="form-control @error('slug') is-invalid @enderror"
                               id="slug"
                               type="text"
                               name="slug"
                               value="{{ old('slug', $kategori->slug) }}"
                               placeholder="Masukkan slug"
                               required>
                        @error('slug')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row gap-3 mb-4">
                      <div class="col-md-12">
                        <label class="mb-2 fw-bold" for="deskripsi">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                  id="deskripsi"
                                  name="deskripsi"
                                  rows="5"
                                  placeholder="Masukkan deskripsi kategori (opsional)">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                        @error('deskripsi')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row gap-3">
                      <div class="col-md-12">
                        <div class="d-flex gap-3">
                          <button class="btn btn-primary fw-semibold" type="submit">
                            <i class="bi bi-save me-2"></i>Update Kategori
                          </button>
                          <a href="{{ route('kategoriberita.index') }}" class="btn btn-outline-secondary">
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
      @include('layouts.guest.footer')
      <!-- End Footer-->

    </div>

    <!-- ======= Back to Top =======-->
    @include('layouts.guest.backtotop')
    <!-- End Back to top-->

    <!-- ======= Javascripts =======-->
    @include('layouts.guest.javascripts')
   <!-- ======= End Javascripts =======-->
