<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiModel extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $guarded = ['id'];

    public function pertemuan()
    {
        return $this->belongsTo(PertemuanModel::class, 'pertemuan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
