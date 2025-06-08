<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
// Jangan lupa tambahkan 'use' di bagian atas file controller
use Illuminate\Validation\Rule;

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
        
        $request->validate([
    'email' => [
        'required', 
        'string', 
        'lowercase', 
        'email', 
        'max:255', 
        Rule::unique(User::class) // Lebih ekspresif dan aman dari typo
    ],
    'password' => [
        'required', 
        'confirmed', 
        Rules\Password::min(8) // Menggunakan object Password, lebih modern
            // ->letters()       // Anda bisa tambahkan aturan lain dengan mudah
            // ->mixedCase()     // Contoh: Wajib ada huruf besar & kecil
            // ->numbers()       // Contoh: Wajib ada angka
            // ->symbols()       // Contoh: Wajib ada simbol
            // ->uncompromised() // Cek apakah password pernah bocor (butuh koneksi internet)
    ],
]);
// dd($request->all());
// dd($error);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
