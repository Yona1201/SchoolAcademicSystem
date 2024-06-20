<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\AbsensiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaAbsensiController extends Controller
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
        $request->validate([
            'idp' => 'required',
            'status' => 'required',
        ]);

        try {
            $absen = new AbsensiModel();
            $absen->pertemuan_id = $request->idp;
            $absen->user_id = Auth::id();
            $absen->status = $request->status;
            $absen->keterangan = $request->keterangan;
            $absen->save();

            alert()->success('Berhasil', 'berhasil melakukan absensi');
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            alert()->error('Gagal', 'Terjadi kesalahan pada server !');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
