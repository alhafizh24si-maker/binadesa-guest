<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data User - Binadesa</title>

    @extends('layouts.guest.app')
    @section('content')
        <!-- ======= Main =======-->
        <main>

            <!-- ======= Table Section =======-->
            <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Admin
                                Panel</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Data User</h2>
                            <p data-aos="fade-up" data-aos-delay="200">List data seluruh user dalam sistem.</p>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="row justify-content-center mb-4">
                            <div class="col-lg-8">
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    {!! session('success') !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="row justify-content-center mb-4">
                            <div class="col-lg-8">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {!! session('error') !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card border-0 shadow rounded-4" data-aos="fade-up" data-aos-delay="300">
                                <div class="card-header bg-transparent py-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Daftar User</h5>
                                        <a href="{{ route('user.create') }}" class="btn btn-success">
                                            <i class="bi bi-plus-circle me-2"></i>Tambah User
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" class="text-center">No</th>
                                                    <th scope="col">Nama Lengkap</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Password</th>
                                                    <th scope="col" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($dataUser as $index => $item)
                                                    <tr>
                                                        <td class="text-center">{{ $index + 1 }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="text-muted me-2">••••••••</span>
                                                                <button type="button"
                                                                    class="btn btn-outline-secondary btn-sm"
                                                                    onclick="showPassword({{ $item->id }})"
                                                                    data-bs-toggle="tooltip" title="Tampilkan Password">
                                                                    <i class="bi bi-eye"></i>
                                                                </button>
                                                                <span id="password-{{ $item->id }}"
                                                                    class="d-none">{{ $item->plain_password ?? 'Tidak tersedia' }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-center gap-2">
                                                                <a href="{{ route('user.edit', $item->id) }}"
                                                                    class="btn btn-info btn-sm">
                                                                    <i class="bi bi-pencil me-1"></i>Edit
                                                                </a>
                                                                <form action="{{ route('user.destroy', $item->id) }}"
                                                                    method="POST" style="display:inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                                        <i class="bi bi-trash me-1"></i>Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center py-4">
                                                            <div class="text-muted">
                                                                <i class="bi bi-person-x display-4 d-block mb-2"></i>
                                                                Tidak ada data user
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Table Section-->

        </main>
    @endsection
