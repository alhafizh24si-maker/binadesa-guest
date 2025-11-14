<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriberitaController extends Controller
{
    public function index()
    {
    $kategoriberita = KategoriBerita::withCount('berita')->latest()->paginate(9);

    return view('pages.kategoriberita.index', compact('kategoriberita'));
    }

    public function create()
    {
        return view('pages.kategoriberita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100', // PERBAIKAN: 'nama' bukan 'name'
            'deskripsi' => 'nullable|string'
        ]);

        // Generate slug dari nama
        $slug = Str::slug($request->nama);
        $counter = 1;
        $originalSlug = $slug;
        while (KategoriBerita::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        KategoriBerita::create([
            'nama' => $request->nama,
            'slug' => $slug,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('kategoriberita.index')
            ->with('success', 'Kategori berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategoriberita = KategoriBerita::findOrFail($id);
        return view('pages.kategoriberita.edit', compact('kategoriberita'));
    }

    public function update(Request $request, $id)
    {
        $kategoriberita = KategoriBerita::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100', // PERBAIKAN: 'nama' bukan 'name'
            'deskripsi' => 'nullable|string'
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ];

        // Update slug jika nama berubah
        if ($kategoriberita->nama != $request->nama) {
            $slug = Str::slug($request->nama);
            $counter = 1;
            $originalSlug = $slug;
            while (KategoriBerita::where('slug', $slug)->where('kategori_id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            $data['slug'] = $slug;
        }

        $kategoriberita->update($data);

        return redirect()->route('kategoriberita.index')
            ->with('success', 'Kategori berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategoriberita = KategoriBerita::findOrFail($id);

        // Cek apakah kategori memiliki berita
        if ($kategoriberita->berita()->count() > 0) {
            return redirect()->route('kategoriberita.index')
                ->with('error', 'Tidak dapat menghapus kategori karena masih memiliki berita terkait.');
        }

        $kategoriberita->delete();

        return redirect()->route('kategoriberita.index')
            ->with('success', 'Kategori berita berhasil dihapus!');
    }
}
