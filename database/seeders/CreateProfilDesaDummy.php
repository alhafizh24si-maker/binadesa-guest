<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateProfilDesaDummy extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // Array provinsi di Indonesia
        $provinsi = [
            'Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Jambi',
            'Sumatera Selatan', 'Bengkulu', 'Lampung', 'Kepulauan Bangka Belitung',
            'Kepulauan Riau', 'DKI Jakarta', 'Jawa Barat', 'Jawa Tengah',
            'DI Yogyakarta', 'Jawa Timur', 'Banten', 'Bali',
            'Nusa Tenggara Barat', 'Nusa Tenggara Timur', 'Kalimantan Barat',
            'Kalimantan Tengah', 'Kalimantan Selatan', 'Kalimantan Timur',
            'Kalimantan Utara', 'Sulawesi Utara', 'Sulawesi Tengah',
            'Sulawesi Selatan', 'Sulawesi Tenggara', 'Gorontalo',
            'Sulawesi Barat', 'Maluku', 'Maluku Utara', 'Papua Barat', 'Papua'
        ];

        // Array kabupaten per provinsi
        $kabupaten = [
            // Aceh
            'Aceh Besar', 'Banda Aceh', 'Sabang', 'Lhokseumawe', 'Langsa', 'Subulussalam',

            // Sumatera Utara
            'Medan', 'Binjai', 'Tebing Tinggi', 'Pematang Siantar', 'Tanjung Balai', 'Sibolga',

            // Sumatera Barat
            'Padang', 'Bukittinggi', 'Payakumbuh', 'Solok', 'Padang Panjang', 'Sawahlunto',

            // Riau
            'Pekanbaru', 'Dumai', 'Siak', 'Bengkalis', 'Rokan Hilir', 'Pelalawan',

            // Jawa Barat
            'Bandung', 'Bogor', 'Depok', 'Bekasi', 'Cimahi', 'Tasikmalaya', 'Cirebon', 'Sukabumi',

            // Jawa Tengah
            'Semarang', 'Surakarta', 'Salatiga', 'Pekalongan', 'Tegal', 'Magelang',

            // Jawa Timur
            'Surabaya', 'Malang', 'Sidoarjo', 'Mojokerto', 'Pasuruan', 'Probolinggo',

            // Bali
            'Denpasar', 'Badung', 'Gianyar', 'Tabanan', 'Bangli', 'Klungkung',

            // Sulawesi Selatan
            'Makassar', 'Parepare', 'Palopo', 'Bulukumba', 'Bantaeng', 'Jeneponto',

            // Papua
            'Jayapura', 'Merauke', 'Biak Numfor', 'Nabire', 'Mimika', 'Puncak Jaya'
        ];

        // Array kecamatan
        $kecamatan = [
            'Tengah', 'Utara', 'Selatan', 'Timur', 'Barat', 'Pusat', 'Indah', 'Sejahtera',
            'Makmur', 'Bahagia', 'Jaya', 'Mulyo', 'Sari', 'Asri', 'Baru', 'Lama', 'Mekar',
            'Permai', 'Damai', 'Sentosa', 'Raya', 'Agung', 'Mulya', 'Lestari', 'Abadi',
            'Kembang', 'Mawar', 'Melati', 'Kenanga', 'Cempaka'
        ];

        // Array prefix nama desa
        $prefixDesa = [
            'Suka', 'Maju', 'Harapan', 'Mekar', 'Bumi', 'Tirta', 'Cempaka', 'Melati',
            'Kenanga', 'Flamboyan', 'Bougenville', 'Anggrek', 'Mawar', 'Kamboja', 'Seroja',
            'Teratai', 'Lotus', 'Sakura', 'Tulip', 'Lavender', 'Matahari', 'Bulan', 'Bintang',
            'Pelangi', 'Mendung', 'Hujan', 'Angin', 'Ombak', 'Pantai', 'Gunung'
        ];

        // Array suffix nama desa
        $suffixDesa = [
            'Maju', 'Jaya', 'Sari', 'Ayem', 'Kencana', 'Putih', 'Indah', 'Asri', 'Sejahtera',
            'Makmur', 'Bahagia', 'Sentosa', 'Damai', 'Lestari', 'Abadi', 'Permai', 'Mulia',
            'Agung', 'Raya', 'Utama', 'Berseri', 'Gemilang', 'Cemerlang', 'Bersinar', 'Cahaya'
        ];

        // Array nama jalan untuk alamat
        $namaJalan = [
            'Merdeka', 'Diponegoro', 'Sudirman', 'Thamrin', 'Gatot Subroto', 'Ahmad Yani',
            'Pahlawan', 'Veteran', 'Kartini', 'Imam Bonjol', 'Sisingamangaraja', 'Sam Ratulangi',
            'Wahidin', 'Hayam Wuruk', 'Gajah Mada', 'Malioboro', 'Asia Afrika', 'Juanda',
            'HOS Cokroaminoto', 'Teuku Umar', 'Cut Nyak Dien', 'Raden Saleh', 'Ki Hajar Dewantara'
        ];

        // Array visi desa
        $visi = [
            'Mewujudkan desa yang mandiri, sejahtera, dan berbudaya',
            'Menjadikan desa sebagai pusat ekonomi kreatif yang berdaya saing',
            'Membangun desa yang religius, maju, dan bermartabat',
            'Menciptakan desa yang bersih, hijau, dan nyaman untuk ditinggali',
            'Mengembangkan desa sebagai destinasi wisata berbasis budaya lokal',
            'Mewujudkan masyarakat desa yang sehat, cerdas, dan produktif',
            'Membangun tata kelola pemerintahan desa yang transparan dan akuntabel',
            'Menciptakan kemandirian ekonomi desa melalui pemberdayaan UMKM',
            'Mewujudkan desa yang ramah lingkungan dan berkelanjutan',
            'Membangun infrastruktur desa yang memadai dan merata',
            'Mengembangkan desa berbasis teknologi dan inovasi',
            'Mewujudkan desa yang aman, tertib, dan damai',
            'Menciptakan pemerataan pembangunan dan kesejahteraan masyarakat',
            'Membangun karakter masyarakat desa yang berakhlak mulia',
            'Mengoptimalkan potensi sumber daya alam untuk kesejahteraan bersama'
        ];

        // Array misi desa
        $misi = [
            'Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan',
            'Mengembangkan potensi ekonomi lokal melalui pemberdayaan masyarakat',
            'Membangun infrastruktur dasar yang memadai untuk kesejahteraan masyarakat',
            'Meningkatkan pelayanan publik yang cepat, tepat, dan akuntabel',
            'Melestarikan budaya dan kearifan lokal sebagai identitas desa',
            'Mengoptimalkan pengelolaan sumber daya alam secara berkelanjutan',
            'Meningkatkan kualitas kesehatan masyarakat melalui program preventif dan kuratif',
            'Mengembangkan pariwisata berbasis masyarakat dan lingkungan',
            'Meningkatkan ketahanan pangan melalui pengembangan pertanian organik',
            'Membangun kemitraan dengan berbagai pihak untuk percepatan pembangunan',
            'Mengembangkan teknologi informasi untuk tata kelola desa yang modern',
            'Meningkatkan partisipasi masyarakat dalam pembangunan desa',
            'Mengembangkan usaha mikro, kecil, dan menengah (UMKM) desa',
            'Meningkatkan akses pendidikan berkualitas bagi seluruh warga',
            'Mengembangkan sistem keamanan dan ketertiban masyarakat desa'
        ];

        // Clear existing data
        DB::table('profil')->truncate();

        // Generate 100 data dummy
        for ($i = 1; $i <= 20; $i++) {
            $prov = $provinsi[array_rand($provinsi)];
            $kab = $kabupaten[array_rand($kabupaten)];
            $kec = $kecamatan[array_rand($kecamatan)];

            // Generate nama desa
            $prefix = $prefixDesa[array_rand($prefixDesa)];
            $suffix = $suffixDesa[array_rand($suffixDesa)];
            $namaDesa = $prefix . ' ' . $suffix;

            // Generate email unik
            $emailSlug = Str::slug($namaDesa, '');
            $email = strtolower($emailSlug) . $i . '@desa.id';

            // Generate nomor urut desa
            $nomorUrut = str_pad($i, 3, '0', STR_PAD_LEFT);

            DB::table('profil')->insert([
                'nama_desa' => 'Desa ' . $namaDesa . ' ' . $nomorUrut,
                'kecamatan' => 'Kecamatan ' . $kec,
                'kabupaten' => 'Kabupaten ' . $kab,
                'provinsi' => 'Provinsi ' . $prov,
                'alamat_kantor' => 'Jl. ' . $namaJalan[array_rand($namaJalan)] .
                                   ' No. ' . rand(1, 200) .
                                   ', RT ' . rand(1, 10) . '/RW ' . rand(1, 10),
                'email' => $email,
                'telepon' => '08' . rand(11, 99) . rand(10000000, 99999999),
                'visi' => $visi[array_rand($visi)],
                'misi' => $misi[array_rand($misi)],
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);

            // Progress indicator
            if ($i % 10 == 0) {
                $this->command->info("Generated $i/100 data profil desa...");
            }
        }

        $this->command->info('✅ 100 data profil desa berhasil dibuat!');
    }
}
