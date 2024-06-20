<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\KelasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GuruKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'kelass' => KelasModel::where('user_id', 1)->get()
        ];

        return view('guru.kelas.data-kelas.index', $data);
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
                'nama' => 'required',
                'deskripsi' => 'required',
                'hari' => 'required',
                'mulai' => 'required|date_format:H:i',
                'selesai' => 'required|date_format:H:i|after:mulai',
            ],
            [
                'nama.required' => 'nama kelas tidak boleh kosong !',
                'deskripsi.required' => 'deskripsi kelas tidak boleh kosong !',
                'hari.required' => 'hari kelas tidak boleh kosong !',
                'mulai.required' => 'jam mulai kelas tidak boleh kosong !',
                'selesai.required' => 'jam selesai kelas tidak boleh kosong !',
                'mulai.date_format' => 'format jam mulai harus sesuai !',
                'selesai.date_format' => 'format jam selesai harus sesuai !',
                'selesai.after' => 'jam selesai harus lebih dari jam mulai !',
            ]
        );

        try {
            $kelas = new KelasModel();
            $kelas->user_id = Auth::id();
            $kelas->nama = $request->nama;
            $kelas->deskripsi = $request->deskripsi;
            $kelas->hari = $request->hari;
            $kelas->mulai = $request->mulai;
            $kelas->selesai = $request->selesai;
            $kelas->save();
            alert()->success('Berhasil', "berhasil menambahkan kelas $request->nama");
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            Log::info("ERROR CREATE KELAS: " . $th->getMessage());
            alert()->error('Gagal', 'Gagal menambahkan kelas, Terjadi kesalahan pada server !');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'kelas' => KelasModel::find($id)
        ];
        return view('guru.kelas.data-kelas.show', $data);
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
                'nama' => 'required',
                'deskripsi' => 'required',
                'hari' => 'required',
                'mulai' => 'required|date_format:H:i',
                'selesai' => 'required|date_format:H:i|after:mulai',
            ],
            [
                'nama.required' => 'nama kelas tidak boleh kosong !',
                'deskripsi.required' => 'deskripsi kelas tidak boleh kosong !',
                'hari.required' => 'hari kelas tidak boleh kosong !',
                'mulai.required' => 'jam mulai kelas tidak boleh kosong !',
                'selesai.required' => 'jam selesai kelas tidak boleh kosong !',
                'mulai.date_format' => 'format jam mulai harus sesuai !',
                'selesai.date_format' => 'format jam selesai harus sesuai !',
                'selesai.after' => 'jam selesai harus lebih dari jam mulai !',
            ]
        );

        try {
            $kelas = KelasModel::findOrFail($id);
            $kelas->nama = $request->nama;
            $kelas->deskripsi = $request->deskripsi;
            $kelas->hari = $request->hari;
            $kelas->mulai = $request->mulai;
            $kelas->selesai = $request->selesai;
            $kelas->save();
            alert()->success('Berhasil', "berhasil memperbarui kelas $request->nama");
            return redirect()->back();
        } catch (\Throwable $th) {
            Log::error("ERROR UPDATE KELAS: " . $th->getMessage());
            alert()->error('Gagal', 'Gagal memperbarui kelas, Terjadi kesalahan pada server !');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $kelas = KelasModel::findOrFail($id);
            $kelas->delete();
            alert()->success('Berhasil', "Kelas berhasil dihapus");
            return redirect()->back();
        } catch (\Throwable $th) {
            Log::error("ERROR DELETE KELAS: " . $th->getMessage());
            alert()->error('Gagal', 'Gagal menghapus kelas, Terjadi kesalahan pada server !');
            return redirect()->back();
        }
    }
}
