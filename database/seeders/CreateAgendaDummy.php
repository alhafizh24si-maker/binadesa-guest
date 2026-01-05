<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateAgendaDummy extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // Array judul agenda
        $judulAgenda = [
            'Seminar Nasional Pendidikan Karakter',
            'Workshop Kewirausahaan Digital',
            'Pelatihan Public Speaking',
            'Webinar Kesehatan Mental',
            'Lomba Debat Mahasiswa Nasional',
            'Konferensi Ilmiah Internasional',
            'Pelatihan Pembuatan Konten Kreatif',
            'Workshop Pengembangan Website',
            'Seminar Parenting Modern',
            'Pelatihan Leadership dan Manajemen',
            'Webinar Investasi dan Keuangan',
            'Workshop Desain Grafis',
            'Seminar Teknologi dan Inovasi',
            'Pelatihan Jurnalistik',
            'Workshop Fotografi Profesional',
            'Seminar Lingkungan Hidup',
            'Pelatihan Pengolahan Data',
            'Webinar Digital Marketing',
            'Workshop Menulis Kreatif',
            'Seminar Hukum dan Hak Asasi Manusia'
        ];

        // Array lokasi
        $lokasi = [
            'Aula Utama Universitas',
            'Gedung Serba Guna Kampus',
            'Ruang Seminar Fakultas Teknik',
            'Auditorium Pusat',
            'Lapangan Kampus Barat',
            'Hotel Grand Mercure Ballroom',
            'Convention Hall City',
            'Ruang Rapat Rektorat',
            'Online via Zoom Meeting',
            'Hybrid: Online & Offline',
            'Gedung Student Center',
            'Perpustakaan Pusat',
            'Laboratorium Komputer',
            'Hall Fakultas Ekonomi',
            'Ruang Multimedia',
            'Taman Kampus',
            'Gedung Olahraga',
            'Ruang Theater',
            'Cafe Kampus',
            'Lapangan Upacara'
        ];

        // Array penyelenggara
        $penyelenggara = [
            'Fakultas Teknik',
            'Fakultas Ekonomi dan Bisnis',
            'Himpunan Mahasiswa Teknik',
            'UKM Penalaran dan Riset',
            'Dinas Pendidikan',
            'Kementerian Riset dan Teknologi',
            'Alumni Association',
            'Student Center',
            'International Office',
            'Fakultas Kedokteran',
            'Program Studi Sistem Informasi',
            'UKM Olahraga',
            'BEM Universitas',
            'Fakultas Hukum',
            'Pusat Karir dan Kewirausahaan',
            'Fakultas Psikologi',
            'Program Studi Ilmu Komputer',
            'UKM Seni dan Budaya',
            'Fakultas Pertanian',
            'Lembaga Pengembangan Pendidikan'
        ];

        // Array tema untuk deskripsi
        $temaDeskripsi = [
            'Teknologi dan Inovasi',
            'Pendidikan Karakter',
            'Kewirausahaan',
            'Kesehatan dan Kebugaran',
            'Lingkungan Hidup',
            'Seni dan Budaya',
            'Hukum dan Sosial',
            'Ekonomi Digital',
            'Pengembangan Diri',
            'Penelitian dan Sains',
            'Kepemimpinan',
            'Komunikasi',
            'Kreativitas',
            'Teknologi Informasi',
            'Manajemen Bisnis',
            'Psikologi',
            'Pertanian Modern',
            'Kedokteran',
            'Arsitektur',
            'Sastra dan Bahasa'
        ];

        // Array kegiatan detail
        $kegiatanDetail = [
            'Pemaparan materi oleh ahli di bidangnya',
            'Sesi diskusi interaktif',
            'Workshop praktik langsung',
            'Demo dan simulasi',
            'Sharing session dengan praktisi',
            'Q&A dengan pembicara',
            'Networking session',
            'Pameran karya dan produk',
            'Kompetisi dan lomba',
            'Penandatanganan kerjasama',
            'Launching produk baru',
            'Pelatihan sertifikasi',
            'Konsultasi individu',
            'Kunjungan lapangan',
            'Presentasi hasil penelitian',
            'FGD (Focus Group Discussion)',
            'Pelatihan soft skills',
            'Mentoring program',
            'Job fair dan rekrutmen',
            'Expo dan bazaar'
        ];

        // Array kata untuk deskripsi
        $kataDeskripsi = [
            'meningkatkan', 'mengembangkan', 'memperkuat', 'membina', 'mengoptimalkan',
            'memberdayakan', 'melatih', 'membimbing', 'menginspirasi', 'mentransformasi',
            'inovasi', 'kreativitas', 'kompetensi', 'skill', 'pengetahuan',
            'pengalaman', 'wawasan', 'pemahaman', 'kemampuan', 'keahlian',
            'peserta', 'mahasiswa', 'dosen', 'praktisi', 'profesional',
            'masyarakat', 'publik', 'komunitas', 'akademisi', 'peneliti'
        ];

        // Clear existing data
        DB::table('agenda')->truncate();

        // Generate 30 data dummy
        for ($i = 1; $i <= 30; $i++) {
            // Generate tanggal mulai (acak dalam 6 bulan ke depan)
            $hariAcak = rand(1, 180); // 1-180 hari ke depan
            $jamAcak = rand(8, 16); // jam 8-16
            $menitAcak = rand(0, 3) * 15; // 0, 15, 30, atau 45 menit

            $tanggalMulai = Carbon::now()
                ->addDays($hariAcak)
                ->setTime($jamAcak, $menitAcak, 0);

            // Generate tanggal selesai (1-6 jam setelah mulai)
            $durasiJam = rand(1, 6);
            $tanggalSelesai = (clone $tanggalMulai)->addHours($durasiJam);

            // Random judul
            $judul = $judulAgenda[array_rand($judulAgenda)];

            // Random lokasi
            $lokasiTerpilih = $lokasi[array_rand($lokasi)];

            // Random penyelenggara
            $penyelenggaraTerpilih = $penyelenggara[array_rand($penyelenggara)];

            // Generate deskripsi yang lebih variatif
            $tema = $temaDeskripsi[array_rand($temaDeskripsi)];
            $kegiatan = $kegiatanDetail[array_rand($kegiatanDetail)];
            $kata1 = $kataDeskripsi[array_rand($kataDeskripsi)];
            $kata2 = $kataDeskripsi[array_rand($kataDeskripsi)];
            $target = ['peserta', 'mahasiswa', 'masyarakat umum', 'dosen', 'praktisi'][array_rand(['peserta', 'mahasiswa', 'masyarakat umum', 'dosen', 'praktisi'])];

            $deskripsi = "Acara ini bertujuan untuk {$kata1} {$kata2} {$target} dalam bidang {$tema}. "
                . "Kegiatan ini akan mencakup {$kegiatan}. "
                . "Diharapkan dengan adanya acara ini dapat memberikan manfaat dan kontribusi positif bagi pengembangan kompetensi peserta. "
                . "Acara terbuka untuk {$target} yang berminat dalam bidang terkait.";

            // Generate nama file poster (70% punya poster, 30% tidak)
            $punyaPoster = rand(1, 10) <= 7; // 70% probability
            $posterDokumen = null;

            if ($punyaPoster) {
                $jenisPoster = ['poster', 'banner', 'flyer', 'brochure'][array_rand(['poster', 'banner', 'flyer', 'brochure'])];
                $posterDokumen = "{$jenisPoster}_" . Str::slug($judul) . "_" . $i . ".jpg";
            }

            // Format waktu untuk display
            $formatWaktu = $tanggalMulai->format('d F Y, H:i') . ' - ' . $tanggalSelesai->format('H:i');

            DB::table('agenda')->insert([
                'judul' => $judul,
                'lokasi' => $lokasiTerpilih,
                'tanggal_mulai' => $tanggalMulai,
                'tanggal_selesai' => $tanggalSelesai,
                'penyelenggara' => $penyelenggaraTerpilih,
                'deskripsi' => $deskripsi,
                'poster_dokumen' => $posterDokumen,
                'created_at' => $faker->dateTimeBetween('-3 months', 'now'),
                'updated_at' => now(),
            ]);

            // Progress indicator
            if ($i % 5 == 0) {
                $this->command->info("Generated $i/30 data agenda: \"$judul\"");
                $this->command->info("   Waktu: $formatWaktu");
                $this->command->info("   Lokasi: $lokasiTerpilih");
                $this->command->line("");
            }
        }

        $this->command->info('✅ 30 data agenda dummy berhasil dibuat!');
        $this->command->info('📅 Agenda tersebar dalam 6 bulan ke depan');
        $this->command->info('📍 Lokasi: Kampus, Hotel, dan Online');
        $this->command->info('🎯 Penyelenggara: Berbagai fakultas dan organisasi');
    }
}
