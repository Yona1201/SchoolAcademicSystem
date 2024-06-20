<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'gurus' => User::where('role', 1)->get()
        ];
        return view('admin.guru.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'jenis_kelamin' => 'required|in:l,p',
            'phone' => 'required|string',
            'password' => 'required|string|min:8',
        ]);


        try {
            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'phone' => $request->phone,
                'role' => 1,
                'password' => Hash::make($request->password),
            ]);

            alert()->success('Berhasil', 'berhasil membuat data guru !');
            return redirect()->back();
        } catch (\Throwable $th) {

            alert()->error('Gagal', 'Terjadi kesalahan pada server !');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Validasi Input (Serupa dengan store, tapi unique email harus mengecualikan ID user yang sedang diupdate)
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Unique kecuali ID user ini
            'jenis_kelamin' => 'required|in:l,p',
            'phone' => 'required|string',
        ]);

        // 2. Cari User yang Akan Diupdate
        try {
            $user = User::findOrFail($id); // Cari user berdasarkan ID atau throw ModelNotFoundException
        } catch (\Throwable $th) {
            alert()->error('Gagal', 'Data tidak ditemukan!');
            return redirect()->back();
        }

        // 3. Update Data User
        try {
            $user->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'phone' => $request->phone,
                // Perbarui field lain sesuai kebutuhan
            ]);

            alert()->success('Berhasil', 'Data berhasil diperbarui!');
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->error('Gagal', 'Terjadi kesalahan saat memperbarui data!');
            return redirect()->back()->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd('oke');
        try {
            $user = User::findOrFail($id); // Cari user berdasarkan ID atau throw ModelNotFoundException
        } catch (\Throwable $th) {
            alert()->error('Gagal', 'Data tidak ditemukan!');
            return redirect()->back();
        }

        try {
            $user->delete(); // Hapus user dari database

            alert()->success('Berhasil', 'Data berhasil dihapus!');
            return redirect()->route('nama.route.anda'); // Redirect setelah menghapus, biasanya ke halaman daftar user
        } catch (\Throwable $th) {
            alert()->error('Gagal', 'Terjadi kesalahan saat menghapus data!');
            return redirect()->back();
        }
    }
}
