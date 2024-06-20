<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasSiswaModel extends Model
{
    use HasFactory;
    protected $table = 'kelas_siswa';
    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(KelasModel::class, 'kelas_id');
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
