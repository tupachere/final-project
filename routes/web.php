<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\AnggotaController;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;



// Rute halaman utama
// Route::get('/', function () {
//     $total = Anggota::count();
//     return view('welcome', compact('total'));
// });


// Rute halaman home
Route::get('/', function () {
    return view('home');
});

// Login route (GET) - Show login form
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/dashboard'); // Redirect if user is already authenticated
    }
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    // Validate the email and password fields
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ]);

    // Find the user by email
    $user = \App\Models\User::where('email', $request->email)->first();

    // Check if the user exists and if the password matches (without bcrypt check)
    if ($user && $user->password == $request->password) {
        // Log the user in
        Auth::login($user);
        // Redirect to the intended page on success
        return redirect()->intended('/dashboard');
    }

    // If authentication fails, throw a validation exception with a custom error message
    throw ValidationException::withMessages([
        'email' => ['The provided credentials do not match our records.'],
    ]);
})->name('login');


// Logout route (POST)
Route::post('/logout', function (Request $request) {
    // Log out the user and regenerate the session
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect to the home page
    return redirect('/');
})->name('logout');

// Menampilkan total anggota
Route::get('/dashboard', function () {
    $total = Anggota::count();
    return view('total', compact('total'));
});

Route::get('anggota/dashboard', function () {
    $total = Anggota::count();
    return view('total', compact('total'));
});

// Rute untuk anggota dengan kontroler AnggotaController
Route::get('/anggota', [AnggotaController::class, 'anggota'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/anggota/update/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/anggota/delete/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

// Rute grup untuk anggota dengan middleware auth
Route::middleware(['auth'])->group(function () {
    Route::resource('anggota', AnggotaController::class)->except(['create', 'edit', 'destroy']);
});
