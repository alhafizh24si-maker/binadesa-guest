<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_picture',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    public function warga()
    {
        return $this->hasOne(Warga::class);
    }

    public function scopeSearch($query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
                }
            });
        }
    }

    /**
     * Get the URL for the profile picture.
     */
    public function getProfilePictureUrlAttribute()
    {
        if (!$this->profile_picture) {
            // Jika tidak ada gambar, gunakan avatar dengan inisial nama
            $initials = strtoupper(substr($this->name, 0, 2));
            return "https://ui-avatars.com/api/?name={$initials}&background=3498db&color=fff&size=100";
        }

        // PERBAIKAN: Gunakan Storage::url() dengan path yang benar
        // Sesuaikan dengan controller: 'profile_pictures' (underscore)
        return Storage::url('profile_pictures/' . $this->profile_picture);
    }

    /**
     * Check if profile picture exists
     */
    public function getHasProfilePictureAttribute()
    {
        if (!$this->profile_picture) {
            return false;
        }

        return Storage::disk('public')->exists('profile_pictures/' . $this->profile_picture);
    }
}
