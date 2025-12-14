<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Agenda - Binadesa</title>
</head>

<body>
    @extends('layouts.guest.app')
    @section('content')
        <!-- ======= Main =======-->
        <main>

            <!-- ======= Detail Section =======-->
            <section class="section" style="padding-top: 50px; padding-bottom: 100px;">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Detail Agenda</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">{{ $agenda->judul }}</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Detail lengkap agenda kegiatan.</p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card border-0 shadow-sm" data-aos="fade-up" data-aos-delay="300">
                                @if ($agenda->poster_dokumen)
                                    <div class="card-img-top" style="max-height: 400px; overflow: hidden;">
                                        <img src="{{ Storage::url('public/agenda/' . $agenda->poster_dokumen) }}"
                                            alt="{{ $agenda->judul }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                @endif

                                <div class="card-body p-5">
                                    <!-- Header Info -->
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="date-display bg-primary bg-opacity-10 rounded p-3 me-3">
                                                    <div class="text-center">
                                                        <div class="fs-3 fw-bold text-primary">
                                                            {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->format('d') }}
                                                        </div>
                                                        <div class="small text-muted">
                                                            {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->format('M Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h5 class="mb-1">{{ $agenda->judul }}</h5>
                                                    <p class="text-muted mb-0">
                                                        <i class="bi bi-clock me-1"></i>
                                                        {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->format('H:i') }} -
                                                        {{ \Carbon\Carbon::parse($agenda->tanggal_selesai)->format('H:i') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-end">
                                            <span class="badge bg-secondary fs-6">ID: {{ $agenda->agenda_id }}</span>
                                        </div>
                                    </div>

                                    <!-- Detail Grid -->
                                    <div class="row g-4 mb-4">
                                        <div class="col-md-6">
                                            <div class="detail-card p-3 rounded border">
                                                <h6 class="text-muted mb-2">
                                                    <i class="bi bi-geo-alt me-2"></i>Lokasi
                                                </h6>
                                                <p class="mb-0 fw-medium">{{ $agenda->lokasi }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="detail-card p-3 rounded border">
                                                <h6 class="text-muted mb-2">
                                                    <i class="bi bi-building me-2"></i>Penyelenggara
                                                </h6>
                                                <p class="mb-0 fw-medium">{{ $agenda->penyelenggara }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Deskripsi -->
                                    @if ($agenda->deskripsi)
                                        <div class="mb-4">
                                            <h5 class="mb-3">Deskripsi Agenda</h5>
                                            <div class="p-3 bg-light rounded border">
                                                <p class="mb-0" style="white-space: pre-line;">{{ $agenda->deskripsi }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Metadata -->
                                    <div class="row g-3 mt-4 pt-4 border-top">
                                        <div class="col-md-4">
                                            <small class="text-muted">
                                                <i class="bi bi-calendar-plus me-1"></i> Dibuat:
                                                {{ \Carbon\Carbon::parse($agenda->created_at)->format('d M Y H:i') }}
                                            </small>
                                        </div>
                                        <div class="col-md-4">
                                            <small class="text-muted">
                                                <i class="bi bi-calendar-check me-1"></i> Diupdate:
                                                {{ \Carbon\Carbon::parse($agenda->updated_at)->format('d M Y H:i') }}
                                            </small>
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <small class="text-muted">
                                                Status:
                                                @php
                                                    $now = now();
                                                    $start = \Carbon\Carbon::parse($agenda->tanggal_mulai);
                                                    $end = \Carbon\Carbon::parse($agenda->tanggal_selesai);

                                                    if ($now < $start) {
                                                        $status = 'Akan Datang';
                                                        $color = 'info';
                                                    } elseif ($now >= $start && $now <= $end) {
                                                        $status = 'Sedang Berlangsung';
                                                        $color = 'success';
                                                    } else {
                                                        $status = 'Selesai';
                                                        $color = 'secondary';
                                                    }
                                                @endphp
                                                <span class="badge bg-{{ $color }}">{{ $status }}</span>
                                            </small>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="d-flex gap-3 mt-5 pt-4 border-top">
                                        <a href="{{ route('agenda.edit', $agenda->agenda_id) }}"
                                           class="btn btn-primary">
                                            <i class="bi bi-pencil me-2"></i>Edit Agenda
                                        </a>
                                        <form action="{{ route('agenda.destroy', $agenda->agenda_id) }}"
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')">
                                                <i class="bi bi-trash me-2"></i>Hapus Agenda
                                            </button>
                                        </form>
                                        <a href="{{ route('agenda.index') }}" class="btn btn-outline-secondary ms-auto">
                                            <i class="bi bi-arrow-left me-2"></i>Kembali
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Detail Section-->

        </main>

        <style>
            .date-display {
                min-width: 80px;
            }

            .detail-card {
                background: #f8f9fa;
                transition: all 0.3s ease;
            }

            .detail-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Add any JavaScript functionality if needed
            });
        </script>
    @endsection
</body>

</html>
