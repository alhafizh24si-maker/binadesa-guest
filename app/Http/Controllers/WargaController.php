<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(Request $request)
{
    $filterableColumns = ['jenis_kelamin'];

    $searchableColumns = ['no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email'];

    $warga = Warga::filter($request, $filterableColumns)
                 ->orderBy('created_at', 'desc')
                 ->paginate(10)
                 ->withQueryString();

    return view('pages.warga.index', compact('warga'));
}

    public function create()
    {
        return view('pages.warga.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_ktp' => 'required|string|max:20|unique:warga',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'nullable|string|max:50',
            'pekerjaan' => 'nullable|string|max:100',
            'telp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100'
        ]);

        Warga::create($validated);

        return redirect()->route('warga.index')
                        ->with('success', 'Data warga berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('pages.warga.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_ktp' => 'required|string|max:20|unique:warga,no_ktp,' . $id . ',warga_id',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'nullable|string|max:50',
            'pekerjaan' => 'nullable|string|max:100',
            'telp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100'
        ]);

        $warga = Warga::findOrFail($id);
        $warga->update($validated);

        return redirect()->route('warga.index')
                        ->with('success', 'Data warga berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('warga.index')
                        ->with('success', 'Data warga berhasil dihapus!');
    }
}
