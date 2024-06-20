<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'jenis_kelamin',
    //     'phone',
    //     'role'
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getJk()
    {
        return $this->jenis_kelamin === 'l' ? 'laki - laki' : 'perempuan';
    }



    // relasi
    public function kelas()
    {
        return $this->hasMany(KelasModel::class, 'kelas_id');
    }

    public function semuaKelas()
    {
        return $this->hasMany(KelasSiswaModel::class, 'user_id');
    }


    // Dalam User.php (model Orang Tua)

    public function kelasAnak()
    {
        return $this->hasManyThrough(
            KelasModel::class, // Model target (kelas)
            SiswaParentModel::class, // Model penghubung (siswa_parent)
            'parent_id', // Foreign key di model penghubung (siswa_parent) yang mengarah ke model ini (User)
            'id', // Foreign key di model target (KelasModel)
            'id', // Local key di model ini (User)
            'siswa_id' // Local key di model penghubung (siswa_parent)
        );
    }
}
