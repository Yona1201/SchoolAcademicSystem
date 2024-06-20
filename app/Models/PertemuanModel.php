<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PertemuanModel extends Model
{
    use HasFactory;

    protected $table = 'pertemuan';
    protected $guarded = ['id'];

    public function materi()
    {
        return $this->hasMany(MateriModel::class, 'pertemuan_id', 'id');
    }

    public function absensi()
    {
        return $this->hasMany(AbsensiModel::class, 'pertemuan_id', 'id');
    }

    public function cekAbsensi()
    {
        return $this->absensi()->where('user_id', Auth::id())->exists();
    }
}
