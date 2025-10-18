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
        return view('guest.kategoriberita.index', compact('kategoriBerita'));
    }

    public function create()
    {
        return view('guest.kategoriberita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'deskripsi' => 'nullable|string'
        ]);

        Kategoriberita::create($validated);

        return redirect()->route('kategoriberita.index')
                        ->with('success', 'Kategori berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = Kategoriberita::findOrFail($id);
        return view('guest.kategoriberita.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:120|unique:kategoriberita,slug,' . $id . ',kategori_id',
            'deskripsi' => 'nullable|string'
        ]);

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
