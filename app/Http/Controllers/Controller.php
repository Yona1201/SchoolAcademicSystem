<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Comtroller
{
    //Menampilkan daftar pengguna
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' =>$users]);
    }

    //Menampilkan detail pengguna berdasarkan ID
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user'=>$user]);
    }
}
