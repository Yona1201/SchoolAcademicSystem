<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\KelasModel;
use App\Models\KelasSiswaModel;
use App\Models\SiswaParentModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ParentAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!SiswaParentModel::cekAnak()) {
            // dd(!SiswaParentModel::cekAnak());
            return redirect()->to(route('parent.autentikasi'));
        }

        $siswa_parent = SiswaParentModel::with('siswa')->where('parent_id', Auth::id())->first();
        $kelass = $siswa_parent->siswa->semuaKelas;

        $data = [
            'kelass' => $kelass,
        ];

        // dd($kelass);

        return view('parent.absensi.index', $data);
    }

    public function autentikasi()
    {
        $data = [
            'siswas' => User::where('role', 3)->get()
        ];
        // return "sudah di panggil";
        return view('parent.autentikasi.index', $data);
    }

    public function autentikasiProses(Request $request)
    {
        $request->validate([
            'siswa' => 'required|exists:users,id',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $siswa = User::find($request->siswa);

        // Verifikasi email dan password siswa tanpa login
        if (Hash::check($request->password, $siswa->password) && $siswa->email === $request->email) {
            try {
                $sp = new SiswaParentModel();
                $sp->siswa_id = $request->siswa;
                $sp->parent_id = Auth::id();
                $sp->save();

                alert()->success('Berhasil', 'berhasil menghubungkan akun anak');
                return redirect()->to(route('parent.absensi.index'));
            } catch (\Throwable $th) {
                alert()->error('Gagal', 'Terjadi kesalahan pada server');
                return redirect()->back();
            }
        } else {
            return back()->withErrors(['password' => 'Email atau password salah.']);
        }
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
        $siswaParent = SiswaParentModel::where('parent_id', Auth::id())->first();

        if (!$siswaParent) {

            abort(404);
        }

        $idAnak = $siswaParent->siswa_id;

        $kelas = KelasModel::with(['pertemuan' => function ($query) use ($idAnak) {
            $query->whereHas('absensi', function ($subQuery) use ($idAnak) {
                $subQuery->where('status', '!=', null)
                    ->where('user_id', $idAnak);
            })->with(['absensi' => function ($absensiQuery) use ($idAnak) {
                $absensiQuery->where('user_id', $idAnak);
            }]);
        }])->where('id', $id)->first();

        // return response()->json($kelas);
        return view('parent.absensi.show', [
            'kelas' => $kelas
        ]);
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
