<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\PertemuanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GuruPertemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate(
            [
                'judul' => 'required',
                'deskripsi' => 'required',

            ],
            [
                'judul.required' => 'judul pertemuan kelas tidak boleh kosong !',
                'deskripsi.required' => 'deskripsi pertemuan kelas tidak boleh kosong !',
            ]
        );

        try {
            $kelas = new PertemuanModel();
            $kelas->kelas_id = $request->idk;
            $kelas->judul = $request->judul;
            $kelas->deskripsi = $request->deskripsi;
            $kelas->save();
            alert()->success('Berhasil', "berhasil menambahkan pertemuan $request->judul");
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            Log::info("ERROR CREATE PERTEMUAN: " . $th->getMessage());
            alert()->error('Gagal', 'Gagal menambahkan pertemuan, Terjadi kesalahan pada server !');
            return redirect()->back();
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
        $request->validate(
            [
                'judul' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'judul.required' => 'judul pertemuan kelas tidak boleh kosong !',
                'deskripsi.required' => 'deskripsi kelas tidak boleh kosong !',
            ]
        );

        try {
            $kelas = PertemuanModel::findOrFail($id);
            $kelas->judul = $request->judul;
            $kelas->deskripsi = $request->deskripsi;
            $kelas->save();
            alert()->success('Berhasil', "berhasil memperbarui pertemuan $request->judul");
            return redirect()->back();
        } catch (\Throwable $th) {
            Log::error("ERROR UPDATE PERTEMUAN: " . $th->getMessage());
            alert()->error('Gagal', 'Gagal memperbarui pertemuan, Terjadi kesalahan pada server !');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $kelas = PertemuanModel::findOrFail($id);
            $kelas->delete();
            alert()->success('Berhasil', "pertemuan berhasil dihapus");
            return redirect()->back();
        } catch (\Throwable $th) {
            Log::error("ERROR DELETE PERTEMUAN: " . $th->getMessage());
            alert()->error('Gagal', 'Gagal menghapus pertemuan, Terjadi kesalahan pada server !');
            return redirect()->back();
        }
    }
}
