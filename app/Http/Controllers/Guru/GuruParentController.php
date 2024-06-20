<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GuruParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'parents' => User::where('role', 2)->get()
        ];

        return view('guru.parent.index', $data);
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
            $parent = User::findOrFail($id);
            $parent->nama = $request->nama;
            $parent->email = $request->email;
            $parent->jenis_kelamin = $request->jenis_kelamin;
            $parent->phone = $request->phone;
            $parent->save();

            alert()->success('Berhasil', 'berhasil update data orang tua !');
            return redirect()->back();
        } catch (\Throwable $th) {
            Log::info("UPDATE DATA ORANG TUA", ['error' => $th]);
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
            $parent = User::findOrFail($id);
            $parent->delete();

            alert()->success('Berhasil', 'berhasil menghapus data orang tua !');
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            Log::info("DELETE DATA ORANG TUA", ['error' => $th]);
            alert()->error('Error', 'Terjadi kesalahan pada server saat menghapus data !');
            return redirect()->back();
        }
    }
}
