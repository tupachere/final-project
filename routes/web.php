<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\AnggotaController;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Rute halaman utama
Route::get('/', function () {
    $total = Anggota::count();
    return view('welcome', compact('total'));
});

// Rute halaman index
Route::get('/index', function () {
    return view('index');
});


// Rute halaman home
Route::get('/home', function () {
    return view('home');
});

// Rute login dengan tampilan di folder views/auth
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

// Rute logout
Route::post('/logout', function (Request $request) {
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    Auth::logout();
    return redirect('/home');
})->middleware('auth')->name('logout');

// Menampilkan total anggota
Route::get('/total', function () {
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
