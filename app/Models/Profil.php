<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profil';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'profil_id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'alamat_kantor',
        'email',
        'telepon',
        'visi',
        'misi',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the full location address.
     *
     * @return string
     */
    public function getFullLocationAttribute()
    {
        return $this->nama_desa . ', Kec. ' . $this->kecamatan . ', Kab. ' . $this->kabupaten . ', ' . $this->provinsi;
    }

    /**
     * Get the formatted phone number.
     *
     * @return string
     */
    public function getFormattedPhoneAttribute()
    {
        $phone = $this->telepon;

        // Format: 0812-3456-7890
        if (strlen($phone) == 12) {
            return substr($phone, 0, 4) . '-' . substr($phone, 4, 4) . '-' . substr($phone, 8);
        }

        // Format: (021) 123456
        if (strlen($phone) <= 10) {
            return '(' . substr($phone, 0, 3) . ') ' . substr($phone, 3);
        }

        return $phone;
    }

    /**
     * Scope a query to search by location.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $location
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchByLocation($query, $location)
    {
        return $query->where('nama_desa', 'like', '%' . $location . '%')
            ->orWhere('kecamatan', 'like', '%' . $location . '%')
            ->orWhere('kabupaten', 'like', '%' . $location . '%')
            ->orWhere('provinsi', 'like', '%' . $location . '%');
    }

    /**
     * Check if this is the only profile.
     *
     * @return bool
     */
    public function isOnlyProfile()
    {
        return self::count() === 1;
    }
}
