<?php
// app/Http\Controllers/ProfilController.php
namespace App\Http\Controllers;

use App\Models\Profil;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::first();
        return view('profil', compact('profil'));
    }
}
