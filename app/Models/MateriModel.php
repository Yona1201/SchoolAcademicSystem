<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriModel extends Model
{
    use HasFactory;

    protected $table = 'materi';
    protected $guarded = ['id'];

    public function pertemuan()
    {
        return $this->belongsTo(PertemuanModel::class, 'pertemuan_id');
    }
}
