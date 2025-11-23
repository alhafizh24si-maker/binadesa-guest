<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'kategori_berita';
    protected $primaryKey = 'kategori_id';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi'
    ];

    public function berita()
    {
        return $this->hasMany(Berita::class, 'kategori_id', 'kategori_id');
    }
    public function scopeSearch($query, $request, array $columns)
{
    if ($request->filled('search')) {
        $query->where(function($q) use ($request, $columns) {
            foreach ($columns as $column) {
                $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
            }
        });
    }
}
}
