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
                  <!-- Table Container -->
                  <div class="p-4 rounded-4" style="background: var(--bs-body-bg); border: 1px solid var(--bs-border-color);">

                    <!-- Add Button Section -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Daftar Data Warga</h5>
                      <a href="{{ route('warga.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Data Warga
                      </a>
                    </div>

                    @if($warga && $warga->count() > 0)
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col" class="fw-bold">#</th>
                            <th scope="col" class="fw-bold">No. KTP</th>
                            <th scope="col" class="fw-bold">Nama</th>
                            <th scope="col" class="fw-bold">Jenis Kelamin</th>
                            <th scope="col" class="fw-bold">Agama</th>
                            <th scope="col" class="fw-bold">Pekerjaan</th>
                            <th scope="col" class="fw-bold">Telepon</th>
                            <th scope="col" class="fw-bold">Email</th>
                            <th scope="col" class="fw-bold">Dibuat</th>
                            <th scope="col" class="fw-bold text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($warga as $data)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                              <code>{{ $data->no_ktp }}</code>
                            </td>
                            <td>
                              <strong>{{ $data->nama }}</strong>
                            </td>
                            <td>
                              <span class="badge bg-{{ $data->jenis_kelamin == 'Laki-laki' ? 'primary' : 'success' }}">
                                {{ $data->jenis_kelamin }}
                              </span>
                            </td>
                            <td>
                              {{ $data->agama ?? '-' }}
                            </td>
                            <td>
                              {{ $data->pekerjaan ?? '-' }}
                            </td>
                            <td>
                              {{ $data->telp ?? '-' }}
                            </td>
                            <td>
                              {{ $data->email ?? '-' }}
                            </td>
                            <td>
                              <small class="text-muted">
                                {{ $data->created_at->format('d M Y') }}
                              </small>
                            </td>
                            <td>
                              <div class="d-flex justify-content-center gap-2">
                                <!-- Edit Button -->
                                <a href="{{ route('warga.edit', $data->warga_id) }}"
                                   class="btn btn-sm btn-outline-primary"
                                   data-bs-toggle="tooltip"
                                   title="Edit Data">
                                  <i class="bi bi-pencil"></i>
                                </a>

                                <!-- Delete Button -->
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
                          {{ $warga->links() }}
                        </nav>
                      </div>
                    </div>

                    @else
                    <!-- Empty State -->
                    <div class="text-center py-5">
                      <div class="mb-4">
                        <i class="bi bi-people display-1 text-muted"></i>
                      </div>
                      <h4 class="text-muted mb-3">Belum ada data warga</h4>
                      <p class="text-muted mb-4">Mulai dengan menambahkan data warga pertama Anda.</p>
                      <a href="{{ route('warga.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Data Warga
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

 @endsection
