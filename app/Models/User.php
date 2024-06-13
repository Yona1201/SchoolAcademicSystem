<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    //Mendefinisikan nama tabel
    protected $table ='users';

    //Mendefinisikan kolom-kolom yang dapat diisi 9fillable)
    protected $fillable =['name', 'email', 'password'];

}
