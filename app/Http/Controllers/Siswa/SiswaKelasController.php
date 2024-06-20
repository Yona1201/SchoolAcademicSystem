<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\KelasModel;
use App\Models\KelasSiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelasYangDimiliki = KelasSiswaModel::where('user_id', Auth::id())->pluck('kelas_id')->toArray();
        $kelass = KelasModel::whereNotIn('id', $kelasYangDimiliki)->get();
        $data = [
            'kelass' => $kelass,
        ];

        return view('siswa.kelas.index', $data);
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

        $findData = KelasSiswaModel::where('kelas_id', $request->idk)->where('user_id', Auth::id())->first();
        if (!empty($findData)) {
            alert()->error('Gagal', "Anda sudah terdaftar pada kelas ini !");
            return redirect()->back();
        }

        try {
            $kelas_siswa = new KelasSiswaModel();
            $kelas_siswa->kelas_id = $request->idk;
            $kelas_siswa->user_id = Auth::id();
            $kelas_siswa->save();


            alert()->success('Berhasil', "berhasil mendaftar kedalam kelas");
            return redirect()->to(route('siswa.kelas.index'));
        } catch (\Throwable $th) {
            //throw $th;
            alert()->error('Gagal', "Terjadi kesalahan pada server !");
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'kelas' => KelasModel::find($id),
        ];

        return view('siswa.kelas.show', $data);
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
