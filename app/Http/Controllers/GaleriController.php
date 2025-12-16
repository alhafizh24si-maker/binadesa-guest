<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Gunakan scope seperti di Agenda
        $filterableColumns = []; // Tambahkan kolom filter jika ada
        $searchableColumns = ['judul', 'deskripsi'];

        $data['dataGaleri'] = Galeri::filter($request, $filterableColumns)
            ->search($request, $searchableColumns)
            ->with(['media' => function($query) {
                $query->where('ref_table', 'galeri')
                      ->orderBy('sort_order');
            }])
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pages.galeri.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'required|array',
            'foto.*' => 'image|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB max
        ]);

        // Simpan data galeri
        $galeri = Galeri::create($request->only([
            'judul',
            'deskripsi'
        ]));

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $this->uploadFoto($request->file('foto'), $galeri->galeri_id);
        }

        return redirect()->route('galeri.index')->with('success', 'Penambahan Data Galeri Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['dataGaleri'] = Galeri::with(['media' => function($query) {
            $query->where('ref_table', 'galeri')
                  ->orderBy('sort_order');
        }])->findOrFail($id);

        return view('pages.galeri.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataGaleri'] = Galeri::with(['media' => function($query) {
            $query->where('ref_table', 'galeri')
                  ->orderBy('sort_order');
        }])->findOrFail($id);

        return view('pages.galeri.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|array',
            'foto.*' => 'image|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB max
        ]);

        $galeri = Galeri::findOrFail($id);
        $galeri->update($request->only([
            'judul',
            'deskripsi'
        ]));

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            $this->uploadFoto($request->file('foto'), $galeri->galeri_id);
        }

        // Handle delete file tertentu jika ada request delete_files
        if ($request->has('delete_files')) {
            foreach ($request->delete_files as $fileId) {
                $file = Media::where('media_id', $fileId)
                    ->where('ref_table', 'galeri')
                    ->where('ref_id', $galeri->galeri_id)
                    ->first();

                if ($file) {
                    Storage::disk('public')->delete('media/galeri/' . $file->file_name);
                    $file->delete();
                }
            }
        }

        return redirect()->route('galeri.index')->with('success', 'Perubahan Data Galeri Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus semua file terkait galeri ini
        $this->deleteAllFiles($galeri->galeri_id);

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Data Galeri berhasil dihapus');
    }

    /**
     * Upload foto tambahan dari halaman show
     */
    public function uploadImages(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $galeri = Galeri::findOrFail($id);

            $request->validate([
                'foto' => 'required|array',
                'foto.*' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:5120'
            ]);

            // Cek jumlah file (opsional, bisa disesuaikan)
            if (count($request->file('foto')) > 10) {
                return redirect()->back()->with('error', 'Maksimal 10 file yang dapat diupload sekaligus');
            }

            // Upload foto
            if ($request->hasFile('foto')) {
                $this->uploadFoto($request->file('foto'), $galeri->galeri_id);
            }

            DB::commit();

            return redirect()->route('galeri.show', $galeri->galeri_id)
                ->with('success', 'Foto berhasil diupload');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('galeri.show', $id)
                ->with('error', 'Gagal upload foto: ' . $e->getMessage());
        }
    }

    /**
     * Upload foto galeri
     */
    private function uploadFoto($files, $galeriId)
    {
        // Cari sort_order terakhir untuk galeri ini
        $lastSortOrder = Media::where('ref_table', 'galeri')
            ->where('ref_id', $galeriId)
            ->max('sort_order') ?? 0;

        $sortOrder = $lastSortOrder + 1;

        foreach ($files as $file) {
            if ($file->isValid()) {
                // Generate unique filename
                $filename = 'galeri-' . $galeriId . '-' . time() . '-' . $sortOrder . '.' . $file->getClientOriginalExtension();

                // Store file - simpan di folder 'media/galeri'
                $file->storeAs('media/galeri', $filename, 'public');

                // Simpan ke tabel media
                Media::create([
                    'ref_table'     => 'galeri',
                    'ref_id'        => $galeriId,
                    'file_name'     => $filename,
                    'mime_type'     => $file->getMimeType(),
                    'caption'       => 'Foto Galeri',
                    'sort_order'    => $sortOrder,
                ]);

                $sortOrder++;
            }
        }
    }

    /**
     * Delete semua file terkait galeri
     */
    private function deleteAllFiles($galeriId)
    {
        $files = Media::where('ref_table', 'galeri')
            ->where('ref_id', $galeriId)
            ->get();

        foreach ($files as $file) {
            Storage::disk('public')->delete('media/galeri/' . $file->file_name);
            $file->delete();
        }
    }

    /**
     * Delete file individual
     */
    public function deleteFile(string $galeriId, string $fileId)
    {
        try {
            DB::beginTransaction();

            $file = Media::where('media_id', $fileId)
                ->where('ref_table', 'galeri')
                ->where('ref_id', $galeriId)
                ->firstOrFail();

            Storage::disk('public')->delete('media/galeri/' . $file->file_name);

            $file->delete();

            DB::commit();

            return redirect()->back()->with('success', 'File berhasil dihapus!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus file: ' . $e->getMessage());
        }
    }

    /**
     * Update sort order untuk foto
     */
    public function updateSortOrder(Request $request, string $galeriId)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'sort_order' => 'required|array',
                'sort_order.*' => 'integer'
            ]);

            foreach ($request->sort_order as $mediaId => $sortOrder) {
                Media::where('media_id', $mediaId)
                    ->where('ref_table', 'galeri')
                    ->where('ref_id', $galeriId)
                    ->update(['sort_order' => $sortOrder]);
            }

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Urutan foto berhasil diupdate!']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Gagal update urutan: ' . $e->getMessage()], 500);
        }
    }
}
