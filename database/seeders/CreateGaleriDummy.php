<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateGaleriDummy extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // Array kategori galeri untuk judul
        $kategoriGaleri = [
            'Wisuda', 'Seminar', 'Workshop', 'Pelatihan', 'Webinar',
            'Lomba', 'Festival', 'Pameran', 'Kunjungan', 'Ekspedisi',
            'Penelitian', 'Outbound', 'Kegiatan Sosial', 'Bakti Sosial',
            'Pertandingan', 'Turnamen', 'Perayaan', 'HUT', 'Dies Natalis',
            'Ekskul', 'UKM', 'BEM', 'Himpunan', 'Fakultas', 'Jurusan',
            'Kampus', 'Alumni', 'Mahasiswa Baru', 'Wisudawan', 'Dosen'
        ];

        // Array tema untuk judul detail
        $temaDetail = [
            'Nasional', 'Internasional', 'Tahunan', 'Semester', 'Bulanan',
            'Mingguan', 'Harian', 'Akademik', 'Non-Akademik', 'Formal',
            'Informal', 'Tradisional', 'Modern', 'Digital', 'Klasik',
            'Kontemporer', 'Inovatif', 'Kreatif', 'Edukatif', 'Inspiratif',
            'Motivasi', 'Karir', 'Kewirausahaan', 'Teknologi', 'Sains',
            'Seni', 'Budaya', 'Olahraga', 'Kesehatan', 'Lingkungan'
        ];

        // Array kata untuk judul
        $kataJudul = [
            'Kegiatan', 'Acara', 'Momen', 'Event', 'Peristiwa',
            'Aktivitas', 'Program', 'Proyek', 'Inisiatif', 'Gerakan',
            'Karya', 'Hasil', 'Produk', 'Kreasi', 'Inovasi',
            'Pencapaian', 'Prestasi', 'Keberhasilan', 'Penghargaan', 'Sertifikasi',
            'Kolaborasi', 'Kerjasama', 'Kemitraan', 'Sinergi', 'Partisipasi',
            'Pengabdian', 'Dedikasi', 'Kontribusi', 'Peran', 'Fungsi'
        ];

        // Array lokasi untuk deskripsi
        $lokasi = [
            'di Kampus Utama', 'di Gedung Serba Guna', 'di Auditorium Pusat',
            'di Lapangan Kampus', 'di Ruang Seminar', 'secara Online',
            'di Hotel Grand Mercure', 'di Convention Hall', 'di Student Center',
            'di Perpustakaan', 'di Laboratorium', 'di Taman Kampus',
            'di Gedung Olahraga', 'di Teater Terbuka', 'di Cafe Kampus',
            'di Ruang Kelas', 'di Hall Fakultas', 'di Lobi Utama',
            'di Ruang Pameran', 'di Area Publik', 'di Pusat Kota',
            'di Lokasi Bersejarah', 'di Alam Terbuka', 'di Pantai',
            'di Gunung', 'di Desa Wisata', 'di Pusat Perbelanjaan',
            'di Museum', 'di Galeri Seni', 'di Ruang Konferensi'
        ];

        // Array waktu untuk deskripsi
        $waktu = [
            'tahun lalu', 'semester lalu', 'beberapa bulan yang lalu',
            'bulan lalu', 'minggu lalu', 'akhir pekan lalu',
            'hari ini', 'kemarin', 'beberapa hari yang lalu',
            'pada periode akademik sebelumnya', 'pada tahun ajaran baru',
            'selama liburan semester', 'pada musim panas',
            'pada musim hujan', 'pada pagi hari', 'pada siang hari',
            'pada sore hari', 'pada malam hari', 'sepanjang hari',
            'selama seminggu penuh', 'selama dua hari berturut-turut',
            'selama tiga hari', 'dalam satu bulan', 'dalam satu semester'
        ];

        // Array peserta untuk deskripsi
        $peserta = [
            'mahasiswa', 'dosen', 'staff', 'alumni', 'masyarakat umum',
            'pelajar', 'profesional', 'praktisi', 'peneliti', 'akademisi',
            'industri', 'pemerintah', 'LSM', 'komunitas', 'organisasi',
            'perusahaan', 'instansi', 'lembaga', 'asosiasi', 'jaringan',
            'mitra', 'kolaborator', 'sponsor', 'donatur', 'relawan',
            'peserta', 'delegasi', 'perwakilan', 'anggota', 'pengurus'
        ];

        // Array kata kerja untuk deskripsi
        $kataKerja = [
            'mengikuti', 'menyelenggarakan', 'mengadakan', 'mengorganisir',
            'mengkoordinasi', 'mengelola', 'mengawasi', 'memandu',
            'membimbing', 'melatih', 'mengajar', 'berbagi',
            'mempresentasikan', 'mendemonstrasikan', 'memamerkan',
            'menampilkan', 'mempertunjukkan', 'memperkenalkan',
            'mempromosikan', 'mempublikasikan', 'mendokumentasikan',
            'merekam', 'mengabadikan', 'menangkap', 'menggambarkan',
            'mendeskripsikan', 'menjelaskan', 'menerangkan', 'membahas',
            'mendiskusikan', 'mengeksplorasi', 'meneliti', 'menganalisis',
            'mengevaluasi', 'menilai', 'mengukur', 'menguji', 'mencoba',
            'mengembangkan', 'meningkatkan', 'memperbaiki', 'memperkuat',
            'memperdalam', 'memperluas', 'memperkaya', 'memperbaharui',
            'memodernisasi', 'mentransformasi', 'merevolusi', 'menginovasi'
        ];

        // Array hasil untuk deskripsi
        $hasil = [
            'pengetahuan baru', 'keterampilan praktis', 'pengalaman berharga',
            'jaringan profesional', 'koneksi bisnis', 'kerjasama baru',
            'proyek kolaborasi', 'penelitian lanjutan', 'publikasi ilmiah',
            'produk inovatif', 'layanan baru', 'program berkelanjutan',
            'komunitas aktif', 'forum diskusi', 'platform online',
            'website khusus', 'aplikasi mobile', 'alat digital',
            'prototipe', 'model konsep', 'rancangan awal', 'dokumen strategis',
            'rencana aksi', 'roadmap pengembangan', 'blueprint implementasi',
            'guidelines', 'standar operasional', 'prosedur baku',
            'sertifikasi', 'akreditasi', 'penghargaan', 'trophy',
            'sertifikat', 'piagam', 'plakat', 'medali', 'piala',
            'hadiah', 'grant', 'funding', 'sponsorship', 'dukungan dana'
        ];

        // Clear existing data
        DB::table('galeri')->truncate();

        // Generate 30 data dummy
        for ($i = 1; $i <= 30; $i++) {
            // Generate judul galeri
            $kategori = $kategoriGaleri[array_rand($kategoriGaleri)];
            $tema = $temaDetail[array_rand($temaDetail)];
            $kata = $kataJudul[array_rand($kataJudul)];

            // Variasi format judul
            $formatJudul = rand(1, 5);
            switch($formatJudul) {
                case 1:
                    $judul = "Galeri {$kategori} {$tema}";
                    break;
                case 2:
                    $judul = "Foto {$kategori} Tahun " . date('Y', strtotime('-' . rand(0, 3) . ' years'));
                    break;
                case 3:
                    $judul = "Dokumentasi {$kata} {$kategori}";
                    break;
                case 4:
                    $judul = "Album {$kategori} {$tema} " . date('Y');
                    break;
                default:
                    $judul = "Kumpulan Foto {$kategori} dan {$tema}";
            }

            // Generate deskripsi yang variatif dan natural
            $lokasiTerpilih = $lokasi[array_rand($lokasi)];
            $waktuTerpilih = $waktu[array_rand($waktu)];
            $pesertaTerpilih = $peserta[array_rand($peserta)];
            $kataKerjaTerpilih = $kataKerja[array_rand($kataKerja)];
            $hasilTerpilih = $hasil[array_rand($hasil)];

            // Variasi panjang deskripsi
            $panjangDeskripsi = rand(1, 3);

            $deskripsi = "";
            if ($panjangDeskripsi >= 1) {
                $deskripsi .= "Galeri ini menampilkan foto-foto dokumentasi dari kegiatan {$kategori} yang dilaksanakan {$lokasiTerpilih} {$waktuTerpilih}. ";
            }

            if ($panjangDeskripsi >= 2) {
                $deskripsi .= "Kegiatan ini diikuti oleh berbagai {$pesertaTerpilih} yang {$kataKerjaTerpilih} berbagai aspek terkait {$kategori}. ";
            }

            if ($panjangDeskripsi >= 3) {
                $deskripsi .= "Hasil dari kegiatan ini antara lain berupa {$hasilTerpilih} yang dapat dimanfaatkan untuk pengembangan lebih lanjut. ";
                $deskripsi .= "Foto-foto dalam galeri ini merekam momen-momen berharga selama pelaksanaan kegiatan.";
            }

            // Tambahkan kalimat penutup untuk yang pendek
            if ($panjangDeskripsi == 1) {
                $deskripsi .= "Dokumentasi visual ini menjadi bukti nyata dari komitmen dan dedikasi semua pihak yang terlibat.";
            }

            // Random created_at dalam 2 tahun terakhir
            $daysAgo = rand(1, 730); // 1-730 hari yang lalu (2 tahun)
            $createdAt = Carbon::now()->subDays($daysAgo);

            // Updated_at lebih baru dari created_at (optional)
            $updatedDaysAgo = rand(0, $daysAgo);
            $updatedAt = Carbon::now()->subDays($updatedDaysAgo);

            DB::table('galeri')->insert([
                'judul' => $judul,
                'deskripsi' => $deskripsi,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ]);

            // Progress indicator dengan styling yang menarik
            if ($i % 5 == 0) {
                $icon = ['📷', '🖼️', '📸', '🎞️', '📽️'][($i/5-1) % 5];
                $this->command->info("{$icon} Generated $i/30 data galeri");
                $this->command->line("   📝 <comment>Judul:</comment> {$judul}");

                // Potong deskripsi jika terlalu panjang
                $deskripsiPendek = Str::limit($deskripsi, 80);
                $this->command->line("   📄 <comment>Deskripsi:</comment> {$deskripsiPendek}");

                $tanggal = $createdAt->format('d M Y');
                $this->command->line("   📅 <comment>Dibuat:</comment> {$tanggal}");
                $this->command->line("");
            }
        }

        // Summary dengan emoji yang menarik
        $this->command->info('🎉 30 data galeri dummy berhasil dibuat!');
        $this->command->info('📊 <comment>Statistik Data:</comment>');
        $this->command->info('   📷 <comment>Total Galeri:</comment> 30 album foto');
        $this->command->info('   🗓️ <comment>Rentang Waktu:</comment> 2 tahun terakhir');
        $this->command->info('   🏷️ <comment>Kategori:</comment> Wisuda, Seminar, Workshop, dll.');
        $this->command->info('   📝 <comment>Deskripsi:</comment> Variatif (1-3 paragraf)');
        $this->command->line("");
        $this->command->info('🚀 <comment>Data siap digunakan!</comment>');
        $this->command->info('   Jalankan: <question>php artisan db:seed --class=CreateGaleriDummySeeder</question>');
    }
}
