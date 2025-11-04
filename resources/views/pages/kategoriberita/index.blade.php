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
                        <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Data Kategori Berita</h2>
                        <p data-aos="fade-up" data-aos-delay="200">Kelola semua kategori berita yang tersedia dalam sistem.
                        </p>
                    </div>
                </div>

                <!-- Success Message -->
                @if (session('success'))
                    <div class="row justify-content-center mb-4">
                        <div class="col-lg-10">
                            <div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="fade-up">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card-wrapper" data-aos="fade-up" data-aos-delay="300">
                            <!-- Table Container -->
                            <div class="p-4 rounded-4"
                                style="background: var(--bs-body-bg); border: 1px solid var(--bs-border-color);">

                                <!-- Add Button Section -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="mb-0">Daftar Kategori Berita</h5>
                                    <a href="{{ route('kategoriberita.create') }}" class="btn btn-primary">
                                        <i class="bi bi-plus-circle me-2"></i>Tambah Kategori Berita
                                    </a>
                                </div>

                                @if ($kategoriBerita && $kategoriBerita->count() > 0)
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
                                                @foreach ($kategoriBerita as $kategori)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>
                                                            <strong>{{ $kategori->name }}</strong>
                                                        </td>
                                                        <td>
                                                            <code>{{ $kategori->slug }}</code>
                                                        </td>
                                                        <td>
                                                            @if ($kategori->deskripsi)
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
                                                                    data-bs-toggle="tooltip" title="Edit Kategori">
                                                                    <i class="bi bi-pencil"></i>
                                                                </a>

                                                                <!-- Delete Button -->
                                                                <form
                                                                    action="{{ route('kategoriberita.destroy', $kategori->kategori_id) }}"
                                                                    method="POST" class="d-inline"
                                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-outline-danger"
                                                                        data-bs-toggle="tooltip" title="Hapus Kategori">
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
                                        <p class="text-muted mb-4">Mulai dengan menambahkan kategori berita pertama Anda.
                                        </p>
                                        <a href="{{ route('kategoriberita.create') }}" class="btn btn-primary">
                                            <i class="bi bi-plus-circle me-2"></i>Tambah Kategori Pertama</a>
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
    <!-- ======= End Main =======-->
@endsection
