<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateBeritaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID'); // Pastikan 'id_ID'

        $kategoriIds = DB::table('kategori_berita')->pluck('kategori_id');

        foreach (range(1, 100) as $index) {
            $judul = $this->generateSimpleTitle($faker);
            $kategoriId = $faker->randomElement($kategoriIds);
            $status = $faker->randomElement(['draft', 'terbit']);

            DB::table('berita')->insert([
                'kategori_id' => $kategoriId,
                'judul' => $judul,
                'slug' => Str::slug($judul) . '-' . Str::random(5),
                'isi_html' => $this->generateSimpleContent($faker),
                'penulis' => $faker->name,
                'cover_foto' => $faker->randomElement([null, 'cover-' . $faker->word . '.jpg']),
                'status' => $status,
                'terbit_at' => $status === 'terbit' ? $faker->dateTimeBetween('-1 year', 'now') : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    private function generateSimpleTitle($faker)
    {
        $titles = [
            'Perkembangan Teknologi {} di Indonesia',
            '{} Terbaru: {} yang Perlu Diketahui',
            'Tips {} untuk Pemula',
            '{} Meningkat di Tahun {}',
            'Inovasi {} di Era Digital',
            '{}: Solusi untuk {}',
            'Tren {} yang Populer di {}',
        ];

        $words1 = ['AI', 'Blockchain', 'IoT', 'Cloud Computing', 'Big Data', 'Cybersecurity', 'Digital Marketing', 'E-commerce'];
        $words2 = ['2023', '2024', 'Era Digital', 'Masa Depan', 'Indonesia', 'Global'];
        $words3 = ['Startup', 'Bisnis', 'Pendidikan', 'Kesehatan', 'Olahraga', 'Hiburan'];

        $template = $faker->randomElement($titles);
        $title = str_replace(
            ['{}'],
            [$faker->randomElement($words1)],
            $template
        );

        return $title;
    }

    /**
     * Generate konten sederhana
     */
    private function generateSimpleContent($faker)
    {
        $content = '';

        // 4-6 paragraphs
        for ($i = 0; $i < $faker->numberBetween(4, 6); $i++) {
            $content .= '<p>' . $faker->paragraph(8) . '</p>';
        }

        return $content;
    }
}

