<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        Log::info('Data register: ', $request->all());
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'role' => ['required'],
            'jk' => ['required', 'in:l,p'], // Validasi jenis kelamin
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        Log::info('Data request:', $request->all());

        $user = User::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jk,        // Simpan jenis kelamin
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'terms_accepted' => $request->has('terms'), // Simpan status "terms" (true/false)
            'password' => Hash::make($request->password),
        ]);
        Log::info('User created:', $user->toArray());

        event(new Registered($user));
        Log::info('Event dispatched');

        Auth::login($user);
        Log::info('User logged in:', $user->toArray());

        return redirect(route('guru.dashboard.index', absolute: false));
    }
}
