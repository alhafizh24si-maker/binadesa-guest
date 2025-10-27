<?php

namespace App\Http\Controllers;

use App\Models\Kategoriberita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriberitaController extends Controller
{
    public function index()
    {
        $kategoriBerita = Kategoriberita::orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'title' => 'Kategori Berita',
            'kategoriBerita' => $kategoriBerita
        ];

        return view('guest.kategoriberita.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kategori Berita'
        ];

        return view('guest.kategoriberita.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'deskripsi' => 'nullable|string'
        ]);

        // Generate slug dari name
        $validated['slug'] = Str::slug($validated['name']);

        Kategoriberita::create($validated);

        return redirect()->route('kategoriberita.index')
                        ->with('success', 'Kategori berita berhasil ditambahkan!');
    }

    public function show($id)
    {
        $kategori = Kategoriberita::findOrFail($id);
        $data = [
            'title' => 'Detail Kategori Berita',
            'kategori' => $kategori
        ];

        return view('guest.kategoriberita.show', $data);
    }

    public function edit($id)
    {
        $kategori = Kategoriberita::findOrFail($id);
        $data = [
            'title' => 'Edit Kategori Berita',
            'kategori' => $kategori
        ];

        return view('guest.kategoriberita.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'deskripsi' => 'nullable|string'
        ]);

        // Generate slug dari name
        $validated['slug'] = Str::slug($validated['name']);

        $kategori = Kategoriberita::findOrFail($id);
        $kategori->update($validated);

        return redirect()->route('kategoriberita.index')
                        ->with('success', 'Kategori berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = Kategoriberita::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategoriberita.index')
                        ->with('success', 'Kategori berita berhasil dihapus!');
    }
}
