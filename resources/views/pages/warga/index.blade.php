<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Warga - Binadesa</title>

@extends('layouts.guest.app')
@section('content')

      <!-- ======= Main =======-->
      <main>

        <!-- ======= Data Section =======-->
        <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
          <div class="container">
            <div class="row mb-5">
              <div class="col-md-8 mx-auto text-center">
                <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Admin Panel</span>
                <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Data Warga</h2>
                <p data-aos="fade-up" data-aos-delay="200">Kelola semua data warga yang terdaftar dalam sistem.</p>
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

            @if(session('error'))
            <div class="row justify-content-center mb-4">
              <div class="col-lg-10">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" data-aos="fade-up">
                  <i class="bi bi-exclamation-triangle-fill me-2"></i>
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            </div>
            @endif

            <div class="row justify-content-center">
              <div class="col-lg-12">
                <div class="card-wrapper" data-aos="fade-up" data-aos-delay="300">
                  <!-- Header Card -->
                  <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h5 class="mb-1 fw-bold">Daftar Data Warga</h5>
                          <p class="text-muted mb-0">Total {{ $warga->count() }} warga terdaftar</p>
                        </div>
                        <a href="{{ route('warga.create') }}" class="btn btn-primary">
                          <i class="bi bi-plus-circle me-2"></i>Tambah Data Warga
                        </a>
                      </div>
                    </div>
                  </div>

                  @if($warga && $warga->count() > 0)
                    <!-- Warga List -->
                    <div class="row g-4">
                      @foreach($warga as $data)
                      <div class="col-12">
                        <div class="card warga-card border-0 shadow-sm h-100">
                          <div class="card-body p-4">
                            <div class="row align-items-center">
                              <!-- Kolom 1: Nomor dan Info Dasar -->
                              <div class="col-lg-2 col-md-3">
                                <div class="d-flex align-items-center">
                                  <div class="warga-number me-3">
                                    <span class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center">
                                      {{ $loop->iteration }}
                                    </span>
                                  </div>
                                  <div>
                                    <h6 class="mb-1 fw-bold text-dark">{{ $data->nama }}</h6>
                                    <small class="text-muted">
                                      <code>{{ $data->no_ktp }}</code>
                                    </small>
                                  </div>
                                </div>
                              </div>

                              <!-- Kolom 2: Demografi -->
                              <div class="col-lg-2 col-md-3">
                                <div class="warga-demografi">
                                  <div class="mb-1">
                                    <span class="badge bg-{{ $data->jenis_kelamin == 'Laki-laki' ? 'primary' : 'success' }} me-2">
                                      {{ $data->jenis_kelamin }}
                                    </span>
                                  </div>
                                  <small class="text-muted">{{ $data->agama ?? '-' }}</small>
                                </div>
                              </div>

                              <!-- Kolom 3: Pekerjaan -->
                              <div class="col-lg-2 col-md-3">
                                <div class="warga-pekerjaan">
                                  <small class="text-muted d-block mb-1">Pekerjaan</small>
                                  <span class="fw-medium">{{ $data->pekerjaan ?? '-' }}</span>
                                </div>
                              </div>

                              <!-- Kolom 4: Kontak -->
                              <div class="col-lg-3 col-md-3">
                                <div class="warga-kontak">
                                  <div class="mb-2">
                                    <small class="text-muted d-block mb-1">Telepon</small>
                                    <span class="fw-medium">{{ $data->telp ?? '-' }}</span>
                                  </div>
                                  <div>
                                    <small class="text-muted d-block mb-1">Email</small>
                                    <span class="fw-medium text-truncate d-inline-block" style="max-width: 200px;">
                                      {{ $data->email ?? '-' }}
                                    </span>
                                  </div>
                                </div>
                              </div>

                              <!-- Kolom 5: Tanggal & Aksi -->
                              <div class="col-lg-3 col-md-12">
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="warga-tanggal">
                                    <small class="text-muted">
                                      <i class="bi bi-calendar me-1"></i>
                                      {{ $data->created_at->format('d M Y') }}
                                    </small>
                                  </div>
                                  <div class="warga-actions">
                                    <div class="d-flex gap-2">
                                      <a href="{{ route('warga.edit', $data->warga_id) }}"
                                         class="btn btn-sm btn-outline-primary"
                                         data-bs-toggle="tooltip"
                                         title="Edit Data">
                                        <i class="bi bi-pencil"></i>
                                      </a>
                                      <form action="{{ route('warga.destroy', $data->warga_id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data warga ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="tooltip"
                                                title="Hapus Data">
                                          <i class="bi bi-trash"></i>
                                        </button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="row mt-4">
                      <div class="col-md-12">
                        <nav aria-label="Page navigation">
                          {{ $warga->links() }}
                        </nav>
                      </div>
                    </div>

                  @else
                    <!-- Empty State -->
                    <div class="card border-0 shadow-sm">
                      <div class="card-body text-center py-5">
                        <div class="mb-4">
                          <i class="bi bi-people display-1 text-muted"></i>
                        </div>
                        <h4 class="text-muted mb-3">Belum ada data warga</h4>
                        <p class="text-muted mb-4">Mulai dengan menambahkan data warga pertama Anda.</p>
                        <a href="{{ route('warga.create') }}" class="btn btn-primary">
                          <i class="bi bi-plus-circle me-2"></i>Tambah Data Warga
                        </a>
                      </div>
                    </div>
                  @endif

                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Data Section-->

      </main>

      <style>
        .warga-card {
          transition: all 0.3s ease;
          border: 1px solid #e9ecef;
        }

        .warga-card:hover {
          transform: translateY(-2px);
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
          border-color: #0d6efd;
        }

        .warga-number .badge {
          width: 40px;
          height: 40px;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 0.9rem;
          font-weight: 600;
        }

        .warga-demografi .badge {
          font-size: 0.75rem;
          padding: 0.25rem 0.5rem;
        }

        .warga-kontak span {
          font-size: 0.9rem;
        }

        .warga-actions .btn {
          padding: 0.3rem 0.6rem;
          border-radius: 6px;
          font-size: 0.8rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
          .card-body {
            padding: 1.5rem !important;
          }

          .row.align-items-center {
            gap: 1rem;
          }

          .col-lg-2,
          .col-lg-3 {
            margin-bottom: 1rem;
          }

          .d-flex.justify-content-between.align-items-center {
            flex-direction: column;
            align-items: start !important;
            gap: 1rem;
          }

          .warga-actions {
            width: 100%;
            justify-content: start !important;
          }

          .warga-number .badge {
            width: 35px;
            height: 35px;
          }
        }

        @media (max-width: 576px) {
          .card-body {
            padding: 1.25rem !important;
          }

          .d-flex.align-items-center {
            flex-direction: column;
            align-items: start !important;
            gap: 0.5rem;
          }

          .warga-number {
            align-self: start;
          }

          .warga-demografi,
          .warga-pekerjaan,
          .warga-kontak {
            text-align: left;
          }

          .warga-actions .btn {
            flex: 1;
            min-width: 70px;
          }
        }

        /* Ensure consistent spacing */
        .warga-demografi small,
        .warga-pekerjaan small,
        .warga-kontak small {
          font-size: 0.8rem;
        }

        .warga-demografi span,
        .warga-pekerjaan span,
        .warga-kontak span {
          font-size: 0.9rem;
        }
      </style>

      <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
          var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
          var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
          });
        });
      </script>

@endsection
