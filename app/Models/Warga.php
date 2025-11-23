<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Warga extends Model
{
    use HasFactory;

    protected $table      = 'warga';
    protected $primaryKey = 'warga_id';
    protected $fillable   = [
        'no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email',
    ];

    protected $casts = [
        'jenis_kelamin' => 'string',
    ];
     public function scopeFilter(Builder $query, Request $request, array $filterableColumns = [])
    {
        // Filter untuk jenis_kelamin
        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        // Filter untuk agama (jika ada)
        if ($request->filled('agama')) {
            $query->where('agama', $request->agama);
        }

        // Filter untuk pekerjaan (jika ada)
        if ($request->filled('pekerjaan')) {
            $query->where('pekerjaan', 'like', '%' . $request->pekerjaan . '%');
        }

        // Filter search general (jika ada)
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('no_ktp', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        return $query;
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

