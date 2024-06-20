<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $guarded = ['id'];


    public function guru()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pertemuan()
    {
        return $this->hasMany(PertemuanModel::class, 'kelas_id');
    }
}
