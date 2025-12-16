<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Galeri extends Model
{
    use HasFactory;

    protected $primaryKey = 'galeri_id';
    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'deskripsi'
    ];

    /**
     * Relasi dengan media (menggunakan pola yang sama seperti Agenda)
     */
    public function media(): HasMany
    {
        return $this->hasMany(Media::class, 'ref_id', 'galeri_id')
                    ->where('ref_table', 'galeri')
                    ->orderBy('sort_order');
    }

    /**
     * Scope untuk filter (sama seperti Agenda)
     */
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }

    /**
     * Scope untuk search (sama seperti Agenda)
     */
    public function scopeSearch(Builder $query, $request, array $searchableColumns): Builder
    {
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm, $searchableColumns) {
                foreach ($searchableColumns as $column) {
                    $q->orWhere($column, 'like', '%' . $searchTerm . '%');
                }
            });
        }
        return $query;
    }
}
