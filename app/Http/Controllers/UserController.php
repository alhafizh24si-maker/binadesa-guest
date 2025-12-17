<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // PAKAI YANG SUDAH ADA (jangan diubah)
        $query = User::query();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('email', 'LIKE', '%' . $request->search . '%');
            });
        }

        if ($request->filled('filter_user')) {
            if ($request->filter_user == 'a') {
                $query->whereRaw('LOWER(SUBSTRING(name, 1, 1)) BETWEEN "a" AND "m"');
            } elseif ($request->filter_user == 'n') {
                $query->whereRaw('LOWER(SUBSTRING(name, 1, 1)) BETWEEN "n" AND "z"');
            }
        }

        $query->orderBy('name', 'asc');
        $data['dataUser'] = $query->paginate(10);
        $data['dataUser']->appends($request->query());

        return view('pages.users.index', $data);
    }

    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Data dasar (PAKAI YANG SUDAH ADA)
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;

        // PERBAIKAN: UPLOAD GAMBAR MENGGUNAKAN STORAGE FACADE
        if ($request->hasFile('profile_picture')) {
            // Simpan file ke storage dengan disk 'public'
            $fileName = time() . '_' . $request->file('profile_picture')->getClientOriginalName();

            // PERBAIKAN: Gunakan Storage facade dengan disk 'public'
            $request->file('profile_picture')->storeAs('profile_pictures', $fileName, 'public');

            $data['profile_picture'] = $fileName;
        }

        User::create($data);

        return redirect()->route('user.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function edit(string $id)
    {
         $user = User::findOrFail($id);
    return view('pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

    // TAMBAHKAN VALIDASI
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:8|confirmed',
        'role' => 'required|in:Super Admin,Admin,Guest',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->role = $request->role;

    // HANDLE REMOVE CHECKBOX
    if ($request->has('remove_profile_picture') && $request->remove_profile_picture == '1') {
        if ($user->profile_picture && Storage::disk('public')->exists('profile_pictures/' . $user->profile_picture)) {
            Storage::disk('public')->delete('profile_pictures/' . $user->profile_picture);
        }
        $user->profile_picture = null;
    }
    // HANDLE UPLOAD NEW PICTURE
    elseif ($request->hasFile('profile_picture')) {
        // Hapus file lama jika ada
        if ($user->profile_picture && Storage::disk('public')->exists('profile_pictures/' . $user->profile_picture)) {
            Storage::disk('public')->delete('profile_pictures/' . $user->profile_picture);
        }

        // Simpan file baru
        $fileName = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
        $request->file('profile_picture')->storeAs('profile_pictures', $fileName, 'public');

        $user->profile_picture = $fileName;
    }

    $user->save();

    return redirect()->route('user.index')->with('success', 'Perubahan Data Berhasil!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // PERBAIKAN: Hapus profile picture jika ada
        if ($user->profile_picture && Storage::disk('public')->exists('profile_pictures/' . $user->profile_picture)) {
            Storage::disk('public')->delete('profile_pictures/' . $user->profile_picture);
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
    }
}
