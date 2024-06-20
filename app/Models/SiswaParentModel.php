<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SiswaParentModel extends Model
{
    use HasFactory;
    protected $table = 'siswa_parent';
    protected $guarded = ['id'];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }
    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }
    public static function cekAnak()
    {
        return self::where('parent_id', Auth::id())->exists();
    }
}
