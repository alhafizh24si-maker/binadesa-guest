<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kategoriberita extends Model
{
    use HasFactory;

    protected $table = 'kategoriberita';
    protected $primaryKey = 'kategori_id';
    protected $fillable = ['name', 'slug', 'deskripsi'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kategoriberita) {
            $slug = Str::slug($kategoriberita->name);
            $originalSlug = $slug;
            $counter = 1;

            while (static::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $kategoriberita->slug = $slug;
        });

        static::updating(function ($kategoriberita) {
            if ($kategoriberita->isDirty('name')) {
                $slug = Str::slug($kategoriberita->name);
                $originalSlug = $slug;
                $counter = 1;

                while (static::where('slug', $slug)->where('kategori_id', '!=', $kategoriberita->kategori_id)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }

                $kategoriberita->slug = $slug;
            }
        });
    }
}
