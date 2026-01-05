<?php

namespace App\Http\Controllers;


use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Profil::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_desa', 'like', '%' . $search . '%')
                  ->orWhere('kecamatan', 'like', '%' . $search . '%')
                  ->orWhere('kabupaten', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        // Filter by provinsi
        if ($request->has('filter_provinsi') && $request->filter_provinsi != '') {
            $query->where('provinsi', 'like', '%' . $request->filter_provinsi . '%');
        }

        $profil = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('pages.profildesa.index', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.profildesa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_desa' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'alamat_kantor' => 'required|string',
            'email' => 'required|email|unique:profil,email',
            'telepon' => 'required|string|max:20',
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        // Cek apakah sudah ada profil
        $profilCount = Profil::count();
        if ($profilCount > 0) {
            return redirect()->route('profildesa.index')
                ->with('error', 'Hanya boleh ada 1 profil desa. Silahkan edit profil yang sudah ada.');
        }

        try {
            $profil = Profil::create([
                'nama_desa' => $request->nama_desa,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
                'alamat_kantor' => $request->alamat_kantor,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'visi' => $request->visi,
                'misi' => $request->misi,
            ]);

            return redirect()->route('profildesa.index')
                ->with('success', 'Profil desa <strong>' . $profil->nama_desa . '</strong> berhasil ditambahkan!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan profil desa. Error: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profil = Profil::findOrFail($id);
        return view('pages.profildesa.show', compact('profil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        return view('pages.profildesa.edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $profil = Profil::findOrFail($id);

        // Validasi data
        $request->validate([
            'nama_desa' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'alamat_kantor' => 'required|string',
            'email' => 'required|email|unique:profil,email,' . $id . ',profil_id',
            'telepon' => 'required|string|max:20',
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        try {
            $profil->update([
                'nama_desa' => $request->nama_desa,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
                'alamat_kantor' => $request->alamat_kantor,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'visi' => $request->visi,
                'misi' => $request->misi,
            ]);

            return redirect()->route('profildesa.index')
                ->with('success', 'Profil desa <strong>' . $profil->nama_desa . '</strong> berhasil diperbarui!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui profil desa. Error: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $profil = Profil::findOrFail($id);
            $namaDesa = $profil->nama_desa;

            // Cek apakah ini satu-satunya profil
            $profilCount = Profil::count();
            if ($profilCount <= 1) {
                return redirect()->route('profildesa.index')
                    ->with('error', 'Tidak dapat menghapus satu-satunya profil desa!');
            }

            $profil->delete();

            return redirect()->route('profildesa.index')
                ->with('success', 'Profil desa <strong>' . $namaDesa . '</strong> berhasil dihapus!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus profil desa. Error: ' . $e->getMessage());
        }
    }

    /**
     * Display public profile (for guest)
     */
    public function publicProfile()
    {
        $profil = Profil::first();

        if (!$profil) {
            return view('pages.profildesa.public-empty')
                ->with('warning', 'Profil desa belum tersedia.');
        }

        return view('pages.profildesa.public', compact('profil'));
    }
}
