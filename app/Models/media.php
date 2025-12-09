<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $primaryKey = 'media_id';

    // Tentukan nama tabel jika berbeda
    protected $table = 'media';

    // Kolom yang bisa diisi massal - HANYA KOLOM YANG ADA DI DATABASE
    protected $fillable = [
        'ref_table',
        'ref_id',
        'file_name',
        'caption',
        'mime_type',
        'sort_order'
    ];

    // Kolom yang harus di-cast
    protected $casts = [
        'sort_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Accessor untuk URL lengkap file
     * PERBAIKI: File disimpan berdasarkan sort_order
     */
    public function getUrlAttribute()
    {
        // Tentukan path berdasarkan sort_order
        if ($this->sort_order == 1) {
            // Cover foto - disimpan di media/berita/
            $path = 'media/berita/' . $this->file_name;
        } else {
            // Gallery foto - disimpan di media/berita/gallery/
            $path = 'media/berita/gallery/' . $this->file_name;
        }

        // Cek apakah file ada di storage
        if (Storage::disk('public')->exists($path)) {
            return asset('storage/' . $path);
        }

        // Debug: Log jika file tidak ditemukan
        \Log::warning('Media file not found: ' . $path, [
            'media_id' => $this->media_id,
            'file_name' => $this->file_name,
            'sort_order' => $this->sort_order
        ]);

        return null;
    }

    /**
     * Accessor untuk cek apakah file ada
     */
    public function getFileExistsAttribute()
    {
        if ($this->sort_order == 1) {
            $path = 'media/berita/' . $this->file_name;
        } else {
            $path = 'media/berita/gallery/' . $this->file_name;
        }

        return Storage::disk('public')->exists($path);
    }

    /**
     * Accessor untuk path lengkap file di filesystem
     */
    public function getFullPathAttribute()
    {
        if ($this->sort_order == 1) {
            return storage_path('app/public/media/berita/' . $this->file_name);
        } else {
            return storage_path('app/public/media/berita/gallery/' . $this->file_name);
        }
    }

    /**
     * Scope untuk media berdasarkan tabel referensi
     */
    public function scopeForTable($query, $tableName)
    {
        return $query->where('ref_table', $tableName);
    }

    /**
     * Scope untuk media berdasarkan ID referensi
     */
    public function scopeForRecord($query, $tableName, $recordId)
    {
        return $query->where('ref_table', $tableName)
                    ->where('ref_id', $recordId);
    }

    /**
     * Scope untuk urutan
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('media_id');
    }

    /**
     * Scope untuk tipe file tertentu (gambar)
     */
    public function scopeImages($query)
    {
        return $query->where('mime_type', 'like', 'image/%');
    }

    /**
     * Cek apakah file adalah gambar
     */
    public function getIsImageAttribute()
    {
        return strpos($this->mime_type, 'image/') === 0;
    }

    /**
     * Relasi ke Berita (jika perlu)
     */
    public function berita()
    {
        return $this->belongsTo(Berita::class, 'ref_id', 'berita_id')
                    ->where('ref_table', 'berita');
    }
}
