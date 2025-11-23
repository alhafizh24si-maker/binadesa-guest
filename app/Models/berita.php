<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'berita_id';
    public $timestamps = true;

    protected $fillable = [
        'kategori_id',
        'judul',
        'slug',
        'isi_html',
        'penulis',
        'cover_foto',
        'status',
        'terbit_at'
    ];

    protected $casts = [
        'terbit_at' => 'datetime'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id', 'kategori_id');
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

    /**
     * Scope untuk filter status
     */
    public function scopeFilterStatus($query, $status)
    {
        if ($status && $status !== 'semua') {
            $query->where('status', $status);
        }
        return $query;
    }

    /**
     * Scope untuk berita yang sudah terbit
     */
    public function scopeTerbit($query)
    {
        return $query->where('status', 'terbit');
    }

    /**
     * Scope untuk berita draft
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Accessor untuk cover foto URL
     */
    public function getCoverFotoUrlAttribute()
    {
        if ($this->cover_foto) {
            return asset('storage/' . $this->cover_foto);
        }
        return null;
    }

    /**
     * Accessor untuk status label
     */
    public function getStatusLabelAttribute()
    {
        $statuses = [
            'draft' => 'Draft',
            'terbit' => 'Terbit'
        ];

        return $statuses[$this->status] ?? $this->status;
    }

    /**
     * Accessor untuk status badge class
     */
    public function getStatusBadgeClassAttribute()
    {
        $classes = [
            'draft' => 'bg-warning text-dark',
            'terbit' => 'bg-success'
        ];

        return $classes[$this->status] ?? 'bg-secondary';
    }

    /**
     * Check if berita is published
     */
    public function isPublished()
    {
        return $this->status === 'terbit';
    }

    /**
     * Check if berita is draft
     */
    public function isDraft()
    {
        return $this->status === 'draft';
    }

    /**
     * Get formatted terbit_at date
     */
    public function getTerbitAtFormattedAttribute()
    {
        return $this->terbit_at ? $this->terbit_at->format('d M Y H:i') : '-';
    }

    /**
     * Get short excerpt from isi_html
     */
    public function getExcerptAttribute($length = 150)
    {
        $text = strip_tags($this->isi_html);
        if (strlen($text) > $length) {
            return substr($text, 0, $length) . '...';
        }
        return $text;
    }
}
