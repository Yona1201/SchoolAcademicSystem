<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {

        if (!Auth::check()) {
            abort(403, 'Unauthorized'); // Jika user belum login
        }

        $user = Auth::user();
        $allowedRoles = explode(',', $roles);
        // dd($user);

        // Konversi roles yang diperbolehkan menjadi integer
        $allowedRoles = array_map('intval', $allowedRoles);

        // Jika role tidak sesuai, redirect ke halaman yang sesuai
        if (!in_array($user->role, $allowedRoles)) {
            switch ($user->role) {
                case 0: // Admin
                    // dd($user->role);
                    return redirect()->route('admin.dashboard.index');
                case 1: // Guru
                    return redirect()->route('guru.dashboard.index');
                case 2: // Parent
                    return redirect()->route('parent.absensi.index');
                case 3: // Siswa
                    return redirect()->route('siswa.dashboard.index');
                default:
                    return redirect('/');
            }
        }

        // Jika role sesuai, lanjutkan request
        return $next($request);
    }
}
