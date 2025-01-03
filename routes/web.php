<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\JadwalController;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Exports\KasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PemasukanExport;
use App\Exports\PengeluaranExport;

Route::get('/kas/export', function () {
    return Excel::download(new KasExport, 'data_kas.xlsx');
})->name('kas.export');


Route::get('/pemasukan/export', function () {
    return Excel::download(new PemasukanExport, 'data_pemasukan.xlsx');
})->name('pemasukan.export');

Route::get('/pengeluaran/export', function () {
    return Excel::download(new PengeluaranExport, 'data_pengeluaran.xlsx');
})->name('pengeluaran.export');

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
        'email' => ['Email atau password salah.'],
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
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::resource('pengeluaran', PengeluaranController::class);



// Rute untuk anggota dengan kontroler AnggotaController
Route::get('/anggota', [AnggotaController::class, 'anggota'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/anggota/update/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/anggota/delete/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
Route::get('/anggota/export-pdf', [AnggotaController::class, 'exportPdf'])->name('anggota.exportPdf');


// Rute grup untuk anggota dengan middleware auth
Route::middleware(['auth'])->group(function () {
    Route::resource('anggota', AnggotaController::class)->except(['create', 'edit', 'destroy']);
});



Route::get('/kas', [KasController::class, 'index'])->name('kas.index');
Route::get('/kas/create', [KasController::class, 'create'])->name('kas.create');
Route::post('/kas', [KasController::class, 'store'])->name('kas.store');
//Route::get('/kas/{id}', [KasController::class, 'show'])->name('kas.show');
Route::get('/kas/edit/{id}', [KasController::class, 'edit'])->name('kas.edit');
Route::put('/kas/edit/{id}', [KasController::class, 'update'])->name('kas.update');
Route::delete('/kas/{id}', [KasController::class, 'destroy'])->name('kas.destroy');
Route::get('/kas/export-pdf', [KasController::class, 'exportPdf'])->name('data.exportPdf');

Route::get('/laporan/absensi/pdf', [AbsensiController::class, 'generatePDF'])->name('absensi.laporan.pdf');
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.absensi');
Route::get('/laporan-absensi', [AbsensiController::class, 'laporan'])->name('absensi.laporan');

Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
// Rute grup untuk anggota dengan middleware auth
Route::middleware(['auth'])->group(function () {
    Route::resource('anggota', AnggotaController::class)->except(['create', 'edit', 'destroy']);
});


Route::resource('pemasukan', PemasukanController::class)->except(['edit', 'update']);
Route::resource('pengeluaran', PengeluaranController::class)->except(['edit', 'update']);
Route::get('/charts/area', [ChartController::class, 'showChart']);



Route::prefix('jadwals')->group(function () {
    Route::get('/', [JadwalController::class, 'index'])->name('jadwals.index'); // Tampilkan daftar jadwal
    Route::get('/create', [JadwalController::class, 'create'])->name('jadwals.create'); // Form tambah jadwal
    Route::post('/', [JadwalController::class, 'store'])->name('jadwals.store'); // Simpan jadwal baru
    Route::get('/{id}/edit', [JadwalController::class, 'edit'])->name('jadwals.edit'); // Form edit jadwal
    Route::put('/{id}', [JadwalController::class, 'update'])->name('jadwals.update'); // Perbarui jadwal
    Route::delete('/{id}', [JadwalController::class, 'destroy'])->name('jadwals.destroy'); // Hapus jadwal
});
