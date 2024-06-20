<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GuruSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'siswas' => User::where('role', 3)->get()
        ];

        return view('guru.siswa.index', $data);
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
        //
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
        try {
            $siswa = User::findOrFail($id);
            $siswa->nama = $request->nama;
            $siswa->email = $request->email;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->phone = $request->phone;
            $siswa->save();

            alert()->success('Berhasil', 'berhasil update data siswa !');
            return redirect()->back();
        } catch (\Throwable $th) {
            Log::info("UPDATE DATA SISWA", ['error' => $th]);
            alert()->error('Error', 'Terjadi kesalahan pada server saat update data !');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $siswa = User::findOrFail($id);
            $siswa->delete();

            alert()->success('Berhasil', 'berhasil menghapus data siswa !');
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            Log::info("DELETE DATA SISWA", ['error' => $th]);
            alert()->error('Error', 'Terjadi kesalahan pada server saat menghapus data !');
            return redirect()->back();
        }
    }
}
