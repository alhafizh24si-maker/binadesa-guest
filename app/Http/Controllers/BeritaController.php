<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['status'];

        $query = Berita::with('kategori');

    // Search functionality
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('judul', 'like', '%' . $search . '%')
              ->orWhere('penulis', 'like', '%' . $search . '%')
              ->orWhere('isi_html', 'like', '%' . $search . '%')
              ->orWhere('slug', 'like', '%' . $search . '%');
        });
    }
     if ($request->has('status') && $request->status != '' && $request->status != 'semua') {
            $query->where('status', $request->status);
        }

    $berita = $query->orderBy('created_at', 'desc')->paginate(6);

    // Count statistics
    $publishedCount = Berita::where('status', 'terbit')->count();
    $draftCount = Berita::where('status', 'draft')->count();
    $categoryCount = Berita::distinct('kategori_id')->count('kategori_id');

        return view('pages.berita.index', compact('berita', 'publishedCount', 'draftCount', 'categoryCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategoriberita::all();
        return view('pages.berita.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_berita,kategori_id',
            'judul'       => 'required|string|max:255',
            'isi_html'    => 'required|string',
            'penulis'     => 'required|string|max:100',
            'cover_foto'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'      => 'required|in:draft,terbit',
            'terbit_at'   => 'nullable|date',
        ]);

        // Generate slug from judul
        $slug = Str::slug($request->judul);

        // Check if slug already exists
        $counter      = 1;
        $originalSlug = $slug;
        while (Berita::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $berita              = new Berita();
        $berita->kategori_id = $request->kategori_id;
        $berita->judul       = $request->judul;
        $berita->slug        = $slug;
        $berita->isi_html    = $request->isi_html;
        $berita->penulis     = $request->penulis;
        $berita->status      = $request->status;
        $berita->terbit_at   = $request->terbit_at;

        // Handle cover foto upload
        if ($request->hasFile('cover_foto')) {
            $coverPath          = $request->file('cover_foto')->store('berita/cover', 'public');
            $berita->cover_foto = $coverPath;
        }

        $berita->save();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berita   = Berita::findOrFail($id);
        $kategori = KategoriBerita::all();
        return view('pages.berita.edit', compact('berita', 'kategori')); // PERBAIKAN: tambah 'pages.'
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_berita,kategori_id',
            'judul'       => 'required|string|max:255',
            'isi_html'    => 'required|string',
            'penulis'     => 'required|string|max:100',
            'cover_foto'  => 'nullable|file|max:102400', // Terima semua jenis file
            'status'      => 'required|in:draft,terbit',
            'terbit_at'   => 'nullable|date',
        ], [
            'cover_foto.file' => 'File harus berupa file yang valid',
            'cover_foto.max'  => 'Ukuran file maksimal 100 MB',
        ]);

        $berita = Berita::findOrFail($id);

        // Generate slug from judul if judul changed
        if ($berita->judul != $request->judul) {
            $slug = Str::slug($request->judul);

            // Check if slug already exists
            $counter      = 1;
            $originalSlug = $slug;
            while (Berita::where('slug', $slug)->where('berita_id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            $berita->slug = $slug;
        }

        $berita->kategori_id = $request->kategori_id;
        $berita->judul       = $request->judul;
        $berita->isi_html    = $request->isi_html;
        $berita->penulis     = $request->penulis;
        $berita->status      = $request->status;

        // Set terbit_at berdasarkan status
        if ($request->status == 'terbit' && ! $berita->terbit_at) {
            $berita->terbit_at = $request->terbit_at ?: now();
        } else {
            $berita->terbit_at = $request->terbit_at;
        }

        // Handle cover foto upload
        if ($request->hasFile('cover_foto')) {
            // Delete old cover foto if exists
            if ($berita->cover_foto && Storage::disk('public')->exists($berita->cover_foto)) {
                Storage::disk('public')->delete($berita->cover_foto);
            }

            $coverPath          = $request->file('cover_foto')->store('berita/cover', 'public');
            $berita->cover_foto = $coverPath;
        }

        $berita->save();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Delete cover foto if exists
        if ($berita->cover_foto && Storage::disk('public')->exists($berita->cover_foto)) {
            Storage::disk('public')->delete($berita->cover_foto);
        }

        $berita->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
