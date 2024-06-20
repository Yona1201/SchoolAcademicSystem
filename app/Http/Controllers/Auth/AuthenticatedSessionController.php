<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user(); // Mendapatkan user yang sedang login

        // Redirect berdasarkan role
        if ($user->role == 1) {
            return redirect()->intended(route('guru.dashboard.index', absolute: false));
        } elseif ($user->role == 2) {
            return redirect()->intended(route('parent.absensi.index', absolute: false));
        } elseif ($user->role == 3) {
            return redirect()->intended(route('siswa.dashboard.index', absolute: false));
        } else {
            // Default redirect jika role tidak dikenali
            return redirect()->intended("/");
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
