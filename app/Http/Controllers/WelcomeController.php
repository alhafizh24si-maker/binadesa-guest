<?php
// app/Http/Controllers/WelcomeController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Passing data sederhana ke view welcome
        $data = [
            'title' => 'Welcome to Profil',
            'subtitle' => 'Sistem Informasi Desa Digital',
            'features' => [
                'Profil Desa Lengkap',
                'Informasi Wilayah',
                'Visi dan Misi Desa',
                'Data Kontak'
            ],
            'button_text' => 'Lihat Profil Desa',
            'welcome_message' => 'Selamat datang di portal informasi desa kami. Mari mengenal lebih dekat tentang desa kita.'
        ];

        return view('welcome', $data);
    }

    public function profil()
    {
        $profil = [
            'nama_desa' => 'Binadesa',
            'kecamatan' => 'Rumbai',
            'kabupaten' => 'Pekanbaru',
            'provinsi' => 'Riau',
            'alamat_kantor' => 'Jl. Binadesa No. 123',
            'email' => 'Binadesa@example.com',
            'telepon' => '0761-123456',
            'visi' => 'Terwujudnya Desa Mekar Jaya yang Maju, Mandiri, dan Sejahtera',
            'misi' =>
            '1. Meningkatkan pelayanan publik
             2. Mengembangkan potensi desa
             3. Memperkuat gotong royong'
        ];
        return view('profil', compact('profil'));
    }
}
